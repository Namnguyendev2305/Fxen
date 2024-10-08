<?php
// FROM HASH: bb2635355058b47191c42069536b7c07
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
		'explain' => 'Entering a client ID will allow users to log in using their Google accounts. You can get a client ID via Google\'s <a href="https://console.developers.google.com/" target="_blank">Developer Console</a>',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[client_secret]',
		'value' => $__vars['options']['client_secret'],
	), array(
		'label' => 'Client secret',
		'hint' => '(Yêu cầu)',
		'explain' => 'The secret that corresponds to your Google client ID.',
	));
	return $__finalCompiled;
}
);