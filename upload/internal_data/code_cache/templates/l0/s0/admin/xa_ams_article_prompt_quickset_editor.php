<?php
// FROM HASH: c456f12a71b4a3b43bcb82125a8a030d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['extraOptions'] = $__templater->preEscaped('
		' . $__templater->formCheckBoxRow(array(
		'name' => 'apply_category_ids',
	), array(array(
		'label' => 'Apply category options',
		'_dependent' => array('
					' . $__templater->callMacro('xa_ams_article_prefix_edit_macros', 'category_ids', array(
		'categoryIds' => $__vars['prefix']['category_ids'],
		'categoryTree' => $__vars['categoryTree'],
		'withRow' => false,
	), $__vars) . '
				'),
		'_type' => 'option',
	)), array(
		'label' => 'Applicable categories',
	)) . '
	');
	$__finalCompiled .= $__templater->includeTemplate('base_prompt_quickset_editor', $__compilerTemp1);
	return $__finalCompiled;
}
);