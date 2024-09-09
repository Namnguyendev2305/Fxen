<?php

namespace XenAddons\AMS\Sitemap;

use XF\Sitemap\AbstractHandler;
use XF\Sitemap\Entry;

class Series extends AbstractHandler
{
	public function getRecords($start)
	{
		$app = $this->app;
		$user = \XF::visitor();

		$ids = $this->getIds('xf_xa_ams_series', 'series_id', $start);

		$finder = $app->finder('XenAddons\AMS:SeriesItem');
		$series = $finder
			->where('series_id', $ids)
			->order('series_id')
			->fetch();

		return $series;
	}

	/**
	 * @param $record \XenAddons\AMS\Entity\SeriesItem
	 *
	 * @return Entry
	 */
	public function getEntry($record)
	{
		/** @var \XenAddons\AMS\Entity\SeriesItem $record */
		return Entry::create($record->getContentUrl(true), [
			'lastmod' => $record->edit_date
		]);
	}

	public function isIncluded($record)
	{
		/** @var $record \XenAddons\AMS\Entity\SeriesItem */
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