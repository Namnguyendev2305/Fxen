<?php
// FROM HASH: 8a2393aff4142b0b41077be1d2b2cfe5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit series part');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['series'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formNumberBoxRow(array(
		'name' => 'display_order',
		'value' => $__vars['seriesPart']['display_order'],
		'min' => '0',
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
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('ams/series-part/edit', $__vars['seriesPart'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);