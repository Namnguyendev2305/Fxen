<?php
// FROM HASH: 8add850a48e5046f3b7e046f1c359b14
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if ($__vars['content']['os_url_check_date'] AND $__vars['content']['os_url_check_fail_count']) {
		$__compilerTemp1 .= '
		<h4 class="message-title"><span class="amsOsUrlCheckFailure">***** ' . 'Original Source URL Check Failure' . ' *****</span></h4>
	';
	} else {
		$__compilerTemp1 .= '
		<h4 class="message-title"><a href="' . $__templater->func('link', array('ams', $__vars['content'], ), true) . '">' . $__templater->escape($__vars['content']['title']) . '</a></h4>
		' . $__templater->func('bb_code', array($__vars['content']['message'], 'ams_article', $__vars['content'], ), true) . '
	';
	}
	$__vars['messageHtml'] = $__templater->preEscaped('
	' . $__compilerTemp1 . '
');
	$__finalCompiled .= '

' . $__templater->callMacro('approval_queue_macros', 'item_message_type', array(
		'content' => $__vars['content'],
		'contentDate' => $__vars['content']['publish_date'],
		'user' => $__vars['content']['User'],
		'spamDetails' => $__vars['spamDetails'],
		'messageHtml' => $__vars['messageHtml'],
		'typePhraseHtml' => 'Article',
		'unapprovedItem' => $__vars['unapprovedItem'],
		'handler' => $__vars['handler'],
		'headerPhraseHtml' => '<a href="' . $__templater->func('link', array('ams', $__vars['content'], ), true) . '">' . $__templater->escape($__vars['content']['title']) . '</a> posted in article category <a href="' . $__templater->func('link', array('ams/categories', $__vars['content']['Category'], ), true) . '">' . $__templater->escape($__vars['content']['Category']['title']) . '</a>',
	), $__vars);
	return $__finalCompiled;
}
);