<?php
// FROM HASH: fbba711f14a77bfc8e993f66068f0d76
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Articles');
	$__finalCompiled .= '
';
	$__templater->pageParams['pageH1'] = $__templater->preEscaped(' ');
	$__finalCompiled .= '

';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '

' . $__templater->callMacro('metadata_macros', 'metadata', array(
		'description' => $__vars['xf']['options']['xaAmsMetaDescription'],
		'canonicalUrl' => $__templater->func('link', array('canonical:ams', null, array('page' => (($__vars['page'] > 1) ? $__vars['page'] : null), ), ), false),
	), $__vars) . '

';
	$__templater->setPageParam('searchConstraints', array('Articles' => array('search_type' => 'ams_article', ), ));
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'canAddAmsArticle', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Post article' . $__vars['xf']['language']['ellipsis'], array(
			'href' => $__templater->func('link', array('ams/add', ), false),
			'class' => 'button--cta',
			'icon' => 'write',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	if ($__vars['canInlineMod']) {
		$__finalCompiled .= '
	';
		$__templater->includeJs(array(
			'src' => 'xf/inline_mod.js',
			'min' => '1',
		));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__templater->modifySideNavHtml('_xfWidgetPositionSideNave380c882ec72fdc193fb875eb8c468f3', $__templater->widgetPosition('xa_ams_modular_index_sidenav', array()), 'replace');
	$__finalCompiled .= '

' . $__templater->widgetPosition('xa_ams_modular_index_main', array()) . '

';
	$__templater->modifySidebarHtml('_xfWidgetPositionSidebar2a7d9eccbcdf90e00c58176722fa2b6e', $__templater->widgetPosition('xa_ams_modular_index_sidebar', array()), 'replace');
	return $__finalCompiled;
}
);