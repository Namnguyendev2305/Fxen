<?php

namespace XenAddons\AMS\ModeratorLog;

use XF\Entity\ModeratorLog;
use XF\ModeratorLog\AbstractHandler;
use XF\Mvc\Entity\Entity;

class ArticleItem extends AbstractHandler
{
	public function isLoggable(Entity $content, $action, \XF\Entity\User $actor)
	{
		switch ($action)
		{
			case 'title':
			case 'prefix_id':
			case 'custom_fields':
				/** @var \XenAddons\AMS\Entity\ArticleItem $content */
				if ($content->isContributor($actor->user_id))
				{
					return false;
				}
		}

		return parent::isLoggable($content, $action, $actor);
	}

	protected function getLogActionForChange(Entity $content, $field, $newValue, $oldValue)
	{
		switch ($field)
		{
			case 'sticky':
				return $newValue ? 'stick' : 'unstick';
				
			case 'comments_open':
				return $newValue ? 'comments_unlock' : 'comments_lock';
				
			case 'ratings_open':
				return $newValue ? 'ratings_unlock' : 'ratings_lock';
				
			case 'message':
				return 'edit';
				
			case 'custom_fields':
				return 'custom_fields_edit';

			case 'article_state':
				if ($newValue == 'visible' && $oldValue == 'moderated')
				{
					return 'approve';
				}
				else if ($newValue == 'visible' && $oldValue == 'deleted')
				{
					return 'undelete';
				}
				else if ($newValue == 'deleted')
				{
					$reason = $content->DeletionLog ? $content->DeletionLog->delete_reason : '';
					return ['delete_soft', ['reason' => $reason]];
				}
				else if ($newValue == 'moderated')
				{
					return 'unapprove';
				}
				break;

			case 'title':
				return ['title', ['old' => $oldValue]];

			case 'prefix_id':
				if ($oldValue)
				{
					$old = \XF::phrase('ams_article_prefix.' . $oldValue)->render();
				}
				else
				{
					$old = '-';
				}
				return ['prefix', ['old' => $old]];

			case 'category_id':
				$category = \XF::em()->find('XenAddons\AMS:Category', $oldValue);
				$oldTitle = $category ? $category->title : '';
				return ['move', ['from' => $oldTitle]];

			case 'user_id':
				$oldUser = \XF::em()->find('XF:User', $oldValue);
				$from = $oldUser ? $oldUser->username : '';
				return ['reassign', ['from' => $from]];
		}

		return false;
	}

	protected function setupLogEntityContent(ModeratorLog $log, Entity $content)
	{
		/** @var \XF\Entity\Thread $content */
		$log->content_user_id = $content->user_id;
		$log->content_username = $content->username;
		$log->content_title = $content->title;
		$log->content_url = \XF::app()->router('public')->buildLink('nopath:ams', $content);
		$log->discussion_content_type = 'ams_article';
		$log->discussion_content_id = $content->article_id;
	}

	protected function getActionPhraseParams(ModeratorLog $log)
	{
		if ($log->action == 'edit')
		{
			return ['elements' => implode(', ', array_keys($log->action_params))];
		}
		else
		{
			return parent::getActionPhraseParams($log);
		}
	}
}