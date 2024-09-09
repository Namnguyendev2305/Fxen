<?php
// FROM HASH: ae7764f436a590ef20cd918afccf956d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add article to series');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['article'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__templater->test($__vars['series'], 'empty', array())) {
		$__compilerTemp1 .= '
							';
		$__compilerTemp2 = array(array(
			'value' => '0',
			'_type' => 'option',
		));
		if ($__templater->isTraversable($__vars['series'])) {
			foreach ($__vars['series'] AS $__vars['seriesItem']) {
				$__compilerTemp2[] = array(
					'value' => $__vars['seriesItem']['series_id'],
					'label' => $__templater->escape($__vars['seriesItem']['title']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp1 .= $__templater->formSelect(array(
			'name' => 'series_id',
			'value' => '0',
			'class' => 'input--inline',
			'style' => 'max-width:99%;',
		), $__compilerTemp2) . '
							<p class="formRow-explain">' . 'Select a series that you own or mange that you want to add this article to.' . '</p>
						';
	} else {
		$__compilerTemp1 .= '
							<p class="formRow-explain">' . 'You do not own any series that you are able to add this article to.' . '</p>
						';
	}
	$__compilerTemp3 = '';
	if (!$__templater->test($__vars['communitySeries'], 'empty', array())) {
		$__compilerTemp3 .= '
							';
		$__compilerTemp4 = array(array(
			'value' => '0',
			'_type' => 'option',
		));
		if ($__templater->isTraversable($__vars['communitySeries'])) {
			foreach ($__vars['communitySeries'] AS $__vars['communitySeriesItem']) {
				$__compilerTemp4[] = array(
					'value' => $__vars['communitySeriesItem']['series_id'],
					'label' => $__templater->escape($__vars['communitySeriesItem']['title']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp3 .= $__templater->formSelect(array(
			'name' => 'series_id',
			'value' => '0',
			'class' => 'input--inline',
			'style' => 'max-width:99%;',
		), $__compilerTemp4) . '
							<p class="formRow-explain">' . 'Select a community series that you want to add this article to.' . '</p>
						';
	} else {
		$__compilerTemp3 .= '
							<p class="formRow-explain">' . 'There are no community series available to add this article to.' . '</p>
						';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">

			' . $__templater->formRadioRow(array(
		'name' => 'series_input_type',
		'value' => 'series_list',
		'listclass' => '_listColumns',
	), array(array(
		'value' => 'series_list',
		'data-hide' => 'true',
		'label' => 'Select a series that you own or manage',
		'_dependent' => array('
						' . $__compilerTemp1 . '	
					'),
		'_type' => 'option',
	),
	array(
		'value' => 'community_series_list',
		'data-hide' => 'true',
		'label' => 'Select a community series',
		'_dependent' => array('
						' . $__compilerTemp3 . '	
					'),
		'_type' => 'option',
	),
	array(
		'value' => 'input_series_url',
		'data-hide' => 'true',
		'label' => 'Set series by url',
		'_dependent' => array('
						' . $__templater->formTextBox(array(
		'name' => 'series_url',
		'type' => 'url',
	)) . '
						<p class="formRow-explain">' . 'Enter the URL of the series that you want to add this article to.  
<br><br>
<b>Important Note</b>: Only staff members can add another member\'s article to a another members series UNLESS it is a community series!' . '</p>
					'),
		'_type' => 'option',
	)), array(
		'label' => 'Select or set a series',
	)) . '

			' . $__templater->formNumberBoxRow(array(
		'name' => 'display_order',
		'value' => '1',
		'min' => '1',
		'pattern' => '\\d*',
	), array(
		'label' => 'Display order',
		'explain' => 'The display order determines the order in which the articles will appear on the series page as well as the order in which the article titles will appear within the series table of contents on article pages. 
<br><br>
<b>Tip:</b> Using increments of 10 or 100 when setting the display order allow you add a new article between existing articles without having to adjust display orders of multiple existing articles.',
	)) . '
		</div>

		' . $__templater->formHiddenVal('article_id', $__vars['article']['article_id'], array(
	)) . '

		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('ams/add-to-series', $__vars['article'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);