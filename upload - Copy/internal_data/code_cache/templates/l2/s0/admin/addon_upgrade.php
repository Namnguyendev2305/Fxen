<?php
// FROM HASH: 6c00071105515d4ed619e1833ebd2320
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
					' . 'Chúng tôi đã tìm thấy một số lỗi trong khi cố gắng nâng cấp tiện ích sau' . $__vars['xf']['language']['label_separator'] . '
				';
	} else if ($__vars['warnings']) {
		$__compilerTemp1 .= '
					' . 'Vui lòng xem lại các cảnh báo và xác nhận bạn muốn tiếp tục nâng cấp các tiện ích sau đây' . $__vars['xf']['language']['label_separator'] . '
				';
	} else {
		$__compilerTemp1 .= '
					' . 'Vui lòng xác nhận rằng bạn muốn nâng cấp tiện ích bổ sung sau đây' . $__vars['xf']['language']['label_separator'] . '
				';
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . $__compilerTemp1 . '
				<strong>' . $__templater->escape($__vars['addOn']['title']) . ' &middot; ' . $__templater->escape($__vars['addOn']['version_string']) . ' -&gt; ' . $__templater->escape($__vars['addOn']['json_version_string']) . '</strong>
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
		'submit' => 'Nâng cấp',
	), $__vars) . '
	</div>

	' . $__templater->func('redirect_input', array(null, null, true)) . '

', array(
		'action' => $__templater->func('link', array('add-ons/upgrade', $__vars['addOn'], ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);