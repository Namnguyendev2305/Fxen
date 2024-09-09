<?php
// FROM HASH: 936dba116af52f0daecf9e7231cea960
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . '' . ($__templater->func('prefix', array('ams_article', $__vars['article'], 'escaped', ), true) . $__templater->escape($__vars['article']['title'])) . ' - Watched article updated' . '
</mail:subject>

' . '<p>' . $__templater->func('username_link_email', array($__vars['article']['User'], $__vars['article']['username'], ), true) . ' updated an article you are watching at ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . '.</p>' . '

<h2><a href="' . $__templater->func('link', array('canonical:ams', $__vars['article'], ), true) . '">' . $__templater->func('prefix', array('ams_article', $__vars['article'], 'escaped', ), true) . $__templater->escape($__vars['article']['title']) . '</a></h2>

';
	if ($__vars['xf']['options']['emailWatchedThreadIncludeMessage']) {
		$__finalCompiled .= '
	<div class="message">' . $__templater->func('bb_code_type', array('emailHtml', $__vars['article']['message'], 'ams_article', $__vars['article'], ), true) . '</div>
';
	}
	$__finalCompiled .= '

' . $__templater->callMacro('xa_ams_article_macros', 'go_article_bar', array(
		'article' => $__vars['article'],
		'watchType' => 'article',
	), $__vars) . '
' . $__templater->callMacro('xa_ams_article_macros', 'watched_article_footer', array(
		'article' => $__vars['article'],
	), $__vars);
	return $__finalCompiled;
}
);