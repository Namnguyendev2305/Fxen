<?php

namespace XenAddons\AMS\Pub\Controller;

use XF\Mvc\ParameterBag;

class Author extends AbstractController
{
	public function actionIndex(ParameterBag $params)
	{
		if ($params->user_id)
		{
			return $this->rerouteController('XenAddons\AMS:Author', 'Author', $params);
		}

		$this->assertNotEmbeddedImageRequest();

		if (!$this->options()->xaAmsEnableAuthorList)
		{
			return $this->noPermission();
		}

		$this->assertCanonicalUrl($this->buildLink('ams/authors'));

		$page = $this->filterPage();
		$perPage = $this->options()->membersPerPage; 

		$searcher = $this->searcher('XF:User');

		$finder = $searcher->getFinder()
			->isValidUser()
			->where('xa_ams_article_count', '>', 0)
			->with(['Profile'])
			->setDefaultOrder([
				['Profile.xa_ams_author_name', 'asc'],
				['username', 'asc']
			])
			->limitByPage($page, $perPage);

		$total = $finder->total();
		$this->assertValidPage($page, $perPage, $total, 'ams/authors');
		
		$categoryRepo = $this->getCategoryRepo();
		$categories = $categoryRepo->getViewableCategories();
		$categoryTree = $categoryRepo->createCategoryTree($categories);
		$categoryExtras = $categoryRepo->getCategoryListExtras($categoryTree);

		$viewParams = [
			'authors' => $finder->fetch(),

			'total' => $total,
			'page' => $page,
			'perPage' => $perPage,
			
			'categories' => $categories,
			'categoryTree' => $categoryTree,
			'categoryExtras' => $categoryExtras
		];
		return $this->view('XenAddons\AMS:Author', 'xa_ams_author_list', $viewParams);
	}
	
	public function actionAuthor(ParameterBag $params)
	{
		$this->assertNotEmbeddedImageRequest();
		
		/** @var \XF\Entity\User $user */
		$user = $this->assertRecordExists('XF:User', $params->user_id);
	
		/** @var \XenAddons\AMS\ControllerPlugin\AuthorArticleList $authorArticleListPlugin */
		$authorArticleListPlugin = $this->plugin('XenAddons\AMS:AuthorArticleList');
	
		$categoryParams = $authorArticleListPlugin->getCategoryListData();
		$viewableCategoryIds = $categoryParams['categories']->keys();
	
		$listParams = $authorArticleListPlugin->getAuthorArticleListData($viewableCategoryIds, $user);
	
		$this->assertValidPage($listParams['page'], $listParams['perPage'], $listParams['total'], 'ams/authors', $user);
		$this->assertCanonicalUrl($this->buildPaginatedLink('ams/authors', $user, $listParams['page']));
		
		$viewParams = $categoryParams + $listParams;
	
		return $this->view('XenAddons\AMS:Author\View', 'xa_ams_author_view', $viewParams);
	}
	
	public function actionFilters(ParameterBag $params)
	{
		/** @var \XF\Entity\User $user */
		$user = $this->assertRecordExists('XF:User', $params->user_id);
		
		/** @var \XenAddons\AMS\ControllerPlugin\AuthorArticleList $authorArticleListPlugin */
		$authorArticleListPlugin = $this->plugin('XenAddons\AMS:AuthorArticleList');
	
		return $authorArticleListPlugin->actionFilters($user);
	}	
	
	// Author Watch...
	public function actionWatch(ParameterBag $params)
	{
		$author = $this->assertRecordExists('XF:User', $params->user_id);
	
		$visitor = \XF::visitor();
	
		if (!$visitor->user_id || $visitor->user_id == $author->user_id)
		{
			return $this->noPermission();
		}
	
		if ($this->isPost())
		{
			if ($this->filter('stop', 'bool'))
			{
				$action = 'delete';
				$config = [];
			}
			else
			{
				$action = 'watch';
				$config = $this->filter([
					'notify_on' => 'str',
					'send_alert' => 'bool',
					'send_email' => 'bool'
				]);
			}
	
			/** @var \XenAddons\AMS\Repository\AuthorWatch $watchRepo */
			$watchRepo = $this->repository('XenAddons\AMS:AuthorWatch');
			$watchRepo->setWatchState($author, $visitor, $action, $config);
	
			$redirect = $this->redirect($this->buildLink('ams/authors', $author));
			$redirect->setJsonParam('switchKey', $action == 'delete' ? 'watch' : 'unwatch');
			return $redirect;
		}
		else
		{
			$viewParams = [
				'author' => $author,
				'isWatched' => !empty($author->AMSAuthorWatch[$author->user_id])
			];
			return $this->view('XenAddons\AMS:Author\Watch', 'xa_ams_author_watch', $viewParams);
		}
	}
	
	public function actionDrafts(ParameterBag $params)
	{
		/** @var \XenAddons\AMS\XF\Entity\User $visitor */
		$visitor = \XF::visitor();
		
		/** @var \XF\Entity\User $user */
		$user = $this->assertRecordExists('XF:User', $params->user_id);

		if (!$visitor->hasAmsArticlePermission('viewDraft')
			&& (!$visitor->user_id || $visitor->user_id != $user->user_id)
		)
		{
			throw $this->exception($this->noPermission());
		}
		
		$articleRepo = $this->getArticleRepo();
	
		$articleFinder = $articleRepo->findDraftsForUser($user);
		
		$page = $this->filterPage();
		$perPage = $this->options()->xaAmsArticlesPerPage;
	
		$articleFinder->limitByPage($page, $perPage);
		
		$drafts = $articleFinder->fetch()->filterViewable();
		$totalDrafts = $articleFinder->total();
		
		$categoryRepo = $this->getCategoryRepo();
		$categories = $categoryRepo->getViewableCategories();
		$categoryTree = $categoryRepo->createCategoryTree($categories);
		$categoryExtras = $categoryRepo->getCategoryListExtras($categoryTree);
		
		$viewParams = [
			'user' => $user,
			
			'drafts' =>  $drafts,
			
			'page' => $page,
			'perPage' => $perPage,
			'total' => $totalDrafts,
			
			'categories' => $categories,
			'categoryTree' => $categoryTree,
			'categoryExtras' => $categoryExtras
		];
	
		return $this->view('XenAddons\AMS:Author\Drafts', 'xa_ams_author_drafts', $viewParams);
	}

	public function actionAwaitingPublishing(ParameterBag $params)
	{
		/** @var \XenAddons\AMS\XF\Entity\User $visitor */
		$visitor = \XF::visitor();
	
		/** @var \XF\Entity\User $user */
		$user = $this->assertRecordExists('XF:User', $params->user_id);
	
		if (!$visitor->hasAmsArticlePermission('viewDraft') // yes, this is the correct permission as awaiting is still a DRAFT until published. 
			&& (!$visitor->user_id || $visitor->user_id != $user->user_id)
		)
		{
			throw $this->exception($this->noPermission());
		}
	
		$articleRepo = $this->getArticleRepo();
	
		$articleFinder = $articleRepo->findArticlesAwaitingPublishingForUser($user);
	
		$page = $this->filterPage();
		$perPage = $this->options()->xaAmsArticlesPerPage;
	
		$articleFinder->limitByPage($page, $perPage);
	
		$awaitingPublishing = $articleFinder->fetch()->filterViewable();
		$totalAwaitingPublishing = $articleFinder->total();
	
		$categoryRepo = $this->getCategoryRepo();
		$categories = $categoryRepo->getViewableCategories();
		$categoryTree = $categoryRepo->createCategoryTree($categories);
		$categoryExtras = $categoryRepo->getCategoryListExtras($categoryTree);
		
		$viewParams = [
			'user' => $user,
			
			'awaitingPublishing' =>  $awaitingPublishing,
			
			'page' => $page,
			'perPage' => $perPage,
			'total' => $totalAwaitingPublishing,
			
			'categories' => $categories,
			'categoryTree' => $categoryTree,
			'categoryExtras' => $categoryExtras
		];
	
		return $this->view('XenAddons\AMS:Author\ArticlesAwaitingPublishing', 'xa_ams_author_articles_awaiting_publishing', $viewParams);
	}	
	
	public function actionReviews(ParameterBag $params)
	{
		/** @var \XF\Entity\User $user */
		$user = $this->assertRecordExists('XF:User', $params->user_id);
	
		/** @var \XenAddons\AMS\ControllerPlugin\AuthorReviewList $authorReviewListPlugin */
		$authorReviewListPlugin = $this->plugin('XenAddons\AMS:AuthorReviewList');
	
		$categoryParams = $authorReviewListPlugin->getCategoryListData();
		$viewableCategoryIds = $categoryParams['categories']->keys();
	
		$listParams = $authorReviewListPlugin->getAuthorReviewListData($viewableCategoryIds, $user);
	
		$this->assertValidPage($listParams['page'], $listParams['perPage'], $listParams['total'], 'ams/authors/reviews', $user);
		$this->assertCanonicalUrl($this->buildPaginatedLink('ams/authors/reviews', $user, $listParams['page']));
	
		$viewParams = $categoryParams + $listParams;
	
		return $this->view('XenAddons\AMS:Author\Reviews', 'xa_ams_author_reviews', $viewParams);
	}
	
	public function actionReviewsFilters(ParameterBag $params)
	{
		/** @var \XF\Entity\User $user */
		$user = $this->assertRecordExists('XF:User', $params->user_id);
	
		/** @var \XenAddons\AMS\ControllerPlugin\AuthorReviewList $authorReviewListPlugin */
		$authorReviewListPlugin = $this->plugin('XenAddons\AMS:AuthorReviewList');
	
		return $authorReviewListPlugin->actionFilters($user);
	}
	
	public static function getActivityDetails(array $activities)
	{
		return \XF::phrase('xa_ams_viewing_articles');
	}
}