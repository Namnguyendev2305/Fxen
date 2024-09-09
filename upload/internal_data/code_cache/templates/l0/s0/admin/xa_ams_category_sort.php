<?php
// FROM HASH: f58a2d3dc3cc5d3f22c673d55b4e0846
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Sort categories');
	$__finalCompiled .= '

' . $__templater->callMacro('category_tree_macros', 'sortable_form', array(
		'categoryTree' => $__vars['categoryTree'],
		'linkPrefix' => 'xa-ams/categories',
	), $__vars);
	return $__finalCompiled;
}
);