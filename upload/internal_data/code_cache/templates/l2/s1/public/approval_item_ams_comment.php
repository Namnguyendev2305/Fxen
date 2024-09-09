<?php
// FROM HASH: 5a38fb8c0edf0e4c4de08f96a88c5743
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('approval_queue_macros', 'item_message_type', array(
		'content' => $__vars['content'],
		'contentDate' => $__vars['content']['comment_date'],
		'user' => $__vars['content']['User'],
		'messageHtml' => $__templater->func('bb_code', array($__vars['content']['message'], 'ams_comment', $__vars['content'], ), false),
		'typePhraseHtml' => 'Article comment',
		'spamDetails' => $__vars['spamDetails'],
		'unapprovedItem' => $__vars['unapprovedItem'],
		'handler' => $__vars['handler'],
		'headerPhraseHtml' => 'Comment on article <a href="' . $__templater->func('link', array('ams/comments', $__vars['content'], ), true) . '">' . $__templater->escape($__vars['content']['Article']['title']) . '</a> by <a href="' . $__templater->func('link', array('members', $__vars['content']['Article']['User'], ), true) . '">' . $__templater->escape($__vars['content']['Article']['User']['username']) . '</a>',
	), $__vars);
	return $__finalCompiled;
}
);