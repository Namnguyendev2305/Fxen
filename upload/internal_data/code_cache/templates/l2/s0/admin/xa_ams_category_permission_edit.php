<?php
// FROM HASH: ad37c995837894e2c870a0317a3f3455
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['userGroup']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['userGroup']['title']));
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['user']['username']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped('Phân quyền' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['record']['title'])), $__templater->func('link', array('xa-ams/categories/permissions', $__vars['record'], ), false), array(
	));
	$__finalCompiled .= '

' . $__templater->callMacro('permission_category_macros', 'edit', array(
		'category' => $__vars['record'],
		'permissionData' => $__vars['permissionData'],
		'typeEntries' => $__vars['typeEntries'],
		'routeBase' => 'xa-ams/categories/permissions',
		'saveParams' => $__vars['saveParams'],
	), $__vars);
	return $__finalCompiled;
}
);