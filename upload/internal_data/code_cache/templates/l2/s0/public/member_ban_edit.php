<?php
// FROM HASH: 70d86f29b6d254e64dc4a0b6a8a070cb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['user']['is_banned']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Sửa lệnh cấm' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['user']['username']));
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Cấm thành viên');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['user']['is_banned']) {
		$__compilerTemp1 .= '
				' . $__templater->formRow($__templater->escape($__vars['user']['username']), array(
			'label' => 'Tên thành viên',
		)) . '

				' . $__templater->formRow($__templater->escape($__vars['userBan']['BanUser']['username']), array(
			'label' => 'Bị cấm túc bởi',
		)) . '

				' . $__templater->formRow($__templater->func('date', array($__vars['userBan']['ban_date'], ), true), array(
			'label' => 'Bắn đầu cấm',
		)) . '

				';
		$__compilerTemp2 = '';
		if ($__vars['userBan']['end_date']) {
			$__compilerTemp2 .= '
						' . $__templater->func('date', array($__vars['userBan']['end_date'], ), true) . '
					';
		} else {
			$__compilerTemp2 .= '
						' . 'Không bao giờ' . '
					';
		}
		$__compilerTemp1 .= $__templater->formRow('
					' . $__compilerTemp2 . '
				', array(
			'label' => 'Kết thúc cấm',
		)) . '
			';
	}
	$__compilerTemp3 = '';
	if ($__vars['user']['is_banned']) {
		$__compilerTemp3 .= '
					' . $__templater->button('
						' . 'Bỏ cấm túc' . '
					', array(
			'href' => $__templater->func('link', array('members/ban/lift', $__vars['userBan'], ), false),
			'overlay' => 'true',
		), '', array(
		)) . '
				';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '

			' . $__templater->formRadioRow(array(
		'name' => 'ban_length',
		'value' => ((!$__vars['userBan']['end_date']) ? 'permanent' : 'temporary'),
	), array(array(
		'label' => 'Vĩnh viễn',
		'value' => 'permanent',
		'_type' => 'option',
	),
	array(
		'label' => 'Đến ngày' . $__vars['xf']['language']['label_separator'],
		'value' => 'temporary',
		'_dependent' => array($__templater->formDateInput(array(
		'name' => 'end_date',
		'value' => ($__vars['userBan']['end_date'] ? $__templater->func('date', array($__vars['userBan']['end_date'], 'Y-m-d', ), false) : ''),
	))),
		'_type' => 'option',
	)), array(
		'label' => 'Thời hạn cấm túc',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'user_reason',
		'value' => $__vars['userBan']['user_reason'],
		'maxlength' => $__templater->func('max_length', array($__vars['userBan'], 'user_reason', ), false),
	), array(
		'label' => 'Lý do cấm túc',
		'explain' => 'Sẽ được hiển thị cho thành viên nếu được cung cấp.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
		'html' => '
				' . $__compilerTemp3 . '
			',
	)) . '
	</div>

	' . $__templater->func('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->func('link', array('members/ban/save', $__vars['user'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);