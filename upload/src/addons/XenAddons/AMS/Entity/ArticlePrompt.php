<?php

namespace XenAddons\AMS\Entity;

use XF\Entity\AbstractPrompt;
use XF\Mvc\Entity\Structure;

/**
 * COLUMNS
 * @property int|null $prompt_id
 * @property int $prompt_group_id
 * @property int $display_order
 * @property int $materialized_order
 *
 * GETTERS
 * @property \XF\Phrase|string $title
 *
 * RELATIONS
 * @property \XF\Entity\Phrase $MasterTitle
 * @property \XF\Entity\ThreadPromptGroup $PromptGroup
 * @property \XF\Mvc\Entity\AbstractCollection|\XF\Entity\ForumPrompt[] $ForumPrompts
 */
class ArticlePrompt extends AbstractPrompt
{
	protected function getClassIdentifier()
	{
		return 'XenAddons\AMS:ArticlePrompt';
	}

	protected static function getContentType()
	{
		return 'ams_article';
	}
	
	/**
	 * @return array
	 */
	public function getCategoryIds()
	{
		if (!$this->prompt_id)
		{
			return [];
		}
	
		return $this->db()->fetchAllColumn("
			SELECT category_id
			FROM xf_xa_ams_category_prompt
			WHERE prompt_id = ?
		", $this->prompt_id);
	}

	protected function _postDelete()
	{
		parent::_postDelete();
		
		$this->repository('XenAddons\AMS:CategoryPrompt')->removePromptAssociations($this);
	}

	public static function getStructure(Structure $structure)
	{
		self::setupDefaultStructure($structure, 'xf_xa_ams_article_prompt', 'XenAddons\AMS:ArticlePrompt');

		$structure->getters['category_ids'] = true;
		
		$structure->relations['CategoryPrompts'] = [
			'entity' => 'XenAddons\AMS:CategoryPrompt',
			'type' => self::TO_MANY,
			'conditions' => 'prompt_id'
		];

		return $structure;
	}
}