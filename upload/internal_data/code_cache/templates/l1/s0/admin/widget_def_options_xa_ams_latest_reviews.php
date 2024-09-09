<?php
// FROM HASH: a1f782454a9a462d6135834f64299a4e
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
		'label' => 'Latest reviews limit',
		'explain' => 'Specify the maximum number of reviews that should be shown in this widget.',
	)) . '

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[cutOffDays]',
		'value' => $__vars['options']['cutOffDays'],
		'min' => '0',
	), array(
		'label' => 'Cut off days',
		'explain' => 'This is the number of days old that a review can be in order for it to be fetched.  Reviews that are older than the cutoff date will not be displayed.  Leave this option set to 0 to bypass the cut off date.',
	)) . '

';
	$__compilerTemp1 = array(array(
		'value' => '0',
		'label' => 'All categories or contextual category',
		'_type' => 'option',
	));
	$__compilerTemp2 = $__templater->method($__vars['categoryTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['treeEntry']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['treeEntry']['record']['category_id'],
				'label' => '
			' . $__templater->filter($__templater->func('repeat', array('&nbsp;&nbsp;', $__vars['treeEntry']['depth'], ), false), array(array('raw', array()),), true) . $__templater->escape($__vars['treeEntry']['record']['title']) . '
		',
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formSelectRow(array(
		'name' => 'options[article_category_ids][]',
		'value' => ($__vars['options']['article_category_ids'] ?: 0),
		'multiple' => 'multiple',
		'size' => '7',
	), $__compilerTemp1, array(
		'label' => 'Category limit',
		'explain' => 'If no categories are explicitly selected, this widget will pull from all categories unless used within an AMS category. In this case, the content will be limited to that category and descendents.',
	));
	return $__finalCompiled;
}
);