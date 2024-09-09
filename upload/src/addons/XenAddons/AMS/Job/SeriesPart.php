<?php

namespace XenAddons\AMS\Job;

use XF\Job\AbstractRebuildJob;

class SeriesPart extends AbstractRebuildJob
{
	protected function getNextIds($start, $batch)
	{
		$db = $this->app->db();

		return $db->fetchAllColumn($db->limit(
			"
				SELECT series_part_id
				FROM xf_xa_ams_series_part
				WHERE series_part_id > ?
				ORDER BY series_part_id
			", $batch
		), $start);
	}

	protected function rebuildById($id)
	{
		/** @var \XenAddons\AMS\Entity\SeriesPart $seriesPart */
		$seriesPart = $this->app->em()->find('XenAddons\AMS:SeriesPart', $id, ['Article']);
		
		if ($seriesPart)
		{
			if ($seriesPart->Article)
			{
				// check to see if the article is visible, if not, we want to remove the article from the series using the Series Part Deleter Service!
				if (!$seriesPart->Article->isVisible())
				{
					/** @var \XenAddons\AMS\Service\SeriesPart\Deleter $deleter */
					$deleter = $this->app->service('XenAddons\AMS:SeriesPart\Deleter', $seriesPart);
					
					$deleter->delete();
				}
			}
		}
	}

	protected function getStatusType()
	{
		return \XF::phrase('xa_ams_series_part');
	}
}