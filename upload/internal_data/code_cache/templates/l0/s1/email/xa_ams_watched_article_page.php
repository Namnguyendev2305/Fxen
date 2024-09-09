<?php
// FROM HASH: 473b41a0d9510604959241c52237bfa6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . 'New page added to watched article' . '
</mail:subject>

' . '<p>' . $__templater->func('username_link_email', array($__vars['article']['User'], $__vars['article']['username'], ), true) . ' added a new page on an article you are watching at ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . '.</p>' . '

<h2><a href="' . $__templater->func('link', array('canonical:ams', $__vars['article'], array('article_page' => $__vars['page']['page_id'], ), ), true) . '">' . $__templater->escape($__vars['article']['title']) . ' - ' . $__templater->escape($__vars['page']['title']) . '</a></h2>

';
	if ($__vars['xf']['options']['emailWatchedThreadIncludeMessage']) {
		$__finalCompiled .= '
	<div class="message">' . $__templater->func('bb_code_type', array('emailHtml', $__vars['page']['message'], 'ams_page', $__vars['page'], ), true) . '</div>
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