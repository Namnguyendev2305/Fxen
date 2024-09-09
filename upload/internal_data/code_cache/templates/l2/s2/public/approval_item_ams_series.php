<?php
// FROM HASH: 93981efe9849a0ab754afccf2955d906
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__vars['messageHtml'] = $__templater->preEscaped('
	<h4 class="message-title"><a href="' . $__templater->func('link', array('ams/series', $__vars['content'], ), true) . '">' . $__templater->escape($__vars['content']['title']) . '</a></h4>
	' . $__templater->func('bb_code', array($__vars['content']['message'], 'ams_series', $__vars['content'], ), true) . '
');
	$__finalCompiled .= '

' . $__templater->callMacro('approval_queue_macros', 'item_message_type', array(
		'content' => $__vars['content'],
		'contentDate' => $__vars['content']['create_date'],
		'user' => $__vars['content']['User'],
		'spamDetails' => $__vars['spamDetails'],
		'messageHtml' => $__vars['messageHtml'],
		'typePhraseHtml' => 'Series',
		'unapprovedItem' => $__vars['unapprovedItem'],
		'handler' => $__vars['handler'],
		'headerPhraseHtml' => 'Series \'' . $__templater->escape($__vars['content']['title']) . '\'',
	), $__vars);
	return $__finalCompiled;
}
);