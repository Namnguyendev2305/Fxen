<?php
// FROM HASH: e67509e26ac9771dd90676c7576b4ad8
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Xuất ngôn ngữ' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['language']['title']));
	$__finalCompiled .= '

';
	$__vars['addOnRepo'] = $__templater->method($__vars['xf']['app']['em'], 'getRepository', array('XF:AddOn', ));
	$__finalCompiled .= '

';
	$__compilerTemp1 = array(array(
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Tất cả' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp2 = $__templater->method($__templater->method($__vars['addOnRepo'], 'findAddOnsForList', array()), 'fetch', array());
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['addOn']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['addOn']['addon_id'],
				'label' => $__templater->escape($__vars['addOn']['title']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow($__templater->escape($__vars['language']['title']), array(
		'label' => 'Ngôn ngữ',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'addon_id',
	), $__compilerTemp1, array(
		'label' => 'Xuất từ tiện ích',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'untranslated',
		'label' => 'Xuất cụm từ chưa sửa đổi',
		'hint' => 'Điều này sẽ hữu ích nếu bạn muốn dịch ngôn ngữ này trực tiếp sử dụng tệp tin XML.',
		'_type' => 'option',
	)), array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'export',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('languages/export', $__vars['language'], ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);