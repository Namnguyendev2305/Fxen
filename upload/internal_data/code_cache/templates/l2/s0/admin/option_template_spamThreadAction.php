<?php
// FROM HASH: d8e5a5daf7f87fb9ffd5150b7b5fb8f1
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = array(array(
		'value' => '0',
		'label' => '&nbsp;',
		'_type' => 'option',
	));
	$__compilerTemp2 = $__templater->method($__vars['nodeTree'], 'getFlattened', array());
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['treeEntry']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['treeEntry']['record']['node_id'],
				'disabled' => ($__vars['treeEntry']['record']['node_type_id'] != 'Forum'),
				'label' => '
					' . $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']) . '
				',
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp1 = $__templater->mergeChoiceOptions($__compilerTemp1, $__vars['formatParams']);
	$__finalCompiled .= $__templater->formRadioRow(array(
		'name' => $__vars['inputName'] . '[action]',
		'value' => $__vars['option']['option_value']['action'],
	), array(array(
		'value' => 'delete',
		'label' => 'Xóa vĩnh viễn',
		'_type' => 'option',
	),
	array(
		'value' => 'soft-delete',
		'label' => 'Không hiển thị công cộng',
		'_type' => 'option',
	),
	array(
		'value' => 'move',
		'label' => 'Chuyển đến chuyên mục',
		'_dependent' => array($__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[node_id]',
		'value' => $__vars['option']['option_value']['node_id'],
	), $__compilerTemp1)),
		'_type' => 'option',
	)), array(
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
		'rowclass' => $__vars['rowClass'],
	));
	return $__finalCompiled;
}
);