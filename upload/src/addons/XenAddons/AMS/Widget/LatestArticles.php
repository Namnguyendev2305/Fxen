<?php

namespace XenAddons\AMS\Widget;

use XF\Widget\AbstractWidget;

class LatestArticles extends AbstractWidget
{
	protected $defaultOptions = [
		'order' => 'last_update',
		'limit' => 5,
		'exclude_featured' => false,
		'cutOffDays' => 0,
		'style' => 'simple',
		'require_cover_or_content_image' => false,
		'block_title_link' => '',
		'article_category_ids' => [],
		'article_prefix_ids' => [],
		'tags' => '',
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
		$cutOffDays = $options['cutOffDays'];
		$order = $options['order'] ? : 'last_update';
		$categoryIds = $options['article_category_ids'];
		$prefixIds = $options['article_prefix_ids'];
		$tags = $options['tags'];

		$hasCategoryIds = ($categoryIds && !in_array(0, $categoryIds));
		$hasCategoryContext = (
			isset($this->contextParams['category'])
			&& $this->contextParams['category'] instanceof \XenAddons\AMS\Entity\Category
		);
		$useContext = false;
		$category = null;
		
		if (!$hasCategoryIds && $hasCategoryContext)
		{
			/** @var \XenAddons\AMS\Entity\Category $category */
			$category = $this->contextParams['category'];
			$viewableDescendents = $category->getViewableDescendants();
			$sourceCategoryIds = array_keys($viewableDescendents);
			$sourceCategoryIds[] = $category->category_id;
		
			$useContext = true;
		}
		else if ($hasCategoryIds)
		{
			$sourceCategoryIds = $categoryIds;
		}
		else
		{
			$sourceCategoryIds = null;
		}
		
		/** @var \XenAddons\AMS\Finder\ArticleItem $finder */
		$finder = $this->finder('XenAddons\AMS:ArticleItem');
		
		$finder
			->where('article_state', 'visible')
			->with('User');

		if (is_array($sourceCategoryIds))
		{
			$finder->where('category_id', $sourceCategoryIds);
		}
		else
		{
			$finder->with('Category.Permissions|' . \XF::visitor()->permission_combination_id);
		}
		
		if (!$useContext)
		{
			// with the context, we already fetched the category and permissions
			$finder->with('Category.Permissions|' . $visitor->permission_combination_id);
		}
		
		if ($cutOffDays)
		{
			$cutOffDate = \XF::$time - ($cutOffDays * 86400);
			$finder->where('last_update', '>', $cutOffDate);
		}
		
		if ($order == 'random')
		{
			$finder->order($finder->expression('RAND()'));
		}	
		else 
		{	
			$finder->order($order, 'desc');
		}

		if ($tags)
		{
			/** @var \XF\Repository\Tag $tagRepo */
			$tagRepo = $this->repository('XF:Tag');
		
			$tags = $tagRepo->splitTagList($tags);
		
			if ($tags)
			{
				$validTags = $tagRepo->getTags($tags, $notFound);
				if ($notFound)
				{
					// if they entered an unknown tag, we don't want to ignore it, so we need to force no results
					$finder->whereImpossible();
				}
				else
				{
					foreach (array_keys($validTags) AS $tagId)
					{
						$finder->with('Tags|' . $tagId, true);
					}
				}
			}
		}
		
		if ($prefixIds && !in_array(0, $prefixIds))
		{
			$finder->where('prefix_id', $prefixIds);
		}
		
		if ($options['require_cover_or_content_image'])
		{
			$finder->whereOr(
				['cover_image_id', '!=', 0],
				['Category.content_image_url', '!=', '']
			);
		}

		if ($options['style'] != 'simple')
		{
			$finder->with('fullCategory');
		}

		$articles = $finder->fetch(max($limit * 2, 10));

		/** @var \XenAddons\AMS\Entity\ArticleItem $article */
		foreach ($articles AS $articleId => $article)
		{
			if (
				!$article->canView() 
				|| $visitor->isIgnoring($article->user_id)
				|| ($options['exclude_featured'] && $article->Featured)
			)
			{
				unset($articles[$articleId]);
			}
		}
		
		foreach ($articles AS $article)
		{
			if (!$article->canViewFullArticle())
			{
				$snippet = $this->app->stringFormatter()->wholeWordTrim($article->message, $this->app->options()->xaAmsLimitedViewArticleLength);
				if (strlen($snippet) < strlen($article->message))
				{
					$article->message = $this->app->bbCode()->render($snippet, 'bbCodeClean', 'ams_article', null);
				}
			}
		}
		
		$total = $articles->count();
		$articles = $articles->slice(0, $limit, true);
		
		// check to see if there is a block_title_link to be used for the block header! 
		if (isset ($options['block_title_link']) && $options['block_title_link'])
		{
			$link = $options['block_title_link'];
		}
		else 
		{
			$router = $this->app->router('public');
			$link = $router->buildLink('whats-new/ams-articles', null, ['skip' => 1]);
		}
		
		$viewParams = [
			'title' => $this->getTitle(),
			'link' => $link,
			'articles' => $articles,
			'articlesCount' => $articles->count(),
			'style' => $options['style'],
		];
		return $this->renderer('xa_ams_widget_latest_articles', $viewParams);
	}

	public function verifyOptions(\XF\Http\Request $request, array &$options, &$error = null)
	{
		$options = $request->filter([
			'order' => 'str',
			'limit' => 'uint',
			'exclude_featured' => 'bool',
			'cutOffDays' => 'uint',
			'style' => 'str',
			'require_cover_or_content_image' => 'bool',
			'block_title_link' => 'str',
			'article_category_ids' => 'array-uint',
			'article_prefix_ids' => 'array-uint',
			'tags' => 'str'
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