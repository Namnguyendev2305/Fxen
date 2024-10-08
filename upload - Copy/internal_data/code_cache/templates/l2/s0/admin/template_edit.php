<?php
// FROM HASH: 286e47db6099872b47fcb94726597350
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['template'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Thêm mẫu');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Chỉnh sửa mẫu' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['template']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__templater->setPageParam('breadcrumbPath', 'styles');
	$__finalCompiled .= '
';
	$__templater->breadcrumb($__templater->preEscaped($__templater->escape($__vars['style']['title']) . ' - ' . 'Mẫu'), $__templater->func('link', array('styles/templates', $__vars['style'], array('type' => $__vars['template']['type'], ), ), false), array(
	));
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['template'], 'isUpdate', array()) AND ($__vars['template']['style_id'] == $__vars['style']['style_id'])) {
		$__compilerTemp1 = '';
		if ($__vars['style']['style_id']) {
			$__compilerTemp1 .= '
		' . $__templater->button('Xem thay đổi tùy chỉnh', array(
				'href' => $__templater->func('link', array('templates/compare', $__vars['template'], ), false),
				'data-xf-click' => 'overlay',
				'data-cache' => 'false',
			), '', array(
			)) . '
		' . $__templater->button('Khôi phục', array(
				'href' => $__templater->func('link', array('templates/delete', $__vars['template'], array('_xfRedirect' => $__vars['redirect'], ), ), false),
				'overlay' => 'true',
			), '', array(
			)) . '
	';
		} else {
			$__compilerTemp1 .= '
		' . $__templater->button('', array(
				'href' => $__templater->func('link', array('templates/delete', $__vars['template'], array('_xfRedirect' => $__vars['redirect'], ), ), false),
				'icon' => 'delete',
				'overlay' => 'true',
			), '', array(
			)) . '
	';
		}
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__compilerTemp1 . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp2 = '';
	if ($__vars['hasHistory']) {
		$__compilerTemp2 .= '
						<div class="js-historyTarget toggleTarget" data-href="trigger-href"></div>
					';
	}
	$__compilerTemp3 = '';
	if (!$__vars['style']['style_id']) {
		$__compilerTemp3 .= '
				' . $__templater->callMacro('addon_macros', 'addon_edit', array(
			'addOnId' => $__vars['template']['addon_id'],
		), $__vars) . '
			';
	} else {
		$__compilerTemp3 .= '
				' . $__templater->formHiddenVal('addon_id', $__vars['template']['addon_id'], array(
		)) . '
			';
	}
	$__compilerTemp4 = '';
	if ($__vars['hasHistory']) {
		$__compilerTemp4 .= '
					' . $__templater->button('Xem lịch sử', array(
			'href' => $__templater->func('link', array('templates/history', $__vars['template'], ), false),
			'class' => 'blockLink',
			'icon' => 'history',
			'data-xf-click' => 'toggle',
			'data-target' => '.js-historyTarget',
		), '', array(
		)) . '
				';
	}
	$__finalCompiled .= $__templater->form('

	' . $__templater->formHiddenVal('style_id', $__vars['style']['style_id'], array(
	)) . '

	<div class="block-container">

		' . $__templater->formRadioTabsRow(array(
		'name' => 'type',
		'value' => $__vars['template']['type'],
		'readonly' => $__templater->method($__vars['template'], 'isUpdate', array()),
	), array(array(
		'value' => 'public',
		'label' => $__templater->escape($__vars['types']['public']),
		'_type' => 'option',
	),
	array(
		'value' => 'email',
		'label' => $__templater->escape($__vars['types']['email']),
		'_type' => 'option',
	),
	array(
		'value' => 'admin',
		'label' => $__templater->escape($__vars['types']['admin']),
		'_type' => 'option',
	)), array(
		'initialhtml' => '
				' . $__templater->callMacro('style_macros', 'style_change_menu', array(
		'styleTree' => $__vars['styleTree'],
		'currentStyle' => $__vars['style'],
		'route' => ($__templater->method($__vars['template'], 'isInsert', array()) ? 'styles/add-template' : 'styles/edit-template'),
		'routeParams' => array('template_id' => $__vars['template']['template_id'], 'type' => $__vars['template']['type'], ),
		'linkClass' => 'tabs-tab',
	), $__vars) . '
				<span class="tabs-tab is-readonly">' . 'Kiểu' . $__vars['xf']['language']['label_separator'] . '</span>
			',
	)) . '

		<div class="block-body" data-xf-init="code-editor-switcher-container" data-template-suffix-mode="1">

			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => $__vars['template']['title'],
		'class' => 'js-codeEditorSwitcher formRow--noLabel',
		'maxlength' => $__templater->func('max_length', array($__vars['template'], 'title', ), false),
		'autofocus' => 'autofocus',
		'autocomplete' => 'off',
		'dir' => 'ltr',
	), array(
		'rowtype' => 'fullWidth',
		'label' => 'Tên mẫu',
		'hint' => 'Phải là duy nhất',
	)) . '

			' . $__templater->formCodeEditorRow(array(
		'name' => 'template',
		'value' => $__vars['template']['template'],
		'mode' => 'html',
		'rows' => '12',
		'data-submit-selector' => '.js-submitButton',
	), array(
		'rowtype' => 'fullWidth noLabel',
		'rowclass' => 'js-codeEditorContainer',
		'label' => 'Template',
		'explain' => 'Bạn có thể sử dụng cú pháp mẫu XenForo ở đây',
		'finalhtml' => '
					' . $__compilerTemp2 . '
				',
	)) . '

			' . $__compilerTemp3 . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'class' => 'js-submitButton',
		'data-ajax-redirect' => ((($__templater->method($__vars['template'], 'isInsert', array()) OR ($__vars['template']['style_id'] != $__vars['style']['style_id']))) ? '1' : '0'),
	), array(
		'html' => '
				' . $__templater->button('Lưu và thoát', array(
		'type' => 'submit',
		'name' => 'exit',
		'icon' => 'save',
	), '', array(
	)) . '
				' . $__compilerTemp4 . '
			',
	)) . '
	</div>
	' . $__templater->func('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->func('link', array('templates/save', $__vars['template'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);