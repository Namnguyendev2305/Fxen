<?php
// FROM HASH: b02ae2aabeee05ecf29f409b3ea8457f
return array(
'macros' => array('article_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'page' => '!',
		'articles' => '!',
		'listClass' => '!',
		'link' => '!',
		'hasMore' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if ($__vars['page'] == 1) {
		$__finalCompiled .= '
		';
		$__templater->wrapTemplate('xa_ams_dialog_wrapper', $__vars);
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '

	';
	if (!$__templater->test($__vars['articles'], 'empty', array())) {
		$__finalCompiled .= '
		<div class="' . $__templater->escape($__vars['listClass']) . ' amsArticleList amsArticleList--picker">
			';
		if ($__templater->isTraversable($__vars['articles'])) {
			foreach ($__vars['articles'] AS $__vars['article']) {
				$__finalCompiled .= '
				<div data-type="article" data-id="' . $__templater->escape($__vars['article']['article_id']) . '" class="amsArticleList-item">
					' . $__templater->callMacro(null, 'item_display', array(
					'item' => $__vars['article'],
				), $__vars) . '

					<div class="contentRow-minor contentRow-minor--hideLinks">
						<ul class="listInline listInline--bullet">
							<li>' . $__templater->func('username_link', array($__vars['article']['User'], false, array(
					'defaultname' => $__vars['article']['username'],
				))) . '</li>
							<li>' . $__templater->func('date_dynamic', array($__vars['article']['publish_date'], array(
				))) . '</li>
							';
				if ($__vars['article']['comment_count']) {
					$__finalCompiled .= '<li>' . 'Bình luận' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->filter($__vars['article']['comment_count'], array(array('number', array()),), true) . '</li>';
				}
				$__finalCompiled .= '
							<li>' . 'Chuyên mục' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->func('link', array('ams/categories', $__vars['article']['Category'], ), true) . '">' . $__templater->escape($__vars['article']['Category']['title']) . '</a></li>
						</ul>
					</div>
				</div>
			';
			}
		}
		$__finalCompiled .= '

			' . $__templater->callMacro('xa_ams_editor_dialog_ams', 'footer', array(
			'link' => $__vars['link'],
			'append' => '.' . $__vars['listClass'],
			'page' => $__vars['page'],
			'hasMore' => $__vars['hasMore'],
		), $__vars) . '
		</div>
	';
	} else {
		$__finalCompiled .= '
		<div class="blockMessage">' . 'No articles have been added yet.' . '</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'page_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'page' => '!',
		'articlePages' => '!',
		'listClass' => '!',
		'link' => '!',
		'hasMore' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if ($__vars['page'] == 1) {
		$__finalCompiled .= '
		';
		$__templater->wrapTemplate('xa_ams_dialog_wrapper', $__vars);
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '

	';
	if (!$__templater->test($__vars['articlePages'], 'empty', array())) {
		$__finalCompiled .= '
		<div class="' . $__templater->escape($__vars['listClass']) . ' amsArticleList amsArticleList--picker">
			';
		if ($__templater->isTraversable($__vars['articlePages'])) {
			foreach ($__vars['articlePages'] AS $__vars['articlePage']) {
				$__finalCompiled .= '
				<div data-type="page" data-id="' . $__templater->escape($__vars['articlePage']['page_id']) . '" class="amsArticleList-item">
					' . $__templater->callMacro(null, 'item_display', array(
					'item' => $__vars['articlePage'],
				), $__vars) . '

					<div class="contentRow-minor contentRow-minor--hideLinks">
						<ul class="listInline listInline--bullet">
							<li>' . $__templater->func('username_link', array($__vars['articlePage']['User'], false, array(
					'defaultname' => $__vars['articlePage']['username'],
				))) . '</li>
							<li>' . $__templater->func('date_dynamic', array($__vars['articlePage']['create_date'], array(
				))) . '</li>
							';
				if ($__vars['articlePage']['Article']) {
					$__finalCompiled .= '
								<li>
									' . 'Article' . ': <a href="' . $__templater->func('link', array('ams', $__vars['articlePage']['Article'], ), true) . '" class="">' . $__templater->escape($__vars['articlePage']['Article']['title']) . '</a>
								</li>
							';
				}
				$__finalCompiled .= '
						</ul>
					</div>
				</div>
			';
			}
		}
		$__finalCompiled .= '

			' . $__templater->callMacro('xa_ams_editor_dialog_ams', 'footer', array(
			'link' => $__vars['link'],
			'append' => '.' . $__vars['listClass'],
			'page' => $__vars['page'],
			'hasMore' => $__vars['hasMore'],
		), $__vars) . '
		</div>
	';
	} else {
		$__finalCompiled .= '
		<div class="blockMessage">' . 'No article pages have been added yet.' . '</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'series_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'page' => '!',
		'series' => '!',
		'listClass' => '!',
		'link' => '!',
		'hasMore' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if ($__vars['page'] == 1) {
		$__finalCompiled .= '
		';
		$__templater->wrapTemplate('xa_ams_dialog_wrapper', $__vars);
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '

	';
	if (!$__templater->test($__vars['series'], 'empty', array())) {
		$__finalCompiled .= '
		<div class="' . $__templater->escape($__vars['listClass']) . ' amsArticleList amsArticleList--picker">
			';
		if ($__templater->isTraversable($__vars['series'])) {
			foreach ($__vars['series'] AS $__vars['seriesItem']) {
				$__finalCompiled .= '
				<div data-type="series" data-id="' . $__templater->escape($__vars['seriesItem']['series_id']) . '" class="amsArticleList-item">
					' . $__templater->callMacro(null, 'item_display', array(
					'item' => $__vars['seriesItem'],
				), $__vars) . '

					<div class="contentRow-minor contentRow-minor--hideLinks">
						<ul class="listInline listInline--bullet">
							<li>' . $__templater->func('username_link', array($__vars['seriesItem']['User'], false, array(
					'defaultname' => $__vars['seriesItem']['User']['username'],
				))) . '</li>
							<li>' . $__templater->func('date_dynamic', array($__vars['seriesItem']['create_date'], array(
				))) . '</li>
							';
				if ($__vars['seriesItem']['last_part_date'] AND ($__vars['seriesItem']['last_part_date'] > $__vars['seriesItem']['create_date'])) {
					$__finalCompiled .= '
								<li>' . 'Cập nhật' . ' ' . $__templater->func('date_dynamic', array($__vars['seriesItem']['last_part_date'], array(
					))) . '</li>
							';
				}
				$__finalCompiled .= '
							';
				if ($__vars['seriesItem']['article_count']) {
					$__finalCompiled .= '<li>' . 'Articles' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->filter($__vars['seriesItem']['article_count'], array(array('number', array()),), true) . '</li>';
				}
				$__finalCompiled .= '
							';
				if ($__vars['seriesItem']['LastArticle']) {
					$__finalCompiled .= '
								<li>
									' . 'Latest article' . ': <a href="' . $__templater->func('link', array('ams', $__vars['seriesItem']['LastArticle'], ), true) . '" class="">' . $__templater->escape($__vars['seriesItem']['LastArticle']['title']) . '</a>
								</li>
							';
				}
				$__finalCompiled .= '
						</ul>
					</div>
				</div>
			';
			}
		}
		$__finalCompiled .= '

			' . $__templater->callMacro('xa_ams_editor_dialog_ams', 'footer', array(
			'link' => $__vars['link'],
			'append' => '.' . $__vars['listClass'],
			'page' => $__vars['page'],
			'hasMore' => $__vars['hasMore'],
		), $__vars) . '
		</div>
	';
	} else {
		$__finalCompiled .= '
		<div class="blockMessage">' . 'No series have been added yet.' . '</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'item_display' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'item' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__vars['id'] = $__templater->func('unique_id', array(), false);
	$__finalCompiled .= '
	<input type="checkbox" class="amsArticleList-checkbox js-articlesPicker" id="' . $__templater->escape($__vars['id']) . '" value="1" />
	<label for="' . $__templater->escape($__vars['id']) . '">' . $__templater->escape($__vars['item']['title']) . '</label>
';
	return $__finalCompiled;
}
),
'footer' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'link' => '!',
		'append' => '!',
		'page' => '1',
		'hasMore' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__vars['hasMore']) {
		$__finalCompiled .= '
		<div class="amsArticleList-footer js-paneLoadMore">
			' . $__templater->button('
				' . 'Thêm' . $__vars['xf']['language']['ellipsis'] . '
			', array(
			'data-xf-click' => 'inserter',
			'data-inserter-href' => $__templater->func('link', array($__vars['link'], null, array('page' => $__vars['page'] + 1, ), ), false),
			'data-append' => $__vars['append'],
			'data-replace' => '.js-paneLoadMore',
			'data-animate-replace' => '0',
		), '', array(
		)) . '
		</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Embed articles/pages/series');
	$__finalCompiled .= '

';
	$__templater->includeJs(array(
		'src' => 'xenaddons/ams/editor.js',
		'min' => '1',
	));
	$__finalCompiled .= '
';
	$__templater->includeCss('xa_ams_editor_dialog.less');
	$__finalCompiled .= '

<form class="block" id="xa_ams_editor_dialog_form">
	<div class="block-container">
		<h2 class="block-minorTabHeader tabs amsEmbedTabs hScroller"
			data-xf-init="tabs h-scroller"
			data-panes=".js-embedAmsPanes"
			role="tablist">

			<span class="hScroller-scroll">
				<a class="tabs-tab amsEmbedTabs-tab is-active js-yourArticlesTab" role="tab" id="yourArticles">
					<span class="amsEmbedTabs-tabLabel">' . 'Your articles' . '</span>
					<span class="badge badge--highlighted js-tabCounter">0</span>
				</a>
				<a class="tabs-tab amsEmbedTabs-tab is-active js-yourPagesTab" role="tab" id="yourPages">
					<span class="amsEmbedTabs-tabLabel">' . 'Your pages' . '</span>
					<span class="badge badge--highlighted js-tabCounter">0</span>
				</a>
				';
	if ($__vars['xf']['visitor']['xa_ams_series_count']) {
		$__finalCompiled .= '
					<a class="tabs-tab amsEmbedTabs-tab js-yourSeriesTab" role="tab" id="yourSeries">
						<span class="amsEmbedTabs-tabLabel">' . 'Your series' . '</span>
						<span class="badge badge--highlighted js-tabCounter">0</span>
					</a>
				';
	}
	$__finalCompiled .= '
				<a class="tabs-tab amsEmbedTabs-tab js-browseArticlesTab" role="tab" id="browseArticles">
					<span class="amsEmbedTabs-tabLabel">' . 'Others articles' . '</span>
					<span class="badge badge--highlighted js-tabCounter">0</span>
				</a>
				<a class="tabs-tab amsEmbedTabs-tab js-browsePagesTab" role="tab" id="browsePages">
					<span class="amsEmbedTabs-tabLabel">' . 'Others pages' . '</span>
					<span class="badge badge--highlighted js-tabCounter">0</span>
				</a>
				<a class="tabs-tab amsEmbedTabs-tab js-browseSeriesTab" role="tab" id="browseSeries">
					<span class="amsEmbedTabs-tabLabel">' . 'Others series' . '</span>
					<span class="badge badge--highlighted js-tabCounter">0</span>
				</a>
			</span>
		</h2>

		<ul class="tabPanes js-embedAmsPanes">
			<li data-href="' . $__templater->func('link', array('ams/dialog/yours', ), true) . '" role="tabpanel" aria-labelledby="yourArticles" data-tab=".js-yourArticlesTab">
				<div class="blockMessage">' . 'Đang tải' . $__vars['xf']['language']['ellipsis'] . '</div>
			</li>

			<li data-href="' . $__templater->func('link', array('ams/dialog/your-pages', ), true) . '" role="tabpanel" aria-labelledby="yourPages" data-tab=".js-yourPagesTab">
				<div class="blockMessage">' . 'Đang tải' . $__vars['xf']['language']['ellipsis'] . '</div>
			</li>

			';
	if ($__vars['xf']['visitor']['xa_ams_series_count']) {
		$__finalCompiled .= '
				<li data-href="' . $__templater->func('link', array('ams/series/dialog-yours', ), true) . '" role="tabpanel" aria-labelledby="yourSeries" data-tab=".js-yourSeriesTab">
					<div class="blockMessage">' . 'Đang tải' . $__vars['xf']['language']['ellipsis'] . '</div>
				</li>
			';
	}
	$__finalCompiled .= '

			<li data-href="' . $__templater->func('link', array('ams/dialog/browse', ), true) . '" role="tabpanel" aria-labelledby="browseArticles" data-tab=".js-browseArticlesTab">
				<div class="blockMessage">' . 'Đang tải' . $__vars['xf']['language']['ellipsis'] . '</div>
			</li>

			<li data-href="' . $__templater->func('link', array('ams/dialog/browse-pages', ), true) . '" role="tabpanel" aria-labelledby="browsePages" data-tab=".js-browsePagesTab">
				<div class="blockMessage">' . 'Đang tải' . $__vars['xf']['language']['ellipsis'] . '</div>
			</li>

			<li data-href="' . $__templater->func('link', array('ams/series/dialog-browse', ), true) . '" role="tabpanel" aria-labelledby="browseSeries" data-tab=".js-browseSeriesTab">
				<div class="blockMessage">' . 'Đang tải' . $__vars['xf']['language']['ellipsis'] . '</div>
			</li>
		</ul>
		' . $__templater->formHiddenVal('', '{}', array(
		'class' => 'js-embedValue',
	)) . '
		' . $__templater->formSubmitRow(array(
		'submit' => 'Xem tiếp',
		'sticky' => 'true',
		'id' => 'xa_ams_editor_dialog_ams',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
</form>

' . '

' . '

' . '

' . '

';
	return $__finalCompiled;
}
);