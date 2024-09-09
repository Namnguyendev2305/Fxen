<?php
// FROM HASH: 16470c534a75ca0b7108bde712be3dd6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => $__vars['formBaseKey'] . '[author_rating]',
		'selected' => $__vars['property']['property_value']['author_rating'],
		'label' => '
		' . 'Author rating' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[rating_avg]',
		'selected' => $__vars['property']['property_value']['rating_avg'],
		'label' => '
		' . 'Avg rating' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[username]',
		'selected' => $__vars['property']['property_value']['username'],
		'label' => '
		' . 'Username' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[publish_date]',
		'selected' => $__vars['property']['property_value']['publish_date'],
		'label' => '
		' . 'Publish date' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[article_read_time]',
		'selected' => $__vars['property']['property_value']['article_read_time'],
		'label' => '
		' . 'Article read time' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[category_title]',
		'selected' => $__vars['property']['property_value']['category_title'],
		'label' => '
		' . 'Category' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[share_this_article]',
		'selected' => $__vars['property']['property_value']['share_this_article'],
		'label' => '
		' . 'Share this article' . '
	',
		'_type' => 'option',
	)), array(
		'rowclass' => $__vars['rowClass'],
		'label' => $__templater->escape($__vars['titleHtml']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['property']['description']),
	));
	return $__finalCompiled;
}
);