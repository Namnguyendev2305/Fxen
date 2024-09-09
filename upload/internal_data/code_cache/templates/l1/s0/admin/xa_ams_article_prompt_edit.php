<?php
// FROM HASH: 42697987be8424f1100619fefb31fd03
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['extraOptions'] = $__templater->preEscaped('
		' . $__templater->callMacro('xa_ams_article_prefix_edit_macros', 'category_ids', array(
		'categoryIds' => $__vars['prompt']['category_ids'],
		'categoryTree' => $__vars['categoryTree'],
	), $__vars) . '	
	');
	$__finalCompiled .= $__templater->includeTemplate('base_prompt_edit', $__compilerTemp1);
	return $__finalCompiled;
}
);