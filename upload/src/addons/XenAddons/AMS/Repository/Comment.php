<?php

namespace XenAddons\AMS\Repository;

use XF\Mvc\Entity\Repository;
use XF\Util\Arr;

class Comment extends Repository
{
	public function findCommentsForContent(\XF\Mvc\Entity\Entity $content, array $limits = [])
	{
		/** @var \XenAddons\AMS\Finder\Comment $finder */
		$finder = $this->finder('XenAddons\AMS:Comment');
		$finder
			->forContent($content, $limits)
			->orderByDate()
			->with('full');

		return $finder;
	}

	public function findLatestCommentsForContent(\XF\Mvc\Entity\Entity $content, $newerThan, array $limits = [])
	{
		/** @var \XenAddons\AMS\Finder\Comment $finder */
		$finder = $this->finder('XenAddons\AMS:Comment');
		$finder
			->forContent($content, $limits)
			->orderByDate('DESC')
			->newerThan($newerThan)
			->with('full');

		return $finder;
	}

	public function findNextCommentsInContent(\XF\Mvc\Entity\Entity $content, $newerThan, array $limits = [])
	{
		/** @var \XenAddons\AMS\Finder\Comment $finder */
		$finder = $this->finder('XenAddons\AMS:Comment');
		$finder
			->forContent($content, $limits)
			->orderByDate()
			->newerThan($newerThan);

		return $finder;
	}

	public function findLatestCommentsForWidget(array $viewableCategoryIds = null)
	{
		$finder = $this->finder('XenAddons\AMS:Comment');

		if (is_array($viewableCategoryIds))
		{
			$finder->where('Article.category_id', $viewableCategoryIds);
		}
		else
		{
			$finder->with('Article.Category.Permissions|' . \XF::visitor()->permission_combination_id);
		}
		
		$finder
			->where('comment_state', 'visible')
			->orderByDate('DESC')
			->with([
				'Article.Category',
			]);

		return $finder;
	}

	public function findCommentsForUser(\XF\Entity\User $user)
	{
		/** @var \XenAddons\AMS\Finder\Comment $finder */
		$finder = $this->finder('XenAddons\AMS:Comment');
		$finder->where('user_id', $user->user_id);
	
		$finder->where([
			'user_id' => $user->user_id,
			'comment_state' => 'visible'
		]);
	
		return $finder;
	}
	
	public function getCommentAttachmentConstraints()
	{
		$options = $this->options();
	
		return [
			'extensions' => Arr::stringToArray($options->xaAmsCommentAllowedFileExtensions),
			'size' => $options->xaAmsCommentAttachmentMaxFileSize * 1024,
			'width' => $options->attachmentMaxDimensions['width'],
			'height' => $options->attachmentMaxDimensions['height']
		];
	}
	
	public function getUserCommentCount($userId)
	{
		return $this->db()->fetchOne("
			SELECT COUNT(*)
			FROM xf_xa_ams_comment
			WHERE user_id = ?
				AND comment_state = 'visible'
		", $userId);
	}
	
	public function sendModeratorActionAlert(\XenAddons\AMS\Entity\Comment $comment, $action, $reason = '', array $extra = [], \XF\Entity\User $forceUser = null)
	{
		if (!$forceUser)
		{
			if (!$comment->user_id || !$comment->User)
			{
				return false;
			}
		
			$forceUser = $comment->User;
		}

		$extra = array_merge([
			'title' => $comment->Content->title,
			'prefix_id' => $comment->Content->prefix_id,
			'link' => $this->app()->router('public')->buildLink('nopath:ams/comments', $comment),
			'articleLink' => $this->app()->router('public')->buildLink('nopath:ams', $comment->Content),
			'reason' => $reason,
			'content_type' => 'ams_comment'
		], $extra);

		/** @var \XF\Repository\UserAlert $alertRepo */
		$alertRepo = $this->repository('XF:UserAlert');
		$alertRepo->alert(
			$forceUser,
			0, '',
			'user', $forceUser->user_id,
			"ams_comment_{$action}", $extra,
			['dependsOnAddOnId' => 'XenAddons/AMS']
		);

		return true;
	}
	
	
	
	
	// NOTE: this is an experiment (BETA) to include image attachments from comments in the article gallery
	// UPDATE: so far this is working as expected, so probably remove the BETA status in the XF 2.3 version!
	
	public function getCommentsImagesForArticleGallery(\XenAddons\AMS\Entity\ArticleItem $article, $fetchType = 'authors')
	{
		$db = $this->db();
	
		$ids = null;
	
		if ($fetchType == 'authors')
		{
			// only fetch from comments that the article author or co-authors posted
	
			$authorIds = [];
			$authorIds[] = $article->user_id;
	
			if ($article->Contributors)
			{
				foreach ($article->Contributors AS $contributorID => $contributor)
				{
					if ($contributor->is_co_author)
					{
						$authorIds[] = $contributorID;
					}
				}
			}
			
			$ids = $db->fetchAllColumn("
					SELECT comment_id
					FROM xf_xa_ams_comment
					WHERE article_id = ?
					AND user_id IN (" . $db->quote($authorIds) . ")
					AND comment_state = 'visible'
					AND attach_count > 0
					ORDER BY comment_id
				", $article->article_id
			);
		}
		else if ($fetchType == 'contributors')
		{
			// only fetch from comments that any contributors (author, co-authors, contributors) posted
	
			$contributorIds = $article->contributor_user_ids;
			array_push($contributorIds, $article->user_id); // this adds the article author user_id
			
			$ids = $db->fetchAllColumn("
					SELECT comment_id
					FROM xf_xa_ams_comment
					WHERE article_id = ?
					AND user_id IN (" . $db->quote($contributorIds) . ")
					AND comment_state = 'visible'
					AND attach_count > 0
					ORDER BY comment_id
				", $article->article_id
			);
		}
		else if ($fetchType == 'all')
		{
			// fetch image attachments from all comments
			
			$ids = $db->fetchAllColumn("
					SELECT comment_id
					FROM xf_xa_ams_comment
					WHERE article_id = ?
					AND comment_state = 'visible'
					AND attach_count > 0
					ORDER BY comment_id
				", $article->article_id
			);
		}
	
		if ($ids)
		{
			$attachments = $this->finder('XF:Attachment')
				->where([
					'content_type' => 'ams_comment',
					'content_id' => $ids
				])
				->order('attach_date')
				->fetch();
		}
		else
		{
			$attachments = $this->em->getEmptyCollection();
		}
	
		return $attachments;
	}	
}