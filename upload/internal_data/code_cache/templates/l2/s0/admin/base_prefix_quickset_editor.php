<?php
// FROM HASH: d0c1c9af008fef332a5a4d5a5fc3b513
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Thiết lập nhanh tiền tố');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['prefixes'])) {
		foreach ($__vars['prefixes'] AS $__vars['prefixId'] => $__vars['_prefix']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['prefixId'],
				'checked' => 'checked',
				'label' => '<span class="' . $__templater->escape($__vars['_prefix']['css_class']) . '">' . $__templater->escape($__vars['_prefix']['title']) . '</span>',
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formCheckBoxRow(array(
		'name' => 'prefix_ids',
		'listclass' => 'inputChoices--inline',
	), $__compilerTemp1, array(
		'label' => 'Apply options to these prefixes',
	)) . '

			' . $__templater->formCheckBoxRow(array(
		'name' => 'apply_css_class',
	), array(array(
		'label' => 'Áp dụng tùy chọn hiển thị kiểu dáng' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array('
						' . $__templater->callMacro('base_prefix_edit_macros', 'display_style', array(
		'prefix' => $__vars['prefix'],
		'displayStyles' => $__vars['displayStyles'],
		'withRow' => '0',
	), $__vars) . '
					'),
		'_type' => 'option',
	)), array(
		'label' => 'Kiểu hiển thị',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
		'name' => 'apply_prefix_group_id',
	), array(array(
		'label' => 'Áp dụng tùy chọn nhóm tiền tố' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array('
						' . $__templater->callMacro('base_prefix_edit_macros', 'prefix_groups', array(
		'prefix' => $__vars['prefix'],
		'prefixGroups' => $__vars['prefixGroups'],
		'withRow' => '0',
	), $__vars) . '
					'),
		'_type' => 'option',
	)), array(
		'label' => 'Nhóm tiền tố',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
		'name' => 'apply_user_group_ids',
	), array(array(
		'label' => 'Apply user group options' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array('
						' . $__templater->callMacro('helper_user_group_edit', 'checkboxes', array(
		'selectedUserGroups' => ($__vars['prefix']['prefix_id'] ? $__vars['prefix']['allowed_user_group_ids'] : array(-1, )),
		'withRow' => '0',
	), $__vars) . '
					'),
		'_type' => 'option',
	)), array(
		'label' => 'Sử dụng bởi nhóm thành viên',
	)) . '

			' . $__templater->filter($__vars['extraOptions'], array(array('raw', array()),), true) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array($__vars['linkPrefix'] . '/quick-set', ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);