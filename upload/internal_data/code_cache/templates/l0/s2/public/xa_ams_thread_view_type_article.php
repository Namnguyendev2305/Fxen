<?php
// FROM HASH: 7bd2db78547e2be24951600b02e2f019
return array(
'extends' => function($__templater, array $__vars) { return 'thread_view'; },
'extensions' => array('content_top' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
		$__finalCompiled .= '
	';
	if ($__vars['amsArticle']) {
		$__finalCompiled .= '
		';
		$__vars['originalH1'] = $__templater->preEscaped($__templater->func('page_h1', array('')));
		$__finalCompiled .= '
		';
		$__vars['originalDescription'] = $__templater->preEscaped($__templater->func('page_description'));
		$__finalCompiled .= '

		';
		$__templater->pageParams['noH1'] = true;
		$__finalCompiled .= '
		';
		$__templater->pageParams['pageDescription'] = $__templater->preEscaped('');
		$__templater->pageParams['pageDescriptionMeta'] = true;
		$__finalCompiled .= '

		';
		$__templater->includeCss('xa_ams.less');
		$__finalCompiled .= '
		
		' . $__templater->callMacro('xa_ams_article_wrapper_macros', 'header', array(
			'article' => $__vars['amsArticle'],
			'titleHtml' => $__vars['originalH1'],
			'metaHtml' => $__vars['originalDescription'],
		), $__vars) . '
		
		' . $__templater->callMacro('xa_ams_article_wrapper_macros', 'status', array(
			'article' => $__vars['amsArticle'],
		), $__vars) . '		

		' . $__templater->callMacro('xa_ams_article_wrapper_macros', 'tabs', array(
			'article' => $__vars['amsArticle'],
			'selected' => 'discussion',
		), $__vars) . '
	';
	}
	$__finalCompiled .= '	
';
	return $__finalCompiled;
}),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . $__templater->renderExtension('content_top', $__vars, $__extensions);
	return $__finalCompiled;
}
);