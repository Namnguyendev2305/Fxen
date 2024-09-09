<?php
// FROM HASH: b8317151e5875ce386cce9b98c1bd8dd
return array(
'macros' => array('list_filter_bar' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'filters' => '!',
		'baseLinkPath' => '!',
		'linkData' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	
	';
	$__vars['dateLimits'] = array('-1' => 'Tất cả thời gian', '7' => '' . '7' . ' ngày', '14' => '' . '14' . ' ngày', '30' => '' . '30' . ' ngày', '60' => '' . '2' . ' tháng', '90' => '' . '3' . ' tháng', '182' => '' . '6' . ' tháng', '365' => '1 Năm', );
	$__finalCompiled .= '
	';
	$__vars['sortOrders'] = array('last_update' => 'Last update', 'publish_date' => 'Publish date', 'rating_weighted' => 'Bình chọn', 'reaction_score' => 'Điểm tương tác', 'view_count' => 'Lượt xem', 'title' => 'Tiêu đề', );
	$__finalCompiled .= '

	<div class="block-filterBar">
		<div class="filterBar">
			';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
						';
	if ($__vars['filters']['featured']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['linkData'], $__templater->filter($__vars['filters'], array(array('replace', array('featured', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Chỉ hiển thị' . $__vars['xf']['language']['label_separator'] . '</span>
								' . 'Featured' . '
							</a></li>
						';
	}
	$__compilerTemp1 .= '

						';
	if ($__vars['filters']['is_rated']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['linkData'], $__templater->filter($__vars['filters'], array(array('replace', array('is_rated', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Chỉ hiển thị' . $__vars['xf']['language']['label_separator'] . '</span>
								' . 'Is rated' . '
							</a></li>
						';
	}
	$__compilerTemp1 .= '
						
						';
	if ($__vars['filters']['has_reviews']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['linkData'], $__templater->filter($__vars['filters'], array(array('replace', array('has_reviews', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Chỉ hiển thị' . $__vars['xf']['language']['label_separator'] . '</span>
								' . 'Has reviews' . '
							</a></li>
						';
	}
	$__compilerTemp1 .= '
						
						';
	if ($__vars['filters']['has_comments']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['linkData'], $__templater->filter($__vars['filters'], array(array('replace', array('has_comments', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Chỉ hiển thị' . $__vars['xf']['language']['label_separator'] . '</span>
								' . 'Has comments' . '
							</a></li>
						';
	}
	$__compilerTemp1 .= '
						
						';
	if ($__vars['filters']['title']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['linkData'], $__templater->filter($__vars['filters'], array(array('replace', array('title', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Tiêu đề' . $__vars['xf']['language']['label_separator'] . '</span>
								' . $__templater->escape($__vars['filters']['title']) . '</a></li>
						';
	}
	$__compilerTemp1 .= '
						
						';
	if ($__vars['filters']['term']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['linkData'], $__templater->filter($__vars['filters'], array(array('replace', array('term', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Mentions' . $__vars['xf']['language']['label_separator'] . '</span>
								' . $__templater->escape($__vars['filters']['term']) . '</a></li>
						';
	}
	$__compilerTemp1 .= '						
						
						';
	if ($__vars['filters']['rating_avg']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['linkData'], $__templater->filter($__vars['filters'], array(array('replace', array('rating_avg', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Avg rating' . $__vars['xf']['language']['label_separator'] . '</span>
								';
		if ($__vars['filters']['rating_avg'] == 5) {
			$__compilerTemp1 .= '
									' . '5 Stars' . '
								';
		} else if ($__vars['filters']['rating_avg'] == 4) {
			$__compilerTemp1 .= '
									' . '4 Stars &amp; up' . '
								';
		} else if ($__vars['filters']['rating_avg'] == 3) {
			$__compilerTemp1 .= '
									' . '3 Stars &amp; up' . '
								';
		} else if ($__vars['filters']['rating_avg'] == 2) {
			$__compilerTemp1 .= '
									' . '2 Stars &amp; up' . '
								';
		}
		$__compilerTemp1 .= '
							</a></li>
						';
	}
	$__compilerTemp1 .= '						
						
						';
	if ($__vars['filters']['prefix_id']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['linkData'], $__templater->filter($__vars['filters'], array(array('replace', array('prefix_id', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Tiền tố' . $__vars['xf']['language']['label_separator'] . '</span>
								' . $__templater->func('prefix_title', array('ams_article', $__vars['filters']['prefix_id'], ), true) . '</a></li>
						';
	}
	$__compilerTemp1 .= '
						
						';
	if ($__vars['filters']['last_days'] AND $__vars['dateLimits'][$__vars['filters']['last_days']]) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['linkData'], $__templater->filter($__vars['filters'], array(array('replace', array('last_days', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Cập nhật mới nhất' . $__vars['xf']['language']['label_separator'] . '</span>
								' . $__templater->escape($__vars['dateLimits'][$__vars['filters']['last_days']]) . '</a></li>
						';
	}
	$__compilerTemp1 .= '
						
						';
	if ($__vars['filters']['state']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['linkData'], $__templater->filter($__vars['filters'], array(array('replace', array('state', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Tình trạng' . $__vars['xf']['language']['label_separator'] . '</span>
								';
		if ($__vars['filters']['state'] == 'visible') {
			$__compilerTemp1 .= '
									' . 'Hiển thị' . '
								';
		} else if ($__vars['filters']['state'] == 'moderated') {
			$__compilerTemp1 .= '
									' . 'Cần kiểm duyệt' . '
								';
		} else if ($__vars['filters']['state'] == 'deleted') {
			$__compilerTemp1 .= '
									' . 'Bị xóa' . '
								';
		}
		$__compilerTemp1 .= '
							</a></li>
						';
	}
	$__compilerTemp1 .= '
						
						';
	if ($__vars['filters']['order'] AND $__vars['sortOrders'][$__vars['filters']['order']]) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['linkData'], $__templater->filter($__vars['filters'], array(array('replace', array(array('order' => null, 'direction' => null, ), )),), false), ), true) . '"
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
				data-href="' . $__templater->func('link', array($__vars['baseLinkPath'] . '/filters', $__vars['linkData'], $__vars['filters'], ), true) . '"
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
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';

	return $__finalCompiled;
}
);