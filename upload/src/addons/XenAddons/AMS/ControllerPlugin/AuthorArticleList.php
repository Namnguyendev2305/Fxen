<?php

namespace XenAddons\AMS\ControllerPlugin;

use XF\ControllerPlugin\AbstractPlugin;

class AuthorArticleList extends AbstractPlugin
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
	
	public function getAuthorArticleListData(array $sourceCategoryIds, \XF\Entity\User $user = null)
	{
		$articleRepo = $this->getArticleRepo();
	
		$allowOwnPending = true; // Article owners will be able to see their pending AMS Articles on the "Your articles" page.
	
		$articleFinder = $articleRepo->findArticlesForAuthorArticleList($user, $sourceCategoryIds, [
			'allowOwnPending' => $allowOwnPending
		]);
	
		$filters = $this->getArticleFilterInput();
		$this->applyArticleFilters($articleFinder, $filters);
		
		$page = $this->filterPage();
		$perPage = $this->options()->xaAmsArticlesPerPage;
		
		if ($this->options()->xaAmsAuthorPageArticleListLayoutType == 'article_view')
		{
			$perPage = $this->options()->xaAmsArticlesPerPageAV;
		}
		elseif ($this->options()->xaAmsAuthorPageArticleListLayoutType == 'grid_view')
		{
			$perPage = $this->options()->xaAmsArticlesPerPageGV;
		}
		elseif ($this->options()->xaAmsAuthorPageArticleListLayoutType == 'tile_view')
		{
			$perPage = $this->options()->xaAmsArticlesPerPageTV;
		}
				
		$articleFinder->limitByPage($page, $perPage);
	
		$articles = $articleFinder->fetch()->filterViewable();
		$totalArticles = $articleFinder->total();

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
		foreach ($articles AS $article)
		{
			/** @var \XenAddons\AMS\Entity\ArticleItem $article */
			if ($article->canUseInlineModeration())
			{
				$canInlineMod = true;
				break;
			}
		}
	
		return [
			'user' => $user,
			'articles' => $articles,
			'filters' => $filters,
			'canInlineMod' => $canInlineMod,
			'total' => $totalArticles,
			'page' => $page,
			'perPage' => $perPage,
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

	public function getArticleFilterInput()
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

			$defaultOrder = $this->options()->xaAmsListDefaultOrder ?: 'publish_date';
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

	public function actionFilters(\XF\Entity\User $user = null)
	{
		$filters = $this->getArticleFilterInput();

		if ($this->filter('apply', 'bool'))
		{
			return $this->redirect($this->buildLink('ams/authors', $user, $filters));
		}

		$applicableCategories = $this->getCategoryRepo()->getViewableCategories();
		$applicableCategoryIds = $applicableCategories->keys();

		$availablePrefixIds = $this->repository('XenAddons\AMS:CategoryPrefix')->getPrefixIdsInContent($applicableCategoryIds);
		$prefixes = $this->repository('XenAddons\AMS:ArticlePrefix')->findPrefixesForList()
			->where('prefix_id', $availablePrefixIds)
			->fetch();
		
		$showRatingFilter = false;
		if ($applicableCategories)
		{
			foreach ($applicableCategories as $_applicableCategory)
			{
				if ($_applicableCategory->allow_ratings)
				{
					$showRatingFilter = true;
				}
			}
		}

		$defaultOrder = $this->options()->xaAmsListDefaultOrder ?: 'publish_date';
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
			'user' => $user,
			'prefixesGrouped' => $prefixes->groupBy('prefix_group_id'),
			'filters' => $filters,
			'showRatingFilter' => $showRatingFilter
		];
		return $this->view('XenAddons\AMS:Filters', 'xa_ams_author_filters', $viewParams);
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