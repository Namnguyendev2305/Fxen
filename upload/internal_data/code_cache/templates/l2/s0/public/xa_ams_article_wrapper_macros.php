<?php
// FROM HASH: bba5e9fb4e59cba2a8e7b00d53e23802
return array(
'macros' => array('header' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'titleHtml' => null,
		'showMeta' => true,
		'metaHtml' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__compilerTemp1 = '';
	if ($__vars['titleHtml'] !== null) {
		$__compilerTemp1 .= '
							' . $__templater->filter($__vars['titleHtml'], array(array('raw', array()),), true) . '
						';
	} else {
		$__compilerTemp1 .= '
							';
		if ($__vars['article']['article_state'] == 'draft') {
			$__compilerTemp1 .= '  
								<span style="color: red;">[' . 'Draft' . ']</span> 
							';
		} else if ($__vars['article']['article_state'] == 'awaiting') {
			$__compilerTemp1 .= ' 
								<span style="color: orange;">[' . 'Awaiting' . ']</span> 
							';
		}
		$__compilerTemp1 .= '
							' . $__templater->func('prefix', array('ams_article', $__vars['article'], ), true) . $__templater->escape($__vars['article']['title']) . '
						';
	}
	$__compilerTemp2 = '';
	if ($__vars['showMeta']) {
		$__compilerTemp2 .= '
					<div class="p-description">
						';
		if ($__vars['metaHtml'] !== null) {
			$__compilerTemp2 .= '
							' . $__templater->filter($__vars['metaHtml'], array(array('raw', array()),), true) . '
						';
		} else {
			$__compilerTemp2 .= '
							<ul class="listInline listInline--bullet">
								<li>
									' . $__templater->fontAwesome('fa-user', array(
				'title' => $__templater->filter('Tác giả', array(array('for_attr', array()),), false),
			)) . '
									<span class="u-srOnly">' . 'Tác giả' . '</span>
									';
			if ($__vars['article']['User']['Profile']['xa_ams_author_name']) {
				$__compilerTemp2 .= '
										' . $__templater->func('username_link', array(array('user_id' => $__vars['article']['User']['user_id'], 'username' => $__vars['article']['User']['Profile']['xa_ams_author_name'], ), false, array(
					'defaultname' => $__vars['article']['User']['Profile']['xa_ams_author_name'],
					'class' => 'u-concealed',
				))) . '
									';
			} else {
				$__compilerTemp2 .= '
										' . $__templater->func('username_link', array($__vars['article']['User'], false, array(
					'defaultname' => $__vars['article']['username'],
					'class' => 'u-concealed',
				))) . '
									';
			}
			$__compilerTemp2 .= '
								</li>
								';
			if (!$__templater->test($__vars['article']['Contributors'], 'empty', array())) {
				$__compilerTemp2 .= '
									';
				if ($__templater->isTraversable($__vars['article']['Contributors'])) {
					foreach ($__vars['article']['Contributors'] AS $__vars['coAuthor']) {
						if ($__vars['coAuthor']['is_co_author']) {
							$__compilerTemp2 .= '
										<li>
											' . $__templater->fontAwesome('fa-user', array(
								'title' => $__templater->filter('Tác giả', array(array('for_attr', array()),), false),
							)) . '
											<span class="u-srOnly">' . 'Tác giả' . '</span>
											';
							if ($__vars['coAuthor']['User']['Profile']['xa_ams_author_name']) {
								$__compilerTemp2 .= '
												' . $__templater->func('username_link', array(array('user_id' => $__vars['coAuthor']['User']['user_id'], 'username' => $__vars['coAuthor']['User']['Profile']['xa_ams_author_name'], ), false, array(
									'defaultname' => $__vars['coAuthor']['User']['Profile']['xa_ams_author_name'],
									'class' => 'u-concealed',
								))) . '
											';
							} else {
								$__compilerTemp2 .= '
												' . $__templater->func('username_link', array($__vars['coAuthor']['User'], false, array(
									'defaultname' => $__vars['coAuthor']['User']['username'],
									'class' => 'u-concealed',
								))) . '
											';
							}
							$__compilerTemp2 .= '
										</li>
									';
						}
					}
				}
				$__compilerTemp2 .= '
								';
			}
			$__compilerTemp2 .= '
								<li>
									' . $__templater->fontAwesome('fa-clock', array(
				'title' => $__templater->filter('Publish date', array(array('for_attr', array()),), false),
			)) . '
									<span class="u-srOnly">' . 'Publish date' . '</span>

									<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['article']['publish_date'], array(
			))) . '</a>
								</li>
								';
			if ($__vars['article']['last_update'] > $__vars['article']['publish_date']) {
				$__compilerTemp2 .= '								
									<li>
										' . $__templater->fontAwesome('fa-clock', array(
					'title' => $__templater->filter('Last update', array(array('for_attr', array()),), false),
				)) . '
										<span class="u-concealed">' . 'Cập nhật' . '</span>

										' . $__templater->func('date_dynamic', array($__vars['article']['last_update'], array(
				))) . '
									</li>
								';
			}
			$__compilerTemp2 .= '
								';
			if ($__vars['article']['article_read_time']) {
				$__compilerTemp2 .= '								
									<li>
										' . $__templater->fontAwesome('fa-hourglass', array(
					'title' => $__templater->filter('Article read time', array(array('for_attr', array()),), false),
				)) . '
										<span class="u-srOnly">' . 'Article read time' . '</span>

										' . '' . $__templater->escape($__vars['article']['article_read_time']) . ' min read' . '
									</li>
								';
			}
			$__compilerTemp2 .= '
								';
			if ($__vars['xf']['options']['enableTagging'] AND (($__templater->method($__vars['article'], 'canEditTags', array()) OR $__vars['article']['tags']))) {
				$__compilerTemp2 .= '
									<li>
										' . $__templater->callMacro('tag_macros', 'list', array(
					'tags' => $__vars['article']['tags'],
					'tagList' => 'tagList--article-' . $__vars['article']['article_id'],
					'editLink' => ($__templater->method($__vars['article'], 'canEditTags', array()) ? $__templater->func('link', array('ams/tags', $__vars['article'], ), false) : ''),
				), $__vars) . '
									</li>
								';
			}
			$__compilerTemp2 .= '
								';
			if ($__vars['article']['Featured']) {
				$__compilerTemp2 .= '
									<li><span class="label label--accent">' . 'Featured' . '</span></li>
								';
			}
			$__compilerTemp2 .= '
							</ul>
						';
		}
		$__compilerTemp2 .= '
					</div>
				';
	}
	$__templater->setPageParam('headerHtml', '
		<div class="contentRow contentRow--hideFigureNarrow">
			<div class="contentRow-main">
				<div class="p-title">
					<h1 class="p-title-value">
						' . $__compilerTemp1 . '
					</h1>
				</div>
				' . $__compilerTemp2 . '

				' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
		'type' => 'ams_articles',
		'group' => 'header',
		'onlyInclude' => $__vars['category']['field_cache'],
		'set' => $__vars['article']['custom_fields'],
		'wrapperClass' => 'articleBody-fields articleBody-fields--header',
	), $__vars) . '
			</div>
		</div>
	');
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'status' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
				';
	if ($__vars['article']['article_state'] == 'deleted') {
		$__compilerTemp1 .= '
					<dd class="blockStatus-message blockStatus-message--deleted">
						' . $__templater->callMacro('deletion_macros', 'notice', array(
			'log' => $__vars['article']['DeletionLog'],
		), $__vars) . '
					</dd>
				';
	} else if ($__vars['article']['article_state'] == 'moderated') {
		$__compilerTemp1 .= '
					<dd class="blockStatus-message blockStatus-message--moderated">
						' . 'Awaiting approval before being displayed publicly.' . '
					</dd>
				';
	} else if ($__vars['article']['article_state'] == 'draft') {
		$__compilerTemp1 .= '
					<dd class="blockStatus-message blockStatus-message--warning">
						' . 'Draft in progress.' . '
					</dd>
				';
	} else if ($__vars['article']['article_state'] == 'awaiting') {
		$__compilerTemp1 .= '
					<dd class="blockStatus-message blockStatus-message--warning">
						' . 'Scheduled for publishing' . ' ' . $__templater->func('date_dynamic', array($__vars['article']['publish_date'], array(
		))) . '
					</dd>
				';
	}
	$__compilerTemp1 .= '
				';
	if ($__vars['article']['warning_message']) {
		$__compilerTemp1 .= '
					<dd class="blockStatus-message blockStatus-message--warning">
						' . $__templater->escape($__vars['article']['warning_message']) . '
					</dd>
				';
	}
	$__compilerTemp1 .= '
				';
	if ($__templater->method($__vars['article'], 'isIgnored', array())) {
		$__compilerTemp1 .= '
					<dd class="blockStatus-message blockStatus-message--ignored">
						' . 'Bạn đang bỏ qua nội dung bởi thành viên này.' . '
					</dd>
				';
	}
	$__compilerTemp1 .= '
			';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
		<dl class="blockStatus blockStatus--standalone">
			<dt>' . 'Trạng thái' . '</dt>
			' . $__compilerTemp1 . '
		</dl>
	';
	}
	$__finalCompiled .= '

	';
	if ($__templater->method($__vars['article'], 'isInSeries', array(true, )) AND $__vars['article']['SeriesPart']) {
		$__finalCompiled .= '
		<dl class="blockStatus blockStatus--info blockStatus--standalone">
			<dt></dt>
			<dd class="blockStatus-message">
				';
		if ($__templater->method($__vars['xf']['visitor'], 'canViewAmsSeries', array())) {
			$__finalCompiled .= '
					' . 'This article is in the series ' . (((('<a href="' . $__templater->func('link', array('ams/series', $__vars['article']['SeriesPart']['Series'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['article']['SeriesPart']['Series']['title'])) . '</a>') . '' . '
				';
		} else {
			$__finalCompiled .= '
					' . 'This article is in the series ' . (('"' . $__templater->escape($__vars['article']['SeriesPart']['Series']['title'])) . '"') . '' . '
				';
		}
		$__finalCompiled .= '
			</dd>
		</dl>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'tabs' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'selected' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
						';
	$__compilerTemp2 = $__templater->method($__vars['article'], 'getExtraFieldTabs', array());
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['fieldId'] => $__vars['fieldValue']) {
			$__compilerTemp1 .= '
							<a class="tabs-tab ' . (($__vars['selected'] == (('field_' . $__vars['fieldId']))) ? 'is-active' : '') . '" href="' . $__templater->func('link', array('ams/field', $__vars['article'], array('field' => $__vars['fieldId'], ), ), true) . '">' . $__templater->escape($__vars['fieldValue']) . '</a>
						';
		}
	}
	$__compilerTemp1 .= '
						';
	if ($__vars['article']['real_review_count'] AND $__templater->method($__vars['article'], 'canViewReviews', array())) {
		$__compilerTemp1 .= '
							<a class="tabs-tab ' . (($__vars['selected'] == 'reviews') ? 'is-active' : '') . '" href="' . $__templater->func('link', array('ams/reviews', $__vars['article'], ), true) . '">' . 'Reviews' . ' ' . $__templater->filter($__vars['article']['real_review_count'], array(array('parens', array()),), true) . '</a>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__vars['article']['location'] AND ($__templater->method($__vars['article'], 'canViewArticleMap', array()) AND ($__vars['article']['Category']['allow_location'] AND (($__vars['xf']['options']['xaAmsLocationDisplayType'] == 'map_own_tab') AND $__vars['xf']['options']['xaAmsGoogleMapsEmbedApiKey'])))) {
		$__compilerTemp1 .= '
							<a class="tabs-tab ' . (($__vars['selected'] == 'map') ? 'is-active' : '') . '" href="' . $__templater->func('link', array('ams/map', $__vars['article'], ), true) . '">' . 'Map' . '</a>
						';
	}
	$__compilerTemp1 .= '							
						';
	if (($__vars['xf']['options']['xaAmsGalleryLocation'] == 'own_tab') AND $__templater->method($__vars['article'], 'hasImageAttachments', array($__vars['article'], ))) {
		$__compilerTemp1 .= '
							<a class="tabs-tab ' . (($__vars['selected'] == 'gallery') ? 'is-active' : '') . '" href="' . $__templater->func('link', array('ams/gallery', $__vars['article'], ), true) . '">' . 'Gallery' . '</a>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__templater->method($__vars['article'], 'hasViewableDiscussion', array())) {
		$__compilerTemp1 .= '
							<a class="tabs-tab ' . (($__vars['selected'] == 'discussion') ? 'is-active' : '') . '" href="' . $__templater->func('link', array('threads', $__vars['article']['Discussion'], ), true) . '">' . 'Discussion' . '</a>
						';
	}
	$__compilerTemp1 .= '
					';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
		<div class="tabs tabs--standalone">
			<div class="hScroller" data-xf-init="h-scroller">
				<span class="hScroller-scroll">
					<a class="tabs-tab ' . (($__vars['selected'] == 'overview') ? 'is-active' : '') . '" href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">' . ($__vars['article']['Category']['content_term'] ? '' . $__templater->escape($__vars['article']['Category']['content_term']) . '' : 'Article') . '</a>
					' . $__compilerTemp1 . '
				</span>
			</div>
		</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'action_buttons' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'seriesToc' => null,
		'articlePages' => null,
		'articlePage' => null,
		'isFullView' => false,
		'showRateButton' => false,
		'showAddPageButton' => false,
		'showAddToSeriesButton' => false,
		'canInlineMod' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if ($__vars['showRateButton'] AND (($__templater->method($__vars['article'], 'canRate', array()) OR $__templater->method($__vars['article'], 'canRatePreReg', array())))) {
		$__finalCompiled .= '
		' . $__templater->button('
			' . 'Đánh giá' . '
		', array(
			'href' => $__templater->func('link', array('ams/rate', $__vars['article'], ), false),
			'overlay' => 'true',
		), '', array(
		)) . '
	';
	}
	$__finalCompiled .= '

	';
	if ($__templater->method($__vars['article'], 'canAddPage', array()) AND $__vars['showAddPageButton']) {
		$__finalCompiled .= '
		' . $__templater->button('
			' . 'Add page' . '
		', array(
			'href' => $__templater->func('link', array('ams/add-page', $__vars['article'], ), false),
		), '', array(
		)) . '
	';
	}
	$__finalCompiled .= '

	';
	if ($__templater->method($__vars['article'], 'canAddArticleToSeries', array()) AND $__vars['showAddToSeriesButton']) {
		$__finalCompiled .= '
		' . $__templater->button('
			' . 'Add to series' . '
		', array(
			'href' => $__templater->func('link', array('ams/add-to-series', $__vars['article'], ), false),
			'overlay' => 'true',
		), '', array(
		)) . '
	';
	}
	$__finalCompiled .= '

	';
	if ($__templater->method($__vars['article'], 'canJoinContributorsTeam', array())) {
		$__finalCompiled .= '
		' . $__templater->button('
			' . 'Contribute' . '
		', array(
			'href' => $__templater->func('link', array('ams/join-contributors-team', $__vars['article'], ), false),
			'class' => 'button--cta',
			'overlay' => 'true',
		), '', array(
		)) . '
	';
	}
	$__finalCompiled .= '

	';
	if ($__templater->method($__vars['article'], 'canPublishDraft', array()) AND ((($__vars['article']['article_state'] == 'draft') OR ($__vars['article']['article_state'] == 'awaiting')))) {
		$__finalCompiled .= '
		' . $__templater->button('
			' . 'Publish now' . '
		', array(
			'href' => $__templater->func('link', array('ams/publish-draft', $__vars['article'], ), false),
			'class' => 'button--cta',
			'overlay' => 'true',
		), '', array(
		)) . '
	';
	}
	$__finalCompiled .= '

	';
	if ($__templater->method($__vars['article'], 'canPublishDraftScheduled', array()) AND ($__vars['article']['article_state'] == 'draft')) {
		$__finalCompiled .= '
		' . $__templater->button('
			' . 'Publish scheduled' . '
		', array(
			'href' => $__templater->func('link', array('ams/publish-draft-scheduled', $__vars['article'], ), false),
			'class' => 'button--cta',
			'overlay' => 'true',
		), '', array(
		)) . '
	';
	}
	$__finalCompiled .= '

	';
	if ($__templater->method($__vars['article'], 'canChangeScheduledPublishDate', array()) AND ($__vars['article']['article_state'] == 'awaiting')) {
		$__finalCompiled .= '
		' . $__templater->button('
			' . 'Change scheduled date' . '
		', array(
			'href' => $__templater->func('link', array('ams/change-scheduled-publish-date', $__vars['article'], ), false),
			'class' => 'button--cta',
			'overlay' => 'true',
		), '', array(
		)) . '
	';
	}
	$__finalCompiled .= '

	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
			';
	if ($__vars['canInlineMod']) {
		$__compilerTemp1 .= '
				' . $__templater->callMacro('inline_mod_macros', 'button', array(), $__vars) . '
			';
	}
	$__compilerTemp1 .= '

			';
	if ($__templater->method($__vars['article'], 'canUndelete', array()) AND ($__vars['article']['article_state'] == 'deleted')) {
		$__compilerTemp1 .= '
				' . $__templater->button('
					' . 'Khôi phục' . '
				', array(
			'href' => $__templater->func('link', array('ams/undelete', $__vars['article'], ), false),
			'class' => 'button--link',
			'overlay' => 'true',
		), '', array(
		)) . '
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__templater->method($__vars['article'], 'canApproveUnapprove', array()) AND ($__vars['article']['article_state'] == 'moderated')) {
		$__compilerTemp1 .= '
				' . $__templater->button('
					' . 'Duyệt' . '
				', array(
			'href' => $__templater->func('link', array('ams/approve', $__vars['article'], ), false),
			'class' => 'button--link',
			'overlay' => 'true',
		), '', array(
		)) . '
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__templater->method($__vars['article'], 'canWatch', array())) {
		$__compilerTemp1 .= '
				';
		$__compilerTemp2 = '';
		if ($__vars['article']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__compilerTemp2 .= '
						' . 'Bỏ theo dõi' . '
					';
		} else {
			$__compilerTemp2 .= '
						' . 'Theo dõi' . '
					';
		}
		$__compilerTemp1 .= $__templater->button('

					' . $__compilerTemp2 . '
				', array(
			'href' => $__templater->func('link', array('ams/watch', $__vars['article'], ), false),
			'class' => 'button--link',
			'data-xf-click' => 'switch-overlay',
			'data-sk-watch' => 'Theo dõi',
			'data-sk-unwatch' => 'Bỏ theo dõi',
		), '', array(
		)) . '
			';
	}
	$__compilerTemp1 .= '
			' . $__templater->callMacro('bookmark_macros', 'button', array(
		'content' => $__vars['article'],
		'confirmUrl' => $__templater->func('link', array('ams/bookmark', $__vars['article'], ), false),
	), $__vars) . '
			
			';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
								';
	if ($__templater->isTraversable($__vars['articlePages'])) {
		foreach ($__vars['articlePages'] AS $__vars['article_page']) {
			$__compilerTemp3 .= '
									<a href="' . $__templater->func('link', array('ams/page', $__vars['article_page'], ), true) . '" class="menu-linkRow ' . (($__vars['articlePage']['page_id'] == $__vars['article_page']['page_id']) ? 'is-selected' : '') . '">
									' . $__templater->filter($__templater->func('repeat', array('&nbsp;&nbsp;', $__vars['article_page']['depth'], ), false), array(array('raw', array()),), true) . ' ' . $__templater->escape($__vars['article_page']['title']) . '</a>
								';
		}
	}
	$__compilerTemp3 .= '
							';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__compilerTemp1 .= '
				<div class="buttonGroup-buttonWrapper">
					' . $__templater->button('
						' . 'Table of contents' . '
					', array(
			'class' => 'button--link menuTrigger',
			'data-xf-click' => 'menu',
			'aria-expanded' => 'false',
			'aria-haspopup' => 'true',
			'title' => $__templater->filter('Page navigation', array(array('for_attr', array()),), false),
		), '', array(
		)) . '
					<div class="menu" data-menu="menu" aria-hidden="true">
						<div class="menu-content">
							<h4 class="menu-header">' . 'Select page' . '</h4>

							<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" class="menu-linkRow ' . ((((!$__vars['articlePage']) AND (!$__vars['isFullView']))) ? 'is-selected' : '') . '">
								';
		if ($__vars['article']['overview_page_title']) {
			$__compilerTemp1 .= '
									' . $__templater->escape($__vars['article']['overview_page_title']) . '
								';
		} else {
			$__compilerTemp1 .= '
									' . 'Tổng quan' . '
								';
		}
		$__compilerTemp1 .= '
							</a>

							' . $__compilerTemp3 . '
							';
		if ($__vars['xf']['options']['xaAmsViewFullArticle']) {
			$__compilerTemp1 .= '
								<a href="' . $__templater->func('link', array('ams', $__vars['article'], array('full' => 1, ), ), true) . '" class="menu-linkRow ' . ($__vars['isFullView'] ? 'is-selected' : '') . '">' . ($__vars['article']['Category']['content_term'] ? 'View full ' . $__templater->filter($__vars['article']['Category']['content_term'], array(array('to_lower', array()),), true) . '' : 'View full article') . '</a>
							';
		}
		$__compilerTemp1 .= '
						</div>
					</div>
				</div>
			';
	}
	$__compilerTemp1 .= '

			';
	$__compilerTemp4 = '';
	$__compilerTemp4 .= '
								';
	if ($__templater->isTraversable($__vars['seriesToc'])) {
		foreach ($__vars['seriesToc'] AS $__vars['seriesTocItem']) {
			$__compilerTemp4 .= '
									<a href="' . $__templater->func('link', array('ams', $__vars['seriesTocItem']['Article'], ), true) . '" class="menu-linkRow ' . (($__vars['article']['series_part_id'] == $__vars['seriesTocItem']['series_part_id']) ? 'is-selected' : '') . '">' . $__templater->escape($__vars['seriesTocItem']['Article']['title']) . '</a>
								';
		}
	}
	$__compilerTemp4 .= '
							';
	if (strlen(trim($__compilerTemp4)) > 0) {
		$__compilerTemp1 .= '
				<div class="buttonGroup-buttonWrapper">
					' . $__templater->button('
						' . 'Series', array(
			'class' => 'button--link menuTrigger',
			'data-xf-click' => 'menu',
			'aria-expanded' => 'false',
			'aria-haspopup' => 'true',
			'title' => $__templater->filter('Series navigation', array(array('for_attr', array()),), false),
		), '', array(
		)) . '
					<div class="menu" data-menu="menu" aria-hidden="true">
						<div class="menu-content">
							<h4 class="menu-header">' . 'Select article' . '</h4>
							' . $__compilerTemp4 . '
							';
		if ($__templater->method($__vars['xf']['visitor'], 'canViewAmsSeries', array())) {
			$__compilerTemp1 .= '
								<a href="' . $__templater->func('link', array('ams/series', $__vars['article']['SeriesPart']['Series'], ), true) . '" class="menu-linkRow">' . 'View series' . '</a>
							';
		}
		$__compilerTemp1 .= '
						</div>
					</div>
				</div>
			';
	}
	$__compilerTemp1 .= '

			';
	$__compilerTemp5 = '';
	$__compilerTemp5 .= '
								' . '
								';
	if ($__templater->method($__vars['article'], 'canSetCoverImage', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/set-cover-image', $__vars['article'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Set cover image' . '</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canFeatureUnfeature', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/quick-feature', $__vars['article'], ), true) . '"
										class="menu-linkRow"
										data-xf-click="switch"
										data-menu-closer="true">

										';
		if ($__vars['article']['Featured']) {
			$__compilerTemp5 .= '
											' . 'Unfeature article' . '
										';
		} else {
			$__compilerTemp5 .= '
											' . 'Feature article' . '
										';
		}
		$__compilerTemp5 .= '
									</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canStickUnstick', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/quick-stick', $__vars['article'], ), true) . '"
										class="menu-linkRow"
										data-xf-click="switch"
										data-menu-closer="true">

										';
		if ($__vars['article']['sticky']) {
			$__compilerTemp5 .= '
											' . 'Unstick article' . '
										';
		} else {
			$__compilerTemp5 .= '
											' . 'Stick article' . '
										';
		}
		$__compilerTemp5 .= '
									</a>
								';
	}
	$__compilerTemp5 .= '									
								';
	if ($__templater->method($__vars['article'], 'canLockUnlockComments', array()) AND $__vars['article']['Category']['allow_comments']) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/lock-unlock-comments', $__vars['article'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">
										';
		if ($__vars['article']['comments_open']) {
			$__compilerTemp5 .= '
											' . 'Lock comments' . '
										';
		} else {
			$__compilerTemp5 .= '
											' . 'Unlock comments' . '
										';
		}
		$__compilerTemp5 .= '
									</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canLockUnlockRatings', array()) AND $__vars['article']['Category']['allow_ratings']) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/lock-unlock-ratings', $__vars['article'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">
										';
		if ($__vars['article']['ratings_open']) {
			$__compilerTemp5 .= '
											' . 'Lock ratings' . '
										';
		} else {
			$__compilerTemp5 .= '
											' . 'Unlock ratings' . '
										';
		}
		$__compilerTemp5 .= '
									</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canLeaveContributorsTeam', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/leave-contributors-team', $__vars['article'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">
										' . 'Leave article contributors team' . '
									</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canManageContributors', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/manage-contributors', $__vars['article'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">
										' . 'Manage contributors/co-authors' . '
									</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canEdit', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/edit', $__vars['article'], ), true) . '" class="menu-linkRow">' . 'Edit article' . '</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canDelete', array('soft', ))) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/delete', $__vars['article'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Delete article' . '</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canMove', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/move', $__vars['article'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Move article' . '</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canReassign', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/reassign', $__vars['article'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Reassign article' . '</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canChangeDates', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/change-dates', $__vars['article'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Change article dates' . '</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canCreatePoll', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/poll/create', $__vars['article'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Tạo bình chọn' . '</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'isInSeries', array(false, )) AND $__templater->method($__vars['article']['SeriesPart'], 'canRemove', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/remove-from-series', $__vars['article'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Remove article from series' . '</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canManageRatings', array()) AND ((($__vars['article']['rating_count'] > 0) AND ($__vars['article']['rating_count'] > $__vars['article']['review_count'])))) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/ratings', $__vars['article'], ), true) . '" class="menu-linkRow">' . 'Manage ratings' . '</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canManagePages', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/pages', $__vars['article'], ), true) . '" class="menu-linkRow">' . 'Manage pages' . '</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canReplyBan', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/reply-bans', $__vars['article'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Phản hồi lệnh cấm' . '</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canChangeDiscussionThread', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/change-thread', $__vars['article'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">
										';
		if ($__vars['article']['discussion_thread_id']) {
			$__compilerTemp5 .= '			
											' . 'Change discussion thread' . '
										';
		} else {
			$__compilerTemp5 .= '
											' . 'Add discussion thread' . '
										';
		}
		$__compilerTemp5 .= '
									</a>
								';
	}
	$__compilerTemp5 .= '
								';
	if ($__templater->method($__vars['article'], 'canEnableDisableOsUrlCheck', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/quick-disable-os-url-check', $__vars['article'], ), true) . '"
										class="menu-linkRow"
										data-xf-click="switch"
										data-menu-closer="true">

										';
		if ($__vars['article']['disable_os_url_check']) {
			$__compilerTemp5 .= '
											' . 'Enable original source url check' . '

										';
		} else {
			$__compilerTemp5 .= '
											' . 'Disable original source url check' . '
										';
		}
		$__compilerTemp5 .= '
									</a>
								';
	}
	$__compilerTemp5 .= '								
								';
	if ($__templater->method($__vars['article'], 'canConvertToThread', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/convert-to-thread', $__vars['article'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Convert article to thread' . '</a>
								';
	}
	$__compilerTemp5 .= '								
								';
	if ($__templater->method($__vars['article'], 'canViewModeratorLogs', array())) {
		$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('ams/moderator-actions', $__vars['article'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Hoạt động của BQT' . '</a>
								';
	}
	$__compilerTemp5 .= '
								' . '
								';
	if ($__templater->method($__vars['article'], 'canUseInlineModeration', array())) {
		$__compilerTemp5 .= '
									<div class="menu-footer"
										data-xf-init="inline-mod"
										data-type="ams_article"
										data-href="' . $__templater->func('link', array('inline-mod', ), true) . '"
										data-toggle=".js-articleInlineModToggle">
										' . $__templater->formCheckBox(array(
		), array(array(
			'class' => 'js-articleInlineModToggle',
			'value' => $__vars['article']['article_id'],
			'label' => 'Chọn để kiểm duyệt',
			'_type' => 'option',
		))) . '
									</div>
									';
		$__templater->includeJs(array(
			'src' => 'xf/inline_mod.js',
			'min' => '1',
		));
		$__compilerTemp5 .= '
								';
	}
	$__compilerTemp5 .= '
								' . '
							';
	if (strlen(trim($__compilerTemp5)) > 0) {
		$__compilerTemp1 .= '
				<div class="buttonGroup-buttonWrapper">
					' . $__templater->button('&#8226;&#8226;&#8226;', array(
			'class' => 'button--link menuTrigger',
			'data-xf-click' => 'menu',
			'aria-expanded' => 'false',
			'aria-haspopup' => 'true',
			'title' => $__templater->filter('Thêm tùy chọn', array(array('for_attr', array()),), false),
		), '', array(
		)) . '
					<div class="menu" data-menu="menu" aria-hidden="true">
						<div class="menu-content">
							<h4 class="menu-header">' . 'Thêm tùy chọn' . '</h4>
							' . $__compilerTemp5 . '
						</div>
					</div>
				</div>
			';
	}
	$__compilerTemp1 .= '
		';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
		<div class="buttonGroup">
		' . $__compilerTemp1 . '
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
	$__finalCompiled .= '

' . '

' . '

';
	return $__finalCompiled;
}
);