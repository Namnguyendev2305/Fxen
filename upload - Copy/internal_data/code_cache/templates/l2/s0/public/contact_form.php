<?php
// FROM HASH: 59fcb58c6f4d1d2981af76f63fea9484
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Liên hệ');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__vars['xf']['visitor']['user_id']) {
		$__compilerTemp1 .= '
				' . $__templater->formTextBoxRow(array(
			'name' => 'username',
			'autofocus' => 'autofocus',
			'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'username', ), false),
			'required' => 'required',
		), array(
			'label' => 'Tên bạn',
			'hint' => '(Yêu cầu)',
		)) . '

				' . $__templater->formTextBoxRow(array(
			'name' => 'email',
			'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'email', ), false),
			'type' => 'email',
			'required' => 'required',
		), array(
			'label' => 'Địa chỉ email của bạn',
			'hint' => '(Yêu cầu)',
		)) . '
			';
	} else {
		$__compilerTemp1 .= '
				' . $__templater->formRow($__templater->escape($__vars['xf']['visitor']['username']), array(
			'label' => 'Tên bạn',
		)) . '
				';
		if ($__vars['xf']['visitor']['email']) {
			$__compilerTemp1 .= '

					' . $__templater->formRow($__templater->filter($__vars['xf']['visitor']['email'], array(array('email_display', array()),), true), array(
				'label' => 'Địa chỉ email của bạn',
			)) . '

				';
		} else {
			$__compilerTemp1 .= '

					' . $__templater->formTextBoxRow(array(
				'name' => 'email',
				'type' => 'email',
				'required' => 'required',
			), array(
				'label' => 'Địa chỉ email của bạn',
				'hint' => '(Yêu cầu)',
			)) . '

				';
		}
		$__compilerTemp1 .= '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '

			' . $__templater->formRowIfContent($__templater->func('captcha_options', array(array(
		'label' => 'Mã xác nhận',
		'hint' => '(Yêu cầu)',
		'force' => $__vars['forceCaptcha'],
		'context' => 'xf_contact_form',
	))), array(
		'label' => 'Mã xác nhận',
		'hint' => '(Yêu cầu)',
		'force' => $__vars['forceCaptcha'],
		'context' => 'xf_contact_form',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'subject',
		'required' => 'required',
	), array(
		'label' => 'Tiêu đề',
		'hint' => '(Yêu cầu)',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'message',
		'rows' => '5',
		'autosize' => 'true',
		'required' => 'required',
	), array(
		'label' => 'Nội dung',
		'hint' => '(Yêu cầu)',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Gửi',
	), array(
	)) . '
	</div>
	' . $__templater->func('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->func('link', array('misc/contact', ), false),
		'class' => 'block',
		'ajax' => 'true',
		'data-force-flash-message' => 'true',
	));
	return $__finalCompiled;
}
);