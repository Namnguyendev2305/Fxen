<?php

namespace XenAddons\AMS\Entity;

use XF\Entity\AbstractPromptMap;
use XF\Mvc\Entity\Structure;

/**
 * COLUMNS
 * @property int $category_id
 * @property int $prompt_id
 *
 * RELATIONS
 * @property \XenAddons\AMS\Entity\ArticlePrompt $Prompt
 * @property \XenAddons\AMS\Entity\Category $Category
 */
class CategoryPrompt extends AbstractPromptMap
{
	public static function getContainerKey()
	{
		return 'category_id';
	}

	public static function getStructure(Structure $structure)
	{
		self::setupDefaultStructure($structure, 'xf_xa_ams_category_prompt', 'XenAddons\AMS:CategoryPrompt', 'XenAddons\AMS:ArticlePrompt');

		$structure->relations['Category'] = [
			'entity' => 'XenAddons\AMS:Category',
			'type' => self::TO_ONE,
			'conditions' => 'category_id',
			'primary' => true
		];

		return $structure;
	}
}