<?php
// FROM HASH: 733983949e8a31e2339ab51e1cbdc0c4
return array(
'macros' => array('buttons' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'findNew' => '!',
		'canInlineMod' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if ($__vars['canInlineMod']) {
		$__finalCompiled .= '
		' . $__templater->callMacro('inline_mod_macros', 'button', array(), $__vars) . '
	';
	}
	$__finalCompiled .= '
	';
	if ($__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
		' . $__templater->button('
			' . 'Đánh dấu đã xem' . '
		', array(
			'href' => $__templater->func('link', array('forums/mark-read', null, array('date' => $__vars['findNew']['cache_date'], ), ), false),
			'class' => 'button--link',
			'overlay' => 'true',
		), '', array(
		)) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'filter_bar' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'findNew' => '!',
		'rerunRoute' => '!',
		'rerunData' => null,
		'rerunQuery' => array(),
		'filterRoute' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if ($__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
		<div class="block-filterBar">
			<div class="filterBar">
				';
		$__compilerTemp1 = '';
		$__compilerTemp1 .= '
						' . '
						';
		if ($__vars['findNew']['filters']['unread']) {
			$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['rerunRoute'], $__vars['rerunData'], $__vars['rerunQuery'] + array('remove' => 'unread', ), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Chỉ hiển thị' . $__vars['xf']['language']['label_separator'] . '</span>
								' . 'Chưa đọc' . '</a></li>
						';
		}
		$__compilerTemp1 .= '
						';
		if ($__vars['findNew']['filters']['watched']) {
			$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['rerunRoute'], $__vars['rerunData'], $__vars['rerunQuery'] + array('remove' => 'watched', ), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Chỉ hiển thị' . $__vars['xf']['language']['label_separator'] . '</span>
								' . 'Đã theo dõi' . '</a></li>
						';
		}
		$__compilerTemp1 .= '
						';
		if ($__vars['findNew']['filters']['participated']) {
			$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['rerunRoute'], $__vars['rerunData'], $__vars['rerunQuery'] + array('remove' => 'participated', ), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Chỉ hiển thị' . $__vars['xf']['language']['label_separator'] . '</span>
								' . 'Participated' . '</a></li>
						';
		}
		$__compilerTemp1 .= '
						';
		if ($__vars['findNew']['filters']['started']) {
			$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['rerunRoute'], $__vars['rerunData'], $__vars['rerunQuery'] + array('remove' => 'started', ), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Chỉ hiển thị' . $__vars['xf']['language']['label_separator'] . '</span>
								' . 'Started' . '</a></li>
						';
		}
		$__compilerTemp1 .= '
						';
		if ($__vars['findNew']['filters']['unanswered']) {
			$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['rerunRoute'], $__vars['rerunData'], $__vars['rerunQuery'] + array('remove' => 'unanswered', ), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Chỉ hiển thị' . $__vars['xf']['language']['label_separator'] . '</span>
								' . 'Unanswered' . '</a></li>
						';
		}
		$__compilerTemp1 .= '
						' . '
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
				' . $__templater->callMacro(null, 'filter_menu', array(
			'findNew' => $__vars['findNew'],
			'submitRoute' => $__vars['filterRoute'],
		), $__vars) . '
			</div>
		</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'filter_menu' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'findNew' => '!',
		'submitRoute' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<div class="menu" data-menu="menu" aria-hidden="true">
		<div class="menu-content">
			<h4 class="menu-header">' . 'Chỉ hiển thị' . $__vars['xf']['language']['label_separator'] . '</h4>
			' . $__templater->form('
				<div class="menu-row">
					' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'unread',
		'selected' => $__vars['findNew']['filters']['unread'],
		'label' => 'Chủ đề chưa đọc',
		'_type' => 'option',
	),
	array(
		'name' => 'watched',
		'selected' => $__vars['findNew']['filters']['watched'],
		'label' => 'Nội dung đã theo dõi',
		'_type' => 'option',
	),
	array(
		'name' => 'participated',
		'selected' => $__vars['findNew']['filters']['participated'],
		'label' => 'Các chủ đề mà bạn đã tham gia',
		'_type' => 'option',
	),
	array(
		'name' => 'started',
		'selected' => $__vars['findNew']['filters']['started'],
		'label' => 'Chủ đề bạn đã bắt đầu',
		'_type' => 'option',
	),
	array(
		'name' => 'unanswered',
		'selected' => $__vars['findNew']['filters']['unanswered'],
		'label' => 'Chủ đề chưa trả lời',
		'_type' => 'option',
	))) . '
				</div>
				' . '

				' . $__templater->callMacro('filter_macros', 'find_new_filter_footer', array(), $__vars) . '
			', array(
		'action' => $__templater->func('link', array($__vars['submitRoute'], ), false),
	)) . '
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'results' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'findNew' => '!',
		'threads' => '!',
		'latestRoute' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__vars['findNew']['result_count']) {
		$__finalCompiled .= '
		';
		$__vars['activityBarShown'] = false;
		$__finalCompiled .= '
		<div class="structItemContainer">
			';
		if ($__templater->isTraversable($__vars['threads'])) {
			foreach ($__vars['threads'] AS $__vars['thread']) {
				$__finalCompiled .= '
				';
				if ($__vars['xf']['visitor']['user_id'] AND ((!$__vars['activityBarShown']) AND ($__vars['thread']['last_post_date'] < $__vars['xf']['session']['previousActivity']))) {
					$__finalCompiled .= '
					<div class="structItem structItem--note">
						<div class="structItem-cell">' . 'Các chủ đề bên dưới chưa được cập nhật kể từ lần cuối bạn ghé thăm.' . '</div>
					</div>
					';
					$__vars['activityBarShown'] = true;
					$__finalCompiled .= '
				';
				}
				$__finalCompiled .= '

				' . $__templater->callMacro('thread_list_macros', 'item', array(
					'thread' => $__vars['thread'],
				), $__vars) . '
			';
			}
		}
		$__finalCompiled .= '
		</div>
	';
	} else {
		$__finalCompiled .= '
		<div class="block-row">
			';
		if ($__vars['xf']['visitor']['user_id'] AND (($__vars['findNew']['filters']['unread'] AND ($__templater->func('count', array($__vars['findNew']['filters'], ), false) == 1)))) {
			$__finalCompiled .= '
				' . 'Bạn không có bài viết chưa đọc. Bạn có thể <a href="' . $__templater->func('link', array($__vars['latestRoute'], null, array('skip' => 1, ), ), true) . '" rel="nofollow">xem tất cả các bài viết mới nhất</a> thay thế.' . '
			';
		} else {
			$__finalCompiled .= '
				' . 'Không tìm thấy.' . '
			';
		}
		$__finalCompiled .= '
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
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Bài viết mới');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['pageSelected'] = $__templater->preEscaped('new_thread');
	$__templater->wrapTemplate('whats_new_wrapper', $__compilerTemp1);
	$__finalCompiled .= '

';
	$__compilerTemp2 = '';
	if ($__templater->method($__vars['xf']['visitor'], 'canCreateThread', array()) OR $__templater->method($__vars['xf']['visitor'], 'canCreateThreadPreReg', array())) {
		$__compilerTemp2 .= '
		' . $__templater->button('
			' . 'Đăng chủ đề' . $__vars['xf']['language']['ellipsis'] . '
		', array(
			'href' => $__templater->func('link', array('forums/create-thread', ), false),
			'class' => 'button--cta',
			'icon' => 'write',
			'overlay' => 'true',
			'rel' => 'nofollow',
		), '', array(
		)) . '
	';
	}
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__compilerTemp2 . '
');
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

<div class="block" data-xf-init="' . ($__vars['canInlineMod'] ? 'inline-mod' : '') . '" data-type="thread" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
	';
	if ($__vars['findNew']['result_count']) {
		$__finalCompiled .= '
		<div class="block-outer">
			' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['findNew']['result_count'],
			'link' => 'whats-new/posts',
			'data' => $__vars['findNew'],
			'wrapperclass' => 'block-outer-main',
			'perPage' => $__vars['perPage'],
		))) . '

			';
		$__compilerTemp3 = '';
		$__compilerTemp3 .= '
						' . $__templater->callMacro(null, 'buttons', array(
			'findNew' => $__vars['findNew'],
			'canInlineMod' => $__vars['canInlineMod'],
		), $__vars) . '
					';
		if (strlen(trim($__compilerTemp3)) > 0) {
			$__finalCompiled .= '
				<div class="block-outer-opposite">
					<div class="buttonGroup">
					' . $__compilerTemp3 . '
					</div>
				</div>
			';
		}
		$__finalCompiled .= '
		</div>
	';
	}
	$__finalCompiled .= '

	<div class="block-container">
		' . $__templater->callMacro(null, 'filter_bar', array(
		'findNew' => $__vars['findNew'],
		'rerunRoute' => 'whats-new/posts',
		'rerunData' => $__vars['findNew'],
		'filterRoute' => 'whats-new/posts',
	), $__vars) . '

		' . $__templater->callMacro(null, 'results', array(
		'findNew' => $__vars['findNew'],
		'threads' => $__vars['threads'],
		'latestRoute' => 'whats-new/posts',
	), $__vars) . '
	</div>

	';
	if ($__vars['findNew']['result_count']) {
		$__finalCompiled .= '
		<div class="block-outer block-outer--after">
			' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['findNew']['result_count'],
			'link' => 'whats-new/posts',
			'data' => $__vars['findNew'],
			'wrapperclass' => 'block-outer-main',
			'perPage' => $__vars['perPage'],
		))) . '
			' . $__templater->func('show_ignored', array(array(
			'wrapperclass' => 'block-outer-opposite',
		))) . '
		</div>
	';
	}
	$__finalCompiled .= '
</div>

' . '

' . '

' . '

';
	return $__finalCompiled;
}
);