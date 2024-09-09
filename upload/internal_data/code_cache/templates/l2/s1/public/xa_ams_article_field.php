<?php
// FROM HASH: dc4af87a9c52ef8a251a3339af7d82a8
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->func('prefix', array('ams_article', $__vars['article'], 'escaped', ), true) . ($__vars['article']['meta_title'] ? $__templater->escape($__vars['article']['meta_title']) : $__templater->escape($__vars['article']['title'])) . ' - ' . $__templater->escape($__vars['fieldDefinition']['title']));
	$__finalCompiled .= '

';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['pageSelected'] = 'field_' . $__vars['fieldId'];
	$__templater->wrapTemplate('xa_ams_article_wrapper', $__compilerTemp1);
	$__finalCompiled .= '

<div class="block">
	';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
				' . $__templater->callMacro('xa_ams_article_wrapper_macros', 'action_buttons', array(
		'article' => $__vars['article'],
		'showRateButton' => 'true',
	), $__vars) . '
			';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__finalCompiled .= '
		<div class="block-outer">
			<div class="block-outer-opposite">
			' . $__compilerTemp2 . '
			</div>
		</div>
	';
	}
	$__finalCompiled .= '

	<div class="block-container">
		<div class="block-body block-row">
			' . $__templater->callMacro('custom_fields_macros', 'custom_field_value', array(
		'definition' => $__vars['fieldDefinition'],
		'value' => $__vars['fieldValue'],
	), $__vars) . '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);