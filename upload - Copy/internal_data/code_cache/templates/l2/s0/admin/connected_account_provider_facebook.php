<?php
// FROM HASH: 2aed4e9192474946e8c188a6bc1b5ed7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formTextBoxRow(array(
		'name' => 'options[app_id]',
		'value' => $__vars['options']['app_id'],
	), array(
		'label' => 'ID ứng dụng',
		'hint' => '(Yêu cầu)',
		'explain' => 'The ID that is associated with your <a href="https://developers.facebook.com/apps" target="_blank">Facebook application</a> for this domain.',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[app_secret]',
		'value' => $__vars['options']['app_secret'],
	), array(
		'label' => 'App secret',
		'hint' => '(Yêu cầu)',
		'explain' => 'The secret for the Facebook application you created for this domain.',
	));
	return $__finalCompiled;
}
);