<?php

namespace XenAddons\AMS\Repository;

use XF\Mvc\Entity\Finder;
use XF\Mvc\Entity\Repository;
use XF\PrintableException;
use XF\Util\Arr;

class ArticleRating extends Repository
{
	public function findRatingsInArticle(\XenAddons\AMS\Entity\ArticleItem $article, array $limits = [])
	{
		/** @var \XenAddons\AMS\Finder\ArticleRating $finder */
		$finder = $this->finder('XenAddons\AMS:ArticleRating');
		$finder->inArticle($article, $limits)
			->where('is_review', 0)
			->setDefaultOrder('rating_date', 'desc');
	
		return $finder;
	}
	
	public function findReviewsInArticle(\XenAddons\AMS\Entity\ArticleItem $article, array $limits = [])
	{
		/** @var \XenAddons\AMS\Finder\ArticleRating $finder */
		$finder = $this->finder('XenAddons\AMS:ArticleRating');
		$finder->inArticle($article, $limits)
			->where('is_review', 1)
			->setDefaultOrder('rating_date', 'desc');

		return $finder;
	}

	public function findLatestReviews(array $viewableCategoryIds = null, $cutOffDays = null)
	{
		/** @var \XenAddons\AMS\Finder\ArticleRating $finder */
		$finder = $this->finder('XenAddons\AMS:ArticleRating');

		$finder->where([
				'Article.article_state' => 'visible',
				'rating_state' => 'visible',
				'is_review' => 1
			])
			->with('Article', true)
			->with(['Article.Category', 'User'])
			->with('full')
			->setDefaultOrder('rating_date', 'desc');

		if (is_array($viewableCategoryIds))
		{
			$finder->where('Article.category_id', $viewableCategoryIds);
		}
		else
		{
			$finder->with('Article.Category.Permissions|' . \XF::visitor()->permission_combination_id);
		}		
		
		if ($cutOffDays)
		{
			$cutOffDate = \XF::$time - ($cutOffDays * 86400);
			$finder->where('rating_date', '>', $cutOffDate);
		}
		else 
		{
			if($this->options()->xaAmsLatestReviewsCutOffDays)
			{
				$cutOffDate = \XF::$time - ($this->options()->xaAmsLatestReviewsCutOffDays * 86400);
				$finder->where('rating_date', '>', $cutOffDate);
			}				
		}

		return $finder;
	}
	
	public function findLatestReviewsForWidget(array $viewableCategoryIds = null, $cutOffDays = null)
	{
		/** @var \XenAddons\AMS\Finder\ArticleRating $finder */
		$finder = $this->finder('XenAddons\AMS:ArticleRating');
	
		$finder->where([
				'Article.article_state' => 'visible',
				'rating_state' => 'visible',
				'is_review' => 1
			])
			->with('Article', true)
			->with(['Article.Category', 'User'])
			->with('full')
			->setDefaultOrder('rating_date', 'desc');
	
		if (is_array($viewableCategoryIds))
		{
			$finder->where('Article.category_id', $viewableCategoryIds);
		}
		else
		{
			$finder->with('Article.Category.Permissions|' . \XF::visitor()->permission_combination_id);
		}
	
		if ($cutOffDays)
		{
			$cutOffDate = \XF::$time - ($cutOffDays * 86400);
			$finder->where('rating_date', '>', $cutOffDate);
		}
	
		return $finder;
	}	

	/**
	 * Returns the ratings for a given article by a given user. This should normally return one.
	 * In general, only a bug would have it return more than one but the code is written so that this can be resolved.
	 *
	 * @param $articleId
	 * @param $userId
	 *
	 * @return \XF\Mvc\Entity\ArrayCollection
	 */
	public function getRatingsForArticleByUser($articleId, $userId)
	{
		/** @var \XenAddons\AMS\Finder\ArticleRating $finder */
		$finder = $this->finder('XenAddons\AMS:ArticleRating');
		$finder->where([
			'article_id' => $articleId,
			'user_id' => $userId,
			'is_review' => 0
		])->order('rating_date', 'desc');
	
		return $finder->fetch();
	}

	public function findReviewsForUser(\XF\Entity\User $user)
	{
		/** @var \XenAddons\AMS\Finder\ArticleRating $finder */
		$finder = $this->finder('XenAddons\AMS:ArticleRating');
		$finder->where([
			'user_id' => $user->user_id,
			'rating_state' => 'visible',
			'is_review' => 1
		]);
	
		return $finder;
	}
	
	public function findReviewsForAuthorReviewList(\XF\Entity\User $user, array $viewableCategoryIds = null)
	{
		/** @var \XenAddons\AMS\Finder\ArticleRating $finder */
		$reviewFinder = $this->finder('XenAddons\AMS:ArticleRating');
	
		// we don't want to fetch any anonymous reviews in this function!
	
		$reviewFinder->where([
				'user_id' => $user->user_id,
				'Article.article_state' => 'visible',
				'rating_state' => 'visible',
				'is_review' => 1,
				'is_anonymous' => 0,
			])
			->with('Article', true)
			->with(['Article.Category', 'User'])
			->setDefaultOrder('rating_date', 'desc');
	
		if (is_array($viewableCategoryIds))
		{
			$reviewFinder->where('Article.category_id', $viewableCategoryIds);
		}
		else
		{
			$reviewFinder->with('Article.Category.Permissions|' . \XF::visitor()->permission_combination_id);
		}
	
		if ($user)
		{
			$reviewFinder->with('Reactions|' . $user->user_id);
			$reviewFinder->with('Article.ReplyBans|' . $user->user_id);
		}
	
		return $reviewFinder;
	}
	
	public function getReviewAttachmentConstraints()
	{
		$options = $this->options();
	
		return [
			'extensions' => Arr::stringToArray($options->xaAmsReviewAllowedFileExtensions),
			'size' => $options->xaAmsReviewAttachmentMaxFileSize * 1024,
			'width' => $options->attachmentMaxDimensions['width'],
			'height' => $options->attachmentMaxDimensions['height']
		];
	}
	
	public function getReviewsImagesForArticle(\XenAddons\AMS\Entity\ArticleItem $article, $forArticleGallery = false)
	{
		$db = $this->db();
	
		$ids = $db->fetchAllColumn("
			SELECT rating_id
			FROM xf_xa_ams_article_rating
			WHERE article_id = ?
			AND is_review = 1
			AND rating_state = 'visible'
			AND attach_count > 0
			ORDER BY rating_id
			", $article->article_id
		);
	
		// when fetching for the Reviews Images Gallery, we only want to fetch if there are at least 2 reviews with images.
		// when fetching for inclusion in the Article Gallery, we want to fetch even if there is only 1 review with images (which is what the $forArticleGallery is used for).
	
		if (($ids && count($ids) > 1) || ($ids && $forArticleGallery))
		{
			$attachments = $this->finder('XF:Attachment')
				->where([
					'content_type' => 'ams_rating',
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
	
	public function sendModeratorActionAlert(\XenAddons\AMS\Entity\ArticleRating $rating, $action, $reason = '', array $extra = [], \XF\Entity\User $forceUser = null)
	{
		$article = $rating->Article;

		if (!$article || !$article->user_id || !$article->User)
		{
			return false;
		}
		
		if (!$forceUser)
		{
			if (!$rating->user_id || !$rating->User)
			{
				return false;
			}
		
			$forceUser = $rating->User;
		}

		$extra = array_merge([
			'title' => $article->title,
			'prefix_id' => $article->prefix_id,
			'link' => $this->app()->router('public')->buildLink('nopath:ams/review', $rating),
			'articleLink' => $this->app()->router('public')->buildLink('nopath:ams', $article),
			'reason' => $reason
		], $extra);

		/** @var \XF\Repository\UserAlert $alertRepo */
		$alertRepo = $this->repository('XF:UserAlert');
		$alertRepo->alert(
			$forceUser,
			0, '',
			'user', $forceUser->user_id,
			"ams_rating_{$action}", $extra,
			['dependsOnAddOnId' => 'XenAddons/AMS']
		);

		return true;
	}

	public function sendReviewAlertToArticleAuthor(\XenAddons\AMS\Entity\ArticleRating $rating)
	{
		if (!$rating->isVisible() || !$rating->is_review)
		{
			return false;
		}

		$article = $rating->Article;
		$articleAuthor = $article->User;

		if (!$articleAuthor || $articleAuthor->user_id == $rating->user_id) // don't alert yourself lol
		{
			return false;
		}

		if ($rating->is_anonymous)
		{
			$senderId = 0;
			$senderName = \XF::phrase('anonymous')->render('raw');
		}
		else
		{
			$senderId = $rating->user_id;
			$senderName = $rating->User ? $rating->User->username : \XF::phrase('unknown')->render('raw');
		}

		$alertRepo = $this->repository('XF:UserAlert');
		return $alertRepo->alert(
			$articleAuthor, $senderId, $senderName, 'ams_rating', $rating->rating_id, 'insert'
		);
	}

	public function sendAuthorReplyAlert(\XenAddons\AMS\Entity\ArticleRating $rating)
	{
		if (!$rating->isVisible() || !$rating->is_review || !$rating->User)
		{
			return false;
		}

		$article = $rating->Article;

		$alertRepo = $this->repository('XF:UserAlert');
		return $alertRepo->alert(
			$rating->User, $article->user_id, $article->username, 'ams_rating', $rating->rating_id, 'reply'
		);
	}
}