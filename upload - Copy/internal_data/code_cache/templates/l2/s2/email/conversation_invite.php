<?php
// FROM HASH: a63a96cd36d694774f8befa4403c74e4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . '' . $__templater->escape($__vars['sender']['username']) . ' đã thêm bạn vào cuộc trò chuyện "' . $__templater->escape($__vars['conversation']['title']) . '"' . '
</mail:subject>

' . '<p>' . $__templater->escape($__vars['sender']['username']) . ' đã thêm bạn vào cuộc trò chuyện tại ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . '.</p>' . '

<h2><a href="' . $__templater->func('link', array('canonical:conversations/unread', $__vars['conversation'], ), true) . '">' . $__templater->escape($__vars['conversation']['title']) . '</a></h2>

';
	if ($__vars['xf']['options']['emailConversationIncludeMessage']) {
		$__finalCompiled .= '
	<div class="message">' . $__templater->func('bb_code_type', array('emailHtml', $__vars['message']['message'], 'conversation_message', $__vars['message'], ), true) . '</div>
';
	}
	$__finalCompiled .= '

<table cellpadding="10" cellspacing="0" border="0" width="100%" class="linkBar">
<tr>
	<td>
		<a href="' . $__templater->func('link', array('canonical:conversations', $__vars['conversation'], ), true) . '" class="button">' . 'Xem cuộc trò chuyện này' . '</a>
	</td>
	<td align="' . ($__vars['xf']['isRtl'] ? 'left' : 'right') . '">
		<a href="' . $__templater->func('link', array('canonical:conversations', ), true) . '" class="buttonFake">' . 'Xem tất cả cuộc trò chuyện' . '</a>
	</td>
</tr>
</table>

' . $__templater->callMacro('conversation_macros', 'footer', array(
		'conversation' => $__vars['conversation'],
	), $__vars);
	return $__finalCompiled;
}
);