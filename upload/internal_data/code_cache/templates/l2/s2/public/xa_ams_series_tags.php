<?php
// FROM HASH: 4341899f8fc2c18c2aef4cc81fe6a6a9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Sửa từ khóa');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['series'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

' . $__templater->callMacro('tag_macros', 'edit_form', array(
		'action' => $__templater->func('link', array('ams/series/tags', $__vars['series'], ), false),
		'uneditableTags' => $__vars['uneditableTags'],
		'editableTags' => $__vars['editableTags'],
		'minTags' => $__vars['xf']['options']['xaAmsSeriesMinTags'],
		'tagList' => 'tagList--series-' . $__vars['series']['series_id'],
	), $__vars);
	return $__finalCompiled;
}
);