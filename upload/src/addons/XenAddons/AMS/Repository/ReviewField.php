<?php

namespace XenAddons\AMS\Repository;

use XF\Repository\AbstractField;

class ReviewField extends AbstractField
{
	protected function getRegistryKey()
	{
		return 'xa_amsReviewFields';
	}

	protected function getClassIdentifier()
	{
		return 'XenAddons\AMS:ReviewField';
	}

	public function getDisplayGroups()
	{
		return [
			'top' => \XF::phrase('xa_ams_top_below_rating'),
			'middle' => \XF::phrase('xa_ams_middle_above_review'),
			'bottom' => \XF::phrase('xa_ams_bottom_below_review'),
			'self_place' => \XF::phrase('xa_ams_self_placement'),
		];
	}
	
	public function getReviewFieldValues($ratingId)
	{
		$fields = $this->db()->fetchAll('
			SELECT field_value.*, field.field_type
			FROM xf_xa_ams_review_field_value AS field_value
			INNER JOIN xf_xa_ams_review_field AS field ON (field.field_id = field_value.field_id)
			WHERE field_value.rating_id = ?
		', $ratingId);
	
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
	
	public function rebuildReviewFieldValuesCache($ratingId)
	{
		$cache = $this->getReviewFieldValues($ratingId);
	
		$this->db()->update('xf_xa_ams_article_rating',
			['custom_fields' => json_encode($cache)],
			'rating_id = ?', $ratingId
		);
	}	
}