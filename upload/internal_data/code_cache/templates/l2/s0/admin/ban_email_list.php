<?php
// FROM HASH: 2a16afe5d1c1007e769ed6858d3401fc
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Cấm túc email');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__templater->test($__vars['emailBans'], 'empty', array())) {
		$__compilerTemp1 .= '
			' . $__templater->button('', array(
			'href' => $__templater->func('link', array('banning/emails/export', null, array('t' => $__templater->func('csrf_token', array(), false), ), ), false),
			'icon' => 'export',
		), '', array(
		)) . '
		';
	}
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	<div class="buttonGroup">
		' . $__templater->button('', array(
		'href' => $__templater->func('link', array('banning/emails/import', ), false),
		'icon' => 'import',
		'overlay' => 'true',
	), '', array(
	)) . '
		' . $__compilerTemp1 . '
	</div>
');
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['emailBans'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp2 = '';
		if ($__templater->isTraversable($__vars['emailBans'])) {
			foreach ($__vars['emailBans'] AS $__vars['emailBan']) {
				$__compilerTemp2 .= '
						' . $__templater->dataRow(array(
				), array(array(
					'name' => 'delete[]',
					'value' => $__vars['emailBan']['banned_email'],
					'_type' => 'toggle',
					'html' => '',
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->escape($__vars['emailBan']['banned_email']),
				),
				array(
					'_type' => 'cell',
					'html' => ($__vars['emailBan']['create_date'] ? $__templater->func('date', array($__vars['emailBan']['create_date'], ), true) : 'N/A'),
				),
				array(
					'_type' => 'cell',
					'html' => '
								' . ($__vars['emailBan']['last_triggered_date'] ? $__templater->func('date_dynamic', array($__vars['emailBan']['last_triggered_date'], ), true) : 'Không bao giờ') . '
							',
				),
				array(
					'_type' => 'cell',
					'html' => ($__vars['emailBan']['User'] ? $__templater->escape($__vars['emailBan']['User']['username']) : 'N/A'),
				),
				array(
					'_type' => 'cell',
					'html' => ($__vars['emailBan']['reason'] ? $__templater->escape($__vars['emailBan']['reason']) : 'N/A'),
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->dataList('
					<colgroup>
						<col style="width: 1%">
						<col style="width: 15%">
						<col style="width: 15%">
						<col style="width: 15%">
						<col style="width: 15%">
						<col>
					</colgroup>
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'check-all' => '< .block-container',
			'data-xf-init' => 'tooltip',
			'title' => 'Chọn tất cả',
			'_type' => 'option',
		))),
		),
		array(
			'href' => $__templater->func('link', array('banning/emails', '', array('order' => 'banned_email', 'direction' => (((($__vars['direction'] == 'desc') OR (!$__vars['direction']))) ? 'asc' : ''), ), ), false),
			'_type' => 'cell',
			'html' => '
							' . 'Email' . '
						',
		),
		array(
			'href' => $__templater->func('link', array('banning/emails', '', array('order' => '', 'direction' => (((($__vars['direction'] == 'desc') OR (!$__vars['direction']))) ? 'asc' : ''), ), ), false),
			'_type' => 'cell',
			'html' => '
							' . 'Ngày' . '
						',
		),
		array(
			'href' => $__templater->func('link', array('banning/emails', '', array('order' => 'last_triggered_date', 'direction' => (((($__vars['direction'] == 'desc') OR (!$__vars['direction']))) ? 'asc' : ''), ), ), false),
			'_type' => 'cell',
			'html' => '
							' . 'Lần kích hoạt cuối cùng' . '
						',
		),
		array(
			'_type' => 'cell',
			'html' => 'Bởi',
		),
		array(
			'_type' => 'cell',
			'html' => 'Lý do',
		))) . '
					' . $__compilerTemp2 . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			</div>
			<div class="block-footer block-footer--split">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['emailBans'], $__vars['total'], ), true) . '</span>
				<span class="block-footer-select">' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'check-all' => '< .block-container',
			'label' => 'Chọn tất cả',
			'_type' => 'option',
		))) . '</span>
				<span class="block-footer-controls">' . $__templater->button('', array(
			'type' => 'submit',
			'icon' => 'delete',
		), '', array(
		)) . '</span>
			</div>
		</div>
		' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'banning/emails',
			'params' => array('order' => (($__vars['order'] != 'create_date') ? $__vars['order'] : ''), 'direction' => (($__vars['direction'] != 'desc') ? $__vars['direction'] : ''), ),
			'wrapperclass' => 'block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
	', array(
			'action' => $__templater->func('link', array('banning/emails/delete', ), false),
			'ajax' => 'true',
			'class' => 'block',
		)) . '
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'Không có địa chỉ email nào bị cấm.' . '</div>
';
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<h3 class="block-header">' . 'Thêm lệnh cấm email' . '</h3>
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'email',
		'maxlength' => $__templater->func('max_length', array($__vars['newEmail'], 'banned_email', ), false),
	), array(
		'label' => 'Cấm túc email',
		'explain' => 'Bạn có thể sử dụng * để đại diện cho các ký tự đại diện. Nếu bạn không sử dụng bất kỳ ký tự đại diện nào, chúng sẽ tự động được thêm vào nếu thích hợp.',
	)) . '
			' . $__templater->formTextBoxRow(array(
		'name' => 'reason',
		'maxlength' => $__templater->func('max_length', array($__vars['newEmail'], 'reason', ), false),
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
		'action' => $__templater->func('link', array('banning/emails/add', ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);