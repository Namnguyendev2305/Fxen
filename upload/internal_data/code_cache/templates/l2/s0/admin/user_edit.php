<?php
// FROM HASH: cdbe639c1d59644bb12218e3195c7089
return array(
'macros' => array('privacy_select' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'name' => '!',
		'label' => '!',
		'user' => '!',
		'hideEveryone' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = array(array(
		'value' => 'none',
		'label' => 'Không một ai',
		'_type' => 'option',
	));
	if (!$__vars['hideEveryone']) {
		$__compilerTemp1[] = array(
			'value' => 'everyone',
			'label' => 'Tất cả khách',
			'_type' => 'option',
		);
	}
	$__compilerTemp1[] = array(
		'value' => 'members',
		'label' => 'Chỉ dành cho thành viên',
		'_type' => 'option',
	);
	$__compilerTemp1[] = array(
		'value' => 'followed',
		'label' => 'Người theo dõi ' . ($__vars['user']['username'] ? $__templater->escape($__vars['user']['username']) : (('[' . 'Thành viên') . ']')) . '',
		'_type' => 'option',
	);
	$__finalCompiled .= $__templater->formSelectRow(array(
		'name' => 'privacy[' . $__vars['name'] . ']',
		'value' => $__vars['user']['Privacy'][$__vars['name']],
	), $__compilerTemp1, array(
		'label' => $__templater->escape($__vars['label']),
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['user'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Thêm thành viên');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Chỉnh sửa thành viên' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['user']['username']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['user'], 'isUpdate', array())) {
		$__compilerTemp1 = '';
		if ($__vars['user']['is_banned']) {
			$__compilerTemp1 .= '
					<a href="' . $__templater->func('link', array('banning/users/lift', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Bỏ cấm túc' . '</a>
				';
		} else if ((!$__vars['user']['is_moderator']) AND (!$__vars['user']['is_admin'])) {
			$__compilerTemp1 .= '
					<a href="' . $__templater->func('link', array('banning/users/add', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Cấm thành viên' . '</a>
				';
		}
		$__compilerTemp2 = '';
		if ((!$__vars['user']['is_moderator']) AND (!$__vars['user']['is_admin'])) {
			$__compilerTemp2 .= '
					<a href="' . $__templater->func('link', array('users/merge', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Gộp thành viên' . '</a>
					<a href="' . $__templater->func('link', array('users/delete-conversations', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Xóa cuộc trò chuyện' . '</a>
				';
		}
		$__compilerTemp3 = '';
		if ((!$__vars['user']['is_super_admin']) AND $__vars['xf']['options']['editHistory']['enabled']) {
			$__compilerTemp3 .= '
					<a href="' . $__templater->func('link', array('users/revert-message-edit', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Khôi phục chỉnh sửa bài viết' . '</a>
				';
		}
		$__compilerTemp4 = '';
		if (!$__vars['user']['is_super_admin']) {
			$__compilerTemp4 .= '
					<a href="' . $__templater->func('link', array('users/remove-reactions', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Remove reactions' . '</a>
					<a href="' . $__templater->func('link', array('users/manage-watched-threads', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Quản lý các chủ đề theo dõi' . '</a>
				';
		}
		$__compilerTemp5 = '';
		if ($__templater->method($__vars['user'], 'isAwaitingEmailConfirmation', array())) {
			$__compilerTemp5 .= '
					<a href="' . $__templater->func('link', array('users/resend-confirmation', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Gửi lại xác nhận tài khoản' . '</a>
				';
		}
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	<div>
		' . $__templater->button('', array(
			'href' => $__templater->func('link', array('users/delete', $__vars['user'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '

		' . $__templater->button('Hành động', array(
			'class' => 'menuTrigger',
			'data-xf-click' => 'menu',
			'aria-expanded' => 'false',
			'aria-haspopup' => 'true',
		), '', array(
		)) . '
		<div class="menu" data-menu="menu" aria-hidden="true">
			<div class="menu-content">
				<h3 class="menu-header">' . 'Hành động' . '</h3>
				' . '
				<a href="' . $__templater->func('link_type', array('public', 'members', $__vars['user'], ), true) . '" class="menu-linkRow" target="_blank">' . 'Xem hồ sơ' . '</a>

				' . $__compilerTemp1 . '

				' . $__compilerTemp2 . '

				' . $__compilerTemp3 . '

				' . $__compilerTemp4 . '

				' . $__compilerTemp5 . '
				' . '
			</div>
		</div>
	</div>
');
	}
	$__finalCompiled .= '

';
	if ($__vars['success']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success blockMessage--iconic">' . 'Thay đổi của bạn đã được lưu.' . '</div>
';
	}
	$__finalCompiled .= '

<div class="block">
	';
	if ($__vars['user']['user_id']) {
		$__finalCompiled .= '
	';
		$__compilerTemp6 = '';
		$__compilerTemp6 .= '
				' . '
				';
		if ($__vars['user']['is_admin']) {
			$__compilerTemp6 .= '
					<li><a href="' . $__templater->func('link', array('admins/edit', $__vars['user'], ), true) . '">' . ($__vars['user']['is_super_admin'] ? 'Quản trị viên cấp cao' : 'Administrator') . '</a></li>
				';
		}
		$__compilerTemp6 .= '
				';
		if ($__vars['user']['is_moderator']) {
			$__compilerTemp6 .= '
					<li><a href="' . $__templater->func('link', array('moderators', null, array('user_id' => $__vars['user']['user_id'], ), ), true) . '">' . 'Quản trị' . '</a></li>
				';
		}
		$__compilerTemp6 .= '
				';
		if ($__vars['user']['Option']['is_discouraged']) {
			$__compilerTemp6 .= '
					<li>' . 'Discouraged' . '</li>
				';
		}
		$__compilerTemp6 .= '
				';
		if ($__vars['user']['is_banned']) {
			$__compilerTemp6 .= '
					<li><a href="' . $__templater->func('link', array('banning/users/lift', $__vars['user'], ), true) . '" data-xf-click="overlay">' . 'Đã bị cấm túc' . '</a></li>
				';
		}
		$__compilerTemp6 .= '
				' . '
			';
		if (strlen(trim($__compilerTemp6)) > 0) {
			$__finalCompiled .= '
		<div class="block-outer">
			<ul class="listInline listInline--bullet">
			' . $__compilerTemp6 . '
			</ul>
		</div>
	';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '

	';
	$__compilerTemp7 = '';
	if ($__vars['user']['is_super_admin']) {
		$__compilerTemp7 .= '
			<div class="block-body">
				' . $__templater->formPasswordBoxRow(array(
			'name' => 'visitor_password',
		), array(
			'label' => 'Mật khẩu của bạn',
			'explain' => 'Bạn phải nhập mật khẩu hiện tại để hợp thức hóa yêu cầu này.',
		)) . '
			</div>
		';
	}
	$__compilerTemp8 = '';
	if ($__vars['user']['user_id']) {
		$__compilerTemp8 .= '
					<a class="tabs-tab" role="tab" tabindex="0"
						id="user-extras"
						aria-controls="user-extras"
						href="' . $__templater->func('link', array('users/edit', $__vars['user'], ), true) . '#user-extras">' . 'Thêm' . '</a>
					<a class="tabs-tab" role="tab" tabindex="0"
						id="user-ips"
						aria-controls="user-ips"
						href="' . $__templater->func('link', array('users/edit', $__vars['user'], ), true) . '#user-ips">' . 'Địa chỉ IP' . '</a>
					<a class="tabs-tab" role="tab" tabindex="0"
						id="user-changes"
						aria-controls="user-changes"
						href="' . $__templater->func('link', array('users/edit', $__vars['user'], ), true) . '#user-changes">' . 'Lịch sử thay đổi' . '</a>
					<a class="tabs-tab" role="tab" tabindex="0"
						id="user-permissions"
						aria-controls="user-permissions"
						href="' . $__templater->func('link', array('users/edit', $__vars['user'], ), true) . '#user-permissions">' . 'Phân quyền' . '</a>
				';
	}
	$__compilerTemp9 = '';
	if ($__templater->method($__vars['user'], 'exists', array())) {
		$__compilerTemp9 .= '
							' . $__templater->formCheckBox(array(
			'style' => 'margin-top: 5px;',
		), array(array(
			'name' => 'username_change_invisible',
			'label' => 'Do not display username change publicly (if changed)',
			'_type' => 'option',
		))) . '
						';
	}
	$__compilerTemp10 = '';
	if ($__vars['user']['username_date']) {
		$__compilerTemp10 .= '
						' . $__templater->formRow('
							' . $__templater->func('date_dynamic', array($__vars['user']['username_date'], array(
		))) . '
						', array(
			'label' => 'Last username change',
		)) . '
					';
	}
	$__compilerTemp11 = '';
	if ($__vars['user']['next_allowed_username_change']) {
		$__compilerTemp11 .= '
						' . $__templater->formRow('
							' . $__templater->func('date_dynamic', array($__vars['user']['next_allowed_username_change'], array(
		))) . '
						', array(
			'label' => 'Next allowed username change',
		)) . '
					';
	}
	$__compilerTemp12 = '';
	if ($__templater->method($__vars['user'], 'exists', array())) {
		$__compilerTemp12 .= '
						' . $__templater->formRadioRow(array(
			'name' => 'change_password',
		), array(array(
			'value' => '',
			'checked' => 'checked',
			'label' => 'Không thay đổi',
			'_type' => 'option',
		),
		array(
			'value' => 'generate',
			'label' => 'Gửi khôi phục mật khẩu',
			'hint' => 'Xác nhận khôi phục mật khẩu sẽ được gửi qua email tới thành viên và họ sẽ không thể đăng nhập cho đến khi họ đặt mật khẩu mới.',
			'_type' => 'option',
		),
		array(
			'value' => 'change',
			'label' => 'Đặt mật khẩu mới' . $__vars['xf']['language']['label_separator'],
			'_dependent' => array($__templater->formTextBox(array(
			'name' => 'password',
			'autocomplete' => 'off',
		))),
			'_type' => 'option',
		)), array(
			'label' => 'Mật khẩu',
			'explain' => 'Changing a user\'s password will reset any security lock on their account.',
		)) . '
					';
	} else {
		$__compilerTemp12 .= '
						' . $__templater->formTextBoxRow(array(
			'name' => 'password',
			'autocomplete' => 'off',
		), array(
			'label' => 'Mật khẩu',
		)) . '
					';
	}
	$__compilerTemp13 = '';
	if ($__vars['user']['user_id']) {
		$__compilerTemp13 .= '
						';
		$__compilerTemp14 = '';
		if ($__vars['user']['Option']['use_tfa']) {
			$__compilerTemp14 .= '
								<ul class="inputChoices">
									<li class="inputChoices-choice inputChoices-plainChoice">' . 'Đã bật' . '</li>
									<li class="inputChoices-choice">' . $__templater->formCheckBox(array(
				'standalone' => 'true',
			), array(array(
				'name' => 'disable_tfa',
				'label' => 'Vô hiệu hóa xác minh hai bước',
				'_type' => 'option',
			))) . '</li>
								</ul>
							';
		} else {
			$__compilerTemp14 .= '
								' . 'Tắt' . '
							';
		}
		$__compilerTemp13 .= $__templater->formRow('
							' . $__compilerTemp14 . '
						', array(
			'label' => 'Xác minh 2 bước',
		)) . '

						' . $__templater->formRow('
							' . $__templater->func('avatar', array($__vars['user'], 'l', false, array(
			'href' => $__templater->func('link', array('users/avatar', $__vars['user'], ), false),
			'data-xf-click' => 'overlay',
		))) . '
							<div>
								' . $__templater->button('Sửa ảnh đại diện', array(
			'href' => $__templater->func('link', array('users/avatar', $__vars['user'], ), false),
			'data-xf-click' => 'overlay',
			'class' => 'button--link',
		), '', array(
		)) . '
							</div>
						', array(
			'label' => 'Ảnh đại diện',
			'rowtype' => 'button avatar',
		)) . '

						' . $__templater->formRow('
							' . $__templater->func('profile_banner', array($__vars['user'], 'l', false, array(
			'class' => 'memberProfileBanner--small',
			'href' => $__templater->func('link', array('users/banner', $__vars['user'], ), false),
			'overlay' => 'true',
			'hideempty' => 'true',
		), '')) . '
							' . $__templater->button('Chỉnh sửa ảnh bìa hồ sơ', array(
			'href' => $__templater->func('link', array('users/banner', $__vars['user'], ), false),
			'data-xf-click' => 'overlay',
			'class' => 'button--link',
		), '', array(
		)) . '
						', array(
			'label' => 'Profile banner',
			'rowtype' => 'button memberProfileBanner',
		)) . '

						' . $__templater->formRow('
							' . $__templater->func('date_dynamic', array($__vars['user']['register_date'], array(
		))) . '
						', array(
			'label' => 'Tham gia',
		)) . '
						';
		if ($__vars['user']['last_activity']) {
			$__compilerTemp13 .= '
							' . $__templater->formRow('
								' . $__templater->func('date_dynamic', array($__vars['user']['last_activity'], array(
			))) . '
							', array(
				'label' => 'Hoạt động cuối',
			)) . '
						';
		}
		$__compilerTemp13 .= '
					';
	}
	$__compilerTemp15 = '';
	if ($__vars['user']['user_id']) {
		$__compilerTemp15 .= '
							';
		if (!$__vars['user']['is_moderator']) {
			$__compilerTemp15 .= '<a href="' . $__templater->func('link', array('moderators', ), true) . '">' . 'Đặt thành viên này làm kiểm duyệt viên' . '</a>';
		}
		$__compilerTemp15 .= '
							';
		if ((!$__vars['user']['is_admin']) AND (!$__vars['user']['is_moderator'])) {
			$__compilerTemp15 .= '/';
		}
		$__compilerTemp15 .= '
							';
		if (!$__vars['user']['is_admin']) {
			$__compilerTemp15 .= '<a href="' . $__templater->func('link', array('admins', ), true) . '">' . 'Đặt thành viên này làm quản trị viên' . '</a>';
		}
		$__compilerTemp15 .= '
						';
	}
	$__vars['_userChangesHtml'] = $__templater->preEscaped('
						' . $__compilerTemp15 . '
					');
	$__compilerTemp16 = $__templater->mergeChoiceOptions(array(), $__vars['userGroups']);
	$__compilerTemp17 = $__templater->mergeChoiceOptions(array(), $__vars['userGroups']);
	$__compilerTemp18 = array(array(
		'value' => '0',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Dùng giao diện mặc định' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp19 = $__templater->method($__vars['styleTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp19)) {
		foreach ($__compilerTemp19 AS $__vars['treeEntry']) {
			$__compilerTemp18[] = array(
				'value' => $__vars['treeEntry']['record']['style_id'],
				'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp20 = array();
	$__compilerTemp21 = $__templater->method($__vars['languageTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp21)) {
		foreach ($__compilerTemp21 AS $__vars['treeEntry']) {
			$__compilerTemp20[] = array(
				'value' => $__vars['treeEntry']['record']['language_id'],
				'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . '
								' . $__templater->escape($__vars['treeEntry']['record']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp22 = $__templater->mergeChoiceOptions(array(), $__vars['timeZones']);
	$__compilerTemp23 = '';
	if ($__vars['user']['user_id']) {
		$__compilerTemp23 .= '
				<li data-href="' . $__templater->func('link', array('users/extra', $__vars['user'], ), true) . '" role="tabpanel" aria-labelledby="user-extras">
					<div class="block-body block-row">' . 'Đang tải' . $__vars['xf']['language']['ellipsis'] . '</div>
				</li>
			';
	}
	$__compilerTemp24 = '';
	if ($__vars['user']['user_id']) {
		$__compilerTemp24 .= '
				<li data-href="' . $__templater->func('link', array('users/user-ips', $__vars['user'], ), true) . '" role="tabpanel" aria-labelledby="user-ips">
					<div class="block-body block-row">' . 'Đang tải' . $__vars['xf']['language']['ellipsis'] . '</div>
				</li>
			';
	}
	$__compilerTemp25 = '';
	if ($__vars['user']['user_id']) {
		$__compilerTemp25 .= '
				<li data-href="' . $__templater->func('link', array('users/change-log', $__vars['user'], ), true) . '" role="tabpanel" aria-labelledby="user-changes">
					<div class="block-body block-row">' . 'Đang tải' . $__vars['xf']['language']['ellipsis'] . '</div>
				</li>
			';
	}
	$__compilerTemp26 = '';
	if ($__vars['user']['user_id']) {
		$__compilerTemp26 .= '
				<li data-href="' . $__templater->func('link', array('permissions/users', $__vars['user'], array('tabbed' => 1, ), ), true) . '" role="tabpanel" aria-labelledby="user-permissions">
					<div class="block-body block-row">' . 'Đang tải' . $__vars['xf']['language']['ellipsis'] . '</div>
				</li>
			';
	}
	$__finalCompiled .= $__templater->form('
		' . $__compilerTemp7 . '

		<h2 class="block-tabHeader tabs hScroller" data-xf-init="tabs h-scroller" data-state="replace" role="tablist">
			<span class="hScroller-scroll">
				' . '
				<a class="tabs-tab is-active" role="tab" tabindex="0"
					id="user-details"
					aria-controls="user-details"
					href="' . $__templater->func('link', array('users/edit', $__vars['user'], ), true) . '#user-details">' . 'Chi tiết thành viên' . '</a>
				' . $__compilerTemp8 . '
				' . '
			</span>
		</h2>

		<ul class="tabPanes">
			' . '
			<li class="is-active" role="tabpanel" aria-labelledby="user-details">
				<div class="block-body">
					' . $__templater->formTextBoxRow(array(
		'name' => 'user[username]',
		'value' => $__vars['user']['username'],
		'maxlength' => ($__vars['xf']['options']['usernameLength']['max'] ?: $__templater->func('max_length', array($__vars['user'], 'username', ), false)),
	), array(
		'label' => 'Tên thành viên',
		'html' => $__compilerTemp9,
	)) . '

					' . $__compilerTemp10 . '

					' . $__compilerTemp11 . '

					' . $__templater->formTextBoxRow(array(
		'name' => 'user[email]',
		'value' => $__vars['user']['email'],
		'type' => 'email',
		'dir' => 'ltr',
		'maxlength' => $__templater->func('max_length', array($__vars['user'], 'email', ), false),
	), array(
		'label' => 'Email',
	)) . '

					' . $__compilerTemp12 . '

					' . $__compilerTemp13 . '

					<hr class="formRowSep" />

					' . '' . '

					' . $__templater->formSelectRow(array(
		'name' => 'user[user_group_id]',
		'value' => $__vars['user']['user_group_id'],
	), $__compilerTemp16, array(
		'label' => 'Nhóm thành viên',
		'explain' => $__templater->filter($__vars['_userChangesHtml'], array(array('raw', array()),), true),
	)) . '

					' . $__templater->formCheckBoxRow(array(
		'name' => 'user[secondary_group_ids]',
		'value' => $__vars['user']['secondary_group_ids'],
		'listclass' => 'listColumns',
	), $__compilerTemp17, array(
		'label' => 'Nhóm thành viên phụ',
	)) . '

					' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'user[is_staff]',
		'selected' => $__vars['user']['is_staff'],
		'label' => 'Hiển thị thành viên là BQT',
		'hint' => 'Nếu chọn, thành viên này sẽ được liệt kê công khai như một quản trị viên.',
		'_type' => 'option',
	)), array(
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'user[user_state]',
		'value' => $__vars['user']['user_state'],
	), array(array(
		'value' => 'valid',
		'label' => 'Valid',
		'_type' => 'option',
	),
	array(
		'value' => 'email_confirm',
		'label' => 'Đang chờ xác nhận email',
		'_type' => 'option',
	),
	array(
		'value' => 'email_confirm_edit',
		'label' => 'Đang đợi xác nhận email (từ chỉnh sửa)',
		'_type' => 'option',
	),
	array(
		'value' => 'email_bounce',
		'label' => 'Email invalid (bounced)',
		'_type' => 'option',
	),
	array(
		'value' => 'moderated',
		'label' => 'Chờ phê duyệt',
		'_type' => 'option',
	),
	array(
		'value' => 'rejected',
		'label' => 'Đã từ chối',
		'_type' => 'option',
	),
	array(
		'value' => 'disabled',
		'label' => 'Tắt',
		'_type' => 'option',
	)), array(
		'label' => 'Trạng thái thành viên',
		'explain' => '
							' . 'When in a user state other than \'' . 'Valid' . '\', users will receive permissions from the ' . (((('<a href="' . $__templater->func('link', array('user-groups/edit', array('user_group_id' => 1, 'title' => $__vars['userGroups']['1'], ), ), true)) . '" target="_blank">') . $__templater->escape($__vars['userGroups']['1'])) . '</a>') . ' group.' . '
						',
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'user[security_lock]',
		'value' => $__vars['user']['security_lock'],
	), array(array(
		'value' => '',
		'label' => 'Không có',
		'_type' => 'option',
	),
	array(
		'value' => 'change',
		'label' => 'Đã khóa' . $__vars['xf']['language']['label_separator'] . ' ' . 'User must change password',
		'_type' => 'option',
	),
	array(
		'value' => 'reset',
		'label' => 'Đã khóa' . $__vars['xf']['language']['label_separator'] . ' ' . 'User must reset password',
		'_type' => 'option',
	)), array(
		'label' => 'Security lock',
		'explain' => '
							' . 'When security locking an account, you can either force a user to change their password or, if you suspect unauthorized access, you can force a user to reset their password (email address is required).' . '
						',
	)) . '

					<hr class="formRowSep" />

					' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'option[is_discouraged]',
		'selected' => $__vars['user']['Option']['is_discouraged'],
		'hint' => 'Discouraged users are subjected to annoying random delays and failures in system behavior, designed to \'encourage\' them to go away and troll some other site.',
		'label' => 'Discouraged',
		'_type' => 'option',
	)), array(
		'explain' => '<a href="' . $__templater->func('link', array('banning/discouraged-ips', ), true) . '">' . 'Alternatively, you may use IP-based discouragement.' . '</a>',
	)) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Chi tiết cá nhân' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->callMacro('public:helper_user_dob_edit', 'dob_edit', array(
		'dobData' => $__vars['user']['Profile'],
	), $__vars) . '

					<hr class="formRowSep" />

					' . $__templater->formTextBoxRow(array(
		'name' => 'profile[location]',
		'value' => $__vars['user']['Profile']['location_'],
	), array(
		'label' => 'Nơi ở',
	)) . '
					' . $__templater->formTextBoxRow(array(
		'name' => 'profile[website]',
		'value' => $__vars['user']['Profile']['website_'],
		'type' => 'url',
		'dir' => 'ltr',
	), array(
		'label' => 'Website',
	)) . '
					' . $__templater->callMacro('public:custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'users',
		'group' => 'personal',
		'set' => $__vars['user']['Profile']['custom_fields'],
		'editMode' => 'admin',
	), $__vars) . '
					' . $__templater->formTextAreaRow(array(
		'name' => 'profile[about]',
		'value' => $__vars['user']['Profile']['about_'],
		'autosize' => 'true',
	), array(
		'label' => 'Giới thiệu',
		'hint' => 'Bạn có thể sử dụng BBCode',
	)) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Thông tin hồ sơ' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->formTextBoxRow(array(
		'name' => 'user[custom_title]',
		'value' => $__vars['user']['custom_title_'],
		'maxlength' => $__templater->func('max_length', array($__vars['user'], 'custom_title', ), false),
	), array(
		'label' => 'Tiêu đề tùy chỉnh',
	)) . '
					' . $__templater->formTextAreaRow(array(
		'name' => 'profile[signature]',
		'value' => $__vars['user']['Profile']['signature_'],
		'autosize' => 'true',
	), array(
		'label' => 'Chữ ký',
		'hint' => 'Bạn có thể sử dụng BBCode',
	)) . '

					<hr class="formRowSep" />

					' . $__templater->formNumberBoxRow(array(
		'name' => 'user[message_count]',
		'value' => $__vars['user']['message_count'],
		'min' => '0',
	), array(
		'label' => 'Bài viết',
	)) . '
					' . $__templater->formNumberBoxRow(array(
		'name' => 'user[reaction_score]',
		'value' => $__vars['user']['reaction_score'],
	), array(
		'label' => 'Điểm tương tác',
	)) . '
					' . $__templater->formNumberBoxRow(array(
		'name' => 'user[trophy_points]',
		'value' => $__vars['user']['trophy_points'],
		'min' => '0',
	), array(
		'label' => 'Điểm thành tích',
	)) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Liên hệ bổ sung' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->callMacro('public:custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'users',
		'group' => 'contact',
		'set' => $__vars['user']['Profile']['custom_fields'],
		'editMode' => 'admin',
	), $__vars) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Tùy chọn' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->formSelectRow(array(
		'name' => 'user[style_id]',
		'value' => $__vars['user']['style_id'],
	), $__compilerTemp18, array(
		'label' => 'Giao diện',
	)) . '

					<hr class="formRowSep" />

					' . $__templater->formSelectRow(array(
		'name' => 'user[language_id]',
		'value' => $__vars['user']['language_id'],
	), $__compilerTemp20, array(
		'label' => 'Ngôn ngữ',
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'user[timezone]',
		'value' => $__vars['user']['timezone'],
	), $__compilerTemp22, array(
		'label' => 'Múi giờ',
	)) . '

					<hr class="formRowSep" />

					' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'option[content_show_signature]',
		'selected' => $__vars['user']['Option']['content_show_signature'],
		'label' => '
							' . 'Hiển thị chữ ký với tin nhắn',
		'_type' => 'option',
	),
	array(
		'name' => 'option[receive_admin_email]',
		'selected' => $__vars['user']['Option']['receive_admin_email'],
		'label' => '
							' . 'Nhận tin tức và cập nhật email' . '
						',
		'_type' => 'option',
	),
	array(
		'name' => 'enable_activity_summary_email',
		'selected' => $__vars['user']['last_summary_email_date'] !== null,
		'label' => '
							' . 'Nhận email tóm tắt hoạt động' . '
						',
		'_type' => 'option',
	),
	array(
		'name' => 'option[email_on_conversation]',
		'selected' => $__vars['user']['Option']['email_on_conversation'],
		'label' => '
							' . 'Nhận email khi có tin nhắn đối thoại mới',
		'_type' => 'option',
	)), array(
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'option[creation_watch_state]',
		'value' => $__vars['user']['Option']['creation_watch_state'],
	), array(array(
		'value' => 'watch_no_email',
		'label' => 'Có',
		'_type' => 'option',
	),
	array(
		'value' => 'watch_email',
		'label' => 'Có, với email',
		'_type' => 'option',
	),
	array(
		'value' => '',
		'label' => 'Không',
		'_type' => 'option',
	)), array(
		'label' => 'Theo dõi chủ đề đã tạo',
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'option[interaction_watch_state]',
		'value' => $__vars['user']['Option']['interaction_watch_state'],
	), array(array(
		'value' => 'watch_no_email',
		'label' => 'Có',
		'_type' => 'option',
	),
	array(
		'value' => 'watch_email',
		'label' => 'Có, với email',
		'_type' => 'option',
	),
	array(
		'value' => '',
		'label' => 'Không',
		'_type' => 'option',
	)), array(
		'label' => 'Theo dõi chủ đề đã tương tác',
	)) . '

					' . $__templater->callMacro('public:custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'users',
		'group' => 'preferences',
		'set' => $__vars['user']['Profile']['custom_fields'],
		'editMode' => 'admin',
	), $__vars) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Bảo mật cá nhân' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'user[visible]',
		'selected' => $__vars['user']['visible'],
		'label' => 'Trạng thái online',
		'_dependent' => array('
								' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'user[activity_visible]',
		'selected' => $__vars['user']['activity_visible'],
		'label' => '
										' . 'Hiển thị hoạt động hiện tại' . '
									',
		'_type' => 'option',
	))) . '
							'),
		'_type' => 'option',
	),
	array(
		'name' => 'option[show_dob_date]',
		'selected' => $__vars['user']['Option']['show_dob_date'],
		'label' => 'Hiển thị ngày và tháng sinh',
		'_dependent' => array('
								' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'option[show_dob_year]',
		'selected' => $__vars['user']['Option']['show_dob_year'],
		'label' => '
										' . 'Hiển thị năm sinh' . '
									',
		'_type' => 'option',
	))) . '
							'),
		'_type' => 'option',
	)), array(
		'label' => 'Bảo mật chung',
	)) . '

					<hr class="formRowSep" />

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_view_profile',
		'label' => 'Xem chi tiết trang tiểu sử của thành viên này',
		'user' => $__vars['user'],
	), $__vars) . '

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_post_profile',
		'label' => 'Đăng nội dung trên trang hồ sơ của thành viên này',
		'user' => $__vars['user'],
		'hideEveryone' => true,
	), $__vars) . '

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_receive_news_feed',
		'label' => 'Nhận luồng tin của thành viên này',
		'user' => $__vars['user'],
	), $__vars) . '

					<hr class="formRowSep" />

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_send_personal_conversation',
		'label' => 'Tạo các cuộc trò chuyện với thành viên này',
		'user' => $__vars['user'],
		'hideEveryone' => true,
	), $__vars) . '

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_view_identities',
		'label' => 'Xem thông tin nhận dạng của thành viên này',
		'user' => $__vars['user'],
	), $__vars) . '
				</div>

				' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
			</li>

			' . $__compilerTemp23 . '

			' . $__compilerTemp24 . '

			' . $__compilerTemp25 . '

			' . $__compilerTemp26 . '
			' . '
		</ul>
	', array(
		'action' => $__templater->func('link', array('users/save', $__vars['user'], ), false),
		'ajax' => 'true',
		'class' => 'block-container',
		'novalidate' => 'novalidate',
	)) . '
</div>

';
	return $__finalCompiled;
}
);