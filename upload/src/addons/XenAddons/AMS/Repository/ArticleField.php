<?php

namespace XenAddons\AMS\Repository;

use XF\Repository\AbstractField;

class ArticleField extends AbstractField
{
	protected function getRegistryKey()
	{
		return 'xa_amsArticleFields';
	}

	protected function getClassIdentifier()
	{
		return 'XenAddons\AMS:ArticleField';
	}

	public function getDisplayGroups()
	{
		return [
			'header' => \XF::phrase('xa_ams_article_header'),
			'above_article' => \XF::phrase('xa_ams_above_article'),
			'below_article' => \XF::phrase('xa_ams_below_article'),
			'sidebar' => \XF::phrase('xa_ams_sidebar_block'),
			'new_tab' => \XF::phrase('xa_ams_own_tab'),
			'self_place' => \XF::phrase('xa_ams_self_placement'),
		];
	}
	
	public function getArticleFieldValues($articleId)
	{
		$fields = $this->db()->fetchAll('
			SELECT field_value.*, field.field_type
			FROM xf_xa_ams_article_field_value AS field_value
			INNER JOIN xf_xa_ams_article_field AS field ON (field.field_id = field_value.field_id)
			WHERE field_value.article_id = ?
		', $articleId);
	
		$values = [];
		foreach ($fields AS $field)
		{
			if ($field['field_type'] == 'checkbox' || $field['field_type'] == 'multiselect')
			{
				$values[$field['field_id']] = \XF\Util\Php::safeUnserialize($field['field_value']);
			}
			else
			{
				$values[$field['field_id']] = $field['field_value'];
			}
		}
		return $values;
	}
	
	public function rebuildArticleFieldValuesCache($articleId)
	{
		$cache = $this->getArticleFieldValues($articleId);
	
		$this->db()->update('xf_xa_ams_article',
			['custom_fields' => json_encode($cache)],
			'article_id = ?', $articleId
		);
	}	
}