<?php
// FROM HASH: 8c12185358a0fd4c9daf5f35a7836a67
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('xa_ams_editor_dialog_ams', 'article_list', array(
		'page' => $__vars['page'],
		'articles' => $__vars['articles'],
		'listClass' => 'js-browseArticlesList',
		'link' => 'ams/dialog/browse',
		'hasMore' => $__vars['hasMore'],
	), $__vars);
	return $__finalCompiled;
}
);