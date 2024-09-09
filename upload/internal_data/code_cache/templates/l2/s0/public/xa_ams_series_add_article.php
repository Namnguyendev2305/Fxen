<?php
// FROM HASH: d9540fcbe43ed480cdd49672a536dbda
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add article to series');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['series'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__templater->test($__vars['articles'], 'empty', array())) {
		$__compilerTemp1 .= '
							';
		$__compilerTemp2 = array(array(
			'value' => '0',
			'_type' => 'option',
		));
		if ($__templater->isTraversable($__vars['articles'])) {
			foreach ($__vars['articles'] AS $__vars['article']) {
				$__compilerTemp2[] = array(
					'value' => $__vars['article']['article_id'],
					'label' => $__templater->escape($__vars['article']['title']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp1 .= $__templater->formSelect(array(
			'name' => 'article_id',
			'value' => '0',
			'class' => 'input--inline',
			'style' => 'max-width:99%;',
		), $__compilerTemp2) . '
							<p class="formRow-explain">' . 'Select the article that you want to add to this this series.    
<br><br>
<b>Note</b>: If the article that you are wanting to associate with this series is not listed above, you can attempt to associate a specific article by using the "Set article by URL"  option below.' . '</p>
						';
	} else {
		$__compilerTemp1 .= '
							<p class="formRow-explain">' . 'You do not have any recent existing articles that are able to be associated with this series.
<br><br>
Use the "Set article url" option below to attempt to associate an article manually. ' . '</p>
						';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRadioRow(array(
		'name' => 'article_input_type',
		'value' => 'article_list',
		'listclass' => '_listColumns',
	), array(array(
		'value' => 'article_list',
		'data-hide' => 'true',
		'label' => 'Select recent article',
		'_dependent' => array('
						' . $__compilerTemp1 . '	
					'),
		'_type' => 'option',
	),
	array(
		'value' => 'input_article_url',
		'data-hide' => 'true',
		'label' => 'Set article by URL',
		'_dependent' => array('
						' . $__templater->formTextBox(array(
		'name' => 'article_url',
		'type' => 'url',
	)) . '
						<p class="formRow-explain">' . 'Enter the URL of the article that you want to add to this series.  
<br><br>
<b>Important Note</b>:  Only visible state articles can be added to a series. 
<br><br>
<b>Important Note</b>: Only staff members can add another member\'s article to a series.' . '</p>
					'),
		'_type' => 'option',
	)), array(
		'label' => 'Select or set an article',
	)) . '

			' . $__templater->formNumberBoxRow(array(
		'name' => 'display_order',
		'value' => '1',
		'min' => '1',
		'pattern' => '\\d*',
	), array(
		'label' => 'Thứ tự hiển thị',
		'explain' => 'The display order determines the order in which the articles will appear on the series page as well as the order in which the article titles will appear within the series table of contents on article pages. 
<br><br>
<b>Tip:</b> Using increments of 10 or 100 when setting the display order allow you add a new article between existing articles without having to adjust display orders of multiple existing articles.',
	)) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('ams/series/add-article', $__vars['series'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);