<?php
// FROM HASH: 10af43eb220d67ab50213c62c2dea692
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Xác nhận hành động');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['errors']) {
		$__compilerTemp1 .= '
					' . 'Chúng tôi đã tìm thấy một số lỗi trong khi cố cài đặt tiện ích sau' . $__vars['xf']['language']['label_separator'] . '
				';
	} else if ($__vars['warnings']) {
		$__compilerTemp1 .= '
					' . 'Vui lòng xem lại các cảnh cáo và xác nhận bạn muốn tiếp tục cài đặt tiện ích sau đây' . $__vars['xf']['language']['label_separator'] . '
				';
	} else {
		$__compilerTemp1 .= '
					' . 'Vui lòng xác nhận rằng bạn muốn cài đặt tiện ích bổ sung sau đây' . $__vars['xf']['language']['label_separator'] . '
				';
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . $__compilerTemp1 . '
				<strong>' . $__templater->escape($__vars['addOn']['title']) . ' ' . $__templater->escape($__vars['addOn']['version_string']) . '</strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>

		' . $__templater->callMacro('addon_action_macros', 'summary', array(
		'errors' => $__vars['errors'],
		'warnings' => $__vars['warnings'],
	), $__vars) . '

		' . $__templater->callMacro('addon_action_macros', 'action', array(
		'errors' => $__vars['errors'],
		'warnings' => $__vars['warnings'],
		'submit' => 'Cài đặt',
	), $__vars) . '
	</div>

	' . $__templater->func('redirect_input', array(null, null, true)) . '

', array(
		'action' => $__templater->func('link', array('add-ons/install', $__vars['addOn'], ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);