<?php
// FROM HASH: a3cde8155e93090ef7b2d0af9d1c3d7a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if ($__vars['option']['option_value']['messageParticipants'] AND $__templater->func('is_array', array($__vars['option']['option_value']['messageParticipants'], ), false)) {
		$__compilerTemp1 .= '
				';
		$__vars['users'] = $__templater->method($__templater->method($__vars['xf']['app']['em'], 'getRepository', array('XF:User', )), 'getUsersByIdsOrdered', array($__vars['option']['option_value']['messageParticipants'], ));
		$__compilerTemp1 .= '
				';
		$__vars['value'] = $__templater->filter($__templater->method($__vars['users'], 'pluckNamed', array('username', )), array(array('join', array(', ', )),), false);
		$__compilerTemp1 .= '
			';
	} else {
		$__compilerTemp1 .= '
				';
		$__vars['value'] = $__templater->preEscaped($__templater->escape($__vars['xf']['visitor']['username']));
		$__compilerTemp1 .= '
			';
	}
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => $__vars['inputName'] . '[messageEnabled]',
		'selected' => $__vars['option']['option_value']['messageEnabled'],
		'data-hide' => 'true',
		'label' => 'Start welcome conversation on registration',
		'_dependent' => array('
			<div>' . 'Người tham gia khác' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__compilerTemp1 . '
			' . $__templater->formTokenInput(array(
		'name' => $__vars['inputName'] . '[messageParticipants]',
		'value' => $__vars['value'],
		'href' => $__templater->func('link', array('users/find', ), false),
	)) . '
		', '
			<div>' . 'Tiêu đề cuộc trò chuyện' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[messageTitle]',
		'value' => $__vars['option']['option_value']['messageTitle'],
		'placeholder' => 'Tiêu đề cuộc trò chuyện' . $__vars['xf']['language']['ellipsis'],
		'maxlength' => '100',
	)) . '
		', '
			<div>' . 'Tin nhắn cuộc trò chuyện' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextArea(array(
		'name' => $__vars['inputName'] . '[messageBody]',
		'value' => $__vars['option']['option_value']['messageBody'],
		'rows' => '5',
		'autosize' => 'true',
	)) . '
			<p class="formRow-explain">' . 'The following placeholders will be replaced in the message: {name}, {email}, {id}.' . ' ' . 'Bạn có thể sử dụng {phrase:phrase_title} sẽ được thay thế bằng văn bản từ ngôn ngữ của người nhận.' . '</p>
		', '
			<div>' . 'Tùy chọn cuộc trò chuyện' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formCheckBox(array(
	), array(array(
		'name' => $__vars['inputName'] . '[messageOpenInvite]',
		'value' => '1',
		'selected' => $__vars['option']['option_value']['messageOpenInvite'],
		'label' => '
					' . 'Cho phép mọi người trong cuộc trò chuyện mời người khác' . '
				',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[messageLocked]',
		'value' => '1',
		'selected' => $__vars['option']['option_value']['messageLocked'],
		'label' => '
					' . 'Khóa cuộc trò chuyện (không cho phép trả lời)' . '
				',
		'_type' => 'option',
	))) . '
		', '
			<div>' . 'Xử lý tin nhắn trong tương lai' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formRadio(array(
		'name' => $__vars['inputName'] . '[messageDelete]',
	), array(array(
		'value' => 'delete',
		'selected' => (!$__vars['option']['option_value']['messageDelete']) OR ($__vars['option']['option_value']['messageDelete'] == 'delete'),
		'label' => 'Rời cuộc trò chuyện và chấp nhận lời nhắn trong tương lai',
		'explain' => 'Nếu cuộc trò chuyện này nhận được phản hồi khác trong tương lai, cuộc trò chuyện này sẽ được khôi phục vào hộp thư đến của bạn.',
		'_type' => 'option',
	),
	array(
		'value' => 'delete_ignore',
		'selected' => $__vars['option']['option_value']['messageDelete'] == 'delete_ignore',
		'label' => 'Rời trò chuyện và bỏ qua các lời nhắn trong tương lai',
		'explain' => 'Bạn sẽ không được thông báo về bất kỳ phản hồi nào trong tương lai và cuộc trò chuyện sẽ vẫn bị xóa.',
		'_type' => 'option',
	),
	array(
		'value' => 'no_delete',
		'selected' => $__vars['option']['option_value']['messageDelete'] == 'no_delete',
		'label' => 'Không rời cuộc trò chuyện',
		'explain' => 'The conversation will remain in your inbox and you will be notified of responses.',
		'_type' => 'option',
	))) . '
		'),
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[emailEnabled]',
		'selected' => $__vars['option']['option_value']['emailEnabled'],
		'data-hide' => 'true',
		'label' => 'Gửi email chào mừng khi đăng ký',
		'_dependent' => array('
			<div>' . 'Từ tên' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[emailFromName]',
		'value' => ($__vars['option']['option_value']['emailFromName'] ? $__vars['option']['option_value']['emailFromName'] : $__vars['xf']['options']['boardTitle']),
	)) . '
		', '
			<div>' . 'Từ email' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[emailFromEmail]',
		'value' => ($__vars['option']['option_value']['emailFromEmail'] ? $__vars['option']['option_value']['emailFromEmail'] : $__vars['xf']['options']['defaultEmailAddress']),
		'type' => 'email',
	)) . '
		', '
			<div>' . 'Tiêu đề email' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[emailTitle]',
		'value' => $__vars['option']['option_value']['emailTitle'],
	)) . '
		', '
			<div>' . 'Định dạng email' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formRadio(array(
		'name' => $__vars['inputName'] . '[emailFormat]',
		'value' => $__vars['option']['option_value']['emailFormat'],
	), array(array(
		'value' => 'plain',
		'label' => 'Văn bản thô',
		'selected' => (!$__vars['option']['option_value']['emailFormat']) OR ($__vars['option']['option_value']['emailFormat'] == 'plain'),
		'_type' => 'option',
	),
	array(
		'value' => 'html',
		'label' => 'HTML',
		'_type' => 'option',
	))) . '
			<p class="formRow-explain">' . 'Note that email clients handle HTML in widely varying ways. Be sure to test before sending HTML emails. A text version of your email will be generated by removing all HTML tags.' . '</p>
		', '
			<div>' . 'Nội dung email' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextArea(array(
		'name' => $__vars['inputName'] . '[emailBody]',
		'value' => $__vars['option']['option_value']['emailBody'],
		'rows' => '5',
		'autosize' => 'true',
	)) . '
			<p class="formRow-explain">' . 'The following placeholders will be replaced in the message: {name}, {email}, {id}.' . ' ' . 'Bạn có thể sử dụng {phrase:phrase_title} sẽ được thay thế bằng văn bản từ ngôn ngữ của người nhận.' . '</p>
		'),
		'_type' => 'option',
	)), array(
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
		'rowclass' => $__vars['rowClass'],
	));
	return $__finalCompiled;
}
);