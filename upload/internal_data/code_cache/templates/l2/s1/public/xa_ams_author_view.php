<?php
// FROM HASH: 3b4730cabd3be4f91c8ecc1874d5ea1e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['user']['user_id'] == $__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Your published articles');
		$__templater->pageParams['pageNumber'] = $__vars['page'];
		$__finalCompiled .= '
';
	} else if ($__vars['user']['Profile']['xa_ams_author_name']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Articles by ' . $__templater->escape($__vars['user']['Profile']['xa_ams_author_name']) . '');
		$__templater->pageParams['pageNumber'] = $__vars['page'];
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Articles by ' . $__templater->escape($__vars['user']['username']) . '');
		$__templater->pageParams['pageNumber'] = $__vars['page'];
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['xf']['options']['xaAmsEnableAuthorList']) {
		$__finalCompiled .= '
	';
		$__templater->breadcrumb($__templater->preEscaped('Author list'), $__templater->func('link', array('ams/authors', ), false), array(
		));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

' . $__templater->callMacro('metadata_macros', 'canonical_url', array(
		'canonicalUrl' => $__templater->func('link', array('canonical:ams/authors', $__vars['user'], array('page' => (($__vars['page'] > 1) ? $__vars['page'] : null), ), ), false),
	), $__vars) . '

';
	$__templater->setPageParam('searchConstraints', array('Articles' => array('search_type' => 'ams_article', ), ));
	$__finalCompiled .= '

';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '

';
	if (($__vars['user']['user_id'] == $__vars['xf']['visitor']['user_id']) AND $__templater->method($__vars['xf']['visitor'], 'canAddAmsArticle', array())) {
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

<div class="block ' . (((($__vars['xf']['options']['xaAmsAuthorPageArticleListLayoutType'] == 'article_view') AND (!$__vars['fromProfile']))) ? 'block--messages' : '') . '" data-xf-init="' . ($__vars['canInlineMod'] ? 'inline-mod' : '') . '" data-type="ams_article" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
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
	if ($__vars['xf']['visitor']['user_id'] AND ($__vars['xf']['visitor']['user_id'] != $__vars['user']['user_id'])) {
		$__compilerTemp2 .= '
							';
		$__compilerTemp3 = '';
		if ($__vars['user']['AMSAuthorWatch'][$__vars['user']['user_id']]) {
			$__compilerTemp3 .= 'Bỏ theo dõi';
		} else {
			$__compilerTemp3 .= 'Theo dõi';
		}
		$__compilerTemp2 .= $__templater->button('
								' . $__compilerTemp3 . '
							', array(
			'href' => $__templater->func('link', array('ams/authors/watch', $__vars['user'], ), false),
			'class' => 'button--link',
			'data-xf-click' => 'switch-overlay',
			'data-sk-watch' => 'Theo dõi',
			'data-sk-unwatch' => 'Bỏ theo dõi',
		), '', array(
		)) . '
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
		'link' => 'ams/authors',
		'data' => $__vars['user'],
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '

		' . $__compilerTemp1 . '

	'), false) . '</div>

	<div class="block-container">
		' . $__templater->callMacro('xa_ams_author_article_list_macros', 'list_filter_bar', array(
		'filters' => $__vars['filters'],
		'baseLinkPath' => 'ams/authors',
		'linkData' => $__vars['user'],
	), $__vars) . '

		<div class="block-body">
			';
	if (!$__templater->test($__vars['articles'], 'empty', array())) {
		$__finalCompiled .= '
				';
		if (($__vars['xf']['options']['xaAmsAuthorPageArticleListLayoutType'] == 'article_view') AND $__templater->method($__vars['xf']['visitor'], 'hasAmsArticlePermission', array('viewArticleAttach', ))) {
			$__finalCompiled .= '
					';
			if ($__templater->isTraversable($__vars['articles'])) {
				foreach ($__vars['articles'] AS $__vars['article']) {
					$__finalCompiled .= '
						' . $__templater->callMacro('xa_ams_article_list_macros', 'article_view_layout', array(
						'article' => $__vars['article'],
					), $__vars) . '
					';
				}
			}
			$__finalCompiled .= '
				';
		} else if (($__vars['xf']['options']['xaAmsAuthorPageArticleListLayoutType'] == 'grid_view') AND $__templater->method($__vars['xf']['visitor'], 'hasAmsArticlePermission', array('viewArticleAttach', ))) {
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
						'article' => $__vars['article'],
					), $__vars) . '
							';
				}
			}
			$__finalCompiled .= '
						</ul>
					</div>
				';
		} else if (($__vars['xf']['options']['xaAmsAuthorPageArticleListLayoutType'] == 'tile_view') AND $__templater->method($__vars['xf']['visitor'], 'hasAmsArticlePermission', array('viewArticleAttach', ))) {
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
				<div class="blockMessage">
					';
		if ($__vars['user']['user_id'] == $__vars['xf']['visitor']['user_id']) {
			$__finalCompiled .= '
						' . 'You have not added any articles which matches your filters.' . '
					';
		} else {
			$__finalCompiled .= '
						' . '' . $__templater->escape($__vars['user']['username']) . ' has not added any articles which matches your filters.' . '
					';
		}
		$__finalCompiled .= '
				</div>
			';
	} else {
		$__finalCompiled .= '
				<div class="blockMessage">
					';
		if ($__vars['user']['user_id'] == $__vars['xf']['visitor']['user_id']) {
			$__finalCompiled .= '
						' . 'You have not posted any articles yet.' . '
					';
		} else {
			$__finalCompiled .= '
						' . '' . $__templater->escape($__vars['user']['username']) . ' has not posted any articles yet.' . '
					';
		}
		$__finalCompiled .= '
				</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>

	<div class="block-outer block-outer--after">
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'ams/authors',
		'data' => $__vars['user'],
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '

		' . $__templater->func('show_ignored', array(array(
		'wrapperclass' => 'block-outer-opposite',
	))) . '
	</div>
</div>';
	return $__finalCompiled;
}
);