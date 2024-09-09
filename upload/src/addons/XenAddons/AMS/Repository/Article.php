<?php

namespace XenAddons\AMS\Repository;

use XF\Mvc\Entity\ArrayCollection;
use XF\Mvc\Entity\Finder;
use XF\Mvc\Entity\Repository;
use XF\PrintableException;
use XF\Util\Arr;

class Article extends Repository
{
	public function findArticlesForArticleList(array $viewableCategoryIds = null, array $limits = [], \XenAddons\AMS\Entity\Category $category = null)
	{
		$limits = array_replace([
			'visibility' => true,
			'allowOwnPending' => false
		], $limits);

		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');

		if (is_array($viewableCategoryIds))
		{
			$articleFinder->where('category_id', $viewableCategoryIds);
		}
		else
		{
			$articleFinder->with('Category.Permissions|' . \XF::visitor()->permission_combination_id);
		}

		$articleFinder
			->with(['full', 'fullCategory'])
			->useDefaultOrder($category);

		if ($limits['visibility'])
		{
			$articleFinder->applyGlobalVisibilityChecks($limits['allowOwnPending']);
		}

		return $articleFinder;
	}
	
	public function findArticlesForAuthorArticleList(\XF\Entity\User $user, array $viewableCategoryIds = null, array $limits = [])
	{
		$limits = array_replace([
			'visibility' => true,
			'allowOwnPending' => true // false if you don't want authors to see their moderated articles
		], $limits);
	
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
	
		if (is_array($viewableCategoryIds))
		{
			$articleFinder->where('category_id', $viewableCategoryIds);
		}
		else
		{
			$articleFinder->with('Category.Permissions|' . \XF::visitor()->permission_combination_id);
		}
	
		$articleFinder
			->byUser($user)
			->with(['full', 'fullCategory'])
			->useDefaultOrder();
	
		if ($limits['visibility'])
		{
			$articleFinder->applyGlobalVisibilityChecks($limits['allowOwnPending']);
		}
	
		return $articleFinder;
	}	
	
	// TODO expand this in the future for more robust MAPS functionality
	public function findArticlesForCategoryMap(array $viewableCategoryIds = null, \XenAddons\AMS\Entity\Category $category = null)
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
	
		if (is_array($viewableCategoryIds))
		{
			$articleFinder->where('category_id', $viewableCategoryIds);
		}
		else
		{
			$articleFinder->with('Category.Permissions|' . \XF::visitor()->permission_combination_id);
		}
	
		if ($category && isset($category['map_options']['marker_fetch_order']))
		{
			$defaultOrder = $category['map_options']['marker_fetch_order'] ?: 'rating_weighted';
		}
		else
		{
			$defaultOrder = 'rating_weighted';
		}
	
		$direction = 'desc';
		if ($defaultOrder == 'title')
		{
			$direction = 'asc';
		}
	
		$articleFinder
			->with('fullCategory')
			->where('location', '<>', '')
			->setDefaultOrder($defaultOrder, $direction);
	
		return $articleFinder;
	}

	public function findArticlesForRssFeed(\XenAddons\AMS\Entity\Category $category = null)
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
	
		$articleFinder->where('article_state', 'visible')
			->setDefaultOrder('last_update', 'DESC')
			->with(['Category', 'User']);
	
		if ($category)
		{
			$articleFinder->where('category_id', $category->category_id);
		}
		else
		{
			$articleFinder->where('last_update', '>', $this->getReadMarkingCutOff());
		}
	
		return $articleFinder;
	}

	public function findFeaturedArticles(array $viewableCategoryIds = null)
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');

		if (is_array($viewableCategoryIds))
		{
			$articleFinder->where('category_id', $viewableCategoryIds);
		}
		else
		{
			$articleFinder->with('Category.Permissions|' . \XF::visitor()->permission_combination_id);
		}

		$articleFinder
			->with('Featured', true)
			->where('article_state', 'visible')
			->with('full')
			->setDefaultOrder($articleFinder->expression('RAND()'));

		return $articleFinder;
	}
	
	public function findFeaturedArticlesForUser(\XF\Entity\User $user)
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
	
		$articleFinder
			->with('Featured', true)
			->with('Category.Permissions|' . \XF::visitor()->permission_combination_id)
			->where('article_state', 'visible')
			->with(['full', 'fullCategory'])
			->where('user_id', $user->user_id);
	
		return $articleFinder;
	}
	
	public function findDraftsForUser(\XF\Entity\User $user)
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
	
		$articleFinder
			->with(['full', 'fullCategory'])
			->with('Category.Permissions|' . \XF::visitor()->permission_combination_id)
			->where('article_state', 'draft')
			->where('user_id', $user->user_id);
	
		return $articleFinder;
	}

	public function findArticlesAwaitingPublishingForUser(\XF\Entity\User $user)
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
	
		$articleFinder
			->with(['full', 'fullCategory'])
			->with('Category.Permissions|' . \XF::visitor()->permission_combination_id)
			->where('article_state', 'awaiting')
			->where('user_id', $user->user_id)
			->setDefaultOrder('publish_date', 'ASC');
	
		return $articleFinder;
	}	
	
	// fetches "Drafts" and "Awaiting Publishing" articles for the Article Queue.
	public function findArticlesForArticleQueue(array $viewableCategoryIds = null, $withFull = true)
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
	
		if (is_array($viewableCategoryIds))
		{
			$articleFinder->where('category_id', $viewableCategoryIds);
		}
		else
		{
			$articleFinder->with('Category.Permissions|' . \XF::visitor()->permission_combination_id);
		}

		if ($withFull)
		{
			$articleFinder->with(['full', 'fullCategory']);
		}
		
		$articleFinder
			->where('article_state', ['draft','awaiting'])
			->setDefaultOrder('last_update', 'DESC');
		
		return $articleFinder;
	}
	
	public function findUpcomingArticles(array $viewableCategoryIds = null)
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
	
		if (is_array($viewableCategoryIds))
		{
			$articleFinder->where('category_id', $viewableCategoryIds);
		}
		else
		{
			$articleFinder->with('Category.Permissions|' . \XF::visitor()->permission_combination_id);
		}
	
		$articleFinder
			->where('publish_date', '<=', \XF::$time + ($this->options()->xaAmsUpcomingArticlesCutOffDays * 86400))
			->where('article_state', 'awaiting')
			->with('fullCategory')
			->setDefaultOrder('publish_date', 'ASC');
	
		return $articleFinder;
	}	
	
	public function findArticlesForUserByPrefix(\XF\Entity\User $user, $prefixId)
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
	
		$articleFinder
			->where('article_state', 'visible')
			->where('prefix_id', $prefixId)
			->where('user_id', $user->user_id);
	
		return $articleFinder;
	}
	
	public function findArticlesForWatchedList($userId = null)
	{
		if ($userId === null)
		{
			$userId = \XF::visitor()->user_id;
		}
		$userId = intval($userId);

		/** @var \XenAddons\AMS\Finder\ArticleItem $finder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');

		$articleFinder
			->with(['full', 'fullCategory'])
			->with('Watch|' . $userId, true)
			->with('Category.Permissions|' . \XF::visitor()->permission_combination_id)
			->where('article_state', 'visible')
			->setDefaultOrder('last_update', 'desc');

		return $articleFinder;
	}
	
	// currently only used by the add article to series function!
	public function findArticlesForSelectList($userId = null)
	{
		if ($userId === null)
		{
			$userId = \XF::visitor()->user_id;
		}
		$userId = intval($userId);
		
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
	
		$articleFinder
			->with(['Category', 'Category.Permissions|' . \XF::visitor()->permission_combination_id])
			->where('article_state', 'visible')
			->where('user_id', $userId)
			->setDefaultOrder('last_update', 'desc');
	
		return $articleFinder;
	}

	public function findOtherArticlesByCategory(\XenAddons\AMS\Entity\ArticleItem $thisArticle)
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');

		$articleFinder
			->with(['full', 'fullCategory'])
			->with(['User', 'Category', 'Category.Permissions|' . \XF::visitor()->permission_combination_id])
			->where('article_state', 'visible')
			->where('category_id', $thisArticle->category_id)
			->where('article_id', '<>', $thisArticle->article_id)
			->indexHint('USE', 'category_last_update')
			->setDefaultOrder('last_update', 'desc');

		return $articleFinder;
	}
	
	public function findOtherArticlesByAuthor(\XF\Entity\User $user, $articleId, $excludeArticleIds = [])
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
	
		$articleFinder->byUser($user)
			->with(['full', 'fullCategory'])
			->with(['User', 'Category', 'Category.Permissions|' . \XF::visitor()->permission_combination_id])
			->where('article_state', 'visible')
			->where('article_id', '<>', $articleId)
			->indexHint('USE', 'user_id_last_update')
			->setDefaultOrder('last_update', 'desc');
	
		if ($excludeArticleIds)
		{
			$articleFinder->where('article_id', '<>', $excludeArticleIds);
		}
		
		return $articleFinder;
	}

	public function findArticlesForUser(\XF\Entity\User $user, array $viewableCategoryIds = null, array $limits = [])
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');

		$articleFinder->byUser($user)
			->with(['full', 'fullCategory'])
			->setDefaultOrder('last_update', 'desc');

		if (is_array($viewableCategoryIds))
		{
			// if we have viewable category IDs, we likely have those permissions
			$articleFinder->where('category_id', $viewableCategoryIds);
		}
		else
		{
			$articleFinder->with('Category.Permissions|' . \XF::visitor()->permission_combination_id);
		}

		$limits = array_replace([
			'visibility' => true,
			'allowOwnPending' => $user->user_id == \XF::visitor()->user_id
		], $limits);

		if ($limits['visibility'])
		{
			$articleFinder->applyGlobalVisibilityChecks($limits['allowOwnPending']);
		}

		return $articleFinder;
	}
	
	// TODO Not currently being used, but will be used in a future version of AMS
	public function findArticlesByContributor(\XF\Entity\User $user, array $viewableCategoryIds = null,	array $limits = [])
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
		
		$userId = $user->user_id;
	
		$articleFinder->with("Contributors|{$user->user_id}", true)
			->with(['full', 'fullCategory'])
			->setDefaultOrder('last_update', 'desc');
	
		if (is_array($viewableCategoryIds))
		{
			// if we have viewable category IDs, we likely have those permissions
			$articleFinder->where('category_id', $viewableCategoryIds);
		}
		else
		{
			$articleFinder->with('Category.Permissions|' . \XF::visitor()->permission_combination_id);
		}
	
		$limits = array_replace(['visibility' => true], $limits);
		if ($limits['visibility'])
		{
			$articleFinder->applyGlobalVisibilityChecks();
		}
	
		return $articleFinder;
	}

	public function findArticleForThread(\XF\Entity\Thread $thread)
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $finder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');

		$articleFinder->where('discussion_thread_id', $thread->thread_id)
			->with('full')
			->with('Category.Permissions|' . \XF::visitor()->permission_combination_id);

		return $articleFinder;
	}
	
	public function logArticleView(\XenAddons\AMS\Entity\ArticleItem $articleItem)
	{
		$this->db()->query("
			-- XFDB=noForceAllWrite		
			INSERT INTO xf_xa_ams_article_view
				(article_id, total)
			VALUES
				(? , 1)
			ON DUPLICATE KEY UPDATE
				total = total + 1
		", $articleItem->article_id);
	}
	
	public function batchUpdateArticleViews()
	{
		$db = $this->db();
		$db->query("
			UPDATE xf_xa_ams_article AS article
			INNER JOIN xf_xa_ams_article_view AS article_view ON (article.article_id = article_view.article_id)
			SET article.view_count = article.view_count + article_view.total
		");
		$db->emptyTable('xf_xa_ams_article_view');
	}
	
	public function markArticlesReadByVisitor($categoryIds = null, $newViewed = null)
	{
		$articleFinder = $this->findArticlesForArticleList($categoryIds)
			->unreadOnly();
	
		$articleItems = $articleFinder->fetch();
	
		foreach ($articleItems AS $articleItem)
		{
			$this->markArticleItemReadByVisitor($articleItem, $newViewed);
		}
	}
	
	public function markAllArticleCommentsReadByVisitor($categoryIds = null, $newRead = null)
	{
		$articleFinder = $this->findArticlesForArticleList($categoryIds) 
			->withUnreadCommentsOnly();
	
		$articleItems = $articleFinder->fetch();
	
		foreach ($articleItems AS $articleItem)
		{
			$this->markArticleCommentsReadByVisitor($articleItem, $newRead);
		}
	}
	
	public function markArticleItemReadByVisitor(\XenAddons\AMS\Entity\ArticleItem $articleItem, $newRead = null)
	{
		$visitor = \XF::visitor();
		return $this->markArticleItemReadByUser($articleItem, $visitor, $newRead);
	}
	
	public function markArticleItemReadByUser(\XenAddons\AMS\Entity\ArticleItem $articleItem, \XF\Entity\User $user, $newRead = null)
	{
		if (!$user->user_id)
		{
			return false;
		}
	
		if ($newRead === null)
		{
			$newRead = \XF::$time;
		}
	
		$cutOff = $this->getReadMarkingCutOff();
		if ($newRead <= $cutOff)
		{
			return false;
		}
		
		$read = $articleItem->Read[$user->user_id];
		if ($read && $newRead <= $read->article_read_date)
		{
			return false;
		}
	
		$session = $this->app()->session();
		$articlesUnread = $session->get('amsUnreadArticles');  
		if (isset($articlesUnread['unread'][$articleItem->article_id]))
		{
			unset($articlesUnread['unread'][$articleItem->article_id]);
			$session->set('amsUnreadArticles', $articlesUnread);
		}
	
		$this->db()->insert('xf_xa_ams_article_read', [
			'article_id' => $articleItem->article_id,
			'user_id' => $user->user_id,
			'article_read_date' => $newRead
		], false, 'article_read_date = VALUES(article_read_date)');
	
		return true;
	}
	
	public function markArticleCommentsReadByVisitor(\XenAddons\AMS\Entity\ArticleItem $articleItem, $newRead = null)
	{
		$visitor = \XF::visitor();
		if (!$visitor->user_id)
		{
			return false;
		}
	
		if ($newRead === null)
		{
			$newRead = \XF::$time;
		}
	
		$cutOff = $this->getReadMarkingCutOff();
		if ($newRead <= $cutOff)
		{
			return false;
		}
	
		$viewed = $articleItem->CommentRead[$visitor->user_id];
		if ($viewed && $newRead <= $viewed->comment_read_date)
		{
			return false;
		}
	
		$this->db()->insert('xf_xa_ams_comment_read', [
			'article_id' => $articleItem->article_id,
			'user_id' => $visitor->user_id,
			'comment_read_date' => $newRead
		], false, 'comment_read_date = VALUES(comment_read_date)');
	
		return true;
	}
	
	public function getReadMarkingCutOff()
	{
		return \XF::$time - $this->options()->readMarkingDataLifetime * 86400;
	}
	
	public function pruneArticleReadLogs($cutOff = null)
	{
		if ($cutOff === null)
		{
			$cutOff = $this->getReadMarkingCutOff();
		}
	
		$this->db()->delete('xf_xa_ams_article_read', 'article_read_date < ?', $cutOff);
	}
	
	
	
	
	
	
	
	
	
	
	



	// Note:  This is BETA/NOT SUPPORTED... (Dec 5th, 2022)
	public function autoFeatureArticles()
	{
		// do not allow this to run unless the auto feature option is enabled!
	
		if ($this->options()->xaAmsAutoFeatureArticles)
		{
			/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
			$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
				
			$articleFinder
				->with(['full', 'fullCategory'])
				->where('article_state', 'visible')
				->where('last_feature_date', 0); // only content that has never been featured before will be fetched!
				
			if (is_array($this->options()->xaAmsAutoFeatureCategories))
			{
				$articleFinder->where('category_id', $this->options()->xaAmsAutoFeatureCategories);
			}
	
			$featuredUserGroups = $this->options()->xaAmsAutoFeatureUserGroups;
			
			if ($featuredUserGroups && $featuredUserGroups[0] == 0)
			{
				$featuredUserGroups = []; // if NONE is selected, always set to empty!
			}
	
			// Note: this is considered beta and not supported.
			// Added for R&D purposes as a favor to Alfa1
			// TODO test for 2-3 months and make any adjustements as neccessary
			if ($featuredUserGroups)
			{
				if (!is_array($featuredUserGroups))
				{
					$featuredUserGroups = [$featuredUserGroups];
				}
					
				$articleFinder->with('User');
					
				$userGroupIdColumn = $articleFinder->columnSqlName('User.user_group_id');
				$secondaryGroupIdsColumn = $articleFinder->columnSqlName('User.secondary_group_ids');
	
				$positiveMatch = true;
	
				$parts = [];
					
				// for negative matches, we default to allowing guests, but if they say "not the guest"
				// group, then we'll disable it
				$orIsGuest = $positiveMatch ? false : true;
					
				foreach ($featuredUserGroups AS $userGroupId)
				{
					$quotedGroupId = $articleFinder->quote($userGroupId);
					if ($positiveMatch)
					{
						$parts[] = "$userGroupIdColumn = $quotedGroupId "
							. "OR FIND_IN_SET($quotedGroupId, $secondaryGroupIdsColumn)";
							
						if ($userGroupId == \XF\Entity\User::GROUP_GUEST)
						{
							// if explicitly selecting the guest group, allow guest items
							// as they're hard to filter for otherwise
							$parts[] = $articleFinder->columnSqlName('user_id') . ' = 0';
						}
					}
					else
					{
						$parts[] = "$userGroupIdColumn <> $quotedGroupId "
							. "AND FIND_IN_SET($quotedGroupId, $secondaryGroupIdsColumn) = 0";
							
						if ($userGroupId == \XF\Entity\User::GROUP_GUEST)
						{
							$orIsGuest = false;
						}
					}
				}
				if ($parts)
				{
					$joiner = $positiveMatch ? ' OR ' : ' AND ';
					$sql = implode($joiner, $parts);
					if ($orIsGuest)
					{
						$sql = "($sql) OR " . $articleFinder->columnSqlName('user_id') . ' = 0';
					}
					$articleFinder->whereSql($sql);
				}
			}
				
			if ($this->options()->xaAmsAutoFeatureExclusive)
			{
				// exclusive (W OR x OR y OR Z)
	
				if ($this->options()->xaAmsAutoFeatureViews > -1)
				{
					if (
						$this->options()->xaAmsAutoFeatureViews > -1
						&& $this->options()->xaAmsAutoFeatureReactionScore > -1
						&& $this->options()->xaAmsAutoFeatureRating > -1
						&& $this->options()->xaAmsAutoFeatureComments > -1
					)
					{
						$articleFinder->whereOr(
							['view_count', '>=', $this->options()->xaAmsAutoFeatureViews],
							['reaction_score', '>=', $this->options()->xaAmsAutoFeatureReactionScore],
							['rating_avg', '>=', $this->options()->xaAmsAutoFeatureRating],
							['comment_count', '>=', $this->options()->xaAmsAutoFeatureComments]
						);
					}
					else if (
						$this->options()->xaAmsAutoFeatureViews > -1
						&& $this->options()->xaAmsAutoFeatureReactionScore > -1
						&& $this->options()->xaAmsAutoFeatureRating > -1
					)
					{
						$articleFinder->whereOr(
							['view_count', '>=', $this->options()->xaAmsAutoFeatureViews],
							['reaction_score', '>=', $this->options()->xaAmsAutoFeatureReactionScore],
							['rating_avg', '>=', $this->options()->xaAmsAutoFeatureRating]
						);
					}
					else if (
						$this->options()->xaAmsAutoFeatureViews > -1
						&& $this->options()->xaAmsAutoFeatureReactionScore > -1
						&& $this->options()->xaAmsAutoFeatureComments > -1
					)
					{
						$articleFinder->whereOr(
							['view_count', '>=', $this->options()->xaAmsAutoFeatureViews],
							['reaction_score', '>=', $this->options()->xaAmsAutoFeatureReactionScore],
							['comment_count', '>=', $this->options()->xaAmsAutoFeatureComments]
						);
					}
					else if (
						$this->options()->xaAmsAutoFeatureViews > -1
						&& $this->options()->xaAmsAutoFeatureRating > -1
						&& $this->options()->xaAmsAutoFeatureComments > -1
					)
					{
						$articleFinder->whereOr(
							['view_count', '>=', $this->options()->xaAmsAutoFeatureViews],
							['rating_avg', '>=', $this->options()->xaAmsAutoFeatureRating],
							['comment_count', '>=', $this->options()->xaAmsAutoFeatureComments]
						);
					}
					else if (
						$this->options()->xaAmsAutoFeatureViews > -1
						&& $this->options()->xaAmsAutoFeatureReactionScore > -1
					)
					{
						$articleFinder->whereOr(
							['view_count', '>=', $this->options()->xaAmsAutoFeatureViews],
							['reaction_score', '>=', $this->options()->xaAmsAutoFeatureReactionScore]
						);
					}
					else if (
						$this->options()->xaAmsAutoFeatureViews > -1
						&& $this->options()->xaAmsAutoFeatureRating > -1
					)
					{
						$articleFinder->whereOr(
							['view_count', '>=', $this->options()->xaAmsAutoFeatureViews],
							['rating_avg', '>=', $this->options()->xaAmsAutoFeatureRating]
						);
					}
					else if (
						$this->options()->xaAmsAutoFeatureViews > -1
						&& $this->options()->xaAmsAutoFeatureComments > -1
					)
					{
						$articleFinder->whereOr(
							['view_count', '>=', $this->options()->xaAmsAutoFeatureViews],
							['comment_count', '>=', $this->options()->xaAmsAutoFeatureComments]
						);
					}
					else
					{
						$articleFinder->where('view_count', '>=', $this->options()->xaAmsAutoFeatureViews);
					}
				}
				else if ($this->options()->xaAmsAutoFeatureReactionScore > -1)
				{
					if (
						$this->options()->xaAmsAutoFeatureReactionScore > -1
						&& $this->options()->xaAmsAutoFeatureRating > -1
						&& $this->options()->xaAmsAutoFeatureComments > -1
					)
					{
						$articleFinder->whereOr(
							['reaction_score', '>=', $this->options()->xaAmsAutoFeatureReactionScore],
							['rating_avg', '>=', $this->options()->xaAmsAutoFeatureRating],
							['comment_count', '>=', $this->options()->xaAmsAutoFeatureComments]
						);
					}
					else if (
						$this->options()->xaAmsAutoFeatureReactionScore > -1
						&& $this->options()->xaAmsAutoFeatureRating > -1
					)
					{
						$articleFinder->whereOr(
							['reaction_score', '>=', $this->options()->xaAmsAutoFeatureReactionScore],
							['rating_avg', '>=', $this->options()->xaAmsAutoFeatureRating]
						);
					}
					else if (
						$this->options()->xaAmsAutoFeatureReactionScore > -1
						&& $this->options()->xaAmsAutoFeatureComments > -1
					)
					{
						$articleFinder->whereOr(
							['reaction_score', '>=', $this->options()->xaAmsAutoFeatureReactionScore],
							['comment_count', '>=', $this->options()->xaAmsAutoFeatureComments]
						);
					}
					else
					{
						$articleFinder->where('reaction_score', '>=', $this->options()->xaAmsAutoFeatureReactionScore);
					}
				}
				else if ($this->options()->xaAmsAutoFeatureRating > -1)
				{
					if (
						$this->options()->xaAmsAutoFeatureRating > -1
						&& $this->options()->xaAmsAutoFeatureComments > -1
					)
					{
						$articleFinder->whereOr(
							['rating_avg', '>=', $this->options()->xaAmsAutoFeatureRating],
							['comment_count', '>=', $this->options()->xaAmsAutoFeatureComments]
						);
					}
					else
					{
						$articleFinder->where('rating_avg', '>=', $this->options()->xaAmsAutoFeatureRating);
					}
				}
	
				else if ($this->options()->xaAmsAutoFeatureComments > -1)
				{
					$articleFinder->where('comment_count', '>=', $this->options()->xaAmsAutoFeatureComments);
				}
			}
			else // inclusive (W AND x AND y AND Z)
			{
				if ($this->options()->xaAmsAutoFeatureViews > -1)
				{
					$articleFinder->where('view_count', '>=', $this->options()->xaAmsAutoFeatureViews);
				}
	
				if ($this->options()->xaAmsAutoFeatureReactionScore > -1)
				{
					$articleFinder->where('reaction_score', '>=', $this->options()->xaAmsAutoFeatureReactionScore);
				}
	
				if ($this->options()->xaAmsAutoFeatureRating > -1)
				{
					$articleFinder->where('rating_avg', '>=', $this->options()->xaAmsAutoFeatureRating);
				}
	
				if ($this->options()->xaAmsAutoFeatureComments > -1)
				{
					$articleFinder->where('comment_count', '>=', $this->options()->xaAmsAutoFeatureComments);
				}
			}
				
			if ($this->options()->xaAmsAutoFeaturePublished['enabled'])
			{
				if ($this->options()->xaAmsAutoFeaturePublished['days'] > -1)
				{
					$articleFinder->where('publish_date', '>=', \XF::$time - ($this->options()->xaAmsAutoFeaturePublished['days'] * 86400));
				}
			}
				
			if ($this->options()->xaAmsAutoFeatureUpdated['enabled'])
			{
				if ($this->options()->xaAmsAutoFeatureUpdated['days'] > -1)
				{
					$articleFinder->where('last_update', '>=', \XF::$time - ($this->options()->xaAmsAutoFeatureUpdated['days'] * 86400));
				}
			}
				
			$articles = $articleFinder->fetch();
		
			foreach ($articles AS $article)
			{
				/** @var \XenAddons\AMS\Service\ArticleItem\Feature $featurer */
				$featurer = $this->app()->service('XenAddons\AMS:ArticleItem\Feature', $article);
					
				$featurer->feature();
			}
		}
	}
	
	public function autoUnfeatureArticles()
	{
		// do not allow this to run unless the auto unfeature option is enabled!
	
		if ($this->options()->xaAmsAutoUnfeatureArticles['enabled'])
		{
			$cutOffDays = $this->options()->xaAmsAutoUnfeatureArticles['days'];
			$cutOffDate = \XF::$time - ($cutOffDays * 86400);
				
			/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
			$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
	
			$articleFinder
				->with('Featured', true)
				->where('Featured.feature_date', '<', $cutOffDate);
				
			$featuredArticles = $articleFinder->fetch();
				
			foreach ($featuredArticles AS $article)
			{
				/** @var \XenAddons\AMS\Service\ArticleItem\Feature $featurer */
				$featurer = $this->app()->service('XenAddons\AMS:ArticleItem\Feature', $article);
	
				$featurer->unfeature();
			}
		}
	}
	
	public function publishScheduledArticles()
	{
		/** @var \XenAddons\AMS\Finder\ArticleItem $articleFinder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
		
		$articleFinder
			->where('article_state', 'awaiting')
			->where('publish_date', '<=', \XF::$time);
		
		$awaitingArticles = $articleFinder->fetch();
		
		foreach ($awaitingArticles AS $article)
		{
			/** @var \XenAddons\AMS\Service\ArticleItem\PublishDraft $draftPublisher */
			$draftPublisher = \XF::service('XenAddons\AMS:ArticleItem\PublishDraft', $article);
			$draftPublisher->setNotifyRunTime(1); // may be a lot happening
			$draftPublisher->publishDraft(true);
		}		
	}
	
	public function getArticleAttachmentConstraints()
	{
		$options = $this->options();
	
		return [
			'extensions' => Arr::stringToArray($options->xaAmsAllowedFileExtensions),
			'size' => $options->xaAmsArticleAttachmentMaxFileSize * 1024,
			'width' => $options->attachmentMaxDimensions['width'],
			'height' => $options->attachmentMaxDimensions['height']
		];
	}	

	public function sendModeratorActionAlert(
		\XenAddons\AMS\Entity\ArticleItem $article, $action, $reason = '', array $extra = [], \XF\Entity\User $forceUser = null
	)
	{
		if (!$forceUser)
		{
			if (!$article->user_id || !$article->User)
			{
				return false;
			}

			$forceUser = $article->User;
		}

		$extra = array_merge([
			'title' => $article->title,
			'prefix_id' => $article->prefix_id,
			'link' => $this->app()->router('public')->buildLink('nopath:ams', $article),
			'reason' => $reason
		], $extra);

		/** @var \XF\Repository\UserAlert $alertRepo */
		$alertRepo = $this->repository('XF:UserAlert');
		$alertRepo->alert(
			$forceUser,
			0, '',
			'user', $forceUser->user_id,
			"ams_article_{$action}", $extra,
			['dependsOnAddOnId' => 'XenAddons/AMS']
		);

		return true;
	}

	public function addArticleEmbedsToContent($content, $metadataKey = 'embed_metadata', $articleGetterKey = 'AmsArticles', $pageGetterKey = 'AmsPages', $seriesGetterKey = 'AmsSeries')
	{
		if (!$content)
		{
			return;
		}
	
		$articleIds = [];
		$pageIds = [];
		$seriesIds = [];
		foreach ($content AS $item)
		{
			$metadata = $item->{$metadataKey};
			if (isset($metadata['amsEmbeds']['article']))
			{
				$articleIds = array_merge($articleIds, $metadata['amsEmbeds']['article']);
			}
			if (isset($metadata['amsEmbeds']['page']))
			{
				$pageIds = array_merge($pageIds, $metadata['amsEmbeds']['page']);
			}
			if (isset($metadata['amsEmbeds']['series']))
			{
				$seriesIds = array_merge($seriesIds, $metadata['amsEmbeds']['series']);
			}
		}
	
		$visitor = \XF::visitor();
	
		$series = [];
		$articles = [];
		$pages = [];
		
		if ($articleIds)
		{
			$articles = $this->finder('XenAddons\AMS:ArticleItem')
				->with('Category.Permissions|' . $visitor->permission_combination_id)
				->whereIds(array_unique($articleIds))
				->orderByDate()
				->fetch();
		}
		
		if ($pageIds)
		{
			$pages = $this->finder('XenAddons\AMS:ArticlePage')
				->with('Article.Category.Permissions|' . $visitor->permission_combination_id)
				->whereIds(array_unique($pageIds))
				//->orderByDate()
				->fetch();
		}
	
		foreach ($content AS $item)
		{
			$metadata = $item->{$metadataKey};
			if (isset($metadata['amsEmbeds']['article']))
			{
				$amsArticles = [];
				foreach ($metadata['amsEmbeds']['article'] AS $id)
				{
					if (!isset($articles[$id]))
					{
						continue;
					}
					$amsArticles[$id] = $articles[$id];
				}
	
				$item->{"set$articleGetterKey"}($amsArticles);
			}
			
			if (isset($metadata['amsEmbeds']['page']))
			{
				$amsPages = [];
				foreach ($metadata['amsEmbeds']['page'] AS $id)
				{
					if (!isset($pages[$id]))
					{
						continue;
					}
					$amsPages[$id] = $pages[$id];
				}
			
				$item->{"set$pageGetterKey"}($amsPages);
			}
			
			if (isset($metadata['amsEmbeds']['series']))
			{
				$amsSeries = [];
				foreach ($metadata['amsEmbeds']['series'] AS $id)
				{
					if (!isset($series[$id]))
					{
						continue;
					}
					$amsSeries[$id] = $series[$id];
				}
			
				$item->{"set$seriesGetterKey"}($amsSeries);
			}			
		}
	}	
	
	public function getUserArticleCount($userId)
	{
		return $this->db()->fetchOne('
			SELECT COUNT(*)
			FROM xf_xa_ams_article
			WHERE user_id = ?
				AND article_state = \'visible\'
		', $userId);
	}
	
	public function getUserCoAuthorArticleCount($userId)
	{
		return $this->db()->fetchOne('
			SELECT COUNT(*)
			FROM xf_xa_ams_article_contributor AS contributor
				LEFT JOIN xf_xa_ams_article AS article ON
					(contributor.article_id = article.article_id)
			WHERE contributor.user_id = ?
				AND contributor.is_co_author = 1
				AND article.article_state = \'visible\'
		', $userId);
	}
	
	public function getUserContributorArticleCount($userId)
	{
		return $this->db()->fetchOne('
			SELECT COUNT(*)
			FROM xf_xa_ams_article_contributor AS contributor
				LEFT JOIN xf_xa_ams_article AS article ON
					(contributor.article_id = article.article_id)
			WHERE contributor.user_id = ?
				AND contributor.is_co_author = 0
				AND article.article_state = \'visible\'
		', $userId);
	}
	
	/**
	 * @param $url
	 * @param null $type
	 * @param null $error
	 *
	 * @return null|\XF\Mvc\Entity\Entity
	 */
	public function getArticleFromUrl($url, $type = null, &$error = null)
	{
		$routePath = $this->app()->request()->getRoutePathFromUrl($url);
		$routeMatch = $this->app()->router($type)->routeToController($routePath);
		$params = $routeMatch->getParameterBag();
	
		if (!$params->article_id)
		{
			$error = \XF::phrase('xa_ams_no_article_id_could_be_found_from_that_url');
			return null;
		}
	
		$article = $this->app()->find('XenAddons\AMS:ArticleItem', $params->article_id);
		if (!$article)
		{
			$error = \XF::phrase('xa_ams_no_article_could_be_found_with_id_x', ['article_id' => $params->article_id]);
			return null;
		}
	
		return $article;
	}	
	
	/**
	 * @return int[]
	 */
	public function getArticleContributorCache(
		\XenAddons\AMS\Entity\ArticleItem $article
	): array
	{
		return $this->db()->fetchAllColumn(
			'SELECT user_id
			FROM xf_xa_ams_article_contributor
			WHERE article_id = ?',
			$article->article_id
		);
	}
	
	/**
	 * @return int[]
	 */
	public function rebuildArticleContributorCache(
		\XenAddons\AMS\Entity\ArticleItem $article
	): array
	{
		$cache = $this->getArticleContributorCache($article);
	
		$article->fastUpdate('contributor_user_ids', $cache);
		$article->clearCache('Contributors');
	
		return $cache;
	}
	
	
	
	
	// Google Maps stuff...
	
	/**
	 * @param $location
	 * @param string $action
	 *
	 * @return array
	 */
	public function getLocationDataFromGoogleMapsGeocodingApi($location = null, $action = '')
	{
		$apiKey = \XF::app()->options()->xaAmsGoogleMapsGeocodingApiKey;
	
		$location_data = [];
	
		if ($location && $apiKey)
		{
			$urlEncodedAddr = urlencode($location);
			$apiUrl = 'https://maps.google.com/maps/api/geocode/json?address='.$urlEncodedAddr.'&key='.$apiKey;
	
			$client = \XF::app()->http()->client();
	
			$geocodeResponse = $client->get($apiUrl)->getBody();
	
			$geocodeData = \GuzzleHttp\json_decode($geocodeResponse);
	
			if (
				!empty($geocodeData)
				&& $geocodeData->status == 'OK'
				&& isset($geocodeData->results)
				&& isset($geocodeData->results[0])
			)
			{
				$street_number = '';
				$route = '';
				$city = '';
				$state = '';
				$state_short = '';
				$country = '';
				$country_short = '';
	
				foreach ($geocodeData->results[0]->address_components AS $address_component)
				{
					if ($address_component->types)
					{
						foreach ($address_component->types AS $address_component_type)
						{
							if ($address_component_type == 'street_number')
							{
								$street_number = $address_component->long_name;
							}
								
							if ($address_component_type == 'route')
							{
								$route = $address_component->long_name;
							}
	
							// Basically, this is setting the "CITY", however, Google Maps does not have a CITY Address Component Type,
							// so have to do some additional checking to set a "city" for use witihin AMS
							if (
								$address_component_type == 'locality'
								|| $address_component_type == 'sublocality'
								|| $address_component_type == 'postal_town')
							{
								$city = $address_component->long_name;
							}
	
							// Basically, this is setting the "STATE", however, Google Maps does not have a STATE Component Type
							if ($address_component_type == 'administrative_area_level_1')
							{
								$state = $address_component->long_name;
								$state_short = $address_component->short_name;
							}
	
							// This one is much more obvious lol :P
							if ($address_component_type == 'country')
							{
								$country = $address_component->long_name;
								$country_short = $address_component->short_name;
							}
						}
					}
				}
	
				// For what ever reason, Google Maps sets the country_short to GB instead of UK, so lets fix that!
				if ($country_short == 'GB')
				{
					$country_short = 'UK';
				}
	
				// Sometimes users only enter a City and State.  We want to make sure the "street_address" is an empty string if no street number or route data is present!
				$street_address = '';
				if ($street_number == '' || $route == '')
				{
					$street_address = ''; // if there is no valid street number and route, lets set this to empty!
				}
				else
				{
					$street_address = $street_number . ' ' . $route;
				}
	
				$location_data = [
					'address_components' => $geocodeData->results[0]->address_components,
					'formatted_address' => $geocodeData->results[0]->formatted_address,
						
					'street_address' => $street_address,
						
					'city' => $city,
					'state' => $state,
					'state_short' => $state_short,
					'country' => $country,
					'country_short' => $country_short,
						
					'city_state' => $city . ' ' . $state,
					'city_state_short' => $city . ' ' . $state_short,
					'city_comma_state' => $city . ', ' . $state,
					'city_comma_state_short' => $city . ', ' . $state_short,
						
					'city_state_country' => $city . ', ' . $state . ', ' . $country,
					'city_state_country_short' => $city . ', ' . $state . ', ' . $country_short,
					'city_state_short_country_short' => $city . ', ' . $state_short . ', ' . $country_short,
		
					'geometry' => $geocodeData->results[0]->geometry,
					'latitude' => $geocodeData->results[0]->geometry->location->lat,
					'longitude' => $geocodeData->results[0]->geometry->location->lng,
					'place_id' => $geocodeData->results[0]->place_id,
					'plus_code' => isset($geocodeData->results[0]->plus_code) ? $geocodeData->results[0]->plus_code : '',
				];
			}
	
			// TODO log invalid status responses in ubs maps log table.
	
			// TODO $action is the type of action 'create', 'edit', 'rebuild'
	
			//// invalid status responses:
			// "ZERO_RESULTS" indicates that the geocode was successful but returned no results. This may occur if the geocoder was passed a non-existent address.
			// "OVER_QUERY_LIMIT" indicates that you are over your quota.
			// "REQUEST_DENIED" indicates that your request was denied. The web page is not allowed to use the geocoder.
			// "INVALID_REQUEST" generally indicates that the query (address, components or latlng) is missing.
			// "UNKNOWN_ERROR" indicates that the request could not be processed due to a server error. The request may succeed if you try again.
			// "ERROR" indicates that the request timed out or there was a problem contacting the Google servers. The request may succeed if you try again.
		}
	
		return $location_data;
	}
	
	
	
	// NOTE: this is an experiment (BETA) to include image attachments from posts in the article gallery
	// UPDATE: so far this is working as expected, so probably remove the BETA status in the XF 2.3 version!
	
	public function getPostsImagesForArticleGallery(\XenAddons\AMS\Entity\ArticleItem $article, $fetchType = 'authors')
	{
		$db = $this->db();
		
		$ids = null;
		
		if ($fetchType == 'authors')
		{
			// only fetch from posts that the article author or co-authors posted
				
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
					SELECT post_id
					FROM xf_post
					WHERE thread_id = ?
					AND user_id IN (" . $db->quote($authorIds) . ")
					AND message_state = 'visible'
					AND attach_count > 0
					ORDER BY post_id
				", $article->Discussion->thread_id
			);
		}
		else if ($fetchType == 'contributors')
		{
			// only fetch from posts that any contributors (author, co-authors, contributors) posted
		
			$contributorIds = $article->contributor_user_ids;
			array_push($contributorIds, $article->user_id); // this adds the article author user_id
				
			$ids = $db->fetchAllColumn("
					SELECT post_id
					FROM xf_post
					WHERE thread_id = ?
					AND user_id IN (" . $db->quote($contributorIds) . ")
					AND message_state = 'visible'
					AND attach_count > 0
					ORDER BY post_id
				", $article->Discussion->thread_id
			);
		}
		else if ($fetchType == 'all')
		{
			// fetch image attachments from all posts
		
			$ids = $db->fetchAllColumn("
					SELECT post_id
					FROM xf_post
					WHERE thread_id = ?
					AND message_state = 'visible'
					AND attach_count > 0
					ORDER BY post_id
				", $article->Discussion->thread_id
			);
		}
	
		if ($ids)
		{
			$attachments = $this->finder('XF:Attachment')
				->where([
					'content_type' => 'post',
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