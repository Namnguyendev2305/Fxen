<?php
// FROM HASH: d6cb3c107551e9f584fed897a5cb7493
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Gói nâng cấp đã hết hạn' . ($__vars['userUpgrade'] ? (': ' . $__templater->escape($__vars['userUpgrade']['title'])) : ''));
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('
				' . $__templater->formTextBox(array(
		'name' => 'username',
		'class' => 'input--inline',
		'ac' => 'single',
	)) . '
				' . $__templater->button('Lọc', array(
		'type' => 'submit',
	), '', array(
	)) . '
			', array(
		'label' => 'Lọc bởi thành viên',
		'rowtype' => 'input',
	)) . '
		</div>
	</div>
', array(
		'action' => $__templater->func('link', array('user-upgrades/expired', $__vars['userUpgrade'], ), false),
		'class' => 'block',
	)) . '

';
	if (!$__templater->test($__vars['expiredUpgrades'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['expiredUpgrades'])) {
			foreach ($__vars['expiredUpgrades'] AS $__vars['expiredUpgrade']) {
				$__compilerTemp1 .= '
						';
				$__vars['paymentProfile'] = $__vars['expiredUpgrade']['PurchaseRequest']['PaymentProfile'];
				$__compilerTemp2 = '';
				if ($__vars['paymentProfile']) {
					$__compilerTemp2 .= '
									<a href="' . $__templater->func('link', array('payment-profiles/edit', $__vars['paymentProfile'], ), true) . '">' . $__templater->escape($__vars['paymentProfile']['title']) . '</a>
								';
				} else {
					$__compilerTemp2 .= '
									' . 'N/A' . '
								';
				}
				$__compilerTemp1 .= $__templater->dataRow(array(
					'rowclass' => 'dataList-row--noHover',
				), array(array(
					'_type' => 'cell',
					'html' => '
								' . $__templater->func('username_link', array($__vars['expiredUpgrade']['User'], false, array(
					'defaultname' => 'Unknown user',
					'href' => $__templater->func('link', array('users/edit', $__vars['expiredUpgrade']['User'], ), false),
				))) . '
							',
				),
				array(
					'_type' => 'cell',
					'html' => '
								<a href="' . $__templater->func('link', array('user-upgrades/edit', $__vars['expiredUpgrade']['Upgrade'], ), true) . '">' . $__templater->escape($__vars['expiredUpgrade']['Upgrade']['title']) . '</a>
							',
				),
				array(
					'_type' => 'cell',
					'html' => '
								' . '' . '
								' . $__compilerTemp2 . '
							',
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->func('date_dynamic', array($__vars['expiredUpgrade']['start_date'], array(
				))),
				),
				array(
					'_type' => 'cell',
					'html' => ($__vars['expiredUpgrade']['end_date'] ? $__templater->func('date', array($__vars['expiredUpgrade']['end_date'], ), true) : 'Vĩnh viễn'),
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => '<a href="' . $__templater->func('link', array('user-upgrades/expired', $__vars['userUpgrade'], array('order' => 'username', 'direction' => (((($__vars['linkParams']['order'] == 'username') AND ($__vars['linkParams']['direction'] == 'desc'))) ? 'asc' : 'desc'), ) + $__vars['linkParams'], ), true) . '">' . 'Thành viên' . '</a>',
		),
		array(
			'_type' => 'cell',
			'html' => 'Tiêu đề nâng cấp',
		),
		array(
			'_type' => 'cell',
			'html' => 'Tài khoản thanh toán',
		),
		array(
			'_type' => 'cell',
			'html' => '<a href="' . $__templater->func('link', array('user-upgrades/expired', $__vars['userUpgrade'], array('order' => 'start_date', 'direction' => (((($__vars['linkParams']['order'] == 'start_date') AND ($__vars['linkParams']['direction'] == 'desc'))) ? 'asc' : 'desc'), ) + $__vars['linkParams'], ), true) . '">' . 'Ngày bắt đầu' . '</a>',
		),
		array(
			'_type' => 'cell',
			'html' => '<a href="' . $__templater->func('link', array('user-upgrades/expired', $__vars['userUpgrade'], array('order' => 'end_date', 'direction' => (((($__vars['linkParams']['order'] == 'end_date') AND ($__vars['linkParams']['direction'] == 'desc'))) ? 'asc' : 'desc'), ) + $__vars['linkParams'], ), true) . '">' . 'Ngày kết thúc' . '</a>',
		))) . '
					' . $__compilerTemp1 . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			</div>
			<div class="block-footer">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['expiredUpgrades'], $__vars['totalExpired'], ), true) . '</span>
			</div>
		</div>

		' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['totalExpired'],
			'link' => 'user-upgrades/expired',
			'data' => $__vars['userUpgrade'],
			'params' => $__vars['linkParams'],
			'wrapperclass' => 'block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'Không tìm thấy.' . '</div>
';
	}
	return $__finalCompiled;
}
);