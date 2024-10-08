<?php
// FROM HASH: 498e7853c3a6e5a071e6942d3dba8ef4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formTextBoxRow(array(
		'name' => 'options[client_id]',
		'value' => $__vars['options']['client_id'],
	), array(
		'label' => 'Client ID',
		'hint' => '(Yêu cầu)',
		'explain' => 'The Client ID that is associated with your <a href="https://developer.yahoo.com/apps" target="_blank">Yahoo application</a> for this domain.',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[client_secret]',
		'value' => $__vars['options']['client_secret'],
	), array(
		'label' => 'Client secret',
		'hint' => '(Yêu cầu)',
		'explain' => 'The client secret for the Yahoo application you created for this domain.',
	));
	return $__finalCompiled;
}
);