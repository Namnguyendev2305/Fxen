<?php
// FROM HASH: 6957d26f484a95fc214375383cfdf884
return array(
'macros' => array('dob_privacy_row' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'hint' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'value' => '1',
		'name' => 'option[show_dob_date]',
		'checked' => $__vars['xf']['visitor']['Option']['show_dob_date'],
		'label' => 'Hiển thị ngày và tháng sinh',
		'_dependent' => array($__templater->formCheckBox(array(
	), array(array(
		'value' => '1',
		'name' => 'option[show_dob_year]',
		'checked' => $__vars['xf']['visitor']['Option']['show_dob_year'],
		'label' => 'Hiển thị năm sinh',
		'hint' => 'Điều này sẽ cho phép mọi người nhìn thấy tuổi của bạn.',
		'_type' => 'option',
	)))),
		'_type' => 'option',
	)), array(
		'hint' => ($__vars['hint'] ? $__templater->escape($__vars['hint']) : ''),
	)) . '
';
	return $__finalCompiled;
}
),
'activity_privacy_row' => array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'user[visible]',
		'checked' => $__vars['xf']['visitor']['visible'],
		'label' => 'Hiển thị trạng thái trực tuyến',
		'hint' => 'Điều này sẽ cho phép người khác nhìn thấy khi bạn đang online.',
		'_dependent' => array($__templater->formCheckBox(array(
	), array(array(
		'name' => 'user[activity_visible]',
		'checked' => $__vars['xf']['visitor']['activity_visible'],
		'label' => 'Hiển thị hoạt động hiện tại của bạn',
		'hint' => 'Điều này sẽ cho phép tất cả mọi người nhìn thấy trang nào bạn đang xem.',
		'_type' => 'option',
	)))),
		'_type' => 'option',
	)), array(
		'label' => 'Tùy chọn quyền riêng tư',
	)) . '
';
	return $__finalCompiled;
}
),
'email_options_row' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'showExplain' => false,
		'showConversationOption' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = array(array(
		'name' => 'option[receive_admin_email]',
		'selected' => $__vars['xf']['visitor']['Option']['receive_admin_email'],
		'label' => 'Nhận tin tức và cập nhật email',
		'hint' => '',
		'_type' => 'option',
	));
	if ($__vars['xf']['options']['activitySummaryEmail']['enabled']) {
		$__compilerTemp1[] = array(
			'name' => 'enable_activity_summary_email',
			'selected' => $__vars['xf']['visitor']['last_summary_email_date'] !== null,
			'label' => 'Nhận email tóm tắt hoạt động',
			'hint' => 'Chúng tôi sẽ cập nhật cho bạn về nội dung mới khi bạn không truy cập trong một thời gian.',
			'_type' => 'option',
		);
	}
	if ($__vars['showConversationOption']) {
		$__compilerTemp1[] = array(
			'name' => 'option[email_on_conversation]',
			'selected' => $__vars['xf']['visitor']['Option']['email_on_conversation'],
			'label' => 'Nhận email khi có tin nhắn đối thoại mới',
			'_type' => 'option',
		);
	}
	$__compilerTemp2 = '';
	if ($__vars['showExplain']) {
		$__compilerTemp2 .= 'Bạn có thể tìm thấy các tùy chọn email bổ sung trong <a href="' . $__templater->func('link', array('account/preferences', ), true) . '">Tùy chọn</a>.';
	}
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), $__compilerTemp1, array(
		'label' => 'Tùy chọn email',
		'explain' => $__compilerTemp2,
	)) . '

	';
	if (!$__vars['xf']['options']['activitySummaryEmail']['enabled']) {
		$__finalCompiled .= '
		';
		if ($__vars['xf']['visitor']['last_summary_email_date'] !== null) {
			$__finalCompiled .= '
			' . $__templater->formHiddenVal('enable_activity_summary_email', '1', array(
			)) . '
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

';
	return $__finalCompiled;
}
);