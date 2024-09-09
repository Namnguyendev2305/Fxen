<?php
// FROM HASH: 58ba9df06e006685b148120c07285f85
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . 'New comment on watched article' . '
</mail:subject>

' . '<p>' . $__templater->func('username_link_email', array($__vars['comment']['User'], $__vars['comment']['username'], ), true) . ' commented on an article you are watching at ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . '.</p>' . '

<h2><a href="' . $__templater->func('link', array('canonical:ams/comments', $__vars['comment'], ), true) . '">' . $__templater->escape($__vars['content']['title']) . '</a></h2>

';
	if ($__vars['xf']['options']['emailWatchedThreadIncludeMessage']) {
		$__finalCompiled .= '
	<div class="message">' . $__templater->func('bb_code_type', array('emailHtml', $__vars['comment']['message'], 'ams_comment', $__vars['comment'], ), true) . '</div>
';
	}
	$__finalCompiled .= '

' . $__templater->callMacro('xa_ams_article_macros', 'go_article_bar', array(
		'article' => $__vars['content'],
		'watchType' => 'article',
	), $__vars) . '
' . $__templater->callMacro('xa_ams_article_macros', 'watched_article_footer', array(
		'article' => $__vars['content'],
	), $__vars);
	return $__finalCompiled;
}
);