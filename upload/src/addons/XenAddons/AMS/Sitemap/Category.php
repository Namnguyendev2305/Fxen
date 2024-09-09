<?php

namespace XenAddons\AMS\Sitemap;

use XF\Sitemap\AbstractHandler;
use XF\Sitemap\Entry;

class Category extends AbstractHandler
{
	public function getRecords($start)
	{
		$app = $this->app;
		$user = \XF::visitor();

		$ids = $this->getIds('xf_xa_ams_category', 'category_id', $start);

		$finder = $app->finder('XenAddons\AMS:Category');
		$categories = $finder
			->where('category_id', $ids)
			->with(['Permissions|' . $user->permission_combination_id])
			->order('category_id')
			->fetch();

		return $categories;
	}

	public function getEntry($record)
	{
		/** @var \XenAddons\AMS\Entity\Category $record */
		$url = $this->app->router('public')->buildLink('canonical:ams/categories', $record);
		return Entry::create($url);
	}

	public function isIncluded($record)
	{
		/** @var \XenAddons\AMS\Entity\Category $record */
		if (!$record->isSearchEngineIndexable())
		{
			return false;
		}
		
		return $record->canView();
	}
}