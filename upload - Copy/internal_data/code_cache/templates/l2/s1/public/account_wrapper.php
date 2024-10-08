<?php
// FROM HASH: f62cdfad05dce9f270f21cb52a4124a8
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewBookmarks', array())) {
		$__compilerTemp1 .= '
					<a class="blockLink ' . (($__vars['pageSelected'] == 'bookmarks') ? 'is-selected' : '') . '" href="' . $__templater->func('link', array('account/bookmarks', ), true) . '">
						' . 'Dấu trang' . '
					</a>
				';
	}
	$__compilerTemp2 = '';
	if ($__templater->method($__vars['xf']['visitor'], 'canEditSignature', array())) {
		$__compilerTemp2 .= '
					<a class="blockLink ' . (($__vars['pageSelected'] == 'signature') ? 'is-selected' : '') . '" href="' . $__templater->func('link', array('account/signature', ), true) . '">
						' . 'Chữ ký' . '
					</a>
				';
	}
	$__compilerTemp3 = '';
	if ($__vars['xf']['app']['userUpgradeCount']) {
		$__compilerTemp3 .= '
					<a class="blockLink ' . (($__vars['pageSelected'] == 'upgrades') ? 'is-selected' : '') . '" href="' . $__templater->func('link', array('account/upgrades', ), true) . '">
						' . 'Nâng cấp tài khoản' . '
					</a>
				';
	}
	$__compilerTemp4 = '';
	if ($__vars['xf']['app']['connectedAccountCount']) {
		$__compilerTemp4 .= '
					<a class="blockLink ' . (($__vars['pageSelected'] == 'connected_account') ? 'is-selected' : '') . '" href="' . $__templater->func('link', array('account/connected-accounts', ), true) . '">
						' . 'Tài khoản đã kết nối' . '
					</a>
				';
	}
	$__templater->modifySideNavHtml(null, '
	<div class="block">
		<div class="block-container">
			<h3 class="block-header">' . 'Tài khoản của bạn' . '</h3>
			<div class="block-body">
				' . '
				<a class="blockLink" href="' . $__templater->func('link', array('members', $__vars['xf']['visitor'], ), true) . '">' . 'Trang cá nhân' . '</a>
				<a class="blockLink ' . (($__vars['pageSelected'] == 'alerts') ? 'is-selected' : '') . '" href="' . $__templater->func('link', array('account/alerts', ), true) . '">
					' . 'Thông báo' . '
				</a>
				<a class="blockLink ' . (($__vars['pageSelected'] == 'reactions') ? 'is-selected' : '') . '" href="' . $__templater->func('link', array('account/reactions', ), true) . '">
					' . 'Điểm tương tác đã nhận' . '
				</a>
				' . $__compilerTemp1 . '
				' . '
			</div>

			<h3 class="block-minorHeader">' . 'Thiết lập' . '</h3>
			<div class="block-body">
				' . '
				<a class="blockLink ' . (($__vars['pageSelected'] == 'account_details') ? 'is-selected' : '') . '" href="' . $__templater->func('link', array('account/account-details', ), true) . '">
					' . 'Thông tin tài khoản' . '
				</a>
				<a class="blockLink ' . (($__vars['pageSelected'] == 'security') ? 'is-selected' : '') . '" href="' . $__templater->func('link', array('account/security', ), true) . '">
					' . 'Mật khẩu và bảo mật' . '
				</a>
				<a class="blockLink ' . (($__vars['pageSelected'] == 'privacy') ? 'is-selected' : '') . '" href="' . $__templater->func('link', array('account/privacy', ), true) . '">
					' . 'Bảo mật cá nhân' . '
				</a>
				<a class="blockLink ' . (($__vars['pageSelected'] == 'preferences') ? 'is-selected' : '') . '" href="' . $__templater->func('link', array('account/preferences', ), true) . '">
					' . 'Tùy chọn' . '
				</a>
				' . $__compilerTemp2 . '
				' . $__compilerTemp3 . '
				' . $__compilerTemp4 . '
				<a class="blockLink ' . (($__vars['pageSelected'] == 'following') ? 'is-selected' : '') . '" href="' . $__templater->func('link', array('account/following', ), true) . '">
					' . 'Đang theo dõi' . '
				</a>
				<a class="blockLink ' . (($__vars['pageSelected'] == 'ignored') ? 'is-selected' : '') . '" href="' . $__templater->func('link', array('account/ignored', ), true) . '">
					' . 'Bỏ qua' . '
				</a>
				' . '
			</div>
		</div>
	</div>

	<div class="block">
		<div class="block-container">
			<div class="block-body">
				<a href="' . $__templater->func('link', array('logout', null, array('t' => $__templater->func('csrf_token', array(), false), ), ), true) . '" class="blockLink">' . 'Thoát' . '</a>
			</div>
		</div>
	</div>
', 'replace');
	$__finalCompiled .= '
';
	$__templater->setPageParam('sideNavTitle', 'Tài khoản của bạn');
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped('Tài khoản của bạn'), $__templater->func('link', array('account', ), false), array(
	));
	$__finalCompiled .= '

' . $__templater->filter($__vars['innerContent'], array(array('raw', array()),), true);
	return $__finalCompiled;
}
);