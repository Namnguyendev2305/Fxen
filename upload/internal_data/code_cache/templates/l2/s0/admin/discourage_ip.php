<?php
// FROM HASH: 5952f2739ce61f0190db93d87b44e8cf
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Xác nhận hành động');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Please confirm that you want to discourage the following IP address' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('users/ip-users', null, array('ip' => $__vars['ip'], ), ), true) . '" dir="ltr">' . $__templater->escape($__vars['ip']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'reason',
		'maxlength' => '250',
	), array(
		'hint' => 'Tùy chọn (không bắt buộc)',
		'label' => 'Lý do',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('banning/discouraged-ips/add', null, array('ip' => $__vars['ip'], ), ), false),
		'ajax' => 'true',
		'data-redirect' => 'off',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);