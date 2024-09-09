<?php
// FROM HASH: 5e24077e1e800e80b6dbc982afa6770a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Welcome to ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '!' . '
' . 'Your review to the article ' . ((((('<a href="' . $__templater->func('link', array('ams/review', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->func('prefix', array('ams_article', $__vars['content']['Article'], ), true)) . $__templater->escape($__vars['content']['Article']['title'])) . '</a>') . ' was submitted.';
	return $__finalCompiled;
}
);