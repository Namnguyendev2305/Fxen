<?php
// FROM HASH: b5a410cbfd600e3dee330a2dfb82d37b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRadioRow(array(
		'name' => $__vars['inputName'] . '[type]',
		'value' => $__vars['option']['option_value']['type'],
	), array(array(
		'value' => '',
		'label' => 'Không có URL liên hệ',
		'_type' => 'option',
	),
	array(
		'value' => 'default',
		'label' => 'URL mặc định' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('link_type', array('public', 'canonical:misc/contact', ), true),
		'_type' => 'option',
	),
	array(
		'value' => 'custom',
		'label' => 'URL tùy chỉnh',
		'_dependent' => array($__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[custom]',
		'value' => $__vars['option']['option_value']['custom'],
	)), '
			' . $__templater->formCheckBox(array(
		'standalone' => 'true',
	), array(array(
		'name' => $__vars['inputName'] . '[overlay]',
		'selected' => $__vars['option']['option_value']['overlay'],
		'label' => 'Mở liên kết này trong lớp phủ (popup)',
		'_type' => 'option',
	))) . '
		'),
		'_type' => 'option',
	)), array(
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
		'rowclass' => $__vars['rowClass'],
	)) . '



';
	return $__finalCompiled;
}
);