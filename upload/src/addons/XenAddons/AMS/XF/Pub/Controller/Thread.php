<?php

namespace XenAddons\AMS\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

class Thread extends XFCP_Thread
{
	public function actionIndex(ParameterBag $params)
	{
		$reply = parent::actionIndex($params);

		if ($reply instanceof \XF\Mvc\Reply\View && $reply->getParam('posts'))
		{
			$amsArticleRepo = $this->repository('XenAddons\AMS:Article');
			$amsArticleRepo->addArticleEmbedsToContent($reply->getParam('posts'));
		}

		return $reply;
	}
	
	// This was initially implemented in AMS 2.2.15 and is currently considered Beta/Unsupported. 
	// Contact Bob at Xenaddons.com or XenForo.com for questions concerning this beta feature. 
	
	public function actionConvertThreadToAmsArticle(ParameterBag $params)
	{
		$thread = $this->assertViewableThread($params->thread_id);
		if (!$thread->canConvertThreadToAmsArticle($error))
		{
			return $this->noPermission($error);
		}
		
		if ($this->isPost())
		{
			$categoryId = $this->filter('target_category_id', 'int');
			
			$category = $this->app()->em()->find('XenAddons\AMS:Category', $categoryId);
			if (!$category)
			{
				throw new \InvalidArgumentException("Invalid target category ($categoryId)");
			}
			
			/** @var \XenAddons\AMS\XF\Service\Thread\ConvertToArticle $converter */
			$converter = $this->service('XenAddons\AMS\XF:Thread\ConvertToArticle', $thread);
			$converter->setNewArticleTags($this->filter('tags', 'str'));
			
			if ($this->filter('new_article_prefix_id', 'int'))
			{
				$converter->setNewArticlePrefix($this->filter('new_article_prefix_id', 'int'));
			}
			
			if ($this->filter('new_article_state', 'str'))
			{
				$converter->setNewArticleState($this->filter('new_article_state', 'str'));
			}

			if ($this->filter('author_alert', 'bool'))
			{
				$converter->setSendAlert(true, $this->filter('author_alert_reason', 'str'));
			}
			
			$article = $converter->convertToArticle($category);
				
			if ($article)
			{
				return $this->redirect($this->buildLink('ams', $article));
			}

			return $this->redirect($this->buildLink('threads', $thread)); 
		}
		else
		{
			$categoryRepo = $this->app->repository('XenAddons\AMS:Category');
			$categoryTree = $categoryRepo->createCategoryTree($categoryRepo->findCategoryList()->fetch());
			
			/** @var \XenAddons\AMS\Repository\ArticlePrefix $prefixRepo */
			$prefixRepo = $this->repository('XenAddons\AMS:ArticlePrefix');
			$availablePrefixes = $prefixRepo->findPrefixesForList()->fetch();
			$availablePrefixes = $availablePrefixes->pluckNamed('title', 'prefix_id');
			$prefixListData = $prefixRepo->getPrefixListData();
			
			/** @var \XF\Service\Tag\Changer $tagger */
			$tagger = $this->service('XF:Tag\Changer', 'thread', $thread);
			$grouped = $tagger->getExistingTagsByEditability();
			
			$viewParams = [
				'thread' => $thread,
				'forum' => $thread->Forum,
	
				'categoryTree' => $categoryTree,
				
				'articlePrefixes' => $availablePrefixes,
				
				'editableTags' => $grouped['editable'],
				'uneditableTags' => $grouped['uneditable']
			];
			
			return $this->view('XF:Thread\ConvertThreadToAmsArticle', 'xa_ams_convert_thread_to_article', $viewParams);
		}	
	}
}