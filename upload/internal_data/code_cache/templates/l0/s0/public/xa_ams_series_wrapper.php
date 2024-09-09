<?php
// FROM HASH: bb5b7ed65ef3a3cbfe5e2d00113d3900
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['noH1'] = true;
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['series'], 'getBreadcrumbs', array(false, )));
	$__finalCompiled .= '

';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '

' . $__templater->callMacro('xa_ams_series_wrapper_macros', 'status', array(
		'series' => $__vars['series'],
	), $__vars) . '

' . $__templater->callMacro('xa_ams_series_page_macros', 'series_page_options', array(
		'series' => $__vars['series'],
	), $__vars) . '

' . $__templater->callMacro('xa_ams_series_wrapper_macros', 'header', array(
		'series' => $__vars['series'],
	), $__vars) . '

' . $__templater->callMacro('xa_ams_series_wrapper_macros', 'tabs', array(
		'series' => $__vars['series'],
		'selected' => $__vars['pageSelected'],
	), $__vars) . '

' . $__templater->filter($__vars['innerContent'], array(array('raw', array()),), true);
	return $__finalCompiled;
}
);