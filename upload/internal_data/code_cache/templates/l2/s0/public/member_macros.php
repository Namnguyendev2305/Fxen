<?php
// FROM HASH: 18c41162e9a90e7936644c9733494b92
return array(
'macros' => array('moderator_menu_actions' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'user' => '!',
		'context' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . '
	';
	if ($__templater->method($__vars['xf']['visitor'], 'canCleanSpam', array()) AND $__templater->method($__vars['user'], 'isPossibleSpammer', array())) {
		$__finalCompiled .= '
		<a href="' . $__templater->func('link', array('spam-cleaner', $__vars['user'], array('no_redirect' => 1, ), ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Spam' . '</a>
	';
	}
	$__finalCompiled .= '
	';
	if ($__templater->method($__vars['user'], 'canWarn', array())) {
		$__finalCompiled .= '
		<a href="' . $__templater->func('link', array('members/warn', $__vars['user'], ), true) . '" class="menu-linkRow">' . 'Cảnh cáo' . '</a>
	';
	}
	$__finalCompiled .= '
	';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewWarnings', array()) AND ($__vars['user']['warning_count'] AND ($__vars['context'] == 'tooltip'))) {
		$__finalCompiled .= '
		<a href="' . ($__templater->method($__vars['user'], 'canViewFullProfile', array()) ? ($__templater->func('link', array('members', $__vars['user'], ), true) . '#warnings') : $__templater->func('link', array('members/warnings', $__vars['user'], ), true)) . '" class="menu-linkRow">' . 'Xem cảnh cáo (' . $__templater->filter($__vars['user']['warning_count'], array(array('number', array()),), true) . ')' . '</a>
	';
	}
	$__finalCompiled .= '
	';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewIps', array())) {
		$__finalCompiled .= '
		<a href="' . $__templater->func('link', array('members/user-ips', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'Địa chỉ IP' . '</a>
		<a href="' . $__templater->func('link', array('members/shared-ips', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">' . 'IP chia sẻ' . '</a>
	';
	}
	$__finalCompiled .= '
	';
	if ($__templater->method($__vars['user'], 'canBan', array())) {
		$__finalCompiled .= '
		<a href="' . $__templater->func('link', array('members/ban', $__vars['user'], ), true) . '" class="menu-linkRow" data-xf-click="overlay">
			';
		if ($__vars['user']['is_banned']) {
			$__finalCompiled .= '
				' . 'Sửa lệnh cấm' . '
			';
		} else {
			$__finalCompiled .= '
				' . 'Cấm thành viên' . '
			';
		}
		$__finalCompiled .= '
		</a>
	';
	}
	$__finalCompiled .= '
	';
	if ($__templater->method($__vars['user'], 'canEdit', array())) {
		$__finalCompiled .= '
		<a href="' . $__templater->func('link', array('members/edit', $__vars['user'], ), true) . '" class="menu-linkRow">' . 'Chỉnh sửa' . '</a>
	';
	}
	$__finalCompiled .= '
	' . '
';
	return $__finalCompiled;
}
),
'member_stat_pairs' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'user' => '!',
		'context' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . '
	' . '
	<dl class="pairs pairs--rows pairs--rows--centered fauxBlockLink">
		<dt>' . 'Bài viết' . '</dt>
		<dd>
			<a href="' . $__templater->func('link', array('search/member', null, array('user_id' => $__vars['user']['user_id'], ), ), true) . '" class="fauxBlockLink-linkRow u-concealed">
				' . $__templater->filter($__vars['user']['message_count'], array(array('number', array()),), true) . '
			</a>
		</dd>
	</dl>
	';
	if ($__vars['user']['question_solution_count']) {
		$__finalCompiled .= '
		' . '
		<dl class="pairs pairs--rows pairs--rows--centered fauxBlockLink">
			<dt>' . 'Solutions' . '</dt>
			<dd>
				' . $__templater->filter($__vars['user']['question_solution_count'], array(array('number', array()),), true) . '
			</dd>
		</dl>
	';
	}
	$__finalCompiled .= '
	' . '
	' . '
	<dl class="pairs pairs--rows pairs--rows--centered">
		<dt>' . 'Điểm tương tác' . '</dt>
		<dd>
			' . $__templater->filter($__vars['user']['reaction_score'], array(array('number', array()),), true) . '
		</dd>
	</dl>
	' . '
	';
	if ($__vars['xf']['options']['enableTrophies']) {
		$__finalCompiled .= '
		<dl class="pairs pairs--rows pairs--rows--centered fauxBlockLink">
			<dt title="' . $__templater->filter('Điểm thành tích', array(array('for_attr', array()),), true) . '">' . 'Điểm' . '</dt>
			<dd>
				<a href="' . $__templater->func('link', array('members/trophies', $__vars['user'], ), true) . '" data-xf-click="overlay" class="fauxBlockLink-linkRow u-concealed">
					' . $__templater->filter($__vars['user']['trophy_points'], array(array('number', array()),), true) . '
				</a>
			</dd>
		</dl>
	';
	}
	$__finalCompiled .= '
	' . '
	';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewWarnings', array()) AND $__vars['user']['warning_points']) {
		$__finalCompiled .= '
		<dl class="pairs pairs--rows pairs--rows--centered fauxBlockLink">
			<dt>' . 'Cảnh cáo' . '</dt>
			<dd>
				<a href="' . (((($__vars['context'] == 'tooltip') AND $__templater->method($__vars['user'], 'canViewFullProfile', array()))) ? ($__templater->func('link', array('members', $__vars['user'], ), true) . '#warnings') : $__templater->func('link', array('members/warnings', $__vars['user'], ), true)) . '" data-xf-click="' . (($__vars['context'] == 'tooltip') ? '' : 'overlay') . '" class="fauxBlockLink-linkRow u-concealed">
					' . $__templater->filter($__vars['user']['warning_points'], array(array('number', array()),), true) . ' / ' . $__templater->filter($__vars['user']['warning_count'], array(array('number', array()),), true) . '
				</a>
			</dd>
		</dl>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'member_action_buttons' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'user' => '!',
		'context' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . '
	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
			' . '
			';
	if ($__templater->method($__vars['xf']['visitor'], 'canFollowUser', array($__vars['user'], ))) {
		$__compilerTemp1 .= '
				' . $__templater->button('
					' . ($__templater->method($__vars['xf']['visitor'], 'isFollowing', array($__vars['user'], )) ? 'Bỏ theo dõi' : 'Theo dõi') . '
				', array(
			'href' => $__templater->func('link', array('members/follow', $__vars['user'], ), false),
			'class' => 'button--link',
			'data-xf-click' => 'switch',
			'data-sk-follow' => 'Theo dõi',
			'data-sk-unfollow' => 'Bỏ theo dõi',
		), '', array(
		)) . '
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__templater->method($__vars['xf']['visitor'], 'canIgnoreUser', array($__vars['user'], ))) {
		$__compilerTemp1 .= '
				<a href="' . $__templater->func('link', array('members/ignore', $__vars['user'], ), true) . '"
					class="button button--link"
					data-xf-click="switch"
					data-sk-ignore="' . $__templater->filter('Lờ đi', array(array('for_attr', array()),), true) . '"
					data-sk-unignore="' . $__templater->filter('Bỏ ra khỏi danh sách đen', array(array('for_attr', array()),), true) . '">
					' . ($__templater->method($__vars['xf']['visitor'], 'isIgnoring', array($__vars['user'], )) ? 'Bỏ ra khỏi danh sách đen' : 'Lờ đi') . '
				</a>
			';
	}
	$__compilerTemp1 .= '
			' . '
		';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
		' . '
		<div class="buttonGroup">
		' . $__compilerTemp1 . '
		</div>
	';
	}
	$__finalCompiled .= '

	' . '

	';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
			' . '
			';
	if ($__templater->method($__vars['xf']['visitor'], 'canStartConversationWith', array($__vars['user'], ))) {
		$__compilerTemp2 .= '
				' . $__templater->button('
					' . 'Tạo cuộc trò chuyện' . '
				', array(
			'href' => $__templater->func('link', array('conversations/add', null, array('to' => $__vars['user']['username'], ), ), false),
			'class' => 'button--link',
		), '', array(
		)) . '
			';
	}
	$__compilerTemp2 .= '
			';
	if ($__templater->method($__vars['xf']['visitor'], 'canSearch', array()) AND ($__vars['context'] != 'tooltip')) {
		$__compilerTemp2 .= '
				<div class="buttonGroup-buttonWrapper">
					' . $__templater->button('Tìm', array(
			'class' => 'button--link menuTrigger',
			'data-xf-click' => 'menu',
			'aria-expanded' => 'false',
			'aria-haspopup' => 'true',
		), '', array(
		)) . '
					<div class="menu" data-menu="menu" aria-hidden="true">
						<div class="menu-content">
							<h4 class="menu-header">' . 'Tìm nội dung' . '</h4>
							' . '
							<a href="' . $__templater->func('link', array('search/member', null, array('user_id' => $__vars['user']['user_id'], ), ), true) . '" rel="nofollow" class="menu-linkRow">' . 'Tìm tất cả nội dung bởi ' . $__templater->escape($__vars['user']['username']) . '' . '</a>
							<a href="' . $__templater->func('link', array('search/member', null, array('user_id' => $__vars['user']['user_id'], 'content' => 'thread', ), ), true) . '" rel="nofollow" class="menu-linkRow">' . 'Tìm tất cả chủ đề bởi ' . $__templater->escape($__vars['user']['username']) . '' . '</a>
							' . '
						</div>
					</div>
				</div>
			';
	}
	$__compilerTemp2 .= '
			' . '
		';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__finalCompiled .= '
		<div class="buttonGroup">
		' . $__compilerTemp2 . '
		</div>
		' . '
	';
	}
	$__finalCompiled .= '
	' . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

';
	return $__finalCompiled;
}
);