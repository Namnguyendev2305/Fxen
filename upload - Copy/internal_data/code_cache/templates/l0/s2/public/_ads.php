<?php
// FROM HASH: 8b8089f38c7183607f607b6b6c4c5a21
return array(
'macros' => array('container_header' => array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
';
	if (!$__templater->func('in_array', array($__vars['xf']['reply']['template'], array('error', 'login', 'login_password_confirm', 'login_two_step', 'message_page', 'register_complete', 'register_connected_account', 'register_confirm', 'register_form', ), ), false)) {
		$__finalCompiled .= '
	' . '
	<div class="banner-header">
	    <img src="data/assets/style_properties/Wintel.jpg" alt="Your Forum Name">
	</div>
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

	return $__finalCompiled;
}
);