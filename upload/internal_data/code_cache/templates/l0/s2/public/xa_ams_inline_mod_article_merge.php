<?php
// FROM HASH: cb19e135d7d2d73e4a8925315ad11dd5
return array(
'macros' => array('item_alert' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'selected' => false,
		'alertName' => 'starter_alert',
		'reasonName' => 'starter_alert_reason',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => $__vars['alertName'],
		'selected' => $__vars['selected'],
		'label' => 'Notify article author of this action' . ' ' . 'Reason' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => $__vars['reasonName'],
		'placeholder' => 'Optional',
	))),
		'afterhint' => 'Note that the article author will see this alert even if they can no longer view their article.',
		'_type' => 'option',
	)), array(
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Inline moderation - Merge articles');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['articles'])) {
		foreach ($__vars['articles'] AS $__vars['article']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['article']['article_id'],
				'label' => $__templater->func('prefix', array('ams_article', $__vars['article'], 'escaped', ), true) . $__templater->escape($__vars['article']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp2 = '';
	if ($__templater->isTraversable($__vars['articles'])) {
		foreach ($__vars['articles'] AS $__vars['article']) {
			$__compilerTemp2 .= '
		' . $__templater->formHiddenVal('ids[]', $__vars['article']['article_id'], array(
			)) . '
	';
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('Are you sure you want to merge ' . $__templater->escape($__vars['total']) . ' articles?', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'target_article_id',
		'value' => $__vars['first']['article_id'],
	), $__compilerTemp1, array(
		'label' => 'Destination article',
		'explain' => 'All comments and reviews from the other articles will be merged into this article.',
	)) . '

			' . $__templater->callMacro(null, 'item_alert', array(
		'selected' => ($__vars['total'] == 1),
	), $__vars) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'merge',
	), array(
	)) . '
	</div>

	' . $__compilerTemp2 . '

	' . $__templater->formHiddenVal('type', 'ams_article', array(
	)) . '
	' . $__templater->formHiddenVal('action', 'merge', array(
	)) . '
	' . $__templater->formHiddenVal('confirmed', '1', array(
	)) . '

	' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
', array(
		'action' => $__templater->func('link', array('inline-mod', ), false),
		'class' => 'block',
		'ajax' => 'true',
	)) . '

';
	return $__finalCompiled;
}
);