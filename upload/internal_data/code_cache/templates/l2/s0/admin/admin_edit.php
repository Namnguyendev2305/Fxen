<?php
// FROM HASH: 81700a0a2b42d5b3b99b8556abb3e470
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['admin'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Thêm quản trị viên');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Chỉnh sửa Quản trị viên' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['admin']['username']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['admin'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('admins/delete', $__vars['admin'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__vars['admin']['user_id']) {
		$__compilerTemp1 .= '
				' . $__templater->formTextBoxRow(array(
			'name' => 'username',
			'ac' => 'single',
			'data-xf-init' => 'input-validator',
			'data-validation-url' => $__templater->func('link', array('admins/admin-warnings', ), false),
			'data-error-target' => '< dd | .js-adminWarnings',
		), array(
			'label' => 'Thành viên',
			'explain' => '
						<div class="block-rowMessage block-rowMessage--important u-hidden u-hidden--transition js-adminWarnings"></div>
					',
		)) . '
			';
	}
	$__compilerTemp2 = $__templater->mergeChoiceOptions(array(), $__vars['userGroups']);
	$__compilerTemp3 = $__templater->mergeChoiceOptions(array(), $__vars['permissions']);
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formPasswordBoxRow(array(
		'name' => 'visitor_password',
	), array(
		'label' => 'Mật khẩu của bạn',
		'explain' => 'Bạn phải nhập mật khẩu hiện tại để hợp thức hóa yêu cầu này.',
	)) . '

			<hr class="formRowSep" />

			' . $__compilerTemp1 . '

			' . $__templater->formCheckBoxRow(array(
		'name' => 'extra_user_group_ids',
		'value' => $__vars['admin']['extra_user_group_ids'],
		'listclass' => 'listColumns',
	), $__compilerTemp2, array(
		'label' => 'Thêm vào nhóm thành viên',
		'hint' => '<br />
					' . $__templater->formCheckBox(array(
		'standalone' => 'true',
	), array(array(
		'check-all' => '< .formRow',
		'label' => 'Chọn tất cả',
		'_type' => 'option',
	))) . '
				',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'advanced',
		'selected' => $__vars['admin']['advanced'],
		'label' => 'Show advanced control panel options',
		'_type' => 'option',
	)), array(
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formRadioRow(array(
		'name' => 'is_super_admin',
		'value' => $__vars['admin']['is_super_admin'],
	), array(array(
		'value' => '1',
		'label' => 'Quản trị viên cấp cao',
		'hint' => 'Quản trị viên cấp cao có tất cả quyền quản trị viên và có thể quản lý các quản trị viên khác.',
		'_type' => 'option',
	),
	array(
		'value' => '0',
		'data-hide' => 'true',
		'data-xf-init' => 'disabler',
		'data-container' => '.js-adminPermissions',
		'label' => 'Quản trị viên',
		'_type' => 'option',
	)), array(
		'label' => 'Kiểu Quản trị viên',
	)) . '

			<div class="js-adminPermissions">
				' . $__templater->formCheckBoxRow(array(
		'name' => 'permission_cache',
		'value' => $__templater->func('array_keys', array($__vars['admin']['permission_cache'], ), false),
		'listclass' => 'listColumns',
	), $__compilerTemp3, array(
		'label' => 'Phân quyền',
		'hint' => '<br />
						' . $__templater->formCheckBox(array(
		'standalone' => 'true',
	), array(array(
		'check-all' => '< .formRow',
		'label' => 'Chọn tất cả',
		'_type' => 'option',
	))) . '
					',
	)) . '
			</div>
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('admins/save', $__vars['admin'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);