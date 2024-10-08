<?php
// FROM HASH: 32ab6c85258b770462ef3c853905cdcf
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Template search results' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['style']['title']));
	$__finalCompiled .= '

<div class="block">
	';
	if (!$__templater->test($__vars['templates'], 'empty', array())) {
		$__finalCompiled .= '
		<div class="block-outer">
			' . $__templater->callMacro('filter_macros', 'quick_filter', array(
			'class' => 'block-outer-opposite',
		), $__vars) . '
		</div>
	';
	}
	$__finalCompiled .= '
	<div class="block-container">

		' . $__templater->callMacro(null, 'filter_macros::filter_bar', array(
		'route' => 'templates/search',
		'content' => $__vars['style'],
		'params' => $__vars['linkParams'],
		'displayValues' => $__vars['filterDisplay'],
		'phrases' => array('key:type' => 'Loại mẫu' . $__vars['xf']['language']['label_separator'], 'key:addon_id' => 'Tiện ích' . $__vars['xf']['language']['label_separator'], 'key:title' => 'Tiêu đề chứa' . $__vars['xf']['language']['label_separator'], 'key:template' => 'Văn bản Chứa' . $__vars['xf']['language']['label_separator'], 'key:template_cs' => 'Phân biệt dạng chữ (chữ hoa và chữ thường)', 'key:state' => 'Trạng thái mẫu' . $__vars['xf']['language']['label_separator'], 'val:_none' => 'Không có', 'val:default' => 'Chưa thay đổi', 'val:inherited' => 'Được sửa đổi theo giao diện gốc', 'val:custom' => 'Được chỉnh sửa trong giao diện này', ),
		'menu' => 'templates/refine-search',
	), $__vars) . '

		';
	if (!$__templater->test($__vars['templates'], 'empty', array())) {
		$__finalCompiled .= '
			<div class="block-body">
				' . $__templater->dataList('
					' . $__templater->callMacro('template_list', 'template_list', array(
			'templates' => $__vars['templates'],
			'style' => $__vars['style'],
		), $__vars) . '
				', array(
		)) . '
			</div>
			<div class="block-footer">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['templates'], ), true) . '</span>
			</div>
		';
	} else {
		$__finalCompiled .= '
			<div class="block-body block-row">' . 'Không tìm thấy.' . '</div>
		';
	}
	$__finalCompiled .= '
	</div>
</div>';
	return $__finalCompiled;
}
);