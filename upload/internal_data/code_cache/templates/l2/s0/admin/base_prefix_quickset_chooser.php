<?php
// FROM HASH: a5ce80864fe1319f1ca435ff3e701f0e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Thiết lập nhanh tiền tố');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array(array(
		'value' => '-1',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Không có' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['prefixGroups'])) {
		foreach ($__vars['prefixGroups'] AS $__vars['groupId'] => $__vars['prefixGroup']) {
			if (($__templater->func('count', array($__vars['prefixesGrouped'][$__vars['groupId']], ), false) > 0)) {
				$__compilerTemp1[] = array(
					'label' => $__templater->func('prefix_group', array($__vars['prefixType'], $__vars['groupId'], ), false),
					'_type' => 'optgroup',
					'options' => array(),
				);
				end($__compilerTemp1); $__compilerTemp2 = key($__compilerTemp1);
				if ($__templater->isTraversable($__vars['prefixesGrouped'][$__vars['groupId']])) {
					foreach ($__vars['prefixesGrouped'][$__vars['groupId']] AS $__vars['prefixId'] => $__vars['cssClass']) {
						$__compilerTemp1[$__compilerTemp2]['options'][] = array(
							'value' => $__vars['prefixId'],
							'label' => $__templater->func('prefix_title', array($__vars['prefixType'], $__vars['prefixId'], ), true),
							'_type' => 'option',
						);
					}
				}
			}
		}
	}
	$__compilerTemp3 = '';
	if ($__templater->isTraversable($__vars['prefixIds'])) {
		foreach ($__vars['prefixIds'] AS $__vars['prefixId']) {
			$__compilerTemp3 .= '
		' . $__templater->formHiddenVal('prefix_ids[]', $__vars['prefixId'], array(
			)) . '
	';
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formSelectRow(array(
		'name' => 'prefix_id',
	), $__compilerTemp1, array(
		'label' => 'Sao chép cài đặt từ',
		'explain' => 'Trên trang tiếp theo, bạn có thể áp dụng cài đặt cho tất cả các tiền tố được chọn. Nếu bạn muốn dựa vào các cài đặt này trên tiền tố hiện tại, hãy chọn nó ở đây.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Tiến hành' . $__vars['xf']['language']['ellipsis'],
		'name' => 'quickset',
		'value' => '1',
	), array(
	)) . '
	</div>
	' . $__compilerTemp3 . '
', array(
		'action' => $__templater->func('link', array($__vars['linkPrefix'] . '/quick-set', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);