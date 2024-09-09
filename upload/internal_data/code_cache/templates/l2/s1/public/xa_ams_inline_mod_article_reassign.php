<?php
// FROM HASH: 4ff778790fb7e93c4dbe553a63956260
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Reassign articles');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['articles'])) {
		foreach ($__vars['articles'] AS $__vars['article']) {
			$__compilerTemp1 .= '
		' . $__templater->formHiddenVal('ids[]', $__vars['article']['article_id'], array(
			)) . '
	';
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body js-prefixListenContainer">
			' . $__templater->formInfoRow('Are you sure you want to reassign ' . $__templater->escape($__vars['total']) . ' article(s)?', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'username',
		'ac' => 'single',
		'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'username', ), false),
	), array(
		'label' => 'New owner',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'reassign_pages',
		'selected' => true,
		'label' => 'Reassign article pages to new owner.',
		'_type' => 'option',
	)), array(
	)) . '
			
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'alert',
		'selected' => true,
		'label' => 'Notify the current and new owners of this action.' . ' ' . 'Lý do' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'alert_reason',
		'placeholder' => 'Tùy chọn (không bắt buộc)',
		'maxlength' => '250',
	))),
		'_type' => 'option',
	)), array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'confirm',
	), array(
	)) . '
	</div>

	' . $__compilerTemp1 . '

	' . $__templater->formHiddenVal('type', 'ams_article', array(
	)) . '
	' . $__templater->formHiddenVal('action', 'reassign', array(
	)) . '
	' . $__templater->formHiddenVal('confirmed', '1', array(
	)) . '

	' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
', array(
		'action' => $__templater->func('link', array('inline-mod', ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);