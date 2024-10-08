<?php
// FROM HASH: 8fdcaed5e8bd579528a95d4108a5e3e3
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Xác nhận hành động');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['user']['is_super_admin']) {
		$__compilerTemp1 .= '
				' . $__templater->formPasswordBoxRow(array(
			'name' => 'visitor_password',
		), array(
			'label' => 'Mật khẩu của bạn',
			'explain' => 'Bạn phải nhập mật khẩu hiện tại để hợp thức hóa yêu cầu này.',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Vui lòng xác nhận rằng bạn muốn xóa những điều sau' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('users/edit', $__vars['user'], ), true) . '">' . $__templater->escape($__vars['user']['username']) . '</a></strong>
				<div class="blockMessage blockMessage--important"><b>' . 'Chú ý' . $__vars['xf']['language']['label_separator'] . '</b> ' . 'This will not remove any content this user has already created.' . '</div>
			', array(
		'rowtype' => 'confirm',
	)) . '
			' . $__compilerTemp1 . '
			' . $__templater->formRadioRow(array(
		'name' => 'rename',
	), array(array(
		'value' => '0',
		'selected' => true,
		'label' => 'Do not rename this user',
		'_type' => 'option',
	),
	array(
		'value' => '1',
		'label' => 'Rename this user to' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'rename_to',
		'value' => 'Thành viên đã bị xoá' . ' ' . $__vars['user']['user_id'],
		'maxlength' => 'max_length($user, \'username\')',
	))),
		'_type' => 'option',
	)), array(
		'explain' => 'If you choose to rename this user, the username on all of their content will be changed which can be used to anonymize their content to comply with the user\'s erasure rights under GDPR rules. The user\'s original name may still appear in quoted content.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
	)) . '
	</div>
	' . $__templater->func('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->func('link', array('users/delete', $__vars['user'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);