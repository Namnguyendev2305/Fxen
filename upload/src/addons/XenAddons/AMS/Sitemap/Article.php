<?php

namespace XenAddons\AMS\Sitemap;

use XF\Sitemap\AbstractHandler;
use XF\Sitemap\Entry;

class Article extends AbstractHandler
{
	public function getRecords($start)
	{
		$app = $this->app;
		$user = \XF::visitor();

		$ids = $this->getIds('xf_xa_ams_article', 'article_id', $start);

		$finder = $app->finder('XenAddons\AMS:ArticleItem');
		$articles = $finder
			->where('article_id', $ids)
			->with(['Category', 'Category.Permissions|' . $user->permission_combination_id])
			->order('article_id')
			->fetch();

		return $articles;
	}

	public function getEntry($record)
	{
		/** @var \XenAddons\AMS\Entity\ArticleItem $record */
		return Entry::create($record->getContentUrl(true), [
			'lastmod' => $record->last_update
		]);
	}

	public function isIncluded($record)
	{
		/** @var \XenAddons\AMS\Entity\ArticleItem $record */
		if (
			!$record->isVisible() ||
			!$record->isSearchEngineIndexable()
		)
		{
			return false;
		}
		return $record->canView();
	}
}