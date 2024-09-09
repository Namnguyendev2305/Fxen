<?php
// FROM HASH: 19492e7ee08206a98c7b6dce6a644f5d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped(($__vars['article']['Category']['content_term'] ? 'Rate this ' . $__templater->escape($__vars['article']['Category']['content_term']) . '' : 'Rate this article'));
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['article'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'ams_reviews',
		'set' => $__vars['review']['custom_fields'],
		'group' => 'top',
		'editMode' => $__templater->method($__vars['article'], 'getFieldEditMode', array()),
		'onlyInclude' => $__vars['category']['review_field_cache'],
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__compilerTemp1 .= '
				' . $__compilerTemp2 . '
			';
	}
	$__compilerTemp3 = '';
	if ($__vars['category']['allow_pros_cons']) {
		$__compilerTemp3 .= '
				' . $__templater->formTextAreaRow(array(
			'name' => 'pros',
			'rows' => '2',
			'autosize' => 'true',
			'data-xf-init' => 'min-length',
			'data-min-length' => $__vars['xf']['options']['xa_amsMinProsLength'],
			'data-allow-empty' => 'true',
			'data-toggle-target' => '#js-articleProsLength',
			'maxlength' => $__vars['xf']['options']['xa_amsMaxProsLength'],
		), array(
			'label' => 'Pros',
		)) . '

				' . $__templater->formTextAreaRow(array(
			'name' => 'cons',
			'rows' => '2',
			'autosize' => 'true',
			'data-xf-init' => 'min-length',
			'data-min-length' => $__vars['xf']['options']['xaAmsMinConsLength'],
			'data-allow-empty' => 'true',
			'data-toggle-target' => '#js-articleConsLength',
			'maxlength' => $__vars['xf']['options']['xaAmsMaxConsLength'],
		), array(
			'label' => 'Cons',
		)) . '
			';
	}
	$__compilerTemp4 = '';
	$__compilerTemp5 = '';
	$__compilerTemp5 .= '
					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'ams_reviews',
		'set' => $__vars['review']['custom_fields'],
		'group' => 'middle',
		'editMode' => $__templater->method($__vars['article'], 'getFieldEditMode', array()),
		'onlyInclude' => $__vars['category']['review_field_cache'],
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp5)) > 0) {
		$__compilerTemp4 .= '
				' . $__compilerTemp5 . '
			';
	}
	$__compilerTemp6 = '';
	if ($__vars['attachmentData']) {
		$__compilerTemp6 .= '
						' . $__templater->callMacro('helper_attach_upload', 'upload_block', array(
			'attachmentData' => $__vars['attachmentData'],
		), $__vars) . '
					';
	}
	$__compilerTemp7 = '';
	$__compilerTemp8 = '';
	$__compilerTemp8 .= '
					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'ams_reviews',
		'set' => $__vars['review']['custom_fields'],
		'group' => 'bottom',
		'editMode' => $__templater->method($__vars['article'], 'getFieldEditMode', array()),
		'onlyInclude' => $__vars['category']['review_field_cache'],
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp8)) > 0) {
		$__compilerTemp7 .= '
				' . $__compilerTemp8 . '
			';
	}
	$__compilerTemp9 = '';
	$__compilerTemp10 = '';
	$__compilerTemp10 .= '
					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'ams_reviews',
		'set' => $__vars['review']['custom_fields'],
		'group' => 'self_place',
		'editMode' => $__templater->method($__vars['article'], 'getFieldEditMode', array()),
		'onlyInclude' => $__vars['category']['review_field_cache'],
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp10)) > 0) {
		$__compilerTemp9 .= '
				' . $__compilerTemp10 . '
			';
	}
	$__compilerTemp11 = '';
	if ($__vars['category']['allow_anon_reviews'] AND (($__templater->method($__vars['article'], 'canReviewAnon', array()) OR $__templater->method($__vars['article'], 'canReviewAnonPreReg', array())))) {
		$__compilerTemp11 .= '
				' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'is_anonymous',
			'label' => 'Submit review anonymously',
			'hint' => 'If selected, only staff will be able to see who wrote this review.',
			'_type' => 'option',
		)), array(
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->callMacro('rating_macros', 'rating', array(), $__vars) . '

			' . $__compilerTemp1 . '
			
			' . $__compilerTemp3 . '
			
			' . $__compilerTemp4 . '

			<div data-xf-init="attachment-manager">
				' . $__templater->formEditorRow(array(
		'name' => 'message',
		'value' => $__vars['review']['message'],
		'data-min-height' => '100',
		'attachments' => $__vars['attachmentData']['attachments'],
		'data-preview-url' => $__templater->func('link', array('ams/review-preview', $__vars['article'], ), false),
	), array(
		'label' => 'Đánh giá',
		'hint' => ($__vars['category']['require_review'] ? '(Yêu cầu)' : ''),
		'explain' => 'Explain why you\'re giving this rating. Reviews which are not constructive may be removed without notice.',
	)) . '

				' . $__templater->formRow('
					' . $__compilerTemp6 . '
				', array(
	)) . '
			</div>

			' . $__compilerTemp7 . '

			' . $__compilerTemp9 . '

			' . $__compilerTemp11 . '
		</div>

		' . $__templater->formSubmitRow(array(
		'submit' => 'Gửi đánh giá',
		'icon' => 'rate',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('ams/rate', $__vars['article'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);