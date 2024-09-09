<?php

namespace XenAddons\AMS\Job;

use XF\Job\AbstractRebuildJob;

class ArticleLocationData extends AbstractRebuildJob
{
	protected function getNextIds($start, $batch)
	{
		$db = $this->app->db();

		return $db->fetchAllColumn($db->limit(
			"
				SELECT article_id
				FROM xf_xa_ams_article
				WHERE article_id > ?
				ORDER BY article_id
			", $batch
		), $start);
	}

	protected function rebuildById($id)
	{
		/** @var \XenAddons\AMS\Entity\ArticleItem $article */
		$article = $this->app->em()->find('XenAddons\AMS:ArticleItem', $id);
		if ($article && $article->location)
		{
			$article->rebuildLocationData();
			$article->save();
		}
	}

	protected function getStatusType()
	{
		return \XF::phrase('xa_ams_articles');
	}
}