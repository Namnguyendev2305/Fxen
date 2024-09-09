<?php

namespace XenAddons\AMS\Repository;

use XF\Repository\AbstractPromptMap;

class CategoryPrompt extends AbstractPromptMap
{
	protected function getMapEntityIdentifier()
	{
		return 'XenAddons\AMS:CategoryPrompt';
	}

	protected function getAssociations(\XF\Entity\AbstractPrompt $prompt)
	{
		return $prompt->getRelation('CategoryPrompts');
	}

	protected function updateAssociationCache(array $cache)
	{
		$categoryIds = array_keys($cache);
		$categories = $this->em->findByIds('XenAddons\AMS:Category', $categoryIds);

		foreach ($categories AS $category)
		{
			/** @var \XenAddons\AMS\Entity\Category $category */
			$category->prompt_cache = $cache[$category->category_id];
			$category->saveIfChanged();
		}
	}
}