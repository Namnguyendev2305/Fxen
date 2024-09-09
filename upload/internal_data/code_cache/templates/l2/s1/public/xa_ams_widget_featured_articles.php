<?php
// FROM HASH: 8cebedc592df5d537f9feee1a3c4f1bd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__templater->test($__vars['articles'], 'empty', array())) {
		$__finalCompiled .= '

	';
		$__vars['headerLink'] = $__templater->func('link', array('ams/featured', ), false);
		$__finalCompiled .= '

	<div class="block"' . $__templater->func('widget_data', array($__vars['widget'], ), true) . ' data-type="ams_article">
		';
		if (($__vars['style'] == 'featured_grid') AND (($__vars['articlesCount'] > 1) AND $__templater->method($__vars['xf']['visitor'], 'hasAmsArticlePermission', array('viewArticleAttach', )))) {
			$__finalCompiled .= '
			';
			$__templater->includeCss('xa_ams.less');
			$__finalCompiled .= '
			<h3 class="block-header">
				<a href="' . $__templater->escape($__vars['headerLink']) . '" rel="nofollow">' . ($__templater->escape($__vars['title']) ?: 'Featured articles') . '</a>
			</h3>			
			' . $__templater->callMacro('xa_ams_featured_macros', 'featured_grid', array(
				'featuredArticles' => $__vars['articles'],
				'featuredArticlesCount' => $__vars['articlesCount'],
				'viewAllLink' => $__templater->func('link', array('ams/featured', ), false),
			), $__vars) . '
		';
		} else if ((($__vars['style'] == 'carousel') OR ($__vars['style'] == 'simple_carousel')) OR ((($__vars['style'] == 'featured_grid') AND ((($__vars['articlesCount'] < 2) OR (!$__templater->method($__vars['xf']['visitor'], 'hasAmsArticlePermission', array('viewArticleAttach', )))))))) {
			$__finalCompiled .= '
			';
			$__templater->includeCss('xa_ams.less');
			$__finalCompiled .= '
			<h3 class="block-header">
				<a href="' . $__templater->escape($__vars['headerLink']) . '" rel="nofollow">' . ($__templater->escape($__vars['title']) ?: 'Featured articles') . '</a>
			</h3>
			';
			if ($__vars['style'] == 'simple_carousel') {
				$__finalCompiled .= '
				' . $__templater->callMacro('xa_ams_widget_articles_macros', 'articles_carousel_simple', array(
					'articles' => $__vars['articles'],
					'viewAllLink' => $__templater->func('link', array('ams/featured', ), false),
					'isFeaturedArticles' => true,
				), $__vars) . '	
			';
			} else {
				$__finalCompiled .= '			
				' . $__templater->callMacro('xa_ams_featured_macros', 'featured_carousel', array(
					'featuredArticles' => $__vars['articles'],
					'viewAllLink' => $__templater->func('link', array('ams/featured', ), false),
				), $__vars) . '
			';
			}
			$__finalCompiled .= '
		';
		} else {
			$__finalCompiled .= '
			<div class="block-container">
				';
			if ($__vars['style'] == 'simple') {
				$__finalCompiled .= '
					<h3 class="block-minorHeader">
						<a href="' . $__templater->escape($__vars['headerLink']) . '" rel="nofollow">' . ($__templater->escape($__vars['title']) ?: 'Featured articles') . '</a>
					</h3>
					<ul class="block-body">
						';
				if ($__templater->isTraversable($__vars['articles'])) {
					foreach ($__vars['articles'] AS $__vars['article']) {
						$__finalCompiled .= '
							<li class="block-row">
								' . $__templater->callMacro('xa_ams_article_list_macros', 'article_simple', array(
							'article' => $__vars['article'],
						), $__vars) . '
							</li>
						';
					}
				}
				$__finalCompiled .= '
					</ul>
				';
			} else if (($__vars['style'] == 'article_view') AND $__templater->method($__vars['xf']['visitor'], 'hasAmsArticlePermission', array('viewArticleAttach', ))) {
				$__finalCompiled .= '
					<h3 class="block-header">
						<a href="' . $__templater->escape($__vars['headerLink']) . '" rel="nofollow">' . ($__templater->escape($__vars['title']) ?: 'Featured articles') . '</a>
					</h3>
					<div class="block-body">
						';
				if ($__templater->isTraversable($__vars['articles'])) {
					foreach ($__vars['articles'] AS $__vars['article']) {
						$__finalCompiled .= '
							' . $__templater->callMacro('xa_ams_article_list_macros', 'article_view_layout', array(
							'allowInlineMod' => false,
							'article' => $__vars['article'],
						), $__vars) . '
						';
					}
				}
				$__finalCompiled .= '
					</div>
				';
			} else if (($__vars['style'] == 'grid_view') AND $__templater->method($__vars['xf']['visitor'], 'hasAmsArticlePermission', array('viewArticleAttach', ))) {
				$__finalCompiled .= '
					';
				$__templater->includeCss('xa_ams.less');
				$__finalCompiled .= '
					';
				$__templater->includeCss('xa_ams_grid_view_layout.less');
				$__finalCompiled .= '
					<h3 class="block-header">
						<a href="' . $__templater->escape($__vars['headerLink']) . '" rel="nofollow">' . ($__templater->escape($__vars['title']) ?: 'Featured articles') . '</a>
					</h3>
					<div class="block-body">
						<div class="gridContainerAmsGridView">		
							<ul class="ams-grid-view">
								';
				if ($__templater->isTraversable($__vars['articles'])) {
					foreach ($__vars['articles'] AS $__vars['article']) {
						$__finalCompiled .= '
									' . $__templater->callMacro('xa_ams_article_list_macros', 'grid_view_layout', array(
							'allowInlineMod' => false,
							'article' => $__vars['article'],
						), $__vars) . '
								';
					}
				}
				$__finalCompiled .= '
							</ul>
						</div>
					</div>
				';
			} else if (($__vars['style'] == 'tile_view') AND $__templater->method($__vars['xf']['visitor'], 'hasAmsArticlePermission', array('viewArticleAttach', ))) {
				$__finalCompiled .= '
					';
				$__templater->includeCss('xa_ams.less');
				$__finalCompiled .= '
					';
				$__templater->includeCss('xa_ams_tile_view_layout.less');
				$__finalCompiled .= '

					<h3 class="block-header">
						<a href="' . $__templater->escape($__vars['headerLink']) . '" rel="nofollow">' . ($__templater->escape($__vars['title']) ?: 'Featured articles') . '</a>
					</h3>
					<div class="block-body">
						<div class="gridContainerAmsTileView">		
							<ul class="ams-tile-view">
								';
				if ($__templater->isTraversable($__vars['articles'])) {
					foreach ($__vars['articles'] AS $__vars['article']) {
						$__finalCompiled .= '
									' . $__templater->callMacro('xa_ams_article_list_macros', 'tile_view_layout', array(
							'allowInlineMod' => false,
							'article' => $__vars['article'],
						), $__vars) . '
								';
					}
				}
				$__finalCompiled .= '
							</ul>
						</div>
					</div>
				';
			} else {
				$__finalCompiled .= '
					<h3 class="block-header">
						<a href="' . $__templater->escape($__vars['headerLink']) . '" rel="nofollow">' . ($__templater->escape($__vars['title']) ?: 'Featured articles') . '</a>
					</h3>
					<div class="block-body">
						<div class="structItemContainer structItemContainerAmsListView">
							';
				if ($__templater->isTraversable($__vars['articles'])) {
					foreach ($__vars['articles'] AS $__vars['article']) {
						$__finalCompiled .= '
								' . $__templater->callMacro('xa_ams_article_list_macros', 'list_view_layout', array(
							'allowInlineMod' => false,
							'article' => $__vars['article'],
						), $__vars) . '
							';
					}
				}
				$__finalCompiled .= '
						</div>
					</div>
				';
			}
			$__finalCompiled .= '
			</div>
		';
		}
		$__finalCompiled .= '
	</div>
';
	}
	return $__finalCompiled;
}
);