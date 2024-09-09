<?php
// FROM HASH: e008b270174ce8a1d3a58a4896c5f812
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Reassign article');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['article'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['article']['page_count']) {
		$__compilerTemp1 .= '
				' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'reassign_pages',
			'selected' => true,
			'label' => 'Reassign article pages to new owner.',
			'_type' => 'option',
		)), array(
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'username',
		'ac' => 'single',
		'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'username', ), false),
	), array(
		'label' => 'New owner',
	)) . '

			' . $__compilerTemp1 . '
			
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'alert',
		'selected' => true,
		'label' => 'Notify the current and new owners of this action.' . ' ' . 'Reason' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'alert_reason',
		'placeholder' => 'Optional',
		'maxlength' => '250',
	))),
		'_type' => 'option',
	)), array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('ams/reassign', $__vars['article'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);