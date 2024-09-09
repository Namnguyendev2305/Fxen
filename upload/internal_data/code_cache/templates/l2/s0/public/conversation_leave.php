<?php
// FROM HASH: e26535bd44b7a80163fc57bf996c12f5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Rời cuộc trò chuyện');
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped('Trò chuyện'), $__templater->func('link', array('conversations', ), false), array(
	));
	$__finalCompiled .= '
';
	$__templater->breadcrumb($__templater->preEscaped($__templater->escape($__vars['conversation']['title'])), $__templater->func('link', array('conversations', $__vars['conversation'], ), false), array(
	));
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Rời khỏi cuộc hội thoại sẽ xóa nó ra khỏi danh sách các cuộc hội thoại' . '
			', array(
	)) . '
			' . $__templater->formRadioRow(array(
		'name' => 'recipient_state',
	), array(array(
		'value' => 'deleted',
		'checked' => 'checked',
		'label' => 'Cho phép tin nhắn trong tương lai',
		'hint' => 'Nếu cuộc trò chuyện này nhận được phản hồi khác trong tương lai, cuộc trò chuyện này sẽ được khôi phục vào hộp thư đến của bạn.',
		'_type' => 'option',
	),
	array(
		'value' => 'deleted_ignored',
		'label' => 'Bỏ qua tin nhắn trong tương lai',
		'hint' => 'Bạn sẽ không được thông báo về bất kỳ phản hồi nào trong tương lai và cuộc trò chuyện sẽ vẫn bị xóa.',
		'_type' => 'option',
	)), array(
		'label' => 'Xử lý tin nhắn trong tương lai',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Rời khỏi',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('conversations/leave', $__vars['conversation'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);