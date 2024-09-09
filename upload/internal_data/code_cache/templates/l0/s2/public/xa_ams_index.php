<?php
// FROM HASH: cab5c5110bb4755c35d3633169a45f9e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Articles');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
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
	if (($__vars['xf']['options']['xaAmsFeaturedArticlesDisplayType'] == 'featured_grid') AND (($__vars['featuredArticlesCount'] > 1) AND $__templater->method($__vars['xf']['visitor'], 'hasAmsArticlePermission', array('viewArticleAttach', )))) {
		$__finalCompiled .= '
	' . $__templater->callMacro('xa_ams_featured_macros', 'featured_grid', array(
			'featuredArticles' => $__vars['featuredArticles'],
			'featuredArticlesCount' => $__vars['featuredArticlesCount'],
			'viewAllLink' => $__templater->func('link', array('ams/featured', ), false),
		), $__vars) . '
';
	} else {
		$__finalCompiled .= '
	' . $__templater->callMacro('xa_ams_featured_macros', 'featured_carousel', array(
			'featuredArticles' => $__vars['featuredArticles'],
			'viewAllLink' => $__templater->func('link', array('ams/featured', ), false),
		), $__vars) . '
';
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

' . $__templater->widgetPosition('xa_ams_index_above_articles', array()) . '

<div class="block ' . (($__vars['xf']['options']['xaAmsArticleListLayoutType'] == 'article_view') ? 'block--messages' : '') . '" data-xf-init="' . ($__vars['canInlineMod'] ? 'inline-mod' : '') . '" data-type="ams_article" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
	<div class="block-outer">';
	$__compilerTemp1 = '';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
					';
	if ($__vars['canInlineMod']) {
		$__compilerTemp2 .= '
						' . $__templater->callMacro('inline_mod_macros', 'button', array(), $__vars) . '
					';
	}
	$__compilerTemp2 .= '
				';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__compilerTemp1 .= '
			<div class="block-outer-opposite">
				<div class="buttonGroup">
				' . $__compilerTemp2 . '
				</div>
			</div>
		';
	}
	$__finalCompiled .= $__templater->func('trim', array('

		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'ams',
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '

		' . $__compilerTemp1 . '

	'), false) . '</div>

	<div class="block-container">
		' . $__templater->callMacro('xa_ams_index_macros', 'list_filter_bar', array(
		'filters' => $__vars['filters'],
		'baseLinkPath' => 'ams',
		'creatorFilter' => $__vars['creatorFilter'],
	), $__vars) . '

		<div class="block-body">
			';
	if (!$__templater->test($__vars['articles'], 'empty', array())) {
		$__finalCompiled .= '
				';
		if (($__vars['xf']['options']['xaAmsArticleListLayoutType'] == 'article_view') AND $__templater->method($__vars['xf']['visitor'], 'hasAmsArticlePermission', array('viewArticleAttach', ))) {
			$__finalCompiled .= '
					';
			if ($__templater->isTraversable($__vars['articles'])) {
				foreach ($__vars['articles'] AS $__vars['article']) {
					$__finalCompiled .= '
						' . $__templater->callMacro('xa_ams_article_list_macros', 'article_view_layout', array(
						'filterPrefix' => true,
						'article' => $__vars['article'],
					), $__vars) . '
					';
				}
			}
			$__finalCompiled .= '
				';
		} else if (($__vars['xf']['options']['xaAmsArticleListLayoutType'] == 'grid_view') AND $__templater->method($__vars['xf']['visitor'], 'hasAmsArticlePermission', array('viewArticleAttach', ))) {
			$__finalCompiled .= '
					';
			$__templater->includeCss('xa_ams.less');
			$__finalCompiled .= '
					';
			$__templater->includeCss('xa_ams_grid_view_layout.less');
			$__finalCompiled .= '

					<div class="gridContainerAmsGridView">		
						<ul class="ams-grid-view">
							';
			if ($__templater->isTraversable($__vars['articles'])) {
				foreach ($__vars['articles'] AS $__vars['article']) {
					$__finalCompiled .= '
								' . $__templater->callMacro('xa_ams_article_list_macros', 'grid_view_layout', array(
						'filterPrefix' => true,
						'article' => $__vars['article'],
					), $__vars) . '
							';
				}
			}
			$__finalCompiled .= '
						</ul>
					</div>
				';
		} else if (($__vars['xf']['options']['xaAmsArticleListLayoutType'] == 'tile_view') AND $__templater->method($__vars['xf']['visitor'], 'hasAmsArticlePermission', array('viewArticleAttach', ))) {
			$__finalCompiled .= '
					';
			$__templater->includeCss('xa_ams.less');
			$__finalCompiled .= '
					';
			$__templater->includeCss('xa_ams_tile_view_layout.less');
			$__finalCompiled .= '

					<div class="gridContainerAmsTileView">		
						<ul class="ams-tile-view">
							';
			if ($__templater->isTraversable($__vars['articles'])) {
				foreach ($__vars['articles'] AS $__vars['article']) {
					$__finalCompiled .= '
								' . $__templater->callMacro('xa_ams_article_list_macros', 'tile_view_layout', array(
						'filterPrefix' => true,
						'article' => $__vars['article'],
					), $__vars) . '
							';
				}
			}
			$__finalCompiled .= '
						</ul>
					</div>
				';
		} else {
			$__finalCompiled .= '
					<div class="structItemContainer structItemContainerAmsListView">
						';
			if ($__templater->isTraversable($__vars['articles'])) {
				foreach ($__vars['articles'] AS $__vars['article']) {
					$__finalCompiled .= '
							' . $__templater->callMacro('xa_ams_article_list_macros', 'list_view_layout', array(
						'filterPrefix' => true,
						'article' => $__vars['article'],
					), $__vars) . '
						';
				}
			}
			$__finalCompiled .= '
					</div>
				';
		}
		$__finalCompiled .= '
			';
	} else if ($__vars['filters']) {
		$__finalCompiled .= '
				<div class="block-row">' . 'There are no articles matching your filters.' . '</div>
			';
	} else {
		$__finalCompiled .= '
				<div class="block-row">' . 'No articles have been created yet.' . '</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>

	<div class="block-outer block-outer--after">
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'ams',
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '
		' . $__templater->func('show_ignored', array(array(
		'wrapperclass' => 'block-outer-opposite',
	))) . '
	</div>
</div>

' . $__templater->widgetPosition('xa_ams_index_below_articles', array()) . '

';
	$__templater->setPageParam('sideNavTitle', 'Categories');
	$__finalCompiled .= '
';
	$__templater->modifySideNavHtml(null, '
	' . $__templater->callMacro('xa_ams_category_list_macros', 'simple_list_block', array(
		'categoryTree' => $__vars['categoryTree'],
		'categoryExtras' => $__vars['categoryExtras'],
		'selected' => '',
	), $__vars) . '			  
', 'replace');
	$__finalCompiled .= '

';
	$__templater->modifySideNavHtml('_xfWidgetPositionSideNav7d457d6e928be41328a6d8bfc83b0770', $__templater->widgetPosition('xa_ams_index_sidenav', array()), 'replace');
	$__finalCompiled .= '

';
	$__templater->modifySidebarHtml('_xfWidgetPositionSidebar5ba84ee4d566195d9d939286af63e245', $__templater->widgetPosition('xa_ams_index_sidebar', array()), 'replace');
	return $__finalCompiled;
}
);