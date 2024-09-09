<?php

namespace XenAddons\AMS\Service\ArticleItem;

use XenAddons\AMS\Entity\ArticleItem;

class ChangeDiscussion extends \XF\Service\AbstractService
{
	/**
	 * @var \XenAddons\AMS\Entity\ArticleItem
	 */
	protected $article;

	public function __construct(\XF\App $app, ArticleItem $article)
	{
		parent::__construct($app);
		$this->article = $article;
	}

	public function getArticle()
	{
		return $this->article;
	}

	public function disconnectDiscussion()
	{
		$this->article->discussion_thread_id = 0;
		$this->article->save();

		return true;
	}

	public function changeThreadByUrl($threadUrl, $checkPermissions = true, &$error = null)
	{
		$threadRepo = $this->repository('XF:Thread');
		$thread = $threadRepo->getThreadFromUrl($threadUrl, null, $threadFetchError);
		if (!$thread)
		{
			$error = $threadFetchError;
			return false;
		}

		return $this->changeThreadTo($thread, $checkPermissions, $error);
	}

	public function changeThreadTo(\XF\Entity\Thread $thread, $checkPermissions = true, &$error = null)
	{
		if ($checkPermissions && !$thread->canView($viewError))
		{
			$error = $viewError ?: \XF::phrase('do_not_have_permission');
			return false;
		}

		if ($thread->thread_id === $this->article->discussion_thread_id)
		{
			return true;
		}

		if ($thread->discussion_type != \XF\ThreadType\AbstractHandler::BASIC_THREAD_TYPE)
		{
			$error = \XF::phrase('xa_ams_new_article_discussion_thread_must_be_standard_thread');
			return false;
		}

		$this->article->discussion_thread_id = $thread->thread_id;
		$this->article->save();

		return true;
	}
	
	public function createDiscussion()
	{
		$article = $this->article;
		$category = $article->Category;
			
		if ($category->thread_node_id && $category->ThreadForum)
		{
			$creator = $this->setupArticleThreadCreation($category->ThreadForum);
			if ($creator && $creator->validate())
			{
				$thread = $creator->save();
				$article->fastUpdate('discussion_thread_id', $thread->thread_id);
				$this->threadCreator = $creator;
	
				$this->afterArticleThreadCreated($thread, $article);
			}
		}
	
		return true;
	}
	
	protected function setupArticleThreadCreation(\XF\Entity\Forum $forum)
	{
		/** @var \XF\Service\Thread\Creator $creator */
		$creator = $this->service('XF:Thread\Creator', $forum);
		$creator->setIsAutomated();
	
		$creator->setContent($this->article->getExpectedThreadTitle(), $this->getThreadMessage(), false);
		$creator->setPrefix($this->article->Category->thread_prefix_id);
	
		$creator->setDiscussionTypeAndDataRaw('ams_article');
	
		$thread = $creator->getThread();
		$thread->discussion_state = $this->article->article_state;
	
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
	
	protected function afterArticleThreadCreated(\XF\Entity\Thread $thread, \XenAddons\AMS\Entity\ArticleItem $article)
	{
		$this->repository('XF:Thread')->markThreadReadByVisitor($thread);
		$this->repository('XF:ThreadWatch')->autoWatchThread($thread, \XF::visitor(), true);
	
		$thread->user_id = $article->user_id;
		$thread->username = $article->username;
		$thread->save();
			
		$firstPost = $thread->FirstPost;
		$firstPost->user_id = $article->user_id;
		$firstPost->username = $article->username;
		$firstPost->save();
	
		$thread->rebuildFirstPostInfo();
		$thread->rebuildLastPostInfo();
		$thread->save();
	
		$thread->Forum->rebuildLastPost();
		$thread->Forum->save();
	}	

}