<?php
// FROM HASH: 1c4efa46d2e182c4d280eaa8d7086856
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Gửi tin nhắn cho thành viên');
	$__finalCompiled .= '
';
	$__templater->pageParams['pageDescription'] = $__templater->preEscaped('You can use this form to start a conversation with the users which match the criteria specified below.');
	$__templater->pageParams['pageDescriptionMeta'] = true;
	$__finalCompiled .= '

';
	if ($__vars['sent']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success blockMessage--iconic">
		' . 'Cuộc trò chuyện đã được bắt đầu với ' . $__templater->filter($__vars['sent'], array(array('number', array()),), true) . '.' . '
	</div>
';
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'from_user',
		'value' => $__vars['xf']['visitor']['username'],
		'ac' => 'single',
	), array(
		'label' => 'Từ thành viên',
		'explain' => '
					<p>' . 'Nhập tên thành viên mà bạn muốn trò chuyện.' . '</p>
					<p><b>' . 'Chú ý' . $__vars['xf']['language']['label_separator'] . '</b> ' . 'Bạn không thể bắt đầu cuộc trò chuyện cuộc trò chuyện với chính mình.' . '</p>
				',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formTextBoxRow(array(
		'name' => 'message_title',
		'maxlength' => '100',
		'required' => 'true',
	), array(
		'label' => 'Tiêu đề cuộc trò chuyện',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'message_body',
		'rows' => '5',
		'autosize' => 'true',
		'required' => 'true',
	), array(
		'label' => 'Tin nhắn cuộc trò chuyện',
		'hint' => 'Bạn có thể sử dụng BBCode',
		'explain' => 'The following placeholders will be replaced in the message: {name}, {email}, {id}.' . ' ' . 'Bạn có thể sử dụng {phrase:phrase_title} sẽ được thay thế bằng văn bản từ ngôn ngữ của người nhận.',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'open_invite',
		'value' => '1',
		'label' => 'Cho phép mọi người trong cuộc trò chuyện mời người khác',
		'_type' => 'option',
	),
	array(
		'name' => 'conversation_locked',
		'value' => '1',
		'label' => 'Khóa cuộc trò chuyện (không cho phép trả lời)',
		'_type' => 'option',
	)), array(
		'label' => 'Tùy chọn cuộc trò chuyện',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'delete_type',
	), array(array(
		'selected' => true,
		'label' => 'Không rời cuộc trò chuyện',
		'explain' => 'The conversation will remain in your inbox and you will be notified of responses.',
		'_type' => 'option',
	),
	array(
		'value' => 'deleted',
		'label' => 'Rời cuộc trò chuyện và chấp nhận lời nhắn trong tương lai',
		'explain' => 'Nếu cuộc trò chuyện này nhận được phản hồi khác trong tương lai, cuộc trò chuyện này sẽ được khôi phục vào hộp thư đến của bạn.',
		'_type' => 'option',
	),
	array(
		'value' => 'deleted_ignored',
		'label' => 'Rời trò chuyện và bỏ qua các lời nhắn trong tương lai',
		'explain' => 'Bạn sẽ không được thông báo về bất kỳ phản hồi nào trong tương lai và cuộc trò chuyện sẽ vẫn bị xóa.',
		'_type' => 'option',
	)), array(
		'label' => 'Xử lý tin nhắn trong tương lai',
	)) . '
		</div>

		<h2 class="block-formSectionHeader"><span class="block-formSectionHeader-aligner">' . 'Tiêu chí thành viên' . '</span></h2>
		<div class="block-body">
			' . $__templater->includeTemplate('helper_user_search_criteria', $__vars) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'submit' => 'Tiến hành' . $__vars['xf']['language']['ellipsis'],
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('users/message/confirm', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);