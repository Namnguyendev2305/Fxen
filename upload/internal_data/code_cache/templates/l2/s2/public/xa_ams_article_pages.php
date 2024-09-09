<?php
// FROM HASH: 4fb4fc7c8ea0371bf9280b17e76456f7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Manage pages' . ' - ' . $__templater->func('prefix', array('ams_article', $__vars['article'], 'escaped', ), true) . $__templater->escape($__vars['article']['title']));
	$__finalCompiled .= '
';
	$__templater->pageParams['pageH1'] = $__templater->preEscaped('Manage pages');
	$__finalCompiled .= '

';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '
';
	$__templater->includeCss('message.less');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['article'], 'getBreadcrumbs', array(true, )));
	$__finalCompiled .= '

' . $__templater->filter($__vars['innerContent'], array(array('raw', array()),), true) . '

<div class="block block--messages">
	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
				';
	if ($__templater->method($__vars['article'], 'canAddPage', array())) {
		$__compilerTemp1 .= '
					' . $__templater->button('
						' . 'Add page' . '
					', array(
			'href' => $__templater->func('link', array('ams/add-page', $__vars['article'], ), false),
		), '', array(
		)) . '
				';
	}
	$__compilerTemp1 .= '
			';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
		<div class="block-outer">
			<div class="block-outer-opposite">
			' . $__compilerTemp1 . '
			</div>
		</div>
	';
	}
	$__finalCompiled .= '

	<div class="block-container">
		<div class="block-body">
			';
	if (!$__templater->test($__vars['articlePages'], 'empty', array())) {
		$__finalCompiled .= '
				';
		if ($__templater->isTraversable($__vars['articlePages'])) {
			foreach ($__vars['articlePages'] AS $__vars['page']) {
				$__finalCompiled .= '
					<div class="message message--simple js-articlePage" id="js-articlePage-' . $__templater->escape($__vars['page']['page_id']) . '">
						<span class="u-anchorTarget" id="article-page-' . $__templater->escape($__vars['page']['page_id']) . '"></span>
						<div class="message-inner">
							<div class="message-cell message-cell--main">
								<div class="message-content js-messageContent">
									<div class="message-attribution-source message-attribution-amsPageStatus">
										<span class="message-attribution-opposite">
											';
				if ($__vars['page']['has_poll']) {
					$__finalCompiled .= '
												' . $__templater->fontAwesome('fal fa-poll', array(
						'title' => $__templater->filter('Bình chọn', array(array('for_attr', array()),), false),
					)) . ' 
											';
				}
				$__finalCompiled .= '
											';
				if ($__vars['page']['page_state'] == 'deleted') {
					$__finalCompiled .= '
												' . $__templater->fontAwesome('fal fa-trash-alt', array(
						'title' => $__templater->filter('Bị xóa', array(array('for_attr', array()),), false),
					)) . ' 
											';
				}
				$__finalCompiled .= '
											';
				if ($__vars['page']['page_state'] == 'draft') {
					$__finalCompiled .= '
												' . $__templater->fontAwesome('fal fa-exclamation-triangle', array(
						'title' => $__templater->filter('draft', array(array('for_attr', array()),), false),
					)) . ' 
											';
				}
				$__finalCompiled .= '
										</span>
									</div>

									<div class="message-attribution message-attribution-amsPageTitle">
										<h2 class="message-attribution-main contentRow-title">
											';
				if ($__vars['page']['page_state'] == 'visible') {
					$__finalCompiled .= '
												<a href="' . $__templater->func('link', array('ams/page', $__vars['page'], ), true) . '" class="" rel="nofollow">' . $__templater->escape($__vars['page']['title']) . '</a>
											';
				} else {
					$__finalCompiled .= '
												' . $__templater->escape($__vars['page']['title']) . '
											';
				}
				$__finalCompiled .= '
										</h2>
									</div>

									<div class="message-attribution message-attribution-amsPageMeta">
										<ul class="listInline listInline--bullet">
											<li>
												' . $__templater->fontAwesome('fa-user', array(
					'title' => $__templater->filter('Tác giả', array(array('for_attr', array()),), false),
				)) . '
												<span class="u-srOnly">' . 'Tác giả' . '</span>
												';
				if ($__vars['page']['User']['Profile']['xa_ams_author_name']) {
					$__finalCompiled .= '
													' . $__templater->func('username_link', array(array('user_id' => $__vars['page']['user_id'], 'username' => $__vars['page']['User']['Profile']['xa_ams_author_name'], ), false, array(
						'defaultname' => $__vars['page']['User']['Profile']['xa_ams_author_name'],
						'class' => 'u-concealed',
					))) . '
												';
				} else {
					$__finalCompiled .= '
													' . $__templater->func('username_link', array($__vars['page']['User'], false, array(
						'defaultname' => $__vars['page']['username'],
						'class' => 'u-concealed',
					))) . '
												';
				}
				$__finalCompiled .= '
											</li>
											';
				if ($__vars['page']['page_state'] == 'visible') {
					$__finalCompiled .= '
												<li>
													' . $__templater->fontAwesome('fa-clock', array(
						'title' => $__templater->filter('Publish date', array(array('for_attr', array()),), false),
					)) . '
													<span class="u-srOnly">' . 'Publish date' . '</span>

													<a href="' . $__templater->func('link', array('ams/page', $__vars['page'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['page']['create_date'], array(
					))) . '</a>
												</li>
											';
				} else {
					$__finalCompiled .= '
												<li>
													' . $__templater->fontAwesome('fa-clock', array(
						'title' => $__templater->filter('Publish date', array(array('for_attr', array()),), false),
					)) . '
													<span class="u-srOnly">' . 'Publish date' . '</span>

													' . $__templater->func('date_dynamic', array($__vars['page']['create_date'], array(
					))) . '
												</li>
											';
				}
				$__finalCompiled .= '

											';
				if ($__vars['page']['edit_date'] > $__vars['page']['create_date']) {
					$__finalCompiled .= '								
												<li>
													' . $__templater->fontAwesome('fa-clock', array(
						'title' => $__templater->filter('Last update', array(array('for_attr', array()),), false),
					)) . '
													<span class="u-concealed">' . 'Cập nhật' . '</span>

													' . $__templater->func('date_dynamic', array($__vars['page']['edit_date'], array(
					))) . '
												</li>
											';
				}
				$__finalCompiled .= '
										</ul>
									</div>

									<div class="message-attribution message-attribution-amsPageMeta">
										<ul class="listInline listInline--bullet">
											<li><span class="u-concealed">' . 'Thứ tự hiển thị' . ': ' . $__templater->escape($__vars['page']['display_order']) . '</span></li>
											';
				if ($__vars['page']['depth']) {
					$__finalCompiled .= '
												<li><span class="u-concealed">' . 'Depth' . ': ' . $__templater->escape($__vars['page']['depth']) . '</span></li>
											';
				}
				$__finalCompiled .= '
											';
				if ($__vars['page']['attach_count']) {
					$__finalCompiled .= '
												<li><span class="u-concealed">' . 'Đính kèm' . ': ' . $__templater->escape($__vars['page']['attach_count']) . '</span></li>
											';
				}
				$__finalCompiled .= '
										</ul>
									</div>

									';
				if ($__vars['page']['page_state'] == 'deleted') {
					$__finalCompiled .= '
										<div class="messageNotice messageNotice--deleted">
											' . $__templater->callMacro('deletion_macros', 'notice', array(
						'log' => $__vars['page']['DeletionLog'],
					), $__vars) . '
										</div>
									';
				} else if ($__vars['page']['page_state'] == 'draft') {
					$__finalCompiled .= '
										<div class="messageNotice messageNotice--locked">
											' . 'This page is currently in draft and not visible publicly. ' . '
										</div>
									';
				}
				$__finalCompiled .= '

									';
				$__compilerTemp2 = '';
				$__compilerTemp2 .= '
												';
				$__compilerTemp3 = '';
				$__compilerTemp3 .= '
														';
				if ($__templater->method($__vars['page'], 'canEdit', array())) {
					$__compilerTemp3 .= '
															<a href="' . $__templater->func('link', array('ams/page/edit', $__vars['page'], array('mp' => 1, ), ), true) . '"
																class="actionBar-action actionBar-action--edit">' . 'Chỉnh sửa' . '</a>
														';
				}
				$__compilerTemp3 .= '
														';
				if ($__vars['page']['edit_count'] AND $__templater->method($__vars['page'], 'canViewHistory', array())) {
					$__compilerTemp3 .= '
															<a href="' . $__templater->func('link', array('ams/page/history', $__vars['page'], ), true) . '" 
																class="actionBar-action actionBar-action--history" 
																data-xf-click="toggle" data-target="< .js-articlePage | .js-historyTarget">' . 'Lịch sử' . '</a>
														';
				}
				$__compilerTemp3 .= '
														';
				if ($__templater->method($__vars['page'], 'canDelete', array())) {
					$__compilerTemp3 .= '
															<a href="' . $__templater->func('link', array('ams/page/delete', $__vars['page'], array('mp' => 1, ), ), true) . '"
																class="actionBar-action actionBar-action--delete"
																data-xf-click="overlay">' . 'Xóa' . '</a>
														';
				}
				$__compilerTemp3 .= '
														';
				if (($__vars['page']['page_state'] == 'deleted') AND $__templater->method($__vars['page'], 'canUndelete', array())) {
					$__compilerTemp3 .= '
															<a href="' . $__templater->func('link', array('ams/page/undelete', $__vars['page'], array('t' => $__templater->func('csrf_token', array(), false), 'mp' => 1, ), ), true) . '"
																class="actionBar-action actionBar-action--undelete">' . 'Khôi phục' . '</a>
														';
				}
				$__compilerTemp3 .= '
														';
				if ($__templater->method($__vars['page'], 'canReassign', array())) {
					$__compilerTemp3 .= '
															<a href="' . $__templater->func('link', array('ams/page/reassign', $__vars['page'], array('mp' => 1, ), ), true) . '"
																class="actionBar-action actionBar-action--report" 
																data-xf-click="overlay">' . 'Chỉ định' . '</a>
														';
				}
				$__compilerTemp3 .= '
														';
				if ($__templater->method($__vars['page'], 'canSetCoverImage', array())) {
					$__compilerTemp3 .= '
															<a href="' . $__templater->func('link', array('ams/page/set-cover-image', $__vars['page'], array('mp' => 1, ), ), true) . '"
																class="actionBar-action actionBar-action--cover-image actionBar-action--menuItem"
																data-xf-click="overlay">' . 'Set cover image' . '</a>
														';
				}
				$__compilerTemp3 .= '														
														';
				if ($__templater->method($__vars['page'], 'canCreatePoll', array())) {
					$__compilerTemp3 .= '
															<a href="' . $__templater->func('link', array('ams/page/poll-create', $__vars['page'], ), true) . '"
																class="actionBar-action actionBar-action--report" 
																data-xf-click="overlay">' . 'Tạo bình chọn' . '</a>
														';
				}
				$__compilerTemp3 .= '
														';
				if ($__templater->method($__vars['xf']['visitor'], 'canViewIps', array()) AND $__vars['page']['ip_id']) {
					$__compilerTemp3 .= '
															<a href="' . $__templater->func('link', array('ams/page/ip', $__vars['page'], ), true) . '"
																class="actionBar-action actionBar-action--ip actionBar-action--menuItem"
																data-xf-click="overlay">' . 'IP' . '</a>
															';
					$__vars['hasActionBarMenu'] = true;
					$__compilerTemp3 .= '
														';
				}
				$__compilerTemp3 .= '
														';
				if ($__vars['page']['warning_id'] AND $__templater->method($__vars['xf']['visitor'], 'canViewWarnings', array())) {
					$__compilerTemp3 .= '
															<a href="' . $__templater->func('link', array('warnings', array('warning_id' => $__vars['page']['warning_id'], ), ), true) . '"
																class="actionBar-action actionBar-action--warn actionBar-action--menuItem"
																data-xf-click="overlay">' . 'Xem cảnh cáo' . '</a>
															';
					$__vars['hasActionBarMenu'] = true;
					$__compilerTemp3 .= '
														';
				}
				$__compilerTemp3 .= '
													';
				if (strlen(trim($__compilerTemp3)) > 0) {
					$__compilerTemp2 .= '
													<div class="actionBar-set actionBar-set--internal">
													' . $__compilerTemp3 . '
													</div>
												';
				}
				$__compilerTemp2 .= '
											';
				if (strlen(trim($__compilerTemp2)) > 0) {
					$__finalCompiled .= '
										<div class="message-actionBar actionBar">
											' . $__compilerTemp2 . '
										</div>
									';
				}
				$__finalCompiled .= '

									<div class="js-historyTarget toggleTarget" data-href="trigger-href"></div>
								</div>
							</div>
						</div>
					</div>
				';
			}
		}
		$__finalCompiled .= '
			';
	} else {
		$__finalCompiled .= '
				<div class="block-row">
					' . 'No pages to display' . '
				</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);