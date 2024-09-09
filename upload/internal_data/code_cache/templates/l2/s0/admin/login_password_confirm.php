<?php
// FROM HASH: 64bc94023907a5aaa8ade30b69d809e9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Xác nhận mật khẩu');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Để truy cập vào trang này , đầu tiên bạn phải xác nhận mật khẩu của bạn .' . '
			', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->formRow($__templater->escape($__vars['xf']['visitor']['username']), array(
		'label' => 'Tên thành viên',
	)) . '

			' . $__templater->formPasswordBoxRow(array(
		'name' => 'password',
	), array(
		'label' => 'Mật khẩu',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Xác nhận',
	), array(
	)) . '
	</div>
	' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
', array(
		'action' => $__templater->func('link', array('login/password-confirm', ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);