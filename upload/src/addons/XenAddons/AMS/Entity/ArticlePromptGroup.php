<?php

namespace XenAddons\AMS\Entity;

use XF\Entity\AbstractPromptGroup;
use XF\Mvc\Entity\Structure;

/**
 * COLUMNS
 * @property int|null $prompt_group_id
 * @property int $display_order
 *
 * GETTERS
 * @property \XF\Phrase|string $title
 *
 * RELATIONS
 * @property \XF\Entity\Phrase $MasterTitle
 * @property \XF\Mvc\Entity\AbstractCollection|\XF\Entity\ThreadPrompt[] $Prompts
 */
class ArticlePromptGroup extends AbstractPromptGroup
{
	protected function getClassIdentifier()
	{
		return 'XenAddons\AMS:ArticlePrompt';
	}

	protected static function getContentType()
	{
		return 'ams_article';
	}

	public static function getStructure(Structure $structure)
	{
		self::setupDefaultStructure(
			$structure,
			'xf_xa_ams_article_prompt_group',
			'XenAddons\AMS:ArticlePromptGroup',
			'XenAddons\AMS:ArticlePrompt'
		);

		return $structure;
	}
}