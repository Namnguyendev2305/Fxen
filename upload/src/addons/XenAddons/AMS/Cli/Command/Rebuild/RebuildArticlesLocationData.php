<?php

namespace XenAddons\AMS\Cli\Command\Rebuild;

use XF\Cli\Command\Rebuild\AbstractRebuildCommand;

class RebuildArticlesLocationData extends AbstractRebuildCommand
{
	protected function getRebuildName()
	{
		return 'xa-ams-articles-location-data';
	}

	protected function getRebuildDescription()
	{
		return 'Rebuilds ams article location data.';
	}

	protected function getRebuildClass()
	{
		return 'XenAddons\AMS:ArticleLocationData';
	}
}