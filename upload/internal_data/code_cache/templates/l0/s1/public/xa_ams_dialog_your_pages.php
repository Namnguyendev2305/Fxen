<?php
// FROM HASH: 7644e6d08118a711601db089a28df102
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('xa_ams_editor_dialog_ams', 'page_list', array(
		'page' => $__vars['page'],
		'articlePages' => $__vars['articlePages'],
		'listClass' => 'js-yourPagesList',
		'link' => 'ams/dialog/your-pages',
		'hasMore' => $__vars['hasMore'],
	), $__vars);
	return $__finalCompiled;
}
);