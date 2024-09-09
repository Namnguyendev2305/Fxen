<?php
// FROM HASH: 45b86e18794d70f8389682ef1a55e563
return array(
'macros' => array('db_host' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'value' => 'localhost',
		'placeholder' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->callMacro(null, 'db_textbox', array(
		'name' => 'host',
		'label' => 'MySQL server',
		'value' => $__vars['value'],
		'placeholder' => $__vars['placeholder'],
		'explain' => $__vars['explain'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'db_dbname' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'value' => null,
		'placeholder' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->callMacro(null, 'db_textbox', array(
		'name' => 'dbname',
		'label' => 'MySQL database name',
		'value' => $__vars['value'],
		'placeholder' => $__vars['placeholder'],
		'explain' => $__vars['explain'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'db_username' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'value' => null,
		'placeholder' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->callMacro(null, 'db_textbox', array(
		'name' => 'username',
		'label' => 'MySQL username',
		'value' => $__vars['value'],
		'placeholder' => $__vars['placeholder'],
		'explain' => $__vars['explain'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'db_password' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'value' => null,
		'placeholder' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->callMacro(null, 'db_textbox', array(
		'name' => 'password',
		'label' => 'MySQL password',
		'value' => $__vars['value'],
		'placeholder' => $__vars['placeholder'],
		'autocomplete' => 'off',
		'explain' => $__vars['explain'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'db_port' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'value' => '3306',
		'placeholder' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->callMacro(null, 'db_textbox', array(
		'name' => 'port',
		'label' => 'MySQL port',
		'value' => $__vars['value'],
		'placeholder' => $__vars['placeholder'],
		'explain' => $__vars['explain'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'db_tablePrefix' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'value' => null,
		'placeholder' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->callMacro(null, 'db_textbox', array(
		'name' => 'tablePrefix',
		'label' => 'MySQL table prefix',
		'value' => $__vars['value'],
		'placeholder' => $__vars['placeholder'],
		'explain' => $__vars['explain'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'db_charset' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'value' => null,
		'placeholder' => null,
		'explain' => 'Nếu bạn chỉ định một bộ ký tự trong cấu hình cho hệ thống bạn đang nhập, bạn nên chỉ định cùng một bộ ký tự đặt ở đây.',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->callMacro(null, 'db_textbox', array(
		'name' => 'charset',
		'label' => 'Force character set',
		'value' => $__vars['value'],
		'placeholder' => $__vars['placeholder'],
		'explain' => $__vars['explain'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'db_textbox' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'name' => '!',
		'label' => '!',
		'value' => null,
		'placeholder' => null,
		'autocomplete' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->formTextBoxRow(array(
		'name' => 'config[db][' . $__vars['name'] . ']',
		'value' => $__vars['value'],
		'autocomplete' => $__vars['autocomplete'],
		'placeholder' => $__vars['placeholder'],
	), array(
		'label' => $__templater->escape($__vars['label']),
		'explain' => $__templater->escape($__vars['explain']),
	)) . '
';
	return $__finalCompiled;
}
),
'language_charset' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'name' => 'charset',
		'label' => 'xfi_default_language_character_set',
		'value' => null,
		'placeholder' => null,
		'autocomplete' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->formTextBoxRow(array(
		'name' => 'config[' . $__vars['name'] . ']',
		'value' => $__vars['value'],
		'autocomplete' => $__vars['autocomplete'],
		'placeholder' => $__vars['placeholder'],
	), array(
		'label' => $__templater->escape($__vars['label']),
		'explain' => $__templater->escape($__vars['explain']),
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

' . '

';
	return $__finalCompiled;
}
);