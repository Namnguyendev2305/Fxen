<?php
// FROM HASH: 696b3455d2da0c5f9fd6b4473a2c9a98
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('tag_macros', 'list', array(
		'tags' => $__vars['series']['tags'],
		'tagList' => 'tagList--series-' . $__vars['series']['series_id'],
		'editLink' => ($__templater->method($__vars['series'], 'canEditTags', array()) ? $__templater->func('link', array('ams/series/tags', $__vars['series'], ), false) : ''),
	), $__vars);
	return $__finalCompiled;
}
);