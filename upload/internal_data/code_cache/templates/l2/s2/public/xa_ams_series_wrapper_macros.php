<?php
// FROM HASH: cca65fc67cfc9c803074a038666e6cb7
return array(
'macros' => array('header' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'series' => '!',
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
	if ((!$__vars['series']['community_series']) OR (($__vars['series']['community_series'] AND $__vars['series']['icon_date']))) {
		$__compilerTemp1 .= '
				<span class="contentRow-figure">
					';
		if ($__vars['series']['icon_date']) {
			$__compilerTemp1 .= '
						<span class="contentRow-figureIcon">' . $__templater->func('ams_series_icon', array($__vars['series'], 'm', ), true) . '</span>
					';
		} else {
			$__compilerTemp1 .= '
						' . $__templater->func('avatar', array($__vars['series']['User'], 's', false, array(
			))) . '
					';
		}
		$__compilerTemp1 .= '
				</span>
			';
	}
	$__compilerTemp2 = '';
	if ($__vars['series']['community_series']) {
		$__compilerTemp2 .= '
								' . $__templater->fontAwesome('fa-users', array(
			'title' => $__templater->filter('Community series', array(array('for_attr', array()),), false),
		)) . '
								<span class="u-srOnly">' . 'Community series' . '</span>

								' . 'Community series' . '
							';
	} else {
		$__compilerTemp2 .= '
								' . $__templater->fontAwesome('fa-user', array(
			'title' => $__templater->filter('Tác giả', array(array('for_attr', array()),), false),
		)) . '
								<span class="u-srOnly">' . 'Tác giả' . '</span>

								';
		if ($__vars['series']['User']['Profile']['xa_ams_author_name']) {
			$__compilerTemp2 .= '
									' . $__templater->func('username_link', array(array('user_id' => $__vars['series']['User']['user_id'], 'username' => $__vars['series']['User']['Profile']['xa_ams_author_name'], ), false, array(
				'defaultname' => $__vars['series']['User']['Profile']['xa_ams_author_name'],
				'class' => 'u-concealed',
			))) . '
								';
		} else {
			$__compilerTemp2 .= '
									' . $__templater->func('username_link', array($__vars['series']['User'], false, array(
				'defaultname' => $__vars['series']['User']['username'],
				'class' => 'u-concealed',
			))) . '
								';
		}
		$__compilerTemp2 .= '
							';
	}
	$__compilerTemp3 = '';
	if ($__vars['series']['last_part_date'] AND ($__vars['series']['last_part_date'] > $__vars['series']['create_date'])) {
		$__compilerTemp3 .= '								
							<li>
								' . $__templater->fontAwesome('fa-clock', array(
			'title' => $__templater->filter('Last update', array(array('for_attr', array()),), false),
		)) . '
								<span class="u-concealed">' . 'Cập nhật' . '</span>

								<a href="' . $__templater->func('link', array('ams/series', $__vars['series'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['series']['last_part_date'], array(
		))) . '</a>
							</li>
						';
	}
	$__compilerTemp4 = '';
	if ($__vars['series']['article_count']) {
		$__compilerTemp4 .= '
							<li>' . 'Articles' . ': ' . $__templater->filter($__vars['series']['article_count'], array(array('number', array()),), true) . '</li>
						';
	}
	$__compilerTemp5 = '';
	if ($__vars['xf']['options']['enableTagging'] AND (($__templater->method($__vars['series'], 'canEditTags', array()) OR $__vars['series']['tags']))) {
		$__compilerTemp5 .= '
							<li>

								' . $__templater->callMacro('tag_macros', 'list', array(
			'tags' => $__vars['series']['tags'],
			'tagList' => 'tagList--series-' . $__vars['series']['series_id'],
			'editLink' => ($__templater->method($__vars['series'], 'canEditTags', array()) ? $__templater->func('link', array('ams/series/tags', $__vars['series'], ), false) : ''),
		), $__vars) . '
							</li>
						';
	}
	$__compilerTemp6 = '';
	if ($__vars['series']['Featured']) {
		$__compilerTemp6 .= '
							<li><span class="label label--accent">' . 'Featured' . '</span></li>
						';
	}
	$__templater->setPageParam('headerHtml', '
		<div class="contentRow contentRow--hideFigureNarrow">
			' . $__compilerTemp1 . '
			<div class="contentRow-main">
				<div class="p-title">
					<h1 class="p-title-value">
						' . $__templater->escape($__vars['series']['title']) . '
					</h1>
				</div>

				<div class="p-description">
					<ul class="listInline listInline--bullet">
						<li>
							' . $__compilerTemp2 . '
						</li>
						<li>
							' . $__templater->fontAwesome('fa-clock', array(
		'title' => $__templater->filter('Create date', array(array('for_attr', array()),), false),
	)) . '
							<span class="u-srOnly">' . 'Create date' . '</span>

							<a href="' . $__templater->func('link', array('ams/series', $__vars['series'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['series']['create_date'], array(
	))) . '</a>
						</li>
						' . $__compilerTemp3 . '
						' . $__compilerTemp4 . '
						' . $__compilerTemp5 . '					
						' . $__compilerTemp6 . '
					</ul>
				</div>
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
		'series' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
				';
	if ($__vars['series']['series_state'] == 'deleted') {
		$__compilerTemp1 .= '
					<dd class="blockStatus-message blockStatus-message--deleted">
						' . $__templater->callMacro('deletion_macros', 'notice', array(
			'log' => $__vars['series']['DeletionLog'],
		), $__vars) . '
					</dd>
				';
	} else if ($__vars['series']['series_state'] == 'moderated') {
		$__compilerTemp1 .= '
					<dd class="blockStatus-message blockStatus-message--moderated">
						' . 'Awaiting approval before being displayed publicly.' . '
					</dd>
				';
	}
	$__compilerTemp1 .= '
				';
	if ($__vars['series']['warning_message']) {
		$__compilerTemp1 .= '
					<dd class="blockStatus-message blockStatus-message--warning">
						' . $__templater->escape($__vars['series']['warning_message']) . '
					</dd>
				';
	}
	$__compilerTemp1 .= '
				';
	if ($__templater->method($__vars['series'], 'isIgnored', array())) {
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
	return $__finalCompiled;
}
),
'tabs' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'series' => '!',
		'selected' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<div class="tabs tabs--standalone">
		<div class="hScroller" data-xf-init="h-scroller">
			<span class="hScroller-scroll">
				<a class="tabs-tab ' . (($__vars['selected'] == 'overview') ? 'is-active' : '') . '" href="' . $__templater->func('link', array('ams/series', $__vars['series'], ), true) . '">' . 'Articles' . '</a>
				<a class="tabs-tab ' . (($__vars['selected'] == 'details') ? 'is-active' : '') . '" href="' . $__templater->func('link', array('ams/series/details', $__vars['series'], ), true) . '">' . 'Series details' . '</a>
			</span>
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'action_buttons' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'series' => '!',
		'showAddArticleButton' => false,
		'canInlineMod' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if ($__templater->method($__vars['series'], 'canAddArticleToSeries', array()) AND $__vars['showAddArticleButton']) {
		$__finalCompiled .= '
		' . $__templater->button('
			' . 'Add article to series' . '
		', array(
			'href' => $__templater->func('link', array('ams/series/add-article', $__vars['series'], ), false),
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
	if ($__templater->method($__vars['series'], 'canUndelete', array()) AND ($__vars['series']['series_state'] == 'deleted')) {
		$__compilerTemp1 .= '
				' . $__templater->button('
					' . 'Khôi phục' . '
				', array(
			'href' => $__templater->func('link', array('ams/series/undelete', $__vars['series'], ), false),
			'class' => 'button--link',
			'overlay' => 'true',
		), '', array(
		)) . '
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__templater->method($__vars['series'], 'canApproveUnapprove', array()) AND ($__vars['series']['series_state'] == 'moderated')) {
		$__compilerTemp1 .= '
				' . $__templater->button('
					' . 'Duyệt' . '
				', array(
			'href' => $__templater->func('link', array('ams/series/approve', $__vars['series'], array('t' => $__templater->func('csrf_token', array(), false), ), ), false),
			'class' => 'button--link',
		), '', array(
		)) . '
			';
	}
	$__compilerTemp1 .= '

			';
	if ($__templater->method($__vars['series'], 'canWatch', array())) {
		$__compilerTemp1 .= '
				';
		$__compilerTemp2 = '';
		if ($__vars['series']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__compilerTemp2 .= 'Bỏ theo dõi';
		} else {
			$__compilerTemp2 .= 'Theo dõi';
		}
		$__compilerTemp1 .= $__templater->button('
					' . $__compilerTemp2 . '
				', array(
			'href' => $__templater->func('link', array('ams/series/watch', $__vars['series'], ), false),
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
		'content' => $__vars['series'],
		'confirmUrl' => $__templater->func('link', array('ams/series/bookmark', $__vars['series'], ), false),
	), $__vars) . '
			
			';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
								' . '
								';
	if ($__templater->method($__vars['series'], 'canFeatureUnfeature', array())) {
		$__compilerTemp3 .= '
									<a href="' . $__templater->func('link', array('ams/series/quick-feature', $__vars['series'], ), true) . '"
										class="menu-linkRow"
										data-xf-click="switch"
										data-menu-closer="true">

										';
		if ($__vars['series']['Featured']) {
			$__compilerTemp3 .= '
											' . 'Unfeature series' . '
										';
		} else {
			$__compilerTemp3 .= '
											' . 'Feature series' . '
										';
		}
		$__compilerTemp3 .= '
									</a>
								';
	}
	$__compilerTemp3 .= '
								';
	if ($__templater->method($__vars['series'], 'canEdit', array())) {
		$__compilerTemp3 .= '
									<a href="' . $__templater->func('link', array('ams/series/edit', $__vars['series'], ), true) . '" class="menu-linkRow">' . 'Edit series' . '</a>
								';
	}
	$__compilerTemp3 .= '
								';
	if ($__templater->method($__vars['series'], 'canEditIcon', array())) {
		$__compilerTemp3 .= '
									<a href="' . $__templater->func('link', array('ams/series/editIcon', $__vars['series'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Edit series icon' . '</a>
								';
	}
	$__compilerTemp3 .= '
								';
	if ($__templater->method($__vars['series'], 'canDelete', array('soft', ))) {
		$__compilerTemp3 .= '
									<a href="' . $__templater->func('link', array('ams/series/delete', $__vars['series'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Delete series' . '</a>
								';
	}
	$__compilerTemp3 .= '
								';
	if ($__templater->method($__vars['series'], 'canReassign', array())) {
		$__compilerTemp3 .= '
									<a href="' . $__templater->func('link', array('ams/series/reassign', $__vars['series'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Reassign series' . '</a>
								';
	}
	$__compilerTemp3 .= '
								';
	if ($__templater->method($__vars['series'], 'canCreatePoll', array())) {
		$__compilerTemp3 .= '
									<a href="' . $__templater->func('link', array('ams/series/poll/create', $__vars['series'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Tạo bình chọn' . '</a>
								';
	}
	$__compilerTemp3 .= '
								';
	if ($__templater->method($__vars['series'], 'canViewModeratorLogs', array())) {
		$__compilerTemp3 .= '
									<a href="' . $__templater->func('link', array('ams/series/moderator-actions', $__vars['series'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Hoạt động của BQT' . '</a>
								';
	}
	$__compilerTemp3 .= '											
								' . '
								';
	if ($__templater->method($__vars['series'], 'canUseInlineModeration', array())) {
		$__compilerTemp3 .= '
									<div class="menu-footer"
										data-xf-init="inline-mod"
										data-type="ams_series"
										data-href="' . $__templater->func('link', array('inline-mod', ), true) . '"
										data-toggle=".js-seriesInlineModToggle">
										' . $__templater->formCheckBox(array(
		), array(array(
			'class' => 'js-seriesInlineModToggle',
			'value' => $__vars['series']['series_id'],
			'label' => 'Chọn để kiểm duyệt',
			'_type' => 'option',
		))) . '
									</div>
									';
		$__templater->includeJs(array(
			'src' => 'xf/inline_mod.js',
			'min' => '1',
		));
		$__compilerTemp3 .= '
								';
	}
	$__compilerTemp3 .= '
								' . '
							';
	if (strlen(trim($__compilerTemp3)) > 0) {
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
							' . $__compilerTemp3 . '
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