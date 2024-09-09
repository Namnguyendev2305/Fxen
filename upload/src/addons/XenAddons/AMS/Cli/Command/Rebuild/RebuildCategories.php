<?php

namespace XenAddons\AMS\Cli\Command\Rebuild;

use XF\Cli\Command\Rebuild\AbstractRebuildCommand;

class RebuildCategories extends AbstractRebuildCommand
{
	protected function getRebuildName()
	{
		return 'xa-ams-categories';
	}

	protected function getRebuildDescription()
	{
		return 'Rebuilds ams category counters.';
	}

	protected function getRebuildClass()
	{
		return 'XenAddons\AMS:Category';
	}
}