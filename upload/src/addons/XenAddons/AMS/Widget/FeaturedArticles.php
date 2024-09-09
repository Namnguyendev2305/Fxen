<?php

namespace XenAddons\AMS\Widget;

use XF\Widget\AbstractWidget;
use XenAddons\AMS\Entity\Category;
use XenAddons\AMS\Entity\ArticleItem;

class FeaturedArticles extends AbstractWidget
{
	protected $defaultOptions = [
		'limit' => 5,
		'style' => 'simple',
		'require_cover_or_content_image' => false,
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
		$style = $options['style'];
		$categoryIds = $options['article_category_ids'];
		$prefixIds = $options['article_prefix_ids'];
		$tags = $options['tags'];
		
		$hasCategoryIds = ($categoryIds && !in_array(0, $categoryIds));
		$hasCategoryContext = (
			isset($this->contextParams['category'])
			&& $this->contextParams['category'] instanceof Category
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
		
		$articleRepo = $this->repository('XenAddons\AMS:Article');
		$finder = $articleRepo->findFeaturedArticles($sourceCategoryIds);
		
		if ($options['style'] != 'simple')
		{
			$finder->with('fullCategory');
		}
		
		if (!$useContext)
		{
			// with the context, we already fetched the category and permissions
			$finder->with('Category.Permissions|' . $visitor->permission_combination_id);
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
		
		$articles = $finder->fetch(max($limit * 2, 10));
		$articles = $articles->filter(
			function (ArticleItem $article) use ($visitor)
			{
				return (
					$article->canView() &&
					!$visitor->isIgnoring($article->user_id)
				);
			}
		);

		$total = $articles->count();
		$articles = $articles->slice(0, $limit, true);
		
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
		
		$viewParams = [
			'title' => $this->getTitle(),
			'articles' => $articles,
			'articlesCount' => $articles->count(),
			'style' => $style,
		];
		return $this->renderer('xa_ams_widget_featured_articles', $viewParams);
	}

	public function verifyOptions(\XF\Http\Request $request, array &$options, &$error = null)
	{
		$options = $request->filter([
			'limit' => 'uint',
			'style' => 'str',
			'require_cover_or_content_image' => 'bool',
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
	
	/**
	 * @return \XenAddons\AMS\Repository\Article
	 */
	protected function getArticleRepo()
	{
		return $this->repository('XenAddons\AMS:Article');
	}
}