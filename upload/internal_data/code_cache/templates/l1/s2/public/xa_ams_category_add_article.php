<?php
// FROM HASH: 66a4753385b0ea029113f9d5527ba8a3
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped(($__vars['category']['content_term'] ? 'Post ' . $__templater->escape($__vars['category']['content_term']) . '' : 'Post article'));
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['category'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['category'], 'canEditTags', array())) {
		$__compilerTemp1 .= '
				';
		$__compilerTemp2 = '';
		if ($__vars['category']['min_tags']) {
			$__compilerTemp2 .= '
							' . 'This content must have at least ' . $__templater->escape($__vars['category']['min_tags']) . ' tag(s).' . '
						';
		}
		$__compilerTemp1 .= $__templater->formTokenInputRow(array(
			'name' => 'tags',
			'value' => $__vars['category']['draft_article']['tags'],
			'href' => $__templater->func('link', array('misc/tag-auto-complete', ), false),
			'min-length' => $__vars['xf']['options']['tagLength']['min'],
			'max-length' => $__vars['xf']['options']['tagLength']['max'],
			'max-tokens' => $__vars['xf']['options']['maxContentTags'],
		), array(
			'label' => 'Tags',
			'explain' => '
						' . 'Multiple tags may be separated by commas.' . '
						' . $__compilerTemp2 . '
					',
		)) . '
			';
	}
	$__compilerTemp3 = '';
	if ($__vars['category']['allow_original_source']) {
		$__compilerTemp3 .= '
				' . $__templater->callMacro('xa_ams_article_edit_macros', 'original_source_article_author', array(
			'article' => $__vars['article'],
		), $__vars) . '
				' . $__templater->formDateInputRow(array(
			'name' => 'os_article_date',
			'value' => '',
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
	$__compilerTemp4 = '';
	if ($__vars['category']['allow_author_rating'] AND (($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('xa_ams', 'setAuthorRatingOwn', )) OR $__templater->method($__vars['xf']['visitor'], 'hasPermission', array('xa_ams', 'editAny', ))))) {
		$__compilerTemp4 .= '
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
	$__compilerTemp5 = '';
	if ($__vars['category']['allow_location']) {
		$__compilerTemp5 .= '
				' . $__templater->callMacro('xa_ams_article_edit_macros', 'location', array(
			'article' => $__vars['article'],
		), $__vars) . '
			';
	}
	$__compilerTemp6 = '';
	$__compilerTemp7 = '';
	$__compilerTemp7 .= '
					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'ams_articles',
		'set' => $__vars['article']['custom_fields'],
		'group' => 'header',
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
		'group' => 'above_article',
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
					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'ams_articles',
		'set' => $__vars['article']['custom_fields'],
		'group' => 'below_article',
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
	$__compilerTemp13 = '';
	$__compilerTemp13 .= '
					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit_groups', array(
		'type' => 'ams_articles',
		'set' => $__vars['article']['custom_fields'],
		'groups' => array('new_tab', 'sidebar', 'self_place', ),
		'editMode' => $__templater->method($__vars['article'], 'getFieldEditMode', array()),
		'onlyInclude' => $__vars['category']['field_cache'],
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp13)) > 0) {
		$__compilerTemp12 .= '
				' . $__compilerTemp13 . '

				<hr class="formRowSep" />
			';
	}
	$__compilerTemp14 = '';
	if ($__templater->method($__vars['category'], 'canUploadAndManageArticleAttachments', array())) {
		$__compilerTemp14 .= '
				' . $__templater->formRow('
					' . $__templater->formCheckBox(array(
		), array(array(
			'name' => 'cover_image_above_article',
			'label' => 'Display cover image above article',
			'hint' => 'When enabled, will display the cover image (if set), above the article.  
<br><br>
<b>Note:</b> After creating the article, you can use the "Set cover image" function in the more options to choose a specific uploaded image to use as the article cover image.  You can also set a caption for the cover image at the same time.  ',
			'checked' => false,
			'_type' => 'option',
		))) . '
				', array(
		)) . '

				<hr class="formRowSep" />
			';
	}
	$__compilerTemp15 = '';
	if ($__vars['category']['allow_comments'] AND (($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('xa_ams', 'lockUnlockCommentsOwn', )) OR $__templater->method($__vars['xf']['visitor'], 'hasPermission', array('xa_ams', 'lockUnlockCommentsAny', ))))) {
		$__compilerTemp15 .= '
				' . $__templater->formRow('
					' . $__templater->formCheckBox(array(
		), array(array(
			'name' => 'comments_open',
			'label' => 'Comments open',
			'hint' => 'When enabled, registered users or guests with appropriate permissions may comment on this article.',
			'checked' => $__vars['article'],
			'_type' => 'option',
		))) . '
				', array(
		)) . '
			';
	} else {
		$__compilerTemp15 .= '
				' . $__templater->formHiddenVal('comments_open', '1', array(
		)) . '
			';
	}
	$__compilerTemp16 = '';
	if ($__vars['category']['allow_ratings'] AND (($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('xa_ams', 'lockUnlockRatingsOwn', )) OR $__templater->method($__vars['xf']['visitor'], 'hasPermission', array('xa_ams', 'lockUnlockRatingsAny', ))))) {
		$__compilerTemp16 .= '
				' . $__templater->formRow('
					' . $__templater->formCheckBox(array(
		), array(array(
			'name' => 'ratings_open',
			'label' => 'Ratings open',
			'hint' => 'When enabled, registered users with appropriate permissions may rate/review this article.',
			'checked' => $__vars['article'],
			'_type' => 'option',
		))) . '
				', array(
		)) . '
			';
	} else {
		$__compilerTemp16 .= '
				' . $__templater->formHiddenVal('ratings_open', '1', array(
		)) . '
			';
	}
	$__compilerTemp17 = '';
	if ($__templater->method($__vars['category'], 'canCreatePoll', array())) {
		$__compilerTemp17 .= '
			<h2 class="block-formSectionHeader">
				<span class="collapseTrigger collapseTrigger--block' . ($__vars['category']['draft_article']['poll'] ? ' is-active' : '') . '" data-xf-click="toggle" data-target="< :up :next">
					<span class="block-formSectionHeader-aligner">' . 'Post a poll' . '</span>
				</span>
			</h2>
			<div class="block-body block-body--collapsible' . ($__vars['category']['draft_article']['poll'] ? ' is-active' : '') . '">
				' . $__templater->callMacro('poll_macros', 'add_edit_inputs', array(
			'draft' => $__vars['category']['draft_article']['poll'],
		), $__vars) . '
			</div>
		';
	}
	$__compilerTemp18 = '';
	if ($__templater->method($__vars['category'], 'canManageSeoOptions', array())) {
		$__compilerTemp18 .= '		
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
	$__compilerTemp19 = array();
	if ($__templater->isTraversable($__vars['hours'])) {
		foreach ($__vars['hours'] AS $__vars['hour']) {
			$__compilerTemp19[] = array(
				'value' => $__vars['hour'],
				'label' => $__templater->escape($__vars['hour']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp20 = array();
	if ($__templater->isTraversable($__vars['minutes'])) {
		foreach ($__vars['minutes'] AS $__vars['minute']) {
			$__compilerTemp20[] = array(
				'value' => $__vars['minute'],
				'label' => $__templater->escape($__vars['minute']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp21 = $__templater->mergeChoiceOptions(array(), $__vars['timeZones']);
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->callMacro('xa_ams_article_edit_macros', 'title_article_add', array(
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

			' . $__compilerTemp1 . '

			<hr class="formRowSep" />

			' . $__templater->callMacro('xa_ams_article_edit_macros', 'description', array(
		'article' => $__vars['article'],
	), $__vars) . '

			<hr class="formRowSep" />

			' . $__compilerTemp3 . '
			
			' . $__compilerTemp4 . '
			
			' . $__compilerTemp5 . '

			<hr class="formRowSep" />

			' . $__compilerTemp6 . '

			' . $__compilerTemp8 . '

			' . $__compilerTemp10 . '

			' . $__compilerTemp12 . '

			' . $__compilerTemp14 . '

			' . $__templater->formRow('
				' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'about_author',
		'label' => 'Display about author',
		'hint' => 'When enabled, will display the about author block below the article. You must have the about author data entered via your user account (Account details >> About Author)',
		'checked' => $__vars['article'],
		'_type' => 'option',
	))) . '
			', array(
	)) . '

			<hr class="formRowSep" />

			' . $__compilerTemp15 . '
			
			' . $__compilerTemp16 . '			
		</div>
		
		' . $__compilerTemp17 . '
		
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

		' . $__compilerTemp18 . '
		
		<hr class="formRowSep" />

		' . $__templater->formRadioRow(array(
		'name' => 'save_type',
		'value' => 'publish_now',
	), array(array(
		'value' => 'publish_now',
		'label' => '<b><font color="green">Submit for publishing now</font></b>',
		'hint' => 'Submit your article for publishing now.  <b>Note:</b> Some articles require approval before being displayed publicly.',
		'_type' => 'option',
	),
	array(
		'value' => 'publish_scheduled',
		'label' => '<b><font color="orange">Schedule for publishing on a set date/time.</font></b>',
		'hint' => 'Schedule your article to be published on a set date/time.  Your scheduled articles can be accessed via the "Your content >> Your articles awaiting publishing page". <b>Note:</b> Some articles require approval before being displayed publicly.',
		'data-hide' => 'true',
		'_dependent' => array('
					' . $__templater->formRow('
						<div class="inputGroup">
							' . $__templater->formDateInput(array(
		'name' => 'article_publish_date',
		'value' => ($__vars['xf']['time'] ? $__templater->func('date', array($__vars['xf']['time'], 'picker', ), false) : ''),
	)) . '
							<span class="inputGroup-text">
								' . 'Time' . $__vars['xf']['language']['label_separator'] . '
							</span>
							<span class="inputGroup" dir="ltr">
								' . $__templater->formSelect(array(
		'name' => 'article_publish_hour',
		'value' => '',
		'class' => 'input--inline input--autoSize',
	), $__compilerTemp19) . '
								<span class="inputGroup-text">:</span>
								' . $__templater->formSelect(array(
		'name' => 'article_publish_minute',
		'value' => '',
		'class' => 'input--inline input--autoSize',
	), $__compilerTemp20) . '
							</span>
						</div>
					', array(
		'label' => 'Publish date',
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'article_timezone',
		'value' => $__vars['xf']['visitor']['timezone'],
	), $__compilerTemp21, array(
	)) . '
				'),
		'_type' => 'option',
	),
	array(
		'value' => 'draft',
		'label' => '<b><font color="red">Save as draft</font></b>',
		'hint' => '<font color="red">This option allows you to save this article as a draft and then publish it once you are finished with the draft process.  Drafts are accessed via the "Your articles >> Your drafts page"</font>',
		'wrapperclass' => 'amsSaveAsDraft',
		'_type' => 'option',
	)), array(
		'label' => 'Publishing options',
		'explain' => '',
	)) . '

		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('ams/categories/add', $__vars['category'], ), false),
		'ajax' => 'true',
		'class' => 'block',
		'draft' => $__templater->func('link', array('ams/categories/draft', $__vars['category'], ), false),
		'data-preview-url' => $__templater->func('link', array('ams/categories/preview', $__vars['category'], ), false),
	));
	return $__finalCompiled;
}
);