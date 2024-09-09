<?php

namespace XenAddons\AMS\Widget;

use XF\Widget\AbstractWidget;

class ArticlesMap extends AbstractWidget
{
	protected $defaultOptions = [
		'order' => 'rating_weighted',
		'featured_articles_only' => false,
		'limit' => 100,
		'container_height' => 200,
		'block_title_link' => '',
		'article_category_ids' => [],
		'article_prefix_ids' => []
	];

	protected function getDefaultTemplateParams($context)
	{
		$params = parent::getDefaultTemplateParams($context);
		if ($context == 'options')
		{
			$categoryRepo = $this->app->repository('XenAddons\AMS:Category');
			$params['categoryTree'] = $categoryRepo->createCategoryTree($categoryRepo->findCategoryList()->fetch());
			
			$prefixListData = $this->getPrefixListData();
			$params['prefixGroups'] = $prefixListData['prefixGroups'];
			$params['prefixesGrouped'] = $prefixListData['prefixesGrouped'];
		}
		return $params;
	}
	
	protected function getPrefixListData()
	{
		/** @var \XenAddons\AMS\Repository\ArticlePrefix $prefixRepo */
		$prefixRepo = \XF::repository('XenAddons\AMS:ArticlePrefix');
		return $prefixRepo->getVisiblePrefixListData();
	}

	public function render()
	{
		/** @var \XenAddons\AMS\XF\Entity\User $visitor */
		$visitor = \XF::visitor();
		if (!method_exists($visitor, 'canViewAmsArticles') || !$visitor->canViewAmsArticles())
		{
			return '';
		}

		$options = $this->options;
		$limit = $options['limit'];
		$order = $options['order'] ? : 'rating_weighted';
		$featureArticlesOnly = $options['featured_articles_only'];
		$categoryIds = $options['article_category_ids'];
		$prefixIds = $options['article_prefix_ids'];

		/** @var \XenAddons\AMS\Finder\ArticleItem $finder */
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
		
		$articleFinder
			->where('article_state', 'visible')
			->where('location', '<>', '')
			->with('Category.Permissions|' . $visitor->permission_combination_id)
			->with('fullCategory')
			->order($order, 'desc');
		
		if ($categoryIds && !in_array(0, $categoryIds))
		{
			$articleFinder->where('category_id', $categoryIds);
		}
		
		if ($prefixIds && !in_array(0, $prefixIds))
		{
			$articleFinder->where('prefix_id', $prefixIds);
		}
		
		if ($featureArticlesOnly)
		{
			$articleFinder->with('Featured', true);
		}
		
		$articles = $articleFinder->fetch($limit)->filterViewable();
		
		/** @var \XenAddons\AMS\Entity\ArticleItem $article */
		foreach ($articles AS $articleId => $article)
		{
			if ($visitor->isIgnoring($article->user_id))
			{
				unset($articles[$articleId]);
			}
		}

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
		
		// check to see if there is a block_title_link to be used for the block header! 
		if (isset ($options['block_title_link']) && $options['block_title_link'])
		{
			$link = $options['block_title_link'];
		}
		else 
		{
			$router = $this->app->router('public');
			$link = $router->buildLink('ams');
		}
		
		$viewParams = [
			'title' => $this->getTitle(),
			'link' => $link,
			'mapItems' => $mapItems,
			'container_height' => $options['container_height'],
		];
		return $this->renderer('xa_ams_widget_articles_map', $viewParams);
	}

	public function verifyOptions(\XF\Http\Request $request, array &$options, &$error = null)
	{
		$options = $request->filter([
			'order' => 'str',
			'featured_articles_only' => 'bool',
			'limit' => 'uint',
			'container_height' => 'uint',
			'block_title_link' => 'str',
			'article_category_ids' => 'array-uint',
			'article_prefix_ids' => 'array-uint'
		]);
		if (in_array(0, $options['article_category_ids']))
		{
			$options['article_category_ids'] = [0];
		}
		if (in_array(0, $options['article_prefix_ids']))
		{
			$options['article_prefix_ids'] = [0];
		}
		if ($options['limit'] < 1)
		{
			$options['limit'] = 1;
		}

		return true;
	}
}