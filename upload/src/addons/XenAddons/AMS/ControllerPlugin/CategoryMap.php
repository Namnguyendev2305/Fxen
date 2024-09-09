<?php

namespace XenAddons\AMS\ControllerPlugin;

use XF\ControllerPlugin\AbstractPlugin;

class CategoryMap extends AbstractPlugin
{
	public function getCategoryListData(\XenAddons\AMS\Entity\Category $category = null)
	{
		$categoryRepo = $this->getCategoryRepo();
		$categories = $categoryRepo->getViewableCategories();
		$categoryTree = $categoryRepo->createCategoryTree($categories);
		$categoryExtras = $categoryRepo->getCategoryListExtras($categoryTree);

		return [
			'categories' => $categories,
			'categoryTree' => $categoryTree,
			'categoryExtras' => $categoryExtras
		];
	}

	public function getCategoryMapData(array $sourceCategoryIds, \XenAddons\AMS\Entity\Category $category = null)
	{
		$articleRepo = $this->getArticleRepo();
		
		$articleFinder = $articleRepo->findArticlesForCategoryMap($sourceCategoryIds, $category);

		$filters = $this->getArticleFilterInput($category);
		$this->applyArticleFilters($articleFinder, $filters);
		
		if ($category && isset($category['map_options']['marker_limit']))
		{
			$markerLimit = $category['map_options']['marker_limit'] ?: 2500;
		}
		else 
		{
			$markerLimit = 2500;
		}
		
		$articles = $articleFinder->fetch($markerLimit)->filterViewable();

		$mapItems = $this->em()->getEmptyCollection();

		if ($articles)
		{
			foreach ($articles AS $articleKey => $article)
			{
				if ($article->location && $article->location_data)
				{
					$mapItems[$articleKey] = $article;
				}
			}
		}
		
		if (!empty($filters['creator_id']))
		{
			$creatorFilter = $this->em()->find('XF:User', $filters['creator_id']);
		}
		else
		{
			$creatorFilter = null;
		}
		
		return [
			'mapItems' => $mapItems,
			'filters' => $filters,
			'creatorFilter' => $creatorFilter,
		];
	}

	public function applyArticleFilters(\XenAddons\AMS\Finder\ArticleItem $articleFinder, array $filters)
	{
		if (!empty($filters['featured']))
		{
			$articleFinder->where('Featured.feature_date', '>', 0);
		}
		
		if (!empty($filters['has_comments']))
		{
			$articleFinder->where('comment_count', '>', 0);
		}
		
		if (!empty($filters['is_rated']))
		{
			$articleFinder->where('rating_count', '>', 0);
		}
		
		if (!empty($filters['has_reviews']))
		{
			$articleFinder->where('review_count', '>', 0);
		}

		if (!empty($filters['title']))
		{
			$articleFinder->where($articleFinder->columnUtf8('title'), 'LIKE', $articleFinder->escapeLike($filters['title'], '%?%'));
		}

		if (!empty($filters['term']))
		{
			$articleFinder->whereOr(
				[$articleFinder->columnUtf8('title'), 'LIKE', $articleFinder->escapeLike($filters['term'], '%?%')],
				[$articleFinder->columnUtf8('description'), 'LIKE', $articleFinder->escapeLike($filters['term'], '%?%')],
				[$articleFinder->columnUtf8('message'), 'LIKE', $articleFinder->escapeLike($filters['term'], '%?%')]
			);
		}
		
		if (!empty($filters['location']))
		{
			$articleFinder->whereOr(
				[$articleFinder->columnUtf8('location'), 'LIKE', $articleFinder->escapeLike($filters['location'], '%?%')],
				[$articleFinder->columnUtf8('location_data'), 'LIKE', $articleFinder->escapeLike($filters['location'], '%?%')]
			);
		}
				
		if (!empty($filters['rating_avg']))
		{
			switch ($filters['rating_avg'])
			{
				case '5':
					$articleFinder->where('rating_avg', '>=', 5);
					break;
		
				case '4':
					$articleFinder->where('rating_avg', '>=', 4);
					break;
						
				case '3':
					$articleFinder->where('rating_avg', '>=', 3);
					break;
		
				case '2':
					$articleFinder->where('rating_avg', '>=', 2);
					break;
			}
		}		
		
		if (!empty($filters['prefix_id']))
		{
			$articleFinder->where('prefix_id', intval($filters['prefix_id']));
		}

		if (!empty($filters['creator_id']))
		{
			$articleFinder->where('user_id', intval($filters['creator_id']));
		}
		
		if (!empty($filters['last_days']))
		{
			if ($filters['last_days'] > 0)
			{
				$articleFinder->where('last_update', '>=', \XF::$time - ($filters['last_days'] * 86400));
			}
		}

		if (!empty($filters['state']))
		{
			switch ($filters['state'])
			{
				case 'visible':
					$articleFinder->where('article_state', 'visible');
					break;
		
				case 'moderated':
					$articleFinder->where('article_state', 'moderated');
					break;
		
				case 'deleted':
					$articleFinder->where('article_state', 'deleted');
					break;
			}
		}
		
		$sorts = $this->getAvailableItemSorts();

		if (!empty($filters['order']) && isset($sorts[$filters['order']]))
		{
			$articleFinder->order($sorts[$filters['order']], $filters['direction']);
		}
		// else the default order has already been applied
	}

	public function getArticleFilterInput(\XenAddons\AMS\Entity\Category $category = null)
	{
		$filters = [];

		$input = $this->filter([
			'featured' => 'bool',
			'has_comments' => 'bool',
			'is_rated' => 'bool',
			'has_reviews' => 'bool',
			'title' => 'str',	
			'term' => 'str',
			'location' => 'str',
			'rating_avg' => 'int',
			'prefix_id' => 'uint',
			'creator' => 'str',
			'creator_id' => 'uint',
			'last_days' => 'int',
			'state' => 'str',
			'order' => 'str',
			'direction' => 'str'
		]);

		if ($input['featured'])
		{
			$filters['featured'] = true;
		}
		
		if ($input['has_comments'])
		{
			$filters['has_comments'] = true;
		}
		
		if ($input['is_rated'])
		{
			$filters['is_rated'] = true;
		}
		
		if ($input['has_reviews'])
		{
			$filters['has_reviews'] = true;
		}

		if ($input['title'])
		{
			$filters['title'] = $input['title'];
		}
		
		if ($input['term'])
		{
			$filters['term'] = $input['term'];
		}
		
		if ($input['location'])
		{
			$filters['location'] = $input['location'];
		}
		
		if ($input['rating_avg'] && ($input['rating_avg'] == 5 || $input['rating_avg'] == 4 || $input['rating_avg'] == 3 || $input['rating_avg'] == 2))
		{
			$filters['rating_avg'] = $input['rating_avg'];
		}
		
		if ($input['prefix_id'])
		{
			$filters['prefix_id'] = $input['prefix_id'];
		}

		if ($input['creator_id'])
		{
			$filters['creator_id'] = $input['creator_id'];
		}
		else if ($input['creator'])
		{
			$user = $this->em()->findOne('XF:User', ['username' => $input['creator']]);
			if ($user)
			{
				$filters['creator_id'] = $user->user_id;
			}
		}
		
		if ($input['last_days'] > 0) 
		{
			if (in_array($input['last_days'], $this->getAvailableDateLimits()))
			{
				$filters['last_days'] = $input['last_days'];
			}
		}		

		if ($input['state'] && ($input['state'] == 'visible' || $input['state'] == 'moderated' || $input['state'] == 'deleted'))
		{
			$filters['state'] = $input['state'];
		}
		
		$sorts = $this->getAvailableItemSorts();

		if ($input['order'] && isset($sorts[$input['order']]))
		{
			if (!in_array($input['direction'], ['asc', 'desc']))
			{
				$input['direction'] = 'desc';
			}
			
			if ($category && isset($category['map_options']['marker_fetch_order']))
			{
				$defaultOrder = $category['map_options']['marker_fetch_order'] ?: 'rating_weighted';
			}
			else
			{
				$defaultOrder = 'rating_weighted';
			}
			
			$defaultDir = $defaultOrder == 'title' ? 'asc' : 'desc';

			if ($input['order'] != $defaultOrder || $input['direction'] != $defaultDir)
			{
				$filters['order'] = $input['order'];
				$filters['direction'] = $input['direction'];
			}
		}

		return $filters;
	}
	
	protected function getAvailableDateLimits()
	{
		return [-1, 7, 14, 30, 60, 90, 182, 365];
	}

	public function getAvailableItemSorts()
	{
		return [
			'rating_weighted' => 'rating_weighted',
			'reaction_score' => 'reaction_score',
			'view_count' => 'view_count',
			'publish_date' => 'publish_date',
			'last_update' => 'last_update',
		];
	}

	public function actionFilters(\XenAddons\AMS\Entity\Category $category = null)
	{
		$filters = $this->getArticleFilterInput($category);

		if ($this->filter('apply', 'bool'))
		{
			return $this->redirect($this->buildLink(
				$category ? 'ams/categories/map' : 'ubs',
				$category,
				$filters
			));
		}

		if (!empty($filters['creator_id']))
		{
			$creatorFilter = $this->em()->find('XF:User', $filters['creator_id']);
		}
		else
		{
			$creatorFilter = null;
		}

		$applicableCategories = $this->getCategoryRepo()->getViewableCategories($category);
		$applicableCategoryIds = $applicableCategories->keys();
		if ($category)
		{
			$applicableCategoryIds[] = $category->category_id;
		}

		$availablePrefixIds = $this->repository('XenAddons\AMS:CategoryPrefix')->getPrefixIdsInContent($applicableCategoryIds);
		$prefixes = $this->repository('XenAddons\AMS:ArticlePrefix')->findPrefixesForList()
			->where('prefix_id', $availablePrefixIds)
			->fetch();

		$showRatingFilter = false;
		if ($category && $category->allow_ratings)
		{
			$showRatingFilter = true;
		}
		else if ($applicableCategories)
		{
			foreach ($applicableCategories as $_applicableCategory)
			{
				if ($_applicableCategory->allow_ratings)
				{
					$showRatingFilter = true;
				}
			}
		}
		
		$showLocationFilter = false;
		if ($this->options()->xaAmsGoogleMapsJavaScriptApiKey && $this->options()->xaAmsGoogleMapsGeocodingApiKey)
		{
			if ($category && $category->allow_location)
			{
				$showLocationFilter = true;
			}
			else if ($applicableCategories) // Check the sub cats...
			{
				foreach ($applicableCategories as $_applicableCategory)
				{
					if ($_applicableCategory->allow_location)
					{
						$showLocationFilter = true;
					}
				}
			}
		}
		
		if ($category && isset($category['map_options']['marker_fetch_order']))
		{
			$defaultOrder = $category['map_options']['marker_fetch_order'] ?: 'rating_weighted';
		}
		else 
		{
			$defaultOrder = 'rating_weighted';
		}
			
		$defaultDir = $defaultOrder == 'title' ? 'asc' : 'desc';

		if (empty($filters['order']))
		{
			$filters['order'] = $defaultOrder;
		}
		if (empty($filters['direction']))
		{
			$filters['direction'] = $defaultDir;
		}

		$viewParams = [
			'category' => $category,
			'prefixesGrouped' => $prefixes->groupBy('prefix_group_id'),
			'filters' => $filters,
			'creatorFilter' => $creatorFilter,
			'showRatingFilter' => $showRatingFilter,
			'showLocationFilter' => $showLocationFilter
		];
		return $this->view('XenAddons\AMS:Filters', 'xa_ams_map_view_filters', $viewParams);
	}

	/**
	 * @return \XenAddons\AMS\Repository\Article
	 */
	protected function getArticleRepo()
	{
		return $this->repository('XenAddons\AMS:Article');
	}

	/**
	 * @return \XenAddons\AMS\Repository\Category
	 */
	protected function getCategoryRepo()
	{
		return $this->repository('XenAddons\AMS:Category');
	}
}