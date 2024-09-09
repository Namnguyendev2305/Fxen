<?php
// FROM HASH: 62e415903e52b782f1ddea1b37f48dd7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['noH1'] = true;
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['article']['Category'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '

';
	if ($__vars['article']['prefix_id']) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = '';
		$__compilerTemp1 .= $__templater->func('prefix_description', array('ams_article', $__vars['article']['prefix_id'], ), true);
		if (strlen(trim($__compilerTemp1)) > 0) {
			$__finalCompiled .= '
		<div class="blockMessage blockMessage--alt blockMessage--small blockMessage--close">
			' . $__compilerTemp1 . '
		</div>
	';
		}
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

' . $__templater->callMacro('xa_ams_article_wrapper_macros', 'status', array(
		'article' => $__vars['article'],
	), $__vars) . '

' . $__templater->callMacro('xa_ams_article_page_macros', 'article_page_options', array(
		'category' => $__vars['article']['Category'],
		'article' => $__vars['article'],
	), $__vars) . '

' . $__templater->callMacro('xa_ams_article_wrapper_macros', 'header', array(
		'article' => $__vars['article'],
	), $__vars) . '

' . $__templater->callMacro('xa_ams_article_wrapper_macros', 'tabs', array(
		'article' => $__vars['article'],
		'selected' => $__vars['pageSelected'],
	), $__vars) . '

' . $__templater->filter($__vars['innerContent'], array(array('raw', array()),), true);
	return $__finalCompiled;
}
);