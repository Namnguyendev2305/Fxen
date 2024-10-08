<?php
// FROM HASH: 3926640d9f58425b73573e6f2070fb71
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Tiện ích');
	$__finalCompiled .= '

';
	$__templater->includeCss('addon_list.less');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['disabled']) {
		$__compilerTemp1 .= '
		' . $__templater->button('
			' . 'Kích hoạt' . '
		', array(
			'href' => $__templater->func('link', array('add-ons/mass-toggle', null, array('enable' => 1, ), ), false),
			'overlay' => 'true',
			'data-cache' => '0',
		), '', array(
		)) . '
	';
	}
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('
		' . 'Install/upgrade from archive' . '
	', array(
		'href' => $__templater->func('link', array('add-ons/install-from-archive', ), false),
		'overlay' => 'true',
		'icon' => 'add',
	), '', array(
	)) . '
	' . $__compilerTemp1 . '
	' . $__templater->button('
		' . 'Vô hiệu hóa tất cả' . '
	', array(
		'href' => $__templater->func('link', array('add-ons/mass-toggle', null, array('enable' => 0, ), ), false),
		'overlay' => 'true',
		'data-cache' => '0',
	), '', array(
	)) . '
');
	$__finalCompiled .= '

';
	if ($__vars['hasProcessing']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		' . 'One or more add-ons currently have actions pending and may be in an inconsistent state. Because of this, some errors may be suppressed and unexpected behavior may occur. If this does not change shortly, please contact the add-on author for guidance.' . '
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['upgradeCheck']) {
		$__finalCompiled .= '
	' . $__templater->callMacro('upgrade_check_macros', 'installable_add_ons', array(
			'upgradeCheck' => $__vars['upgradeCheck'],
		), $__vars) . '
';
	}
	$__finalCompiled .= '

' . $__templater->callMacro('addon_list_macros', 'addon_list_filter', array(), $__vars) . '

';
	if ($__vars['total']) {
		$__finalCompiled .= '
	<div class="addOnList">
		' . '
		' . $__templater->callMacro('addon_list_macros', 'addon_list_block', array(
			'addOns' => $__vars['upgradeable'],
			'heading' => 'Tiện ích có thể nâng cấp được',
		), $__vars) . '
		' . '
		' . $__templater->callMacro('addon_list_macros', 'addon_list_block', array(
			'addOns' => $__vars['installable'],
			'heading' => 'Tiện ích bổ sung có thể cài đặt',
			'addOnDirWritable' => $__vars['addOnDirWritable'],
		), $__vars) . '
		' . '
		' . $__templater->callMacro('addon_list_macros', 'addon_list_block', array(
			'addOns' => $__vars['installed'],
			'heading' => 'Tiện ích đã cài đặt',
		), $__vars) . '
		' . '
		' . $__templater->callMacro('addon_list_macros', 'addon_list_block', array(
			'addOns' => $__vars['legacy'],
			'heading' => 'Tiện ích cũ',
			'desc' => 'Tiện ích bổ sung cũ chỉ tương thích với các phiên bản cũ hơn của XenForo. Chúng đang ở trạng thái không hoạt động và sẽ không được kích hoạt lại cho đến khi chúng được nâng cấp. Việc gỡ cài đặt các tiện ích cũ sẽ để lại dữ liệu rác.',
		), $__vars) . '
		' . '
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'Không có tiện ích nào được cài đặt hoặc sẵn sàng để cài đặt.' . '</div>
';
	}
	return $__finalCompiled;
}
);