<?php
// FROM HASH: 142fbc1881d4dd027b9c06e5a83044cd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => $__vars['formBaseKey'] . '[share_article_block]',
		'selected' => $__vars['property']['property_value']['share_article_block'],
		'label' => '
		' . 'Enable "Share this article" block' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[url_bb_code]',
		'selected' => $__vars['property']['property_value']['url_bb_code'],
		'label' => '
		' . 'URL BB code' . '
	',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['formBaseKey'] . '[ams_bb_code]',
		'selected' => $__vars['property']['property_value']['ams_bb_code'],
		'label' => '
		' . 'AMS BB code' . '
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