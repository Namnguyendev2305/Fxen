<?php
// FROM HASH: 359f175fba342c4a8a44ef0cf9b36a33
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Sửa từ khóa');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['thread'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

' . $__templater->callMacro('tag_macros', 'edit_form', array(
		'action' => $__templater->func('link', array('threads/tags', $__vars['thread'], ), false),
		'uneditableTags' => $__vars['uneditableTags'],
		'editableTags' => $__vars['editableTags'],
		'minTags' => $__vars['forum']['min_tags'],
		'tagList' => 'tagList--thread-' . $__vars['thread']['thread_id'],
	), $__vars) . '
';
	return $__finalCompiled;
}
);