<?php
// FROM HASH: 4abb45d90ae5ba8c30e4c4e3393bb4a9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . 'New review on watched article' . '
</mail:subject>

';
	if ($__vars['review']['is_anonymous']) {
		$__finalCompiled .= '
	' . '<p>' . 'Anonymous' . ' posted a review on an article you are watching at ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . '.</p>' . '	
';
	} else {
		$__finalCompiled .= '
	' . '<p>' . $__templater->func('username_link_email', array($__vars['review']['User'], $__vars['review']['username'], ), true) . ' posted a review on an article you are watching at ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . '.</p>' . '
';
	}
	$__finalCompiled .= '

<h2><a href="' . $__templater->func('link', array('canonical:ams/review', $__vars['review'], ), true) . '">' . $__templater->escape($__vars['content']['title']) . '</a></h2>

';
	if ($__vars['xf']['options']['emailWatchedThreadIncludeMessage']) {
		$__finalCompiled .= '
	<div class="message">' . $__templater->func('bb_code_type', array('emailHtml', $__vars['review']['message'], 'ams_rating', $__vars['review'], ), true) . '</div>
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