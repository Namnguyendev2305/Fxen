<?php
// FROM HASH: da57f460cf9e60b83f2a9c1caaa50d6e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit tags');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['article'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

' . $__templater->callMacro('tag_macros', 'edit_form', array(
		'action' => $__templater->func('link', array('ams/tags', $__vars['article'], ), false),
		'uneditableTags' => $__vars['uneditableTags'],
		'editableTags' => $__vars['editableTags'],
		'minTags' => $__vars['category']['min_tags'],
		'tagList' => 'tagList--article-' . $__vars['article']['article_id'],
	), $__vars);
	return $__finalCompiled;
}
);