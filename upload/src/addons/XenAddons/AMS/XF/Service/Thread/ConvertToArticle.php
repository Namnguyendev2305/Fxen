<?php

namespace XenAddons\AMS\XF\Service\Thread;

use XF\Entity\Thread;

class ConvertToArticle extends \XF\Service\AbstractService
{
	/**
	 * @var \XF\Entity\Thread
	 */
	protected $thread;
	
	protected $newArticleTags;
	
	/**
	 * @var \XenAddons\AMS\Service\ArticleItem\Create|null
	 */
	protected $articleCreator;
	
	protected $newArticlePrefix = 0;
	
	protected $newArticleState = 'visible';
	
	protected $alert = false;
	protected $alertReason = '';

	public function __construct(\XF\App $app, Thread $thread)
	{
		parent::__construct($app);
		$this->thread = $thread;
	}

	public function getThread()
	{
		return $this->thread;
	}
	
	public function setNewArticleTags($tags)
	{
		$this->newArticleTags = $tags;
	}
	
	public function setNewArticlePrefix($articlePrefixId)
	{
		$this->newArticlePrefix = $articlePrefixId;		
	}
	
	public function setNewArticleState($articleState)
	{
		$this->newArticleState = $articleState;
	}
	
	public function setSendAlert($alert, $reason = null)
	{
		$this->alert = (bool)$alert;
		if ($reason !== null)
		{
			$this->alertReason = $reason;
		}
	}
	
	public function convertToArticle(\XenAddons\AMS\Entity\Category $targetCategory)
	{
		$thread = $this->thread;
		
		$creator = $this->setupNewArticleCreation($targetCategory);
		if ($creator && $creator->validate())
		{
			$article = $creator->save();
		
			$this->articleCreator = $creator;
		
			$this->afterNewArticleCreated($article);
		
			$this->sendNotifications($article);
		
			return $article;
		}
		
		return false;
	}
	
	protected function setupNewArticleCreation(\XenAddons\AMS\Entity\Category $category)
	{
		$thread = $this->thread;
		$firstPost = $thread->FirstPost;
	
		/** @var \XenAddons\AMS\Service\ArticleItem\Create $creator */
		$creator = $this->service('XenAddons\AMS:ArticleItem\Create', $category);
		$creator->setIsAutomated();
		$creator->setIsConvertFromThread();
		$creator->setUser($thread->User);

		$articleTitle = $this->app->stringFormatter()->wholeWordTrim($thread->title, 100);
	
		$creator->setContent($articleTitle, $firstPost->message, false);
		$creator->setArticleState($this->newArticleState);
		$creator->setPrefix($this->newArticlePrefix); 
		$creator->setTags($this->newArticleTags);
	
		return $creator;
	}
	
	protected function afterNewArticleCreated(\XenAddons\AMS\Entity\ArticleItem $article)
	{
		$thread = $this->thread;
		$thread->discussion_type = 'ams_article';
		
		$newArticleState = $this->newArticleState;
		if($newArticleState != 'visible')
		{
			$thread->discussion_state = 'moderated';
		}

		if ($article->Category->thread_node_id)
		{
			$thread->node_id = $article->Category->thread_node_id;
			$thread->prefix_id = $article->Category->thread_prefix_id;
		}
		
		$thread->save();

		// if there are any first post attachments, reassign them to the new article and set a cover image if there are any image attachments
		$firstPost = $thread->FirstPost;
		if ($firstPost->attach_count)
		{
			$article->cover_image_id = $this->getCoverImageId($firstPost);
			
			$attachCount = $this->db()->update(
				'xf_attachment',
				[
					'content_id' => $article->article_id,
					'content_type' => 'ams_article'
				],
				"content_id = $firstPost->post_id AND content_type = 'post'"
			);
		
			$article->attach_count += $attachCount;
			
			$firstPost->attach_count = 0;
		}
		
		// Convert First Post Reactions to Item Reactions
		$reactionCount = $this->db()->update(
			'xf_reaction_content',
			[
				'content_id' => $article->article_id,
				'content_type' => 'ams_article'
			],
			"content_id = $firstPost->post_id AND content_type = 'post'"
		);

		// set some misc article related data from thread and first post data
		$article->reaction_score = $firstPost->reaction_score;
		$article->reactions = $firstPost->reactions;
		$article->reaction_users = $firstPost->reaction_users;
		$article->publish_date = $thread->post_date;
		$article->view_count = $thread->view_count;
		$article->discussion_thread_id = $thread->thread_id;
		$article->save();

		// set some misc first post related data (unset reactions data for first post and modify the first post message)
		$firstPost->reaction_score = 0;
		$firstPost->reactions = [];
		$firstPost->reaction_users = [];
		$firstPost->message = $this->geNewtFirstPostMessage($article);	
		$firstPost->save();
		
		// Mark the new article as read for both the moderator that is performing the convert action as well as the thread author
		$this->repository('XenAddons\AMS:Article')->markArticleItemReadByVisitor($article);
		$this->repository('XenAddons\AMS:Article')->markArticleItemReadByUser($article, $thread->User);
		
		// set the watch state of the article for the thread author
		$this->repository('XenAddons\AMS:ArticleWatch')->autoWatchAmsArticleItem($article, $thread->User, true);
	}
	
	protected function getCoverImageId(\XF\Entity\Post $firstPost)
	{
		$attachments = $firstPost->Attachments;
	
		foreach ($attachments AS $key => $attachment)
		{
			if ($attachment['thumbnail_url'])
			{
				return $attachment['attachment_id'];
				break;
			}
		}
		
		return 0;
	}	
	
	protected function geNewtFirstPostMessage(\XenAddons\AMS\Entity\ArticleItem $article)
	{
		$category = $article->Category;
	
		$snippet = $this->app->bbCode()->render(
			$this->app->stringFormatter()->wholeWordTrim($article->message, 500),
			'bbCodeClean',
			'post',
			null
		);
	
		$phrase = \XF::phrase('xa_ams_article_thread_create', [
			'title' => $article->title_,
			'term' => $category->content_term ?: \XF::phrase('xa_ams_article'),
			'term_lower' => $category->content_term ? strtolower($category->content_term) : strtolower(\XF::phrase('xa_ams_article')),
			'username' => $article->User ? $article->User->username : $article->username,
			'snippet' => $snippet,
			'article_link' => $this->app->router('public')->buildLink('canonical:ams', $article)
		]);
	
		return $phrase->render('raw');
	}
		
	public function sendNotifications(\XenAddons\AMS\Entity\ArticleItem $article)
	{
		if ($this->articleCreator)
		{
			$this->articleCreator->sendNotifications();
		}
		
		if ($this->alert && $article->user_id != \XF::visitor()->user_id)
		{
			/** @var \XenAddons\AMS\Repository\Article $articleRepo */
			$articleRepo = $this->repository('XenAddons\AMS:Article');
			$articleRepo->sendModeratorActionAlert($article, 'converted_thread', $this->alertReason);
		}
	}	
	
}	