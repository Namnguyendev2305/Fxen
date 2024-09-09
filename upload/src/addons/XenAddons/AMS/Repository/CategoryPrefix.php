<?php

namespace XenAddons\AMS\Repository;

use XF\Repository\AbstractPrefixMap;
use XF\Mvc\Entity\Finder;
use XF\Mvc\Entity\Repository;

class CategoryPrefix extends AbstractPrefixMap
{
	protected function getMapEntityIdentifier()
	{
		return 'XenAddons\AMS:CategoryPrefix';
	}

	protected function getAssociationsForPrefix(\XF\Entity\AbstractPrefix $prefix)
	{
		return $prefix->getRelation('CategoryPrefixes');
	}

	protected function updateAssociationCache(array $cache)
	{
		$categoryIds = array_keys($cache);
		$categories = $this->em->findByIds('XenAddons\AMS:Category', $categoryIds);

		foreach ($categories AS $category)
		{
			/** @var \XenAddons\AMS\Entity\Category $category */
			$category->prefix_cache = $cache[$category->category_id];
			$category->saveIfChanged();
		}
	}
}