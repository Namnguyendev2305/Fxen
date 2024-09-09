<?php

namespace XenAddons\AMS\ControllerPlugin;

use XF\ControllerPlugin\AbstractPlugin;

class ArticleList extends AbstractPlugin
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

	public function getArticleListData(array $sourceCategoryIds, \XenAddons\AMS\Entity\Category $category = null)
	{
		$articleRepo = $this->getArticleRepo();

		$allowOwnPending = is_callable([$this->controller, 'hasContentPendingApproval'])
			? $this->controller->hasContentPendingApproval()
			: true;

		$articleFinder = $articleRepo->findArticlesForArticleList($sourceCategoryIds, [
			'allowOwnPending' => $allowOwnPending
		], $category);

		$filters = $this->getArticleFilterInput($category);
		$this->applyArticleFilters($articleFinder, $filters);
		
		$featuredArticles = $this->em()->getEmptyCollection();
		if (!$filters && $featuredLimit = $this->options()->xaAmsFeaturedArticlesLimit)
		{
			$featuredLimit = $this->options()->xaAmsFeaturedArticlesDisplayType == 'featured_grid' ? 3 : $featuredLimit;
				
			$featuredArticles = $articleRepo->findFeaturedArticles($sourceCategoryIds)
				->fetch($featuredLimit)
				->filterViewable();
			
			if ($featuredArticles && $this->options()->xaAmsExcludeFeaturedArticlesFromListing)
			{
				$excludeArticleIds = $featuredArticles->pluckNamed('article_id');
				$articleFinder->where('article_id', '<>', $excludeArticleIds);
			}
		}
		$featuredArticlesCount = $featuredArticles->count();
		
		$page = $this->filterPage();
		$perPage = $this->options()->xaAmsArticlesPerPage;

		$layoutType = $this->getLayoutType($category);
		if ($layoutType == 'article_view')
		{
			$perPage = $this->options()->xaAmsArticlesPerPageAV;
		}
		elseif ($layoutType  == 'grid_view')
		{
			$perPage = $this->options()->xaAmsArticlesPerPageGV;
		}
		elseif ($layoutType  == 'tile_view')
		{
			$perPage = $this->options()->xaAmsArticlesPerPageTV;
		}
		
		$stickyArticles = $this->em()->getEmptyCollection();
		if ($page == 1 && $category)
		{
			$stickyArticleList = clone $articleFinder;
		
			/** @var \XenAddons\AMS\Entity\ArticleItem[]\XF\Mvc\Entity\AbstractCollection $stickyArticles */
			$stickyArticles = $stickyArticleList
				->where('sticky', 1)
				->where('category_id', $category->category_id)
				->fetch();
		
			if ($stickyArticles)
			{
				$stickyArticlesIds = $stickyArticles->pluckNamed('article_id');
				$articleFinder->where('article_id', '<>', $stickyArticlesIds);
			}
		}
		
		$articleFinder->limitByPage($page, $perPage);
		
		$articles = $articleFinder->fetch()->filterViewable();
		$totalArticles = $articleFinder->total();

		if (!empty($filters['creator_id']))
		{
			$creatorFilter = $this->em()->find('XF:User', $filters['creator_id']);
		}
		else
		{
			$creatorFilter = null;
		}
		
		if ($stickyArticles)
		{
			foreach ($stickyArticles AS $article)
			{
				if (!$article->canViewFullArticle())
				{
					$snippet = $this->app->stringFormatter()->wholeWordTrim($article->message, $this->options()->xaAmsLimitedViewArticleLength);
					if (strlen($snippet) < strlen($article->message))
					{
						$article->message = $this->app->bbCode()->render($snippet, 'bbCodeClean', 'ams_article', null);
					}
				}
			}
		}
		
		foreach ($articles AS $article)
		{
			if (!$article->canViewFullArticle())
			{
				$snippet = $this->app->stringFormatter()->wholeWordTrim($article->message, $this->options()->xaAmsLimitedViewArticleLength);
				if (strlen($snippet) < strlen($article->message))
				{
					$article->message = $this->app->bbCode()->render($snippet, 'bbCodeClean', 'ams_article', null);
				}
			}
		}

		$canInlineMod = false;
		
		if ($stickyArticles)
		{
			foreach ($stickyArticles AS $article)
			{
				/** @var \XenAddons\AMS\Entity\ArticleItem $article */
				if ($article->canUseInlineModeration())
				{
					$canInlineMod = true;
					break;
				}
			}
		}
		
		foreach ($articles AS $article)
		{
			/** @var \XenAddons\AMS\Entity\ArticleItem $article */
			if ($article->canUseInlineModeration())
			{
				$canInlineMod = true;
				break;
			}
		}
		
		$mapItems = $this->getMapItems($articles, $stickyArticles, $featuredArticles, $category);
		
		return [
			'stickyArticles' => $stickyArticles,
			'articles' => $articles,
			'filters' => $filters,
			'creatorFilter' => $creatorFilter,
			'canInlineMod' => $canInlineMod,

			'total' => $totalArticles,
			'page' => $page,
			'perPage' => $perPage,

			'featuredArticles' => $featuredArticles,
			'featuredArticlesCount' => $featuredArticlesCount,
			
			'mapItems' => $mapItems
		];
	}

	public function applyArticleFilters(\XenAddons\AMS\Finder\ArticleItem $articleFinder, array $filters)
	{
		if (!empty($filters['featured']))
		{
			$articleFinder->where('Featured.feature_date', '>', 0);
		}
		
		if (!empty($filters['is_rated']))
		{
			$articleFinder->where('rating_count', '>', 0);
		}
		
		if (!empty($filters['has_reviews']))
		{
			$articleFinder->where('review_count', '>', 0);
		}
		
		if (!empty($filters['has_comments']))
		{
			$articleFinder->where('comment_count', '>', 0);
		}

		if (!empty($filters['title']))
		{
			$articleFinder->where(
				$articleFinder->columnUtf8('title'),
				'LIKE', $articleFinder->escapeLike($filters['title'], '%?%'));
		}
		
		if (!empty($filters['term']))
		{
			$articleFinder->whereOr(
				[$articleFinder->columnUtf8('title'), 'LIKE', $articleFinder->escapeLike($filters['term'], '%?%')],
				[$articleFinder->columnUtf8('description'), 'LIKE', $articleFinder->escapeLike($filters['term'], '%?%')],
				[$articleFinder->columnUtf8('message'), 'LIKE', $articleFinder->escapeLike($filters['term'], '%?%')]
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
		
		$sorts = $this->getAvailableArticleSorts();

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
			'is_rated' => 'bool',
			'has_reviews' => 'bool',
			'has_comments' => 'bool',
			'title' => 'str',	
			'term' => 'str',
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
		
		if ($input['is_rated'])
		{
			$filters['is_rated'] = true;
		}
		
		if ($input['has_reviews'])
		{
			$filters['has_reviews'] = true;
		}
		
		if ($input['has_comments'])
		{
			$filters['has_comments'] = true;
		}

		if ($input['title'])
		{
			$filters['title'] = $input['title'];
		}
		
		if ($input['term'])
		{
			$filters['term'] = $input['term'];
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
		
		$sorts = $this->getAvailableArticleSorts();

		if ($input['order'] && isset($sorts[$input['order']]))
		{
			if (!in_array($input['direction'], ['asc', 'desc']))
			{
				$input['direction'] = 'desc';
			}

			if ($category && $category->article_list_order)
			{
				$defaultOrder = $category->article_list_order ?: 'publish_date';
			}
			else
			{
				$defaultOrder = $this->options()->xaAmsListDefaultOrder ?: 'publish_date';
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

	public function getAvailableArticleSorts()
	{
		return [
			'publish_date' => 'publish_date',
			'last_update' => 'last_update',
			'rating_weighted' => 'rating_weighted',
			'reaction_score' => 'reaction_score',
			'view_count' => 'view_count',
			'title' => 'title'
		];
	}

	public function getLayoutType($category)
	{
		$layoutType = 'list_view';
	
		if ($category && isset($category->layout_type) && $category->layout_type)
		{
			if ($category->layout_type == 'article_view')
			{
				$layoutType = 'article_view';
			}
			elseif ($category->layout_type == 'grid_view')
			{
				$layoutType = 'grid_view';
			}
			elseif ($category->layout_type == 'tile_view')
			{
				$layoutType = 'tile_view';
			}
		}
		else
		{
			if ($this->options()->xaAmsArticleListLayoutType == 'article_view')
			{
				$layoutType = 'article_view';
			}
			elseif ($this->options()->xaAmsArticleListLayoutType == 'grid_view')
			{
				$layoutType = 'grid_view';
			}
			elseif ($this->options()->xaAmsArticleListLayoutType == 'tile_view')
			{
				$layoutType = 'tile_view';
			}
		}
	
		return $layoutType;
	}
	
	public function getMapItems($articles, $stickyArticles, $featuredArticles, $category)
	{
		$mapItems = $this->em()->getEmptyCollection();
	
		if (
			$category
			&& isset($category['map_options']['enable_map'])
			&& $category['map_options']['enable_map']
			&& $this->options()->xaAmsGoogleMapsJavaScriptApiKey
		)
		{
			foreach ($articles AS $articleKey => $article)
			{
				if ($article->location &&  $article->location_data)
				{
					$mapItems[$articleKey] = $article;
				}
			}
	
			if ($stickyArticles)
			{
				foreach ($stickyArticles AS $articleKey => $article)
				{
					if ($article->location &&  $article->location_data)
					{
						$mapItems[$articleKey] = $article;
					}
				}
			}
	
			if ($featuredArticles && $this->options()->xaAmsExcludeFeaturedArticlesFromListing)
			{
				foreach ($featuredArticles AS $articleKey => $article)
				{
					if ($article->location &&  $article->location_data)
					{
						$mapItems[$articleKey] = $article;
					}
				}
			}
		}
	
		return $mapItems;
	}
	

	public function actionFilters(\XenAddons\AMS\Entity\Category $category = null)
	{
		$filters = $this->getArticleFilterInput();

		if ($this->filter('apply', 'bool'))
		{
			return $this->redirect($this->buildLink(
				$category ? 'ams/categories' : 'ams',
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

		if ($category && $category->article_list_order)
		{
			$defaultOrder = $category->article_list_order ?: 'publish_date';
		}
		else
		{
			$defaultOrder = $this->options()->xaAmsListDefaultOrder ?: 'publish_date';
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
			'showRatingFilter' => $showRatingFilter
		];
		return $this->view('XenAddons\AMS:Filters', 'xa_ams_filters', $viewParams);
	}

	public function actionFeatured(\XenAddons\AMS\Entity\Category $category = null)
	{
		$viewableCategoryIds = $this->getCategoryRepo()->getViewableCategoryIds($category);

		$finder = $this->getArticleRepo()->findFeaturedArticles($viewableCategoryIds);
		$finder->order('Featured.feature_date', 'desc');

		$articles = $finder->fetch()->filterViewable();

		$canInlineMod = false;
		foreach ($articles AS $article)
		{
			/** @var \XenAddons\AMS\\Entity\ArticleItem $article */
			if ($article->canUseInlineModeration())
			{
				$canInlineMod = true;
				break;
			}
		}

		$viewParams = [
			'category' => $category,
			'articles' => $articles,
			'canInlineMod' => $canInlineMod
		];
		return $this->view('XenAddons\AMS:Featured', 'xa_ams_featured', $viewParams);
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