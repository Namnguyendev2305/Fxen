<?php
// FROM HASH: 1df4fbb048235bf722b514d14ecc97bd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('prefix_macros', 'select', array(
		'name' => 'na',
		'prefixes' => $__vars['prefixes'],
		'type' => 'ams_article',
	), $__vars);
	return $__finalCompiled;
}
);