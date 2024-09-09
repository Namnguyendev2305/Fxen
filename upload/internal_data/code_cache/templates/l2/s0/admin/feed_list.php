<?php
// FROM HASH: 6620a868e6fd630831722059dc7722af
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Nhập nguồn cấp dữ liệu RSS');
	$__finalCompiled .= '

';
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Thêm nguồn cấp dữ liệu', array(
		'href' => $__templater->func('link', array('feeds/add', ), false),
		'icon' => 'add',
	), '', array(
	)) . '
');
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['feeds'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['feeds'])) {
			foreach ($__vars['feeds'] AS $__vars['feed']) {
				$__compilerTemp1 .= '
						' . $__templater->dataRow(array(
				), array(array(
					'hash' => $__vars['feed']['feed_id'],
					'href' => $__templater->func('link', array('feeds/edit', $__vars['feed'], ), false),
					'label' => $__templater->escape($__vars['feed']['title']),
					'explain' => $__templater->filter($__vars['feed']['url'], array(array('url_display', array()),), true),
					'_type' => 'main',
					'html' => '',
				),
				array(
					'name' => 'active[' . $__vars['feed']['feed_id'] . ']',
					'selected' => $__vars['feed']['active'],
					'class' => 'dataList-cell--separated',
					'submit' => 'true',
					'tooltip' => 'Bật / Tắt \'' . $__vars['feed']['title'] . '\'',
					'_type' => 'toggle',
					'html' => '',
				),
				array(
					'href' => $__templater->func('link', array('feeds/import', $__vars['feed'], ), false),
					'_type' => 'action',
					'html' => 'Import now',
				),
				array(
					'href' => $__templater->func('link', array('feeds/delete', $__vars['feed'], ), false),
					'_type' => 'delete',
					'html' => '',
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-outer">
			' . $__templater->callMacro('filter_macros', 'quick_filter', array(
			'key' => 'feeds',
			'class' => 'block-outer-opposite',
		), $__vars) . '
		</div>
		<div class="block-container">
			<div class="block-body">
				' . $__templater->dataList('
					' . $__compilerTemp1 . '
				', array(
		)) . '
			</div>
			<div class="block-footer">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['feeds'], ), true) . '</span>
			</div>
		</div>
	', array(
			'action' => $__templater->func('link', array('feeds/toggle', ), false),
			'class' => 'block',
			'ajax' => 'true',
		)) . '
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'Chưa có nguồn cấp dữ liệu nào được đăng ký.' . '</div>
';
	}
	return $__finalCompiled;
}
);