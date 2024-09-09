<?php

namespace XenAddons\AMS\ControllerPlugin;

use XF\ControllerPlugin\AbstractPlugin;

class AuthorReviewList extends AbstractPlugin
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
	
	public function getAuthorReviewListData(array $sourceCategoryIds, \XF\Entity\User $user = null)
	{
		$articleRatingRepo = $this->getArticleRatingRepo();
	
		$reviewFinder = $articleRatingRepo->findReviewsForAuthorReviewList($user, $sourceCategoryIds);
	
		$filters = $this->getReviewFilterInput();
		$this->applyReviewFilters($reviewFinder, $filters);
		
		$page = $this->filterPage();
		$perPage = $this->options()->xaAmsReviewsPerPage;
	
		$reviewFinder->limitByPage($page, $perPage);
		$reviews = $reviewFinder->fetch()->filterViewable();

		$totalReviews = $reviewFinder->total();
		
		$effectiveOrder = $filters['order'] ?? 'rating_date';
	
		/** @var \XF\Repository\Attachment $attachmentRepo */
		$attachmentRepo = \XF::repository('XF:Attachment');
		$attachmentRepo->addAttachmentsToContent($reviews, 'ams_rating');

		$canInlineModReviews = false;
		foreach ($reviews AS $review)
		{
			if ($review->canUseInlineModeration())
			{
				$canInlineModReviews = true;
				break;
			}
		}
		
		/** @var \XF\Repository\UserAlert $userAlertRepo */
		$userAlertRepo = $this->repository('XF:UserAlert');
		$userAlertRepo->markUserAlertsReadForContent('ams_rating', $reviews->keys());
		
		return [
			'user' => $user,
			'reviews' => $reviews,
			'filters' => $filters,
			
			'reviewTabs' => $this->getReviewTabs($filters, $effectiveOrder),
			'effectiveOrder' => $effectiveOrder,

			'page' => $page,
			'perPage' => $perPage,
			'total' => $totalReviews,
			
			'canInlineModReviews' => $canInlineModReviews,
		];
	}	

	protected function getReviewTabs(
		array $filters,
		string $effectiveOrder
	): array
	{
		$tabs = [
			'latest' => [
				'selected' => ($effectiveOrder == 'rating_date'),
				'filters' => array_replace($filters, [
					'order' => 'rating_date',
					'direction' => 'desc'
				])
				],
			'helpful' => [
				'selected' => ($effectiveOrder == 'vote_score'),
				'filters' => array_replace($filters, [
					'order' => 'vote_score',
					'direction' => 'desc'
				])
			],
			'rating' => [
				'selected' => ($effectiveOrder == 'rating'),
				'filters' => array_replace($filters, [
					'order' => 'rating',
					'direction' => 'desc'
				])
			]
		];
	
		$defaultOrder = 'rating_date';
		$defaultDirection = 'desc';
	
		foreach ($tabs AS $tabId => &$tab)
		{
			if (isset($tab['filters']['order']) && $tab['filters']['order'] == $defaultOrder)
			{
				$tab['filters']['order'] = null;
			}
			if (isset($tab['filters']['direction']) && $tab['filters']['direction'] == $defaultDirection)
			{
				$tab['filters']['direction'] = null;
			}
		}
	
		return $tabs;
	}
	
	public function applyReviewFilters(\XenAddons\AMS\Finder\ArticleRating $reviewFinder, array $filters)
	{
		if (!empty($filters['rating']))
		{
			$reviewFinder->where('rating', $filters['rating']);
		}
		
		if (!empty($filters['term']))
		{
			$reviewFinder->whereOr(
				[$reviewFinder->columnUtf8('title'), 'LIKE', $reviewFinder->escapeLike($filters['term'], '%?%')],
				[$reviewFinder->columnUtf8('message'), 'LIKE', $reviewFinder->escapeLike($filters['term'], '%?%')],
				[$reviewFinder->columnUtf8('pros'), 'LIKE', $reviewFinder->escapeLike($filters['term'], '%?%')],
				[$reviewFinder->columnUtf8('cons'), 'LIKE', $reviewFinder->escapeLike($filters['term'], '%?%')]
			);
		}
	
		$sorts = $this->getAvailableReviewSorts();
	
		if (!empty($filters['order']) && isset($sorts[$filters['order']]))
		{
			$reviewFinder->order($sorts[$filters['order']], $filters['direction']);
		}
		// else the default order has already been applied
	}
	
	public function getReviewFilterInput()
	{
		$filters = [];
	
		$input = $this->filter([
			'rating' => 'uint',
			'term' => 'str',
			'order' => 'str',
			'direction' => 'str'
		]);
		
		if ($input['rating'] >= 1 && $input['rating'] <= 5)
		{
			$filters['rating'] = $input['rating'];
		}
		
		if ($input['term'])
		{
			$filters['term'] = $input['term'];
		}
	
		$sorts = $this->getAvailableReviewSorts();
	
		if ($input['order'] && isset($sorts[$input['order']]))
		{
			if (!in_array($input['direction'], ['asc', 'desc']))
			{
				$input['direction'] = 'desc';
			}
	
			$defaultOrder = 'rating_date';
			$defaultDir = 'desc';
	
			if ($input['order'] != $defaultOrder || $input['direction'] != $defaultDir)
			{
				$filters['order'] = $input['order'];
				$filters['direction'] = $input['direction'];
			}
		}
	
		return $filters;
	}
	
	public function getAvailableReviewSorts()
	{
		return [
			'rating_date' => 'rating_date',
			'rating' => 'rating',
			'vote_score' => 'vote_score',
			'reaction_score' => 'reaction_score'
		];
	}
	
	public function actionFilters(\XF\Entity\User $user = null)
	{
		$filters = $this->getReviewFilterInput();
	
		if ($this->filter('apply', 'bool'))
		{
			return $this->redirect($this->buildLink('ams/authors/reviews', $user, $filters));
		}
	
		$applicableCategories = $this->getCategoryRepo()->getViewableCategories();
		$applicableCategoryIds = $applicableCategories->keys();
	
		$defaultOrder = 'rating_date';
		$defaultDir = 'desc';
	
		if (empty($filters['order']))
		{
			$filters['order'] = $defaultOrder;
		}
		if (empty($filters['direction']))
		{
			$filters['direction'] = $defaultDir;
		}
		
		$viewParams = [
			'actionLink' => $this->buildLink('ams/authors/reviews-filters', $user),
			
			'user' => $user,
			'filters' => $filters,
		];
		return $this->view('XenAddons\AMS:AuthorReviewsFilters', 'xa_ams_review_list_filters', $viewParams);
	}

	/**
	 * @return \XenAddons\AMS\Repository\ArticleRating
	 */
	protected function getArticleRatingRepo()
	{
		return $this->repository('XenAddons\AMS:ArticleRating');
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