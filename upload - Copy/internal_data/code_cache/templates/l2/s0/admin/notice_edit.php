<?php
// FROM HASH: c8de5e074915c46b1915685c36ca8808
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['notice'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Thêm thông báo');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Chỉnh sửa thông báo' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['notice']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['notice'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Khôi phục', array(
			'href' => $__templater->func('link', array('notices/reset', $__vars['notice'], ), false),
			'overlay' => 'true',
		), '', array(
		)) . '
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('notices/delete', $__vars['notice'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['noticeTypes'])) {
		foreach ($__vars['noticeTypes'] AS $__vars['typeId'] => $__vars['typeValue']) {
			if ($__vars['typeId'] == 'floating') {
				$__compilerTemp1[] = array(
					'value' => $__vars['typeId'],
					'data-xf-init' => 'disabler',
					'data-container' => '.js-hiderContainer',
					'data-hide' => 'yes',
					'label' => $__templater->escape($__vars['typeValue']),
					'_type' => 'option',
				);
			} else {
				$__compilerTemp1[] = array(
					'value' => $__vars['typeId'],
					'label' => $__templater->escape($__vars['typeValue']),
					'_type' => 'option',
				);
			}
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<h2 class="block-tabHeader tabs hScroller" data-xf-init="tabs h-scroller" role="tablist">
			<span class="hScroller-scroll">
				<a class="tabs-tab is-active" role="tab" tabindex="0" aria-controls="notice-options">' . 'Tuỳ chọn thông báo' . '</a>
				' . $__templater->callMacro('helper_criteria', 'user_tabs', array(), $__vars) . '
				' . $__templater->callMacro('helper_criteria', 'page_tabs', array(), $__vars) . '
			</span>
		</h2>

		<ul class="tabPanes block-body">
			<li class="is-active" role="tabpanel" id="notice-options">
				' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => $__vars['notice']['title'],
		'maxlength' => $__templater->func('max_length', array($__vars['notice'], 'title', ), false),
	), array(
		'label' => 'Tiêu đề',
		'explain' => 'Cung cấp một tiêu đề cho thông báo này, sẽ xuất hiện trong tiêu đề tab của khu vực thông báo. Giữ cho nó ngắn!',
	)) . '

				' . $__templater->formCodeEditorRow(array(
		'name' => 'message',
		'value' => $__vars['notice']['message'],
		'mode' => 'html',
		'data-line-wrapping' => 'true',
		'class' => 'codeEditor--autoSize codeEditor--proportional',
	), array(
		'label' => 'Nội dung',
		'hint' => 'Bạn có thể sử dụng HTML',
		'explain' => 'The message to be shown when the display criteria are met. You may insert {user_id} to be replaced with the current visitor\'s unique identifier, {name} to be replaced with their username and {title} to be replaced with this notice\'s title.',
	)) . '

				<hr class="formRowSep" />

				' . $__templater->formRadioRow(array(
		'name' => 'display_image',
		'value' => $__vars['notice']['display_image'],
	), array(array(
		'value' => '',
		'label' => 'Không có hình ảnh',
		'_type' => 'option',
	),
	array(
		'value' => 'avatar',
		'label' => 'Hiển thị ảnh đại diện của khách truy cập',
		'_type' => 'option',
	),
	array(
		'value' => 'image',
		'label' => 'Specify an image' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formAssetUpload(array(
		'name' => 'image_url',
		'value' => $__vars['notice']['image_url'],
		'asset' => 'notice_images',
		'maxlength' => $__templater->func('max_length', array($__vars['notice'], 'image_url', ), false),
		'dir' => 'ltr',
	))),
		'_type' => 'option',
	)), array(
		'label' => 'Hình ảnh hiển thị',
	)) . '

				' . $__templater->formRadioRow(array(
		'name' => 'display_style',
		'value' => $__vars['notice']['display_style'],
	), array(array(
		'value' => 'primary',
		'label' => 'Primary',
		'_type' => 'option',
	),
	array(
		'value' => 'accent',
		'label' => 'Nhấn mạnh',
		'_type' => 'option',
	),
	array(
		'value' => 'dark',
		'label' => 'Dark',
		'_type' => 'option',
	),
	array(
		'value' => 'light',
		'label' => 'Light',
		'_type' => 'option',
	),
	array(
		'value' => 'custom',
		'label' => 'Khác, sử dụng tên lớp CSS tùy chỉnh' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'css_class',
		'value' => $__vars['notice']['css_class'],
		'maxlength' => $__templater->func('max_length', array($__vars['notice'], 'css_class', ), false),
		'dir' => 'ltr',
	))),
		'_type' => 'option',
	)), array(
		'label' => 'Kiểu hiển thị',
	)) . '

				' . $__templater->formRadioRow(array(
		'name' => 'visibility',
		'value' => $__vars['notice']['visibility'],
	), array(array(
		'label' => 'Không bao giờ ẩn',
		'_type' => 'option',
	),
	array(
		'value' => 'wide',
		'label' => 'Hide below wide width (' . $__templater->func('property', array('responsiveWide', ), true) . ')',
		'_type' => 'option',
	),
	array(
		'value' => 'medium',
		'label' => 'Hide below medium width (' . $__templater->func('property', array('responsiveMedium', ), true) . ')',
		'_type' => 'option',
	),
	array(
		'value' => 'narrow',
		'label' => 'Hide below narrow width (' . $__templater->func('property', array('responsiveNarrow', ), true) . ')',
		'_type' => 'option',
	)), array(
		'label' => 'Visibility',
		'explain' => 'Use these settings to control visibility based on display size. These settings are linked to the <a href="' . $__templater->func('link', array('styles/style-properties/group', array('style_id' => $__vars['xf']['options']['defaultStyleId'], ), array('group' => 'page', ), ), true) . '">responsive break point style properties</a> and may vary depending on the selected style.',
	)) . '

				<hr class="formRowSep" />

				' . $__templater->formRadioRow(array(
		'name' => 'notice_type',
		'value' => $__vars['notice']['notice_type'],
	), $__compilerTemp1, array(
		'label' => 'Loại thông báo',
		'explain' => 'Block and scrolling notices are displayed at the top of the page above the top breadcrumb. Floating notices are displayed in the bottom right corner. Fixed notes are full width and fixed to the bottom of the page.',
	)) . '

				<div class="js-hiderContainer">

					' . $__templater->formNumberBoxRow(array(
		'name' => 'display_duration',
		'value' => $__vars['notice']['display_duration'],
		'min' => '0',
		'max' => '3600000',
		'step' => '100',
	), array(
		'label' => 'Thời lượng hiển thị (mili giây)',
		'explain' => 'Length of time to display notice on screen, in milliseconds, before fading out. Use 0 to display until dismissed.',
	)) . '

					' . $__templater->formNumberBoxRow(array(
		'name' => 'delay_duration',
		'value' => $__vars['notice']['delay_duration'],
		'min' => '0',
		'max' => '3600000',
		'step' => '100',
	), array(
		'label' => 'Thời gian trễ (mili giây)',
		'explain' => 'Length of time to delay displaying the notice, in milliseconds, before fading in.',
	)) . '
				</div>

				<hr class="formRowSep" />

				' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'dismissible',
		'selected' => $__vars['notice']['dismissible'],
		'label' => 'Notice may be dismissed',
		'hint' => 'Users may hide this notice when they have read it.',
		'_dependent' => array('
							' . $__templater->formCheckBox(array(
	), array(array(
		'value' => '1',
		'label' => 'Tự động loại bỏ thông báo khi nó bị tắt',
		'name' => 'auto_dismiss',
		'selected' => $__vars['notice']['auto_dismiss'],
		'hint' => 'Tùy chọn này chỉ hợp lệ cho thông báo nổi và nếu thời gian hiển thị được chỉ định ở trên',
		'_type' => 'option',
	))) . '
						'),
		'_type' => 'option',
	),
	array(
		'name' => 'active',
		'selected' => $__vars['notice']['active'],
		'label' => 'Notice is active',
		'hint' => 'Use this to temporarily disable this notice.',
		'_type' => 'option',
	)), array(
		'label' => 'Tùy chọn',
	)) . '

				' . $__templater->callMacro('display_order_macros', 'row', array(
		'value' => $__vars['notice']['display_order'],
	), $__vars) . '
			</li>

			' . $__templater->callMacro('helper_criteria', 'user_panes', array(
		'criteria' => $__templater->method($__vars['userCriteria'], 'getCriteriaForTemplate', array()),
		'data' => $__templater->method($__vars['userCriteria'], 'getExtraTemplateData', array()),
	), $__vars) . '

			' . $__templater->callMacro('helper_criteria', 'page_panes', array(
		'criteria' => $__templater->method($__vars['pageCriteria'], 'getCriteriaForTemplate', array()),
		'data' => $__templater->method($__vars['pageCriteria'], 'getExtraTemplateData', array()),
	), $__vars) . '

		</ul>

		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('notices/save', $__vars['notice'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);