<?php

namespace XenAddons\AMS\Cron;

class AutoFeature
{
	public static function runAutoFeatureArticles()
	{
		$app = \XF::app();

		/** @var \XenAddons\AMS\Repository\Article $articleRepo */
		$articleRepo = $app->repository('XenAddons\AMS:Article');
		$articleRepo->autoFeatureArticles();
	}
}