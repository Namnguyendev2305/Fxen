<?php

namespace XenAddons\AMS\Job;

use XF\Job\AbstractRebuildJob;

class Series extends AbstractRebuildJob
{
	protected function getNextIds($start, $batch)
	{
		$db = $this->app->db();

		return $db->fetchAllColumn($db->limit(
			"
				SELECT series_id
				FROM xf_xa_ams_series
				WHERE series_id > ?
				ORDER BY series_id
			", $batch
		), $start);
	}

	protected function rebuildById($id)
	{
		/** @var \XenAddons\AMS\Entity\SeriesItem $series */
		$series = $this->app->em()->find('XenAddons\AMS:SeriesItem', $id);
		if ($series)
		{
			$series->rebuildCounters();
			$series->save();
		}
	}

	protected function getStatusType()
	{
		return \XF::phrase('xa_ams_series');
	}
}