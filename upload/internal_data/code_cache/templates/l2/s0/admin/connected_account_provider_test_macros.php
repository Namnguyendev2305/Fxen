<?php
// FROM HASH: 80941aa6a76b969a5ae997037281e514
return array(
'macros' => array('explain' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'providerTitle' => '!',
		'keyName' => '!',
		'keyValue' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formInfoRow('
		' . 'Điều này sẽ kiểm tra ' . $__templater->escape($__vars['providerTitle']) . ' nhà cung cấp tài khoản được kết nối. Bạn phải có tài khoản ' . $__templater->escape($__vars['providerTitle']) . ' để thực hiện kiểm tra này.' . '
	', array(
	)) . '

	' . $__templater->formRow($__templater->escape($__vars['keyValue']), array(
		'label' => $__templater->escape($__vars['keyName']),
	)) . '
';
	return $__finalCompiled;
}
),
'success' => array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formInfoRow('
		<div class="blockMessage blockMessage--success">' . 'Kiểm tra thành công!' . '</div>
	', array(
		'rowtype' => 'confirm',
	)) . '
';
	return $__finalCompiled;
}
),
'display_name' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'name' => '!',
		'secondaryName' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	if ($__vars['secondaryName']) {
		$__compilerTemp1 .= '
			' . $__templater->escape($__vars['secondaryName']) . '
		';
	}
	$__finalCompiled .= $__templater->formRow('
		' . ($__templater->escape($__vars['name']) ?: 'N/A') . '
		' . $__compilerTemp1 . '
	', array(
		'label' => 'Tên',
	)) . '
';
	return $__finalCompiled;
}
),
'email' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'email' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formRow('
		' . ($__templater->escape($__vars['email']) ?: 'N/A') . '
	', array(
		'label' => 'Email',
	)) . '
';
	return $__finalCompiled;
}
),
'picture' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'url' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	if ($__vars['url']) {
		$__compilerTemp1 .= '
			<img src="' . $__templater->escape($__vars['url']) . '" width="48" />
		';
	} else {
		$__compilerTemp1 .= '
			' . 'N/A' . '
		';
	}
	$__finalCompiled .= $__templater->formRow('
		' . $__compilerTemp1 . '
	', array(
		'label' => 'Hình ảnh',
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

';
	return $__finalCompiled;
}
);