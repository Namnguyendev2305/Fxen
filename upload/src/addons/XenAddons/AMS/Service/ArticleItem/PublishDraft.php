<?php

namespace XenAddons\AMS\Service\ArticleItem;

use XenAddons\AMS\Entity\ArticleItem;

class PublishDraft extends \XF\Service\AbstractService
{
	/**
	 * @var ArticleItem
	 */
	protected $article;

	protected $notifyRunTime = 3;
	
	/**
	 * @var \XF\Service\Thread\Creator|null
	 */
	protected $threadCreator;
	
	protected $createAssociatedThread = true;

	public function __construct(\XF\App $app, ArticleItem $article)
	{
		parent::__construct($app);
		$this->article = $article;
	}

	public function getArticle()
	{
		return $this->article;
	}

	public function setNotifyRunTime($time)
	{
		$this->notifyRunTime = $time;
	}

	public function publishDraft($isAutomated = false)
	{
		if (
			$this->article->article_state == 'draft' 
			|| $this->article->article_state == 'awaiting'
		)
		{
			if ($isAutomated)
			{
				// TODO for now, set this to visible... in the future, check the article authors permissions on whether to bypass queue or not
				$this->article->article_state = 'visible';
			}
			else 
			{
				$this->article->article_state = $this->article->Category->getNewArticleState();
			}	
			
			$this->article->publish_date = \XF::$time;
			$this->article->edit_date = \XF::$time;
			$this->article->last_update = \XF::$time;
			$this->article->save();

			$this->onPublishDraft($isAutomated);
			
			return true;
		}
		else
		{
			return false;
		}
	}

	protected function onPublishDraft($isAutomated = false)
	{
		$article = $this->article;
		$category = $article->Category;
		
		if ($article->isVisible())
		{
			/** @var \XenAddons\AMS\Service\ArticleItem\Notify $notifier */
			$notifier = $this->service('XenAddons\AMS:ArticleItem\Notify', $article, 'article');
			$notifier->notifyAndEnqueue($this->notifyRunTime);
		}
		
		// Create an associated discussion thread for this newly published article (if the category is configured to do so)
		if (
			$category->thread_node_id
			&& $category->ThreadForum
		)
		{
			$actionUser = $this->getArticleActionUser($article);
			
			return \XF::asVisitor($actionUser, function() use ($article, $category, $actionUser)
			{			
				$creator = $this->setupArticleThreadCreation($category->ThreadForum);
				if (!$creator->validate($errors))
				{
					$error = reset($errors);
					$articleId = $this->article->article_id;
					\XF::logException(new \Exception("Error creating thread for article $articleId: $error"));
					return false;
				}
				
				$db = $this->db();
				$db->beginTransaction();
					
				$creator->save();
		
				$thread = $creator->getThread();
					
				$article->fastUpdate('discussion_thread_id', $thread->thread_id);
					
				$db->commit();

				$creator->sendNotifications();
				
				\XF::repository('XF:Thread')->markThreadReadByUser($thread, $actionUser, true);
				\XF::repository('XF:ThreadWatch')->autoWatchThread($thread, $actionUser, true);
				
				return true;
			});	
		}
	}
	
	protected function getArticleActionUser(\XenAddons\AMS\Entity\ArticleItem $article)
	{
		if ($article->user_id && $article->User)
		{
			return $article->User;
		}
	
		$userRepo = $this->repository('XF:User');
		$strFormatter = $this->app->stringFormatter();

		return $userRepo->getGuestUser($strFormatter->wholeWordTrim($article->title, 50, 0, ''));
	}
	
	protected function setupArticleThreadCreation(\XF\Entity\Forum $forum)
	{
		$article = $this->article;
		$category = $article->Category;
		
		/** @var \XF\Service\Thread\Creator $creator */
		$creator = $this->service('XF:Thread\Creator', $forum);
		$creator->setIsAutomated();
	
		$creator->setContent($article->getExpectedThreadTitle(), $this->getThreadMessage(), false);
		$creator->setPrefix($category->thread_prefix_id);
	
		if (
			$category->thread_set_article_tags
			&& $article->tags
		) 
		{
			$tagList = [];
			foreach ($article->tags AS $tagId => $tag)
			{
				$tagList[] = $tag['tag'];
			}
			$tagList = implode(', ', $tagList);
			
			$creator->setTags($tagList);
		}
	
		$creator->setDiscussionTypeAndDataRaw('ams_article');
	
		$discussionState = $article->article_state;
	
		$thread = $creator->getThread();
		$thread->discussion_state = $discussionState;
	
		return $creator;
	}
	
	protected function getThreadMessage()
	{
		$article = $this->article;
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
			'article_link' => $this->app->router('public')->buildLink('canonical:ams', $this->article)
		]);
	
		return $phrase->render('raw');
	}
}