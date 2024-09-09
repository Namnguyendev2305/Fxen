<?php

namespace XenAddons\AMS\Job;

use XF\Job\AbstractRebuildJob;

class UserArticleCount extends AbstractRebuildJob
{
	protected function getNextIds($start, $batch)
	{
		$db = $this->app->db();

		return $db->fetchAllColumn($db->limit(
			"
				SELECT user_id
				FROM xf_user
				WHERE user_id > ?
				ORDER BY user_id
			", $batch
		), $start);
	}

	protected function rebuildById($id)
	{
		/** @var \XenAddons\AMS\Repository\Article $articleRepo */
		$articleRepo = $this->app->repository('XenAddons\AMS:Article');
		$articleCount = $articleRepo->getUserArticleCount($id);
		
		/** @var \XenAddons\AMS\Repository\Series $seriesRepo */
		$seriesRepo = $this->app->repository('XenAddons\AMS:Series');
		$seriesCount = $seriesRepo->getUserSeriesCount($id);
		
		/** @var \XenAddons\AMS\Repository\Comment $commentRepo */
		$commentRepo = $this->app->repository('XenAddons\AMS:Comment');
		$commentCount = $commentRepo->getUserCommentCount($id);
		
		$this->app->db()->update('xf_user', [
			'xa_ams_article_count' => $articleCount,
			'xa_ams_series_count' => $seriesCount,
			'xa_ams_comment_count' => $commentCount
		], 'user_id = ?', $id);
	}

	protected function getStatusType()
	{
		return \XF::phrase('xa_ams_user_counts');
	}
}