<?php
// FROM HASH: f524d17b0d49428a06292bd133438bd9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['category']['title']) . ' - ' . 'Map');
	$__finalCompiled .= '

';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '

' . $__templater->callMacro('metadata_macros', 'canonical_url', array(
		'canonicalUrl' => $__templater->func('link', array('canonical:ams/categories/map', $__vars['category'], ), false),
	), $__vars) . '

';
	$__templater->breadcrumbs($__templater->method($__vars['category'], 'getBreadcrumbs', array(true, )));
	$__finalCompiled .= '

' . $__templater->callMacro('xa_ams_article_page_macros', 'article_page_options', array(
		'category' => $__vars['category'],
	), $__vars) . '

<div class="block">
	<div class="block-container">
		' . $__templater->callMacro('xa_ams_index_macros', 'list_filter_bar', array(
		'filters' => $__vars['filters'],
		'baseLinkPath' => 'ams/categories/map',
		'category' => $__vars['category'],
		'creatorFilter' => $__vars['creatorFilter'],
	), $__vars) . '

		<div class="block-header">	
			<div style="text-align: center;">
				<a href="' . $__templater->func('link', array('ams/categories/map-marker-legend', $__vars['category'], ), true) . '" data-xf-click="overlay">' . 'View legend' . '</a>
			</div>
		</div>
		
		<div class="block-body">
			';
	if (!$__templater->test($__vars['mapItems'], 'empty', array())) {
		$__finalCompiled .= '
				' . $__templater->callMacro('xa_ams_map_macros', 'articles_map', array(
			'mapItems' => $__vars['mapItems'],
			'mapId' => 'ams-cat-' . $__vars['category']['category_id'] . '-full',
			'containerHeight' => '800',
		), $__vars) . '	
			';
	} else if ($__vars['filters']) {
		$__finalCompiled .= '
				<div class="block-row">' . 'There are no articles matching your filters.' . '</div>
			';
	} else {
		$__finalCompiled .= '
				<div class="block-row">' . 'No articles have been added yet.' . '</div>
			';
	}
	$__finalCompiled .= '
		</div>
		
		<div class="block-footer">	
			<div style="text-align: center;">
				<a href="' . $__templater->func('link', array('ams/categories/map-marker-legend', $__vars['category'], ), true) . '" data-xf-click="overlay">' . 'View legend' . '</a>
			</div>
		</div>		
	</div>
</div>';
	return $__finalCompiled;
}
);