<?php
// FROM HASH: 5670692e06720cc333998c1156489fe4
return array(
'macros' => array('title_article_add' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'prefixes' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formPrefixInputRow($__vars['prefixes'], array(
		'type' => 'ams_article',
		'prefix-value' => ($__vars['article']['Category']['draft_article']['prefix_id'] ?: ($__vars['article']['prefix_id'] ?: $__vars['article']['Category']['default_prefix_id'])),
		'textbox-value' => $__vars['article']['title_'],
		'textbox-class' => 'input--title',
		'maxlength' => $__templater->func('max_length', array($__vars['article'], 'title', ), false),
		'placeholder' => $__vars['article']['Category']['article_prompt'],
		'help-href' => $__templater->func('link', array('ams/categories/prefix-help', $__vars['article'], ), false),
	), array(
		'label' => 'Title',
		'rowtype' => 'fullWidth noLabel',
	)) . '
';
	return $__finalCompiled;
}
),
'title_article_edit' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'prefixes' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formPrefixInputRow($__vars['prefixes'], array(
		'type' => 'ams_article',
		'prefix-value' => $__vars['article']['prefix_id'],
		'textbox-value' => $__vars['article']['title_'],
		'textbox-class' => 'input--title',
		'maxlength' => $__templater->func('max_length', array($__vars['article'], 'title', ), false),
		'placeholder' => $__vars['article']['Category']['article_prompt'],
		'help-href' => $__templater->func('link', array('ams/categories/prefix-help', $__vars['article'], ), false),
	), array(
		'label' => 'Title',
		'rowtype' => 'fullWidth noLabel',
	)) . '
';
	return $__finalCompiled;
}
),
'message' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'message' => '',
		'attachmentData' => array(),
		'showAttachmentRequired' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<div data-xf-init="attachment-manager">
		' . $__templater->formEditorRow(array(
		'name' => 'message',
		'value' => $__vars['message'],
		'data-min-height' => '250',
		'attachments' => $__vars['attachmentData']['attachments'],
	), array(
		'rowtype' => 'fullWidth noLabel',
		'label' => 'Article',
	)) . '

		';
	if ($__vars['attachmentData']) {
		$__finalCompiled .= '
			' . $__templater->formRow('				
				' . $__templater->callMacro('helper_attach_upload', 'upload_block', array(
			'attachmentData' => $__vars['attachmentData'],
		), $__vars) . '
			', array(
		)) . '
		';
	}
	$__finalCompiled .= '
		';
	if ($__vars['attachmentData'] AND ($__vars['article']['Category']['require_article_image'] AND $__vars['showAttachmentRequired'])) {
		$__finalCompiled .= '		
			' . $__templater->formRow('
				' . 'You must upload at least 1 image attachment.' . '
			', array(
		)) . '
		';
	}
	$__finalCompiled .= '		
	</div>
';
	return $__finalCompiled;
}
),
'description' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextAreaRow(array(
		'name' => 'description',
		'value' => $__vars['article']['description_'],
		'maxlength' => $__templater->func('max_length', array($__vars['article'], 'description', ), false),
	), array(
		'label' => 'Description',
		'hint' => 'Optional',
		'explain' => 'Provide a very brief description of your article.  
<br><br>
<b>Note</b>:  Leave this blank to use a snippet from the article as the description. ',
	)) . '
';
	return $__finalCompiled;
}
),
'og_title_meta_title' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
		'name' => 'og_title',
		'value' => $__vars['article']['og_title'],
		'maxlength' => $__templater->func('max_length', array($__vars['article'], 'og_title', ), false),
	), array(
		'label' => 'OG title',
		'hint' => 'Optional',
		'explain' => 'The Open Graph / Twitter title used on social media (Facebook, Twitter etc).',
	)) . '

	' . $__templater->formTextBoxRow(array(
		'name' => 'meta_title',
		'value' => $__vars['article']['meta_title'],
		'maxlength' => $__templater->func('max_length', array($__vars['article'], 'meta_title', ), false),
	), array(
		'label' => 'Meta title',
		'hint' => 'Optional',
		'explain' => 'The title used in the title tag. A meta title, also known as a title tag, refers to the text that is displayed on search engine result pages and browser tabs to indicate the topic of a webpage.  ',
	)) . '
';
	return $__finalCompiled;
}
),
'meta_description' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextAreaRow(array(
		'name' => 'meta_description',
		'value' => $__vars['article']['meta_description_'],
		'maxlength' => $__templater->func('max_length', array($__vars['article'], 'meta_description', ), false),
	), array(
		'label' => 'Meta description',
		'hint' => 'Optional',
		'explain' => 'Provide a brief summary of your article for search engines.
<br><br>
A meta description can influence the decision of the searcher as to whether they want to click through on your article from search results or not. The more descriptive, attractive and relevant the description, the more likely someone will click through.

',
	)) . '
';
	return $__finalCompiled;
}
),
'overview_page_title' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
		'name' => 'overview_page_title',
		'value' => $__vars['article']['overview_page_title_'],
		'maxlength' => $__templater->func('max_length', array($__vars['article'], 'overview_page_title', ), false),
	), array(
		'label' => 'Overview page title',
		'hint' => 'Optional',
		'explain' => 'This optional title is for use with the multipage page articles.  It replaces the term "overview" which is used to designate the first page of a multi page article.  The title is used in multi page navigation, table of contents and page header. ',
	)) . '
';
	return $__finalCompiled;
}
),
'original_source_article_author' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
		'name' => 'os_article_author',
		'value' => $__vars['article']['original_source']['os_article_author'],
		'maxlength' => '256',
	), array(
		'label' => 'Original source article author',
		'hint' => ($__vars['article']['Category']['require_original_source'] ? 'Required' : 'Optional'),
	)) . '
';
	return $__finalCompiled;
}
),
'original_source_article_title' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
		'name' => 'os_article_title',
		'value' => $__vars['article']['original_source']['os_article_title'],
		'maxlength' => '256',
	), array(
		'label' => 'Original source article title',
		'hint' => ($__vars['article']['Category']['require_original_source'] ? 'Required' : 'Optional'),
	)) . '
';
	return $__finalCompiled;
}
),
'original_source_name' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
		'name' => 'os_source_name',
		'value' => $__vars['article']['original_source']['os_source_name'],
		'maxlength' => '256',
	), array(
		'label' => 'Original source name',
		'hint' => ($__vars['article']['Category']['require_original_source'] ? 'Required' : 'Optional'),
	)) . '
';
	return $__finalCompiled;
}
),
'original_source_url' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
		'name' => 'os_source_url',
		'value' => $__vars['article']['original_source']['os_source_url'],
		'type' => 'url',
		'maxlength' => '256',
		'id' => 'osUrl',
		'placeholder' => 'URL' . $__vars['xf']['language']['ellipsis'],
		'class' => 'amsOsUrl',
	), array(
		'label' => 'Original source URL',
		'hint' => ($__vars['article']['Category']['require_original_source'] ? 'Required' : 'Optional'),
		'explain' => 'The <b>FULL URL</b> to the external original source site eg <b>https://originalsourcewebsite.com</b>  ',
	)) . '
';
	return $__finalCompiled;
}
),
'location' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
		'name' => 'location',
		'value' => $__vars['article']['location_'],
		'maxlength' => $__templater->func('max_length', array($__vars['article'], 'location', ), false),
	), array(
		'label' => 'Location',
		'hint' => ($__vars['article']['Category']['require_location'] ? 'Required' : 'Optional'),
		'explain' => ($__vars['article']['Category']['require_location'] ? 'Enter the address of the location associated with your article.<br>
eg 1600 Amphitheatre Parkway, Mountain View, CA 94043' : 'Enter the address of the location associated with your article if you wish to link to a google map. <br>
eg 1600 Amphitheatre Parkway, Mountain View, CA 94043'),
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

' . '

' . '

' . '

' . '

' . '

' . '

' . '

' . '

';
	return $__finalCompiled;
}
);