<?php
// FROM HASH: 8c5dad80fa275c7bb299629b4508fbe7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
	$__finalCompiled .= '

' . $__templater->callMacro('category_tree_macros', 'category_delete_form', array(
		'linkPrefix' => 'xa-ams/categories',
		'category' => $__vars['category'],
	), $__vars);
	return $__finalCompiled;
}
);