<?php
// FROM HASH: 279bd7d357dd17e79c3ac88fb1e1987e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Welcome to ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '!' . '
' . 'Your reply to the article ' . $__templater->escape($__vars['content']['Content']['title']) . ' was submitted.' . '
<push:url>' . $__templater->func('link', array('canonical:ams/comments', $__vars['content'], ), true) . '</push:url>';
	return $__finalCompiled;
}
);