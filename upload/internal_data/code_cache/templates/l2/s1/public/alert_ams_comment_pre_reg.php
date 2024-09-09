<?php
// FROM HASH: 0f9d7b52f4b221a8ba6072c0e4f30d9b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Welcome to ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '!' . '
' . 'Your reply to the article ' . (((('<a href="' . $__templater->func('link', array('ams/comments', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['content']['Content']['title'])) . '</a>') . ' was submitted.';
	return $__finalCompiled;
}
);