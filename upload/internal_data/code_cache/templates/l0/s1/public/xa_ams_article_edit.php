<?php
// FROM HASH: d1a28e168ffbe1fd34f5f1817bec324d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped(($__vars['category']['content_term'] ? 'Edit ' . $__templater->escape($__vars['category']['content_term']) . '' : 'Edit article'));
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['article'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['article']['Category']['allow_original_source']) {
		$__compilerTemp1 .= '
				' . $__templater->callMacro('xa_ams_article_edit_macros', 'original_source_article_author', array(
			'article' => $__vars['article'],
		), $__vars) . '
				' . $__templater->formDateInputRow(array(
			'name' => 'os_article_date',
			'value' => ($__vars['article']['original_source']['os_article_date'] ? $__templater->func('date', array($__vars['article']['original_source']['os_article_date'], 'Y-m-d', ), false) : ''),
		), array(
			'label' => 'Original source article date',
			'hint' => ($__vars['article']['Category']['require_original_source'] ? 'Required' : 'Optional'),
		)) . '
				' . $__templater->callMacro('xa_ams_article_edit_macros', 'original_source_article_title', array(
			'article' => $__vars['article'],
		), $__vars) . '
				' . $__templater->callMacro('xa_ams_article_edit_macros', 'original_source_name', array(
			'article' => $__vars['article'],
		), $__vars) . '
				' . $__templater->callMacro('xa_ams_article_edit_macros', 'original_source_url', array(
			'article' => $__vars['article'],
		), $__vars) . '

				' . $__templater->formRow('
					<div>' . '<b><span style="color:red;">Admin, edit the phrase \'xa_ams_original_source_explain\' to remove this text and add your own text explanation on how to use the original source fields.</span> </b>' . '</div>
				', array(
		)) . '

				<hr class="formRowSep" />
			';
	}
	$__compilerTemp2 = '';
	if ($__vars['category']['allow_author_rating'] AND $__templater->method($__vars['article'], 'canSetAuthorRating', array())) {
		$__compilerTemp2 .= '			
				' . $__templater->formSelectRow(array(
			'name' => 'author_rating',
			'value' => $__vars['article']['author_rating'],
		), array(array(
			'value' => '0',
			'label' => 'No rating',
			'_type' => 'option',
		),
		array(
			'value' => '5',
			'label' => '5.00',
			'_type' => 'option',
		),
		array(
			'value' => '4.75',
			'label' => '4.75',
			'_type' => 'option',
		),
		array(
			'value' => '4.5',
			'label' => '4.50',
			'_type' => 'option',
		),
		array(
			'value' => '4.25',
			'label' => '4.25',
			'_type' => 'option',
		),
		array(
			'value' => '4',
			'label' => '4.00',
			'_type' => 'option',
		),
		array(
			'value' => '3.75',
			'label' => '3.75',
			'_type' => 'option',
		),
		array(
			'value' => '3.5',
			'label' => '3.50',
			'_type' => 'option',
		),
		array(
			'value' => '3.25',
			'label' => '3.25',
			'_type' => 'option',
		),
		array(
			'value' => '3',
			'label' => '3.00',
			'_type' => 'option',
		),
		array(
			'value' => '2.75',
			'label' => '2.75',
			'_type' => 'option',
		),
		array(
			'value' => '2.5',
			'label' => '2.50',
			'_type' => 'option',
		),
		array(
			'value' => '2.25',
			'label' => '2.25',
			'_type' => 'option',
		),
		array(
			'value' => '2',
			'label' => '2.00',
			'_type' => 'option',
		),
		array(
			'value' => '1.75',
			'label' => '1.75',
			'_type' => 'option',
		),
		array(
			'value' => '1.5',
			'label' => '1.50',
			'_type' => 'option',
		),
		array(
			'value' => '1.25',
			'label' => '1.25',
			'_type' => 'option',
		),
		array(
			'value' => '1',
			'label' => '1.00',
			'_type' => 'option',
		)), array(
			'label' => 'Author rating',
			'hint' => 'Optional',
		)) . '

				<hr class="formRowSep" />		
			';
	}
	$__compilerTemp3 = '';
	if ($__vars['category']['allow_location']) {
		$__compilerTemp3 .= '
				' . $__templater->callMacro('xa_ams_article_edit_macros', 'location', array(
			'article' => $__vars['article'],
		), $__vars) . '

				<hr class="formRowSep" />
			';
	}
	$__compilerTemp4 = '';
	$__compilerTemp5 = '';
	$__compilerTemp5 .= '
					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'ams_articles',
		'set' => $__vars['article']['custom_fields'],
		'group' => 'header',
		'editMode' => $__templater->method($__vars['article'], 'getFieldEditMode', array()),
		'onlyInclude' => $__vars['category']['field_cache'],
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp5)) > 0) {
		$__compilerTemp4 .= '
				' . $__compilerTemp5 . '

				<hr class="formRowSep" />
			';
	}
	$__compilerTemp6 = '';
	$__compilerTemp7 = '';
	$__compilerTemp7 .= '
					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'ams_articles',
		'set' => $__vars['article']['custom_fields'],
		'group' => 'above_article',
		'editMode' => $__templater->method($__vars['article'], 'getFieldEditMode', array()),
		'onlyInclude' => $__vars['category']['field_cache'],
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp7)) > 0) {
		$__compilerTemp6 .= '
				' . $__compilerTemp7 . '

				<hr class="formRowSep" />
			';
	}
	$__compilerTemp8 = '';
	$__compilerTemp9 = '';
	$__compilerTemp9 .= '
					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'ams_articles',
		'set' => $__vars['article']['custom_fields'],
		'group' => 'below_article',
		'editMode' => $__templater->method($__vars['article'], 'getFieldEditMode', array()),
		'onlyInclude' => $__vars['category']['field_cache'],
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp9)) > 0) {
		$__compilerTemp8 .= '
				' . $__compilerTemp9 . '

				<hr class="formRowSep" />
			';
	}
	$__compilerTemp10 = '';
	$__compilerTemp11 = '';
	$__compilerTemp11 .= '
					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit_groups', array(
		'type' => 'ams_articles',
		'set' => $__vars['article']['custom_fields'],
		'groups' => array('new_tab', 'sidebar', 'self_place', ),
		'editMode' => $__templater->method($__vars['article'], 'getFieldEditMode', array()),
		'onlyInclude' => $__vars['category']['field_cache'],
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp11)) > 0) {
		$__compilerTemp10 .= '
				' . $__compilerTemp11 . '

				<hr class="formRowSep" />
			';
	}
	$__compilerTemp12 = '';
	if ($__templater->method($__vars['category'], 'canUploadAndManageArticleAttachments', array())) {
		$__compilerTemp12 .= '
				' . $__templater->formRow('
					' . $__templater->formCheckBox(array(
		), array(array(
			'name' => 'cover_image_above_article',
			'data-hide' => 'true',
			'label' => 'Display cover image above article',
			'hint' => 'When enabled, will display the cover image (if set), above the article.  
<br><br>
<b>Note:</b> You can use the "Set cover image" function in the more options to choose a specific uploaded image to use as the article cover image.  You can also set a caption for the cover image at the same time.  ',
			'checked' => $__vars['article']['cover_image_above_article'],
			'_dependent' => array('
								' . $__templater->formTextAreaRow(array(
			'name' => 'cover_image_caption',
			'value' => $__vars['article']['cover_image_caption_'],
			'maxlength' => $__templater->func('max_length', array($__vars['article'], 'cover_image_caption', ), false),
		), array(
			'label' => 'Cover image caption',
			'rowtype' => 'fullWidth',
			'hint' => 'Optional',
			'explain' => 'Will display the cover image caption (if set), below the cover image that displays above the article.',
		)) . '
							'),
			'_type' => 'option',
		))) . '
				', array(
		)) . '
			';
	}
	$__compilerTemp13 = '';
	if ($__templater->method($__vars['article'], 'canLockUnlockComments', array()) AND $__vars['category']['allow_comments']) {
		$__compilerTemp13 .= '
				' . $__templater->formRow('
					' . $__templater->formCheckBox(array(
		), array(array(
			'name' => 'comments_open',
			'label' => 'Comments open',
			'hint' => 'When enabled, registered users or guests with appropriate permissions may comment on this article.',
			'checked' => $__vars['article']['comments_open'],
			'_type' => 'option',
		))) . '
				', array(
		)) . '

				<hr class="formRowSep" />
			';
	} else {
		$__compilerTemp13 .= '
				' . $__templater->formHiddenVal('comments_open', $__vars['article']['comments_open'], array(
		)) . '
			';
	}
	$__compilerTemp14 = '';
	if ($__templater->method($__vars['article'], 'canLockUnlockRatings', array()) AND $__vars['category']['allow_ratings']) {
		$__compilerTemp14 .= '
				' . $__templater->formRow('
					' . $__templater->formCheckBox(array(
		), array(array(
			'name' => 'ratings_open',
			'label' => 'Ratings open',
			'hint' => 'When enabled, registered users with appropriate permissions may rate/review this article.',
			'checked' => $__vars['article']['ratings_open'],
			'_type' => 'option',
		))) . '
				', array(
		)) . '

				<hr class="formRowSep" />
			';
	} else {
		$__compilerTemp14 .= '
				' . $__templater->formHiddenVal('ratings_open', $__vars['article']['ratings_open'], array(
		)) . '
			';
	}
	$__compilerTemp15 = '';
	if ($__vars['article']['article_state'] == 'visible') {
		$__compilerTemp15 .= '
				' . $__templater->formRow('
					' . $__templater->formCheckBox(array(
		), array(array(
			'name' => 'post_as_update',
			'label' => 'Post as update',
			'hint' => 'Send Alerts and Emails to members that are watching this article. If unchecked, will save as a Silent Edit.',
			'_dependent' => array($__templater->formTextArea(array(
			'name' => 'update_message',
			'autosize' => 'true',
			'placeholder' => 'Optional update message',
		))),
			'_type' => 'option',
		))) . '
				', array(
		)) . '

				<hr class="formRowSep" />
			';
	}
	$__compilerTemp16 = '';
	if ($__templater->method($__vars['article'], 'canSendModeratorActionAlert', array())) {
		$__compilerTemp16 .= '
				<hr class="formRowSep" />

				' . $__templater->formRow('
					' . $__templater->callMacro('helper_action', 'author_alert', array(
			'row' => false,
		), $__vars) . '
				', array(
		)) . '
			';
	}
	$__compilerTemp17 = '';
	if ($__templater->method($__vars['article'], 'canManageSeoOptions', array())) {
		$__compilerTemp17 .= '		
			<h3 class="block-formSectionHeader">
				<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
					<span class="block-formSectionHeader-aligner">' . 'Search engine optimization options' . '</span>
				</span>
			</h3>
			<div class="block-body block-body--collapsible">
				' . $__templater->callMacro('xa_ams_article_edit_macros', 'og_title_meta_title', array(
			'article' => $__vars['article'],
		), $__vars) . '			
				' . $__templater->callMacro('xa_ams_article_edit_macros', 'meta_description', array(
			'article' => $__vars['article'],
		), $__vars) . '
			</div>	
		';
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->callMacro('xa_ams_article_edit_macros', 'title_article_edit', array(
		'article' => $__vars['article'],
		'prefixes' => $__vars['prefixes'],
	), $__vars) . '

			' . $__templater->callMacro('xa_ams_article_edit_macros', 'message', array(
		'article' => $__vars['article'],
		'message' => $__vars['article']['message_'],
		'attachmentData' => $__vars['attachmentData'],
		'showAttachmentRequired' => true,
	), $__vars) . '

			<hr class="formRowSep" />

			' . $__templater->callMacro('xa_ams_article_edit_macros', 'description', array(
		'article' => $__vars['article'],
	), $__vars) . '

			<hr class="formRowSep" />

			' . $__compilerTemp1 . '
			
			' . $__compilerTemp2 . '
			
			' . $__compilerTemp3 . '

			' . $__compilerTemp4 . '

			' . $__compilerTemp6 . '

			' . $__compilerTemp8 . '

			' . $__compilerTemp10 . '

			' . $__compilerTemp12 . '

			<hr class="formRowSep" />

			' . $__templater->formRow('
				' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'about_author',
		'label' => 'Display about author',
		'hint' => 'When enabled, will display the about author block below the article. You must have the about author data entered via your user account (Account details >> About Author)',
		'checked' => $__vars['article']['about_author'],
		'_type' => 'option',
	))) . '
				
				<hr class="formRowSep" />
			', array(
	)) . '

			' . $__compilerTemp13 . '
			
			' . $__compilerTemp14 . '			

			' . $__compilerTemp15 . '

			' . $__compilerTemp16 . '
		</div>

		<h3 class="block-formSectionHeader">
			<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
				<span class="block-formSectionHeader-aligner">' . 'Multi page article options' . '</span>
			</span>
		</h3>
		<div class="block-body block-body--collapsible">
			' . $__templater->callMacro('xa_ams_article_edit_macros', 'overview_page_title', array(
		'article' => $__vars['article'],
	), $__vars) . '
		</div>	

		' . $__compilerTemp17 . '
		
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('ams/edit', $__vars['article'], ), false),
		'ajax' => 'true',
		'class' => 'block',
		'data-preview-url' => $__templater->func('link', array('ams/preview', $__vars['article'], ), false),
	));
	return $__finalCompiled;
}
);