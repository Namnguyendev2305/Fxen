<?php
// FROM HASH: fe9cc7913f4279736af717d86b505298
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['user']['username']));
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<h3 class="block-minorHeader">' . 'Nâng cấp thành viên đang hoạt động' . '</h3>
		<div class="block-body">
			';
	if (!$__templater->test($__vars['upgrades'], 'empty', array())) {
		$__finalCompiled .= '
				';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['upgrades'])) {
			foreach ($__vars['upgrades'] AS $__vars['upgrade']) {
				$__compilerTemp1 .= '
						' . $__templater->dataRow(array(
					'rowclass' => 'dataList-row--noHover',
				), array(array(
					'_type' => 'cell',
					'html' => $__templater->escape($__vars['upgrade']['Upgrade']['title']),
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->func('date_dynamic', array($__vars['upgrade']['start_date'], array(
				))),
				),
				array(
					'_type' => 'cell',
					'html' => ($__vars['upgrade']['end_date'] ? $__templater->func('date', array($__vars['upgrade']['end_date'], ), true) : 'Vĩnh viễn'),
				),
				array(
					'overlay' => 'true',
					'href' => $__templater->func('link', array('user-upgrades/edit-active', null, array('user_upgrade_record_id' => $__vars['upgrade']['user_upgrade_record_id'], ), ), false),
					'_type' => 'action',
					'html' => 'Chỉnh sửa',
				),
				array(
					'overlay' => 'true',
					'href' => $__templater->func('link', array('user-upgrades/downgrade', null, array('user_upgrade_record_id' => $__vars['upgrade']['user_upgrade_record_id'], ), ), false),
					'_type' => 'action',
					'html' => 'Hạ cấp',
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => 'Tiêu đề nâng cấp',
		),
		array(
			'_type' => 'cell',
			'html' => 'Ngày bắt đầu',
		),
		array(
			'_type' => 'cell',
			'html' => 'Ngày kết thúc',
		),
		array(
			'_type' => 'cell',
			'html' => '',
		),
		array(
			'_type' => 'cell',
			'html' => '',
		))) . '
					' . $__compilerTemp1 . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			';
	} else {
		$__finalCompiled .= '
				<div class="block-row">' . 'Không có' . '</div>
			';
	}
	$__finalCompiled .= '
		</div>

		<h3 class="block-minorHeader">' . 'Tài khoản đã kết nối' . '</h3>
		<div class="block-body block-row">
			';
	$__compilerTemp2 = true;
	if ($__templater->isTraversable($__vars['connectedProviders'])) {
		foreach ($__vars['connectedProviders'] AS $__vars['provider']) {
			if ($__templater->method($__vars['provider'], 'isAssociated', array($__vars['user'], ))) {
				$__compilerTemp2 = false;
				$__finalCompiled .= '
				<dl class="pairs pairs--columns pairs--fixedSmall">
					<dt>' . $__templater->escape($__vars['provider']['title']) . '</dt>
					<dd>' . $__templater->filter($__templater->method($__vars['provider'], 'renderAssociated', array($__vars['user'], )), array(array('raw', array()),), true) . '</dd>
				</dl>
			';
			}
		}
	}
	if ($__compilerTemp2) {
		$__finalCompiled .= '
				' . 'Không có' . '
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);