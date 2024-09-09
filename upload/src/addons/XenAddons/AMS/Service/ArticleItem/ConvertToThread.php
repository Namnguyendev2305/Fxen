<?php

namespace XenAddons\AMS\Service\ArticleItem;

use XenAddons\AMS\Entity\ArticleItem;

class ConvertToThread extends \XF\Service\AbstractService
{
	/**
	 * @var \XenAddons\AMS\Entity\ArticleItem
	 */
	protected $article;
	
	protected $newThreadTags;
	
	/**
	 * @var \XF\Service\Thread\Creator|null
	 */
	protected $threadCreator;

	protected $alert = false;
	protected $alertReason = '';
	
	public function __construct(\XF\App $app, ArticleItem $article)
	{
		parent::__construct($app);
		$this->article = $article;
	}

	public function getArticle()
	{
		return $this->article;
	}
	
	public function setNewThreadTags($tags)
	{
		$this->newThreadTags = $tags;
	}
	
	public function setSendAlert($alert, $reason = null)
	{
		$this->alert = (bool)$alert;
		if ($reason !== null)
		{
			$this->alertReason = $reason;
		}
	}
	
	public function convertToThread(\XF\Entity\Forum $targetForum, $prefixId = 0)
	{
		$article = $this->article;
		$existingThread = $article->Discussion;
		
		if ($existingThread)
		{
			// convert article to existing thread
			
			$existingThread->node_id = $targetForum->node_id;
			$existingThread->prefix_id = $prefixId;
			$existingThread->title = $this->app->stringFormatter()->wholeWordTrim($article->title, 100);
			$existingThread->discussion_type = 'discussion';
			$existingThread->save();
			
			$firstPostMessage = $article->message;

			// if this is a multi-page article, we want to include all of the pages as well
			if ($article->page_count && $article->Pages)
			{
				foreach ($article->Pages as $page)
				{
					$firstPostMessage .= "\r\n \r\n [b]" . $page->title . "[/b] \r\n \r\n" . $page->message;
				}
			}
			
			$firstPost = $existingThread->FirstPost;
			$firstPost->message = $firstPostMessage;
			$firstPost->save();
			
			$this->afterExistingThreadUpdated($existingThread);
			
			$this->sendNotifications($existingThread);
			
			return $existingThread; 
		}
		else
		{
			// convert article to new thread

			$creator = $this->setupNewThreadCreation($targetForum, $prefixId);
			if ($creator && $creator->validate())
			{
				$thread = $creator->save();
				
				$this->threadCreator = $creator;
		
				$this->afterNewThreadCreated($thread);
				
				$this->sendNotifications($thread);
				
				return $thread;
			}
		}
		
		return false;
	}
	
	protected function afterExistingThreadUpdated(\XF\Entity\Thread $thread)
	{
		$article = $this->article;
	
		// reassign thread to article author
		$thread->user_id = $article->user_id;
		$thread->username = $article->username;
		$thread->save();
	
		// reassign first post to article author
		$firstPost = $thread->FirstPost;
		$firstPost->user_id = $article->user_id;
		$firstPost->username = $article->username;
	
		// if there are any article attachments, reassign them to first post of the existing thread
		if ($article->attach_count)
		{
			$attachCount = $this->db()->update(
				'xf_attachment',
				[
					'content_id' => $firstPost->post_id,
					'content_type' => 'post'
				],
				"content_id = $article->article_id AND content_type = 'ams_article'"
			);
				
			$firstPost->attach_count += $attachCount;
		}
		
		if ($article->page_count && $article->Pages)
		{
			foreach ($article->Pages as $page)
			{
				// if there are any article pages with attachments, reassign them to first post of the existing thread
				if ($page->attach_count)
				{
					$attachCount = $this->db()->update(
						'xf_attachment',
						[
							'content_id' => $firstPost->post_id,
							'content_type' => 'post'
						],
						"content_id = $page->page_id AND content_type = 'ams_page'"
					);
				
					$firstPost->attach_count += $attachCount;
				}
			}	
		}
		
		$firstPost->save();
		
		// Mark the existing post as read for both the moderator that is performing the action as well as the article author
		$this->repository('XF:Thread')->markThreadReadByVisitor($thread);
		$this->repository('XF:Thread')->markThreadReadByUser($thread, $article->User);
		
		// set the watch state of the thread for the article author 
		$this->repository('XF:ThreadWatch')->autoWatchThread($thread, $article->User, true);

		$thread->rebuildFirstPostInfo();
		$thread->rebuildLastPostInfo();
		$thread->save();
		
		$thread->Forum->rebuildLastPost();
		$thread->Forum->save();
	}
	
	protected function setupNewThreadCreation(\XF\Entity\Forum $forum, $prefixId = 0)
	{
		$article = $this->article;
		$category = $article->Category;
		
		/** @var \XF\Service\Thread\Creator $creator */
		$creator = $this->service('XF:Thread\Creator', $forum);
		$creator->setIsAutomated();
		
		$threadTitle = $this->app->stringFormatter()->wholeWordTrim($article->title, 100);
	
		$firstPostMessage = $article->message;

		// if this is a multi-page article, we want to include all of the pages as well
		if ($article->page_count && $article->Pages)
		{
			foreach ($article->Pages as $page)
			{
				$firstPostMessage .= "\r\n \r\n [b]" . $page->title . "[/b] \r\n \r\n" . $page->message;
			}
		}
		
		$creator->setContent($threadTitle, $firstPostMessage, false);
		$creator->setPrefix($prefixId);
		$creator->setTags($this->newThreadTags);
		$creator->setDiscussionTypeAndDataRaw('discussion');  
	
		$thread = $creator->getThread();
		
		$thread->discussion_state = 'visible';
	
		return $creator;
	}
	
	protected function afterNewThreadCreated(\XF\Entity\Thread $thread)
	{
		$article = $this->article;

		// reassign thread to article author
		$thread->user_id = $article->user_id;
		$thread->username = $article->username;
		$thread->last_post_user_id = $article->user_id;
		$thread->last_post_username = $article->username;
		$thread->save();
	
		// reassign first post to article author
		$firstPost = $thread->FirstPost;
		$firstPost->user_id = $article->user_id;
		$firstPost->username = $article->username;
	
		// if there are any article attachments, reassign them to first post of new thread
		if ($article->attach_count)
		{
			$attachCount = $this->db()->update(
				'xf_attachment',
				[
					'content_id' => $firstPost->post_id,
					'content_type' => 'post'
				],
				"content_id = $article->article_id AND content_type = 'ams_article'"
			);
				
			$firstPost->attach_count += $attachCount;
		}
		
		if ($article->page_count && $article->Pages)
		{
			foreach ($article->Pages as $page)
			{
				// if there are any article pages with attachments, reassign them to first post of the existing thread
				if ($page->attach_count)
				{
					$attachCount = $this->db()->update(
						'xf_attachment',
						[
							'content_id' => $firstPost->post_id,
							'content_type' => 'post'
						],
						"content_id = $page->page_id AND content_type = 'ams_page'"
					);
		
					$firstPost->attach_count += $attachCount;
				}
			}
		}		
		
		$firstPost->save();

		// Mark the existing post as read for both the moderator that is performing the action as well as the article author
		$this->repository('XF:Thread')->markThreadReadByVisitor($thread);
		$this->repository('XF:Thread')->markThreadReadByUser($thread, $article->User);
		
		// set the watch state of the thread for the article author
		$this->repository('XF:ThreadWatch')->autoWatchThread($thread, $article->User, true);

		$thread->rebuildFirstPostInfo();
		$thread->rebuildLastPostInfo();
		$thread->save();
		
		$thread->Forum->rebuildLastPost();
		$thread->Forum->save();
	}	
	
	public function sendNotifications(\XF\Entity\Thread $thread)
	{
		if ($this->threadCreator)
		{
			$this->threadCreator->sendNotifications();
		}
		
		if ($this->alert && $thread->user_id != \XF::visitor()->user_id)
		{
			/** @var \XF\Repository\Thread $threadRepo */
			$threadRepo = $this->repository('XF:Thread');
			$threadRepo->sendModeratorActionAlert($thread, 'converted_ams_article', $this->alertReason);
		}
	}
	
}	