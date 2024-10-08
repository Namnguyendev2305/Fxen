<?php
// FROM HASH: 52231264c99439bb63a7459ad4131ebb
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
				' . 'Vui lòng xác nhận rằng bạn muốn cấm địa chỉ IP sau đây' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('users/ip-users', null, array('ip' => $__vars['ip']['ip'], ), ), true) . '" dir="ltr">' . $__templater->escape($__vars['ip']['ip']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'reason',
		'value' => $__vars['ip']['reason'],
		'maxlength' => $__templater->func('max_length', array($__vars['ip'], 'reason', ), false),
	), array(
		'label' => 'Lý do',
		'hint' => 'Tùy chọn (không bắt buộc)',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('banning/ips/add', null, array('ip' => $__vars['ip']['ip'], ), ), false),
		'ajax' => 'true',
		'data-redirect' => 'off',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);