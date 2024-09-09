<?php
// FROM HASH: e8d3a38d639f2998a1dbc03bb101c873
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('tag_macros', 'list', array(
		'tags' => $__vars['article']['tags'],
		'tagList' => 'tagList--article-' . $__vars['article']['article_id'],
		'editLink' => ($__templater->method($__vars['article'], 'canEditTags', array()) ? $__templater->func('link', array('ams/tags', $__vars['article'], ), false) : ''),
	), $__vars);
	return $__finalCompiled;
}
);