<?php

namespace XenAddons\AMS\Repository;

use XF\Repository\AbstractPrompt;

class ArticlePrompt extends AbstractPrompt
{
	protected function getClassIdentifier()
	{
		return 'XenAddons\AMS:ArticlePrompt';
	}
}