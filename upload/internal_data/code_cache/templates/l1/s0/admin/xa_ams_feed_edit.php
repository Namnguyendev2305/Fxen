<?php
// FROM HASH: d4c11cdfbc5ff5234a0fcd630d72efd7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['feed'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add feed');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit feed' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['feed']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['feed'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('xa-ams/feeds/delete', $__vars['feed'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['feed']['feed_id']) {
		$__compilerTemp1 .= '
				' . $__templater->formTextBoxRow(array(
			'name' => 'title',
			'value' => $__vars['feed']['title'],
			'maxlength' => $__templater->func('max_length', array($__vars['feed'], 'title', ), false),
		), array(
			'label' => 'Title',
		)) . '
			';
	}
	$__compilerTemp2 = '';
	if ($__vars['feed']['feed_id']) {
		$__compilerTemp2 .= '
				' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'active',
			'selected' => $__vars['feed']['active'],
			'label' => 'Feed is active',
			'hint' => 'You may disable this option to temporarily prevent entries from this feed being imported.',
			'_type' => 'option',
		)), array(
		)) . '
			';
	} else {
		$__compilerTemp2 .= '
				' . $__templater->formHiddenVal('active', '1', array(
		)) . '
			';
	}
	$__compilerTemp3 = array();
	if ($__templater->isTraversable($__vars['categories'])) {
		foreach ($__vars['categories'] AS $__vars['category']) {
			$__compilerTemp3[] = array(
				'value' => $__vars['category']['value'],
				'disabled' => $__vars['category']['disabled'],
				'label' => $__templater->escape($__vars['category']['label']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'url',
		'value' => $__vars['feed']['url'],
		'maxlength' => $__templater->func('max_length', array($__vars['feed'], 'url', ), false),
		'type' => 'url',
		'dir' => 'ltr',
	), array(
		'label' => 'URL',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'frequency',
		'value' => $__vars['feed']['frequency'],
	), array(array(
		'value' => '600',
		'label' => '' . '10' . ' minutes',
		'_type' => 'option',
	),
	array(
		'value' => '1200',
		'label' => '' . '20' . ' minutes',
		'_type' => 'option',
	),
	array(
		'value' => '1800',
		'label' => '' . '30' . ' minutes',
		'_type' => 'option',
	),
	array(
		'value' => '3600',
		'label' => '' . '60' . ' minutes',
		'_type' => 'option',
	),
	array(
		'value' => '7200',
		'label' => '' . '2' . ' hours',
		'_type' => 'option',
	),
	array(
		'value' => '14400',
		'label' => '' . '4' . ' hours',
		'_type' => 'option',
	),
	array(
		'value' => '21600',
		'label' => '' . '6' . ' hours',
		'_type' => 'option',
	),
	array(
		'value' => '43200',
		'label' => '' . '12' . ' hours',
		'_type' => 'option',
	)), array(
		'label' => 'Fetch new entries every',
	)) . '

			' . $__compilerTemp2 . '

			<hr class="formRowSep" />

			' . $__templater->formRadioRow(array(
		'name' => 'user_id',
		'value' => $__vars['feed']['user_id'],
	), array(array(
		'value' => '0',
		'label' => 'Post as guest, use name information from feed data.',
		'_type' => 'option',
	),
	array(
		'value' => '-1',
		'label' => 'Post as the following user:',
		'selected' => $__vars['feed']['User'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'username',
		'value' => $__vars['feed']['User']['username'],
		'placeholder' => 'Username' . $__vars['xf']['language']['ellipsis'],
		'ac' => 'single',
	))),
		'_type' => 'option',
	)), array(
		'label' => 'Posting user',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formSelectRow(array(
		'name' => 'category_id',
		'value' => $__vars['feed']['category_id'],
		'id' => 'js-nodeList',
	), $__compilerTemp3, array(
		'label' => 'Destination category',
		'explain' => '
					' . 'Select the category into which new articles created from this feed will be posted. ' . '
				',
	)) . '

			' . $__templater->formPrefixInputRow($__vars['prefixes'], array(
		'textbox-name' => 'title_template',
		'textbox-value' => $__vars['feed']['title_template'],
		'maxlength' => $__templater->func('max_length', array($__vars['feed'], 'title_template', ), false),
		'prefix-value' => $__vars['feed']['prefix_id'],
		'type' => 'ams_article',
		'href' => $__templater->func('link', array('xa-ams/prefixes/prefixes', ), false),
		'listen-to' => '#js-nodeList',
	), array(
		'label' => 'Title template',
		'hint' => 'Optional',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'message_template',
		'value' => $__vars['feed']['message_template'],
		'rows' => '5',
		'autosize' => 'true',
	), array(
		'label' => 'Message template',
		'hint' => 'You may use BB code',
		'explain' => 'You may leave these fields blank to include the content provided by the feed, or enter your own text, inserting any of the following tokens to represent data from the feed:
<br />{title} {description} {content} {author} {link}',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'article_visible',
		'selected' => $__vars['feed']['article_visible'],
		'label' => 'Post immediately',
		'hint' => 'Otherwise, messages will be placed into the moderation queue.',
		'_type' => 'option',
	)), array(
		'label' => 'Options',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
		'html' => '
			' . $__templater->button('', array(
		'type' => 'submit',
		'name' => 'preview',
		'icon' => 'preview',
	), '', array(
	)) . '
		',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('xa-ams/feeds/save', $__vars['feed'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);