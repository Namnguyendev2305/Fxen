<?php
// FROM HASH: 63ffb2433950171006498c787743c842
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[limit]',
		'value' => $__vars['options']['limit'],
		'min' => '1',
	), array(
		'label' => 'Maximum entries',
	)) . '

' . $__templater->formRadioRow(array(
		'name' => 'options[style]',
		'value' => ($__vars['options']['style'] ?: 'simple'),
	), array(array(
		'value' => 'simple',
		'label' => 'Simple',
		'hint' => 'A simple view, designed for narrow spaces such as sidebars.',
		'_type' => 'option',
	),
	array(
		'value' => 'full',
		'label' => 'Standard',
		'hint' => 'A full size view, displaying as a standard thread list.',
		'_type' => 'option',
	)), array(
		'label' => 'Display style',
	)) . '

' . $__templater->formRadioRow(array(
		'name' => 'options[filter]',
		'value' => ($__vars['options']['filter'] ?: 'latest'),
	), array(array(
		'value' => 'latest',
		'label' => 'Mới nhất',
		'hint' => 'A list of any thread which have been recently posted in (default for guests).',
		'_type' => 'option',
	),
	array(
		'value' => 'unread',
		'label' => 'Chưa đọc',
		'hint' => 'A list of threads which contain unread posts.',
		'_type' => 'option',
	),
	array(
		'value' => 'watched',
		'label' => 'Đã theo dõi',
		'hint' => 'A list of threads the user is watching that have been recently posted in.',
		'_type' => 'option',
	)), array(
		'label' => 'Lọc',
	)) . '

';
	$__compilerTemp1 = array(array(
		'value' => '',
		'label' => 'Tất cả diễn đàn',
		'_type' => 'option',
	));
	$__compilerTemp2 = $__templater->method($__vars['nodeTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['treeEntry']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['treeEntry']['record']['node_id'],
				'disabled' => ($__vars['treeEntry']['record']['node_type_id'] != 'Forum'),
				'label' => '
			' . $__templater->filter($__templater->func('repeat', array('&nbsp;&nbsp;', $__vars['treeEntry']['depth'], ), false), array(array('raw', array()),), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']) . '
		',
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formSelectRow(array(
		'name' => 'options[node_ids][]',
		'value' => ($__vars['options']['node_ids'] ?: ''),
		'multiple' => 'multiple',
		'size' => '7',
	), $__compilerTemp1, array(
		'label' => 'Forum limit',
		'explain' => 'Only include threads in the selected forums.',
	));
	return $__finalCompiled;
}
);