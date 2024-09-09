<?php
// FROM HASH: bffa3be714d2424a5eed99b1989491cd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('AMS - Articles');
	$__finalCompiled .= '

' . $__templater->callMacro('section_nav_macros', 'section_nav', array(
		'section' => 'xa_ams',
	), $__vars);
	return $__finalCompiled;
}
);