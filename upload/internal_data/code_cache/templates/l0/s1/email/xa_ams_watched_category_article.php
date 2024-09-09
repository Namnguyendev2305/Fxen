<?php
// FROM HASH: 37c4b18db898afee673d08d3d25327f5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . '' . ($__templater->func('prefix', array('ams_article', $__vars['article'], 'escaped', ), true) . $__templater->escape($__vars['article']['title'])) . ' - New article in watched category' . '
</mail:subject>

' . '<p>' . $__templater->func('username_link_email', array($__vars['article']['User'], $__vars['article']['username'], ), true) . ' added an article to a category you are watching at ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . '.</p>' . '

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
		'watchType' => 'category',
	), $__vars) . '

' . $__templater->callMacro('xa_ams_article_macros', 'watched_category_footer', array(
		'category' => $__vars['category'],
		'article' => $__vars['article'],
	), $__vars);
	return $__finalCompiled;
}
);