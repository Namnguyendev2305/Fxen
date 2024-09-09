<?php
// FROM HASH: b5a121b3cba3682cb9459aaba825b67f
return array(
'macros' => array('title' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'page' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => $__vars['page']['title'],
		'maxlength' => $__templater->func('max_length', array($__vars['page'], 'title', ), false),
		'placeholder' => 'Title' . $__vars['xf']['language']['ellipsis'],
	), array(
		'rowtype' => 'fullWidth noLabel',
		'label' => 'Title',
	)) . '
';
	return $__finalCompiled;
}
),
'message' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'page' => '!',
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
		'value' => $__vars['page']['message_'],
		'data-min-height' => '250',
		'attachments' => $__vars['attachmentData']['attachments'],
	), array(
		'rowtype' => 'fullWidth noLabel',
		'label' => 'Article page',
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
	</div>
';
	return $__finalCompiled;
}
),
'description' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'page' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextAreaRow(array(
		'name' => 'description',
		'value' => $__vars['page']['description_'],
		'maxlength' => $__templater->func('max_length', array($__vars['page'], 'description', ), false),
	), array(
		'label' => 'Description',
		'hint' => 'Optional',
		'explain' => 'Provide a very brief description of your article page.  
<br><br>
<b>Note</b>:  Leave this blank to use a snippet from the article page as the description. ',
	)) . '
';
	return $__finalCompiled;
}
),
'og_title_meta_title' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'page' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
		'name' => 'og_title',
		'value' => $__vars['page']['og_title'],
		'maxlength' => $__templater->func('max_length', array($__vars['page'], 'og_title', ), false),
	), array(
		'label' => 'OG title',
		'hint' => 'Optional',
		'explain' => 'The Open Graph / Twitter title used on social media (Facebook, Twitter etc).',
	)) . '

	' . $__templater->formTextBoxRow(array(
		'name' => 'meta_title',
		'value' => $__vars['page']['meta_title'],
		'maxlength' => $__templater->func('max_length', array($__vars['page'], 'meta_title', ), false),
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
		'page' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextAreaRow(array(
		'name' => 'meta_description',
		'value' => $__vars['page']['meta_description_'],
		'maxlength' => $__templater->func('max_length', array($__vars['page'], 'meta_description', ), false),
	), array(
		'label' => 'Meta description',
		'hint' => 'Optional',
		'explain' => 'Provide a brief summary of your article page for search engines.
<br><br>
A meta description can influence the decision of the searcher as to whether they want to click through on your article page from search results or not. The more descriptive, attractive and relevant the description, the more likely someone will click through.
',
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

';
	return $__finalCompiled;
}
);