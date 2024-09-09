<?php

namespace XenAddons\AMS\AdminSearch;

use XF\AdminSearch\AbstractPrompt;

class ArticlePrompt extends AbstractPrompt
{
	protected function getFinderName()
	{
		return 'XenAddons\AMS:ArticlePrompt';
	}

	public function getRelatedPhraseGroups()
	{
		return ['xa_ams_article_prompt'];
	}

	protected function getRouteName()
	{
		return 'xa-ams/prompts/edit';
	}

	public function isSearchable()
	{
		return \XF::visitor()->hasAdminPermission('articleManagementSystem');
	}
}