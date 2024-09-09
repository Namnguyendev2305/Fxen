<?php
// FROM HASH: d8ef244e62eea42f67a15dc64a45d6b1
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('xa_ams_editor_dialog_ams', 'page_list', array(
		'page' => $__vars['page'],
		'articlePages' => $__vars['articlePages'],
		'listClass' => 'js-browsePagesList',
		'link' => 'ams/dialog/browse-pages',
		'hasMore' => $__vars['hasMore'],
	), $__vars);
	return $__finalCompiled;
}
);