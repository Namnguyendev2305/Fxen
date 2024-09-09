<?php
// FROM HASH: 35a48330659ca72537b310f986677687
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . '' . ($__templater->func('prefix', array('ams_article', $__vars['article'], 'escaped', ), true) . $__templater->escape($__vars['article']['title'])) . ' - New article posted by watched author' . '
</mail:subject>

' . '<p>' . $__templater->func('username_link_email', array($__vars['article']['User'], $__vars['article']['username'], ), true) . ' added an article at ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . '.</p>' . '

<h2><a href="' . $__templater->func('link', array('canonical:ams', $__vars['article'], ), true) . '">' . $__templater->func('prefix', array('ams_article', $__vars['article'], 'escaped', ), true) . $__templater->escape($__vars['article']['title']) . '</a></h2>

';
	if ($__vars['xf']['options']['emailWatchedThreadIncludeMessage'] AND $__vars['article']['description']) {
		$__finalCompiled .= '
	<div class="message">' . $__templater->filter($__templater->func('structured_text', array($__vars['article']['description'], ), false), array(array('raw', array()),), true) . '</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['xf']['options']['emailWatchedThreadIncludeMessage']) {
		$__finalCompiled .= '
	<div class="message">' . $__templater->func('bb_code_type', array('emailHtml', $__vars['article']['message'], 'ams_article', $__vars['article'], ), true) . '</div>
';
	}
	$__finalCompiled .= '

' . $__templater->callMacro('xa_ams_article_macros', 'go_article_bar', array(
		'article' => $__vars['article'],
		'watchType' => 'author',
	), $__vars) . '
' . $__templater->callMacro('xa_ams_article_macros', 'watched_article_footer', array(
		'article' => $__vars['article'],
	), $__vars);
	return $__finalCompiled;
}
);