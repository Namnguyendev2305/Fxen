<?php
// FROM HASH: 75ec7780c7fa6f790490e7979672b28d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('xa_ams_comment_macros', 'comment', array(
		'comment' => $__vars['comment'],
		'content' => $__vars['content'],
		'linkPrefix' => 'ams/article-comments',
	), $__vars);
	return $__finalCompiled;
}
);