<?php
// FROM HASH: 02b24706ce45859d3057f45bd0d23ec6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Quên mật khẩu');
	$__finalCompiled .= '

';
	$__templater->setPageParam('head.' . 'robots', $__templater->preEscaped('<meta name="robots" content="noindex" />'));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['xf']['options']['lostPasswordCaptcha']) {
		$__compilerTemp1 .= '
				' . $__templater->formRowIfContent($__templater->func('captcha_options', array(array(
			'label' => 'Mã xác nhận',
			'context' => 'xf_lost_password',
		))), array(
			'label' => 'Mã xác nhận',
			'context' => 'xf_lost_password',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('Nếu bạn đã quên mật khẩu của mình, bạn có thể sử dụng mẫu này để thiết lập lại mật khẩu của bạn. Bạn sẽ nhận được một email hướng dẫn.', array(
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'email',
		'type' => 'email',
		'autofocus' => 'autofocus',
		'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'email', ), false),
	), array(
		'label' => 'Email',
		'explain' => 'Địa chỉ email bạn đã đăng ký là bắt buộc để khôi phục lại mật khẩu của bạn.',
	)) . '

			' . $__compilerTemp1 . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Khôi phục',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('lost-password', ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);