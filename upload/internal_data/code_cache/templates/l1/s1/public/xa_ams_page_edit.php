<?php
// FROM HASH: 07dc884daf6cf856b5ad6cfe611d965d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit page');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['page'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '
';
	$__templater->breadcrumb($__templater->preEscaped('Manage pages'), $__templater->func('link', array('ams/pages', $__vars['article'], ), false), array(
	));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['category'], 'canUploadAndManagePageAttachments', array())) {
		$__compilerTemp1 .= '
					' . $__templater->formCheckBox(array(
		), array(array(
			'name' => 'cover_image_above_page',
			'data-hide' => 'true',
			'label' => 'Display cover image above article page',
			'hint' => 'When enabled, will display the article page cover image (if set), above the article page.',
			'checked' => $__vars['page']['cover_image_above_page'],
			'_dependent' => array('
								' . $__templater->formTextAreaRow(array(
			'name' => 'cover_image_caption',
			'value' => $__vars['page']['cover_image_caption_'],
			'maxlength' => $__templater->func('max_length', array($__vars['page'], 'cover_image_caption', ), false),
		), array(
			'label' => 'Cover image caption',
			'rowtype' => 'fullWidth',
			'hint' => 'Optional',
			'explain' => 'Will display the article page cover image caption (if set), below the article page cover image that displays above the article page.',
		)) . '
							'),
			'_type' => 'option',
		))) . '
				';
	}
	$__compilerTemp2 = '';
	if ($__vars['page']['page_state'] == 'deleted') {
		$__compilerTemp2 .= '
				' . $__templater->formRadioRow(array(
			'name' => 'page_state',
			'value' => $__vars['page']['page_state'],
		), array(array(
			'value' => 'deleted',
			'label' => 'Deleted',
			'_type' => 'option',
		)), array(
			'label' => 'Status',
		)) . '
			';
	} else {
		$__compilerTemp2 .= '
				' . $__templater->formRadioRow(array(
			'name' => 'page_state',
			'value' => $__vars['page']['page_state'],
		), array(array(
			'value' => 'visible',
			'label' => 'Visible',
			'_type' => 'option',
		),
		array(
			'value' => 'draft',
			'label' => 'Draft',
			'_type' => 'option',
		)), array(
			'label' => 'Status',
		)) . '
			';
	}
	$__compilerTemp3 = '';
	if ($__vars['from_page_management']) {
		$__compilerTemp3 .= '
				' . $__templater->formHiddenVal('mp', true, array(
		)) . '
			';
	}
	$__compilerTemp4 = '';
	if ($__templater->method($__vars['page'], 'canManageSeoOptions', array())) {
		$__compilerTemp4 .= '		
			<h3 class="block-formSectionHeader">
				<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
					<span class="block-formSectionHeader-aligner">' . 'Search engine optimization options' . '</span>
				</span>
			</h3>
			<div class="block-body block-body--collapsible">
				' . $__templater->callMacro('xa_ams_page_edit_macros', 'og_title_meta_title', array(
			'page' => $__vars['page'],
		), $__vars) . '			
				' . $__templater->callMacro('xa_ams_page_edit_macros', 'meta_description', array(
			'page' => $__vars['page'],
		), $__vars) . '
			</div>
		';
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->callMacro('xa_ams_page_edit_macros', 'title', array(
		'page' => $__vars['page'],
	), $__vars) . '

			' . $__templater->callMacro('xa_ams_page_edit_macros', 'message', array(
		'page' => $__vars['page'],
		'message' => $__vars['page']['message_'],
		'attachmentData' => $__vars['attachmentData'],
	), $__vars) . '

			<hr class="formRowSep" />

			' . $__templater->callMacro('xa_ams_page_edit_macros', 'description', array(
		'page' => $__vars['page'],
	), $__vars) . '

			<hr class="formRowSep" />

			' . $__templater->formNumberBoxRow(array(
		'name' => 'display_order',
		'value' => $__vars['page']['display_order'],
		'min' => '1',
		'pattern' => '\\d*',
	), array(
		'label' => 'Display order',
	)) . '

			' . $__templater->formNumberBoxRow(array(
		'name' => 'depth',
		'value' => $__vars['page']['depth'],
		'min' => '0',
		'pattern' => '\\d*',
	), array(
		'label' => 'Depth',
		'explain' => 'This optional setting is used to add indents to page titles in the multi page navigation (to simulate hierarchy) ',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formRow('
				' . $__compilerTemp1 . '
				' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'display_byline',
		'label' => 'Display page byline',
		'hint' => 'When enabled, will display the article page Username/Author name and Create date below the Article Page Title.   <b>Note:</b>  <i>Should only be used in cases where the page author is not the article author. </i>',
		'checked' => $__vars['page']['display_byline'],
		'_type' => 'option',
	))) . '
			', array(
		'label' => 'Options',
	)) . '

			<hr class="formRowSep" />

			' . $__compilerTemp2 . '

			' . $__compilerTemp3 . '	
		</div>
		
		' . $__compilerTemp4 . '
		
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('ams/page/edit', $__vars['page'], ), false),
		'ajax' => 'true',
		'class' => 'block',
		'data-preview-url' => $__templater->func('link', array('ams/page/preview', $__vars['page'], ), false),
	));
	return $__finalCompiled;
}
);