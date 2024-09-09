<?php
// FROM HASH: ae4b2cc03b668f18bb5eedff180656a1
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Permissions' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['record']['title']));
	$__finalCompiled .= '

' . $__templater->callMacro('permission_category_macros', 'list', array(
		'category' => $__vars['record'],
		'isPrivate' => $__vars['isPrivate'],
		'userGroups' => $__vars['userGroups'],
		'users' => $__vars['users'],
		'entries' => $__vars['entries'],
		'routeBase' => 'xa-ams/categories/permissions',
	), $__vars);
	return $__finalCompiled;
}
);