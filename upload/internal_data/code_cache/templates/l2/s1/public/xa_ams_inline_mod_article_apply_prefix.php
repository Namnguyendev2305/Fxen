<?php
// FROM HASH: 549abd97a66bc218d80d2fc85db5e0fe
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Áp dụng tiền tố');
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
		<div class="block-body">
			' . $__templater->formInfoRow('Are you sure you want to apply a prefix to ' . $__templater->escape($__vars['total']) . ' article(s)?', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->callMacro('prefix_macros', 'row', array(
		'type' => 'ams_article',
		'prefixes' => $__vars['prefixes'],
		'selected' => $__vars['selectedPrefix'],
		'explain' => ((($__vars['categoryCount'] > 1)) ? 'The articles you have selected are located in more than one category. Each article will only be updated if the chosen prefix is valid in its category.' : ''),
	), $__vars) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'confirm',
	), array(
	)) . '
	</div>

	' . $__compilerTemp1 . '

	' . $__templater->formHiddenVal('type', 'ams_article', array(
	)) . '
	' . $__templater->formHiddenVal('action', 'apply_prefix', array(
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