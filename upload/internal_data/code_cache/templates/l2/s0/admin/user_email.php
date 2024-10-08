<?php
// FROM HASH: 07afa7dccd2c1b9fe3a49db59ec81a43
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Tài khoản email');
	$__finalCompiled .= '
';
	$__templater->pageParams['pageDescription'] = $__templater->preEscaped('You can use this form to send a mass email to the users which match the criteria specified below.');
	$__templater->pageParams['pageDescriptionMeta'] = true;
	$__finalCompiled .= '

';
	if ($__vars['sent']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success blockMessage--iconic">
		' . 'Email của bạn đã được gửi đến ' . $__templater->filter($__vars['sent'], array(array('number', array()),), true) . ' thành viên.' . '
	</div>
';
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'list_only',
		'label' => 'Only generate a list of email addresses',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'from_name',
		'value' => ($__vars['xf']['options']['emailSenderName'] ? $__vars['xf']['options']['emailSenderName'] : $__vars['xf']['options']['boardTitle']),
	), array(
		'label' => 'Từ tên',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'from_email',
		'value' => $__vars['xf']['options']['defaultEmailAddress'],
		'type' => 'email',
	), array(
		'label' => 'Từ email',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formTextBoxRow(array(
		'name' => 'email_title',
	), array(
		'label' => 'Tiêu đề email',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'email_format',
	), array(array(
		'value' => '',
		'selected' => true,
		'label' => 'Văn bản thô',
		'_type' => 'option',
	),
	array(
		'value' => 'html',
		'label' => 'HTML',
		'hint' => 'Note that email clients handle HTML in widely varying ways. Be sure to test before sending HTML emails. A text version of your email will be generated by removing all HTML tags.',
		'_type' => 'option',
	)), array(
		'label' => 'Định dạng email',
	)) . '

			' . $__templater->formCodeEditorRow(array(
		'name' => 'email_body',
		'mode' => 'html',
		'data-line-wrapping' => 'true',
		'class' => 'codeEditor--autoSize codeEditor--proportional',
	), array(
		'label' => 'Nội dung email',
		'explain' => ' ' . 'Sử dụng các trường sau trong tin nhắn: {name}, {email}, {id}, {unsub}.' . ' ' . 'Bạn có thể sử dụng {phrase:phrase_title} sẽ được thay thế bằng văn bản từ ngôn ngữ của người nhận.',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'email_wrapped',
		'selected' => true,
		'label' => 'Include default email wrapper',
		'hint' => 'If selected, your email content will be wrapped in the standard header and footer used in emails sent elsewhere in XenForo.',
		'_type' => 'option',
	),
	array(
		'name' => 'email_unsub',
		'selected' => true,
		'label' => 'Tự động bao gồm liên kết hủy đăng ký',
		'hint' => 'Nếu được chọn, email này sẽ tự động có một đường liên kết hủy đăng ký được thêm vào ở cuối trang. Nếu bạn sử dụng thẻ \'unsub\' trong email, tùy chọn này sẽ bị bỏ qua.',
		'_type' => 'option',
	)), array(
	)) . '
		</div>

		<h2 class="block-formSectionHeader"><span class="block-formSectionHeader-aligner">' . 'Tiêu chí thành viên' . '</span></h2>
		<div class="block-body">
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'criteria[Option][receive_admin_email]',
		'selected' => true,
		'label' => '
					' . 'Only send to users opting to receive news and update emails' . '
				',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->includeTemplate('helper_user_search_criteria', $__vars) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'submit' => 'Tiến hành' . $__vars['xf']['language']['ellipsis'],
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('users/email/confirm', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);