<?php
// FROM HASH: 85e1ab944ba334f728ed43bc67d4b068
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('xa_ams_editor_dialog_ams', 'article_list', array(
		'page' => $__vars['page'],
		'articles' => $__vars['articles'],
		'listClass' => 'js-yourArticlesList',
		'link' => 'ams/dialog/yours',
		'hasMore' => $__vars['hasMore'],
	), $__vars);
	return $__finalCompiled;
}
);