<?php
// FROM HASH: bfa18b2c904fe849682046b2a99fc497
return array(
'macros' => array('username_row' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'fieldName' => 'username',
		'value' => '',
		'autoFocus' => true,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->formTextBoxRow(array(
		'name' => $__vars['fieldName'],
		'value' => $__vars['value'],
		'autocomplete' => 'username',
		'required' => 'required',
		'autofocus' => ($__vars['autoFocus'] ? 'autofocus' : false),
		'maxlength' => ($__vars['xf']['options']['usernameLength']['max'] ?: $__templater->func('max_length', array($__vars['xf']['visitor'], 'username', ), false)),
		'validation-url' => $__templater->func('link', array('misc/validate-username', ), false),
	), array(
		'label' => 'Tên thành viên',
		'hint' => '(Yêu cầu)',
		'explain' => 'Đây là tên thành viên của bạn. Có thể sử dụng bất kỳ tên nào bạn muốn.<br />
<i>Chấp nhận các ký tự a-z, 0-9 và . _ -<br />
Ký tự bắt đầu và kết thúc phải là a-z, 0-9</i>',
	)) . '
';
	return $__finalCompiled;
}
),
'email_row' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'fieldName' => 'email',
		'value' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->formTextBoxRow(array(
		'name' => $__vars['fieldName'],
		'value' => $__vars['value'],
		'type' => 'email',
		'autocomplete' => 'email',
		'required' => 'required',
		'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'email', ), false),
	), array(
		'label' => 'Email',
		'hint' => '(Yêu cầu)',
	)) . '
';
	return $__finalCompiled;
}
),
'dob_row' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'dobData' => array(),
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__vars['xf']['options']['registrationSetup']['requireDob']) {
		$__finalCompiled .= '
		' . $__templater->callMacro('helper_user_dob_edit', 'dob_edit', array(
			'dobData' => $__vars['dobData'],
			'required' => true,
		), $__vars) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'location_row' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'fieldName' => 'location',
		'value' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if ($__vars['xf']['options']['registrationSetup']['requireLocation']) {
		$__finalCompiled .= '
		' . $__templater->formTextBoxRow(array(
			'name' => $__vars['fieldName'],
			'value' => $__vars['value'],
			'required' => 'true',
		), array(
			'label' => 'Nơi ở',
			'hint' => '(Yêu cầu)',
		)) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'email_choice_row' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'fieldName' => 'email_choice',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if ($__vars['xf']['options']['registrationSetup']['requireEmailChoice']) {
		$__finalCompiled .= '
		' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => $__vars['fieldName'],
			'selected' => $__vars['xf']['options']['registrationDefaults']['receive_admin_email'],
			'label' => 'Nhận thông báo từ diễn đàn',
			'hint' => '',
			'_type' => 'option',
		)), array(
		)) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'custom_fields' => array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'users',
		'group' => null,
		'set' => $__vars['xf']['visitor']['Profile']['custom_fields'],
		'additionalFilters' => array('registration', ),
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'tos_row' => array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__vars['xf']['tosUrl'] OR $__vars['xf']['privacyPolicyUrl']) {
		$__finalCompiled .= '
		';
		$__compilerTemp1 = array();
		if ($__vars['xf']['tosUrl'] AND $__vars['xf']['privacyPolicyUrl']) {
			$__compilerTemp1[] = array(
				'name' => 'accept',
				'required' => 'required',
				'label' => 'Tôi đồng ý với <a href="' . $__templater->escape($__vars['xf']['tosUrl']) . '" target="_blank">điều khoản</a> và <a href="' . $__templater->escape($__vars['xf']['privacyPolicyUrl']) . '" target="_blank">chính sách quyền riêng tư</a>.',
				'_type' => 'option',
			);
		} else if ($__vars['xf']['tosUrl']) {
			$__compilerTemp1[] = array(
				'name' => 'accept',
				'required' => 'required',
				'label' => 'Tôi đồng ý với <a href="' . $__templater->escape($__vars['xf']['tosUrl']) . '" target="_blank">điều khoản và quy tắc</a>.',
				'_type' => 'option',
			);
		} else {
			$__compilerTemp1[] = array(
				'name' => 'accept',
				'required' => 'required',
				'label' => 'Tôi đồng ý với <a href="' . $__templater->escape($__vars['xf']['privacyPolicyUrl']) . '" target="_blank">chính sách quyền riêng tư</a>.',
				'_type' => 'option',
			);
		}
		$__finalCompiled .= $__templater->formCheckBoxRow(array(
			'standalone' => 'true',
		), $__compilerTemp1, array(
		)) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'submit_row' => array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	if ($__vars['xf']['options']['registrationTimer']) {
		$__compilerTemp1 .= '
				<span id="js-regTimer" data-timer-complete="' . $__templater->filter('Đăng ký', array(array('for_attr', array()),), true) . '">
					' . $__vars['xf']['language']['parenthesis_open'] . 'Vui lòng đợi ' . ('<span>' . $__templater->escape($__vars['xf']['options']['registrationTimer']) . '</span>') . ' giây.' . $__vars['xf']['language']['parenthesis_close'] . '
				</span>
			';
	} else {
		$__compilerTemp1 .= '
				' . 'Đăng ký' . '
			';
	}
	$__finalCompiled .= $__templater->formSubmitRow(array(
	), array(
		'html' => '
		' . $__templater->button('
			' . $__compilerTemp1 . '
		', array(
		'type' => 'submit',
		'class' => 'button--primary',
		'id' => 'js-signUpButton',
	), '', array(
	)) . '
	',
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

' . '

' . '

' . '

' . '

';
	return $__finalCompiled;
}
);