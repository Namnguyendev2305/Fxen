<?php
// FROM HASH: c2ab05f88ceb9d180feb07f7d0bbf6df
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
		';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
				';
	if ($__vars['hasOptions'] AND ($__vars['addOn']['active'] AND $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('option', )))) {
		$__compilerTemp2 .= '
					<a href="' . (($__vars['hasOptions'] === true) ? $__templater->func('link', array('add-ons/options', $__vars['addOn'], ), true) : $__templater->func('link', array($__vars['hasOptions'], ), true)) . '" class="menu-linkRow">' . 'Tùy chọn' . '</a>
				';
	}
	$__compilerTemp2 .= '
				';
	if ($__vars['hasPublicTemplates'] AND $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('style', ))) {
		$__compilerTemp2 .= '
					<a href="' . $__templater->func('link', array('styles/templates', $__vars['style'], array('addon_id' => $__vars['addOn']['addon_id'], 'type' => 'public', ), ), true) . '" class="menu-linkRow">' . 'Mẫu công khai' . '</a>
				';
	}
	$__compilerTemp2 .= '
				';
	if ($__vars['hasEmailTemplates'] AND $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('style', ))) {
		$__compilerTemp2 .= '
					<a href="' . $__templater->func('link', array('styles/templates', $__vars['style'], array('addon_id' => $__vars['addOn']['addon_id'], 'type' => 'email', ), ), true) . '" class="menu-linkRow">' . 'Mẫu email' . '</a>
				';
	}
	$__compilerTemp2 .= '
				';
	if ($__vars['hasAdminTemplates'] AND $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('style', ))) {
		$__compilerTemp2 .= '
					<a href="' . $__templater->func('link', array('styles/templates', $__vars['masterStyle'], array('addon_id' => $__vars['addOn']['addon_id'], 'type' => 'admin', ), ), true) . '" class="menu-linkRow">' . 'Mẫu quản trị' . '</a>
				';
	}
	$__compilerTemp2 .= '
				';
	if ($__vars['hasPhrases'] AND $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('language', ))) {
		$__compilerTemp2 .= '
					<a href="' . $__templater->func('link', array('languages/phrases', $__vars['language'], array('addon_id' => $__vars['addOn']['addon_id'], ), ), true) . '" class="menu-linkRow">' . 'Cụm từ' . '</a>
				';
	}
	$__compilerTemp2 .= '
			';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__compilerTemp1 .= '
			' . $__compilerTemp2 . '

			<hr class="menu-separator" />
		';
	}
	$__compilerTemp1 .= '

		';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
				';
	if ((($__templater->method($__vars['addOn'], 'isInstalled', array()) OR $__templater->method($__vars['addOn'], 'canUpgrade', array()))) AND (!$__templater->method($__vars['addOn'], 'isLegacy', array()))) {
		$__compilerTemp3 .= '
					<a href="' . $__templater->func('link', array('add-ons/toggle', $__vars['addOn'], array('t' => $__templater->func('csrf_token', array(), false), ), ), true) . '" class="menu-linkRow">' . ($__vars['addOn']['active'] ? 'Vô hiệu hóa' : 'Kích hoạt') . '</a>
				';
	}
	$__compilerTemp3 .= '
				';
	if ($__templater->method($__vars['addOn'], 'hasPendingChanges', array()) AND $__vars['xf']['development']) {
		$__compilerTemp3 .= '
					<a href="' . $__templater->func('link', array('add-ons/sync-changes', $__vars['addOn'], array('t' => $__templater->func('csrf_token', array(), false), ), ), true) . '" class="menu-linkRow">' . 'Sync changes' . '</a>
				';
	}
	$__compilerTemp3 .= '
				';
	if ($__templater->method($__vars['addOn'], 'isFileVersionValid', array()) AND $__templater->method($__vars['addOn'], 'canRebuild', array())) {
		$__compilerTemp3 .= '
					<a href="' . $__templater->func('link', array('add-ons/rebuild', $__vars['addOn'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Cập nhật' . '</a>
				';
	}
	$__compilerTemp3 .= '
				';
	if ($__templater->method($__vars['addOn'], 'isInstalled', array()) AND (!$__templater->method($__vars['addOn'], 'canUpgrade', array()))) {
		$__compilerTemp3 .= '
					<a href="' . $__templater->func('link', array('add-ons/uninstall', $__vars['addOn'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Gỡ cài đặt' . '</a>
				';
	}
	$__compilerTemp3 .= '
			';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__compilerTemp1 .= '
			' . $__compilerTemp3 . '
		';
	}
	$__compilerTemp1 .= '
	';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
	' . $__compilerTemp1 . '
';
	} else {
		$__finalCompiled .= '
	<div class="menu-row">' . 'Không có gì để hiển thị' . '</div>
';
	}
	return $__finalCompiled;
}
);