<?php
// FROM HASH: 1ae9ce7c9e82e33046c1cc11d392bebb
return array(
'macros' => array('list_filter_bar' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'filters' => '!',
		'baseLinkPath' => '!',
		'creatorFilter' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__vars['dateLimits'] = array('-1' => 'Tất cả thời gian', '7' => '' . '7' . ' ngày', '14' => '' . '14' . ' ngày', '30' => '' . '30' . ' ngày', '60' => '' . '2' . ' tháng', '90' => '' . '3' . ' tháng', '182' => '' . '6' . ' tháng', '365' => '1 Năm', );
	$__finalCompiled .= '
	';
	$__vars['sortOrders'] = array('last_update' => 'Last update', 'publish_date' => 'Publish date', 'title' => 'Tiêu đề', );
	$__finalCompiled .= '

	<div class="block-filterBar">
		<div class="filterBar">
			';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
						';
	if ($__vars['filters']['state']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], null, $__templater->filter($__vars['filters'], array(array('replace', array('state', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Tình trạng' . $__vars['xf']['language']['label_separator'] . '</span>
								';
		if ($__vars['filters']['state'] == 'draft') {
			$__compilerTemp1 .= '
									' . 'Draft' . '
								';
		} else if ($__vars['filters']['state'] == 'awaiting') {
			$__compilerTemp1 .= '
									' . 'Awaiting' . '
								';
		}
		$__compilerTemp1 .= '
							</a></li>
						';
	}
	$__compilerTemp1 .= '

						';
	if ($__vars['filters']['title']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], null, $__templater->filter($__vars['filters'], array(array('replace', array('title', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Tiêu đề' . $__vars['xf']['language']['label_separator'] . '</span>
								' . $__templater->escape($__vars['filters']['title']) . '</a></li>
						';
	}
	$__compilerTemp1 .= '

						';
	if ($__vars['filters']['prefix_id']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], null, $__templater->filter($__vars['filters'], array(array('replace', array('prefix_id', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Tiền tố' . $__vars['xf']['language']['label_separator'] . '</span>
								' . $__templater->func('prefix_title', array('ams_article', $__vars['filters']['prefix_id'], ), true) . '</a></li>
						';
	}
	$__compilerTemp1 .= '

						';
	if ($__vars['filters']['creator_id'] AND $__vars['creatorFilter']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], null, $__templater->filter($__vars['filters'], array(array('replace', array('creator_id', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Tạo bởi' . $__vars['xf']['language']['label_separator'] . '</span>
								' . $__templater->escape($__vars['creatorFilter']['username']) . '</a></li>
						';
	}
	$__compilerTemp1 .= '

						';
	if ($__vars['filters']['last_days'] AND $__vars['dateLimits'][$__vars['filters']['last_days']]) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], null, $__templater->filter($__vars['filters'], array(array('replace', array('last_days', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Cập nhật mới nhất' . $__vars['xf']['language']['label_separator'] . '</span>
								' . $__templater->escape($__vars['dateLimits'][$__vars['filters']['last_days']]) . '</a></li>
						';
	}
	$__compilerTemp1 .= '

						';
	if ($__vars['filters']['order'] AND $__vars['sortOrders'][$__vars['filters']['order']]) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], null, $__templater->filter($__vars['filters'], array(array('replace', array(array('order' => null, 'direction' => null, ), )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Return to the default order', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Sắp xếp theo' . $__vars['xf']['language']['label_separator'] . '</span>
								' . $__templater->escape($__vars['sortOrders'][$__vars['filters']['order']]) . '
								' . $__templater->fontAwesome((($__vars['filters']['direction'] == 'asc') ? 'fa-angle-up' : 'fa-angle-down'), array(
		)) . '
								<span class="u-srOnly">';
		if ($__vars['filters']['direction'] == 'asc') {
			$__compilerTemp1 .= 'Tăng dần';
		} else {
			$__compilerTemp1 .= 'Giảm dần';
		}
		$__compilerTemp1 .= '</span>
							</a></li>
						';
	}
	$__compilerTemp1 .= '
					';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
				<ul class="filterBar-filters">
					' . $__compilerTemp1 . '
				</ul>
			';
	}
	$__finalCompiled .= '

			<a class="filterBar-menuTrigger" data-xf-click="menu" role="button" tabindex="0" aria-expanded="false" aria-haspopup="true">' . 'Bộ lọc' . '</a>
			<div class="menu menu--wide" data-menu="menu" aria-hidden="true"
				data-href="' . $__templater->func('link', array('ams/article-queue-filters', null, $__vars['filters'], ), true) . '"
				data-load-target=".js-filterMenuBody">
				<div class="menu-content">
					<h4 class="menu-header">' . 'Chỉ hiển thị' . $__vars['xf']['language']['label_separator'] . '</h4>
					<div class="js-filterMenuBody">
						<div class="menu-row">' . 'Đang tải' . $__vars['xf']['language']['ellipsis'] . '</div>
					</div>
				</div>
			</div>
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'article_queue_item' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'category' => '!',
		'extraInfo' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__templater->includeCss('structured_list.less');
	$__finalCompiled .= '
	';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '

	<div class="structItem structItem--article ' . $__templater->escape($__vars['article']['article_state']) . ' js-articleQueueItem-' . $__templater->escape($__vars['article']['article_id']) . '" data-author="' . ($__templater->escape($__vars['article']['User']['username']) ?: $__templater->escape($__vars['article']['username'])) . '">
		<div class="structItem-cell structItem-cell--icon structItem-cell--iconExpanded structItem-cell--iconAmsCoverImage">
			<div class="structItem-iconContainer">
				';
	if ($__vars['article']['CoverImage']) {
		$__finalCompiled .= '
					<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">
						' . $__templater->func('ams_article_thumbnail', array($__vars['article'], ), true) . '
					</a>
				';
	} else if ($__vars['article']['Category']['content_image_url']) {
		$__finalCompiled .= '
					<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">
						' . $__templater->func('ams_category_icon', array($__vars['article'], ), true) . '
					</a>
				';
	} else {
		$__finalCompiled .= '
					' . $__templater->func('avatar', array($__vars['article']['User'], 'm', false, array(
			'defaultname' => ($__vars['article']['username'] ?: 'Thành viên đã bị xoá'),
		))) . '
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
		<div class="structItem-cell structItem-cell--main structItem-cell--listViewLayout" data-xf-init="touch-proxy">
			';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
					';
	if ($__vars['article']['article_state'] == 'awaiting') {
		$__compilerTemp1 .= '
						<li><span class="label label--smallest label--orange">' . 'Awaiting' . '</span></li>
					';
	}
	$__compilerTemp1 .= '
					';
	if ($__vars['article']['article_state'] == 'draft') {
		$__compilerTemp1 .= '
						<li><span class="label label--smallest label--red">' . 'Draft' . '</span></li>
					';
	}
	$__compilerTemp1 .= '
				';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
				<ul class="structItem-statuses">
				' . $__compilerTemp1 . '
				</ul>
			';
	}
	$__finalCompiled .= '

			<div class="structItem-title">
				' . $__templater->func('prefix', array('ams_article', $__vars['article'], 'html', '', ), true) . ' <a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" class="" data-tp-primary="on">' . $__templater->escape($__vars['article']['title']) . '</a>
			</div>

			<div class="structItem-articleDescription">
				' . $__templater->func('snippet', array($__vars['article']['message'], 300, array('stripQuote' => true, ), ), true) . '
			</div>

			<div class="structItem-listViewMeta">
				<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--author">
					<dt></dt>
					<dd>' . $__templater->func('username_link', array($__vars['article']['User'], false, array(
		'defaultname' => ($__vars['article']['username'] ?: 'Thành viên đã bị xoá'),
	))) . '</dd>
				</dl>

				';
	if ($__vars['article']['article_state'] == 'draft') {
		$__finalCompiled .= '
					<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--createdate">
						<dt>' . 'Create date' . '</dt>
						<dd><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" rel="nofollow" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['article']['publish_date'], array(
		))) . '</a></dd>
					</dl>
				';
	} else {
		$__finalCompiled .= '
					<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--delayedpublishdate">
						<dt>' . 'Publish date' . '</dt>
						<dd><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" rel="nofollow" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['article']['publish_date'], array(
		))) . '</a></dd>
					</dl>
				';
	}
	$__finalCompiled .= '

				<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--lastUpdate">
					<dt>' . 'Sửa lần cuối' . '</dt>
					<dd>' . $__templater->func('date_dynamic', array($__vars['article']['edit_date'], array(
	))) . '</dd>
				</dl>
			</div>
		</div>
	</div>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

';
	return $__finalCompiled;
}
);