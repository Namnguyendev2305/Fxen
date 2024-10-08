<?php
// FROM HASH: 0dee62f9ac196cd18bbf9f1ad95a3081
return array(
'macros' => array('comment_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'comments' => '!',
		'attachmentData' => '!',
		'content' => '!',
		'linkPrefix' => '!',
		'link' => '!',
		'linkParams' => array(),
		'page' => '!',
		'perPage' => '!',
		'totalItems' => '!',
		'pageParam' => 'page',
		'pageNavHash' => '',
		'canInlineMod' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
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

	<div class="block block--messages"
		data-xf-init="' . ($__vars['canInlineMod'] ? 'inline-mod' : '') . '"
		data-type="ams_comment"
		data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">

		' . $__templater->callMacro(null, 'comments_status', array(
		'content' => $__vars['content'],
		'wrapperClass' => 'block-outer',
	), $__vars) . '

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
		'total' => $__vars['totalItems'],
		'link' => $__vars['link'],
		'data' => $__vars['content'],
		'params' => $__vars['linkParams'],
		'hash' => $__vars['pageNavHash'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
		'pageParam' => $__vars['pageParam'],
	))) . '

			' . $__compilerTemp1 . '

		'), false) . '</div>
		
		<div class="block-container"
			data-xf-init="' . ($__vars['xf']['options']['selectQuotable'] ? 'select-to-quote' : '') . '"
			data-message-selector=".js-comment">
			
			<h3 class="block-header">' . 'Comments' . '</h3>
			<div class="block-body js-replyNewCommentContainer">
				';
	if (!$__templater->test($__vars['comments'], 'empty', array())) {
		$__finalCompiled .= '
					<span class="u-anchorTarget" id="comments"></span>
					';
		if ($__templater->isTraversable($__vars['comments'])) {
			foreach ($__vars['comments'] AS $__vars['comment']) {
				$__finalCompiled .= '
						';
				if ($__vars['comment']['comment_state'] == 'deleted') {
					$__finalCompiled .= '
							' . $__templater->callMacro(null, 'comment_deleted', array(
						'comment' => $__vars['comment'],
						'content' => $__vars['content'],
						'linkPrefix' => $__vars['linkPrefix'],
					), $__vars) . '
						';
				} else {
					$__finalCompiled .= '
							' . $__templater->callMacro(null, 'comment', array(
						'comment' => $__vars['comment'],
						'content' => $__vars['content'],
						'linkPrefix' => $__vars['linkPrefix'],
					), $__vars) . '
						';
				}
				$__finalCompiled .= '
					';
			}
		}
		$__finalCompiled .= '
				';
	} else {
		$__finalCompiled .= '
					<div class="blockMessage js-replyNoMessages">' . 'There are no comments to display.' . '</div>
				';
	}
	$__finalCompiled .= '
			</div>
		</div>

		<div class="block-outer block-outer--after">
			' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['totalItems'],
		'link' => $__vars['link'],
		'data' => $__vars['content'],
		'params' => $__vars['linkParams'],
		'hash' => $__vars['pageNavHash'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
		'pageParam' => $__vars['pageParam'],
	))) . '
			' . $__templater->func('show_ignored', array(array(
		'wrapperclass' => 'block-outer-opposite',
	))) . '
		</div>

		' . $__templater->callMacro(null, 'comments_status', array(
		'content' => $__vars['content'],
		'wrapperClass' => 'block-outer block-outer--after',
	), $__vars) . '
	</div>

	' . $__templater->callMacro(null, 'comment_add', array(
		'comments' => $__vars['comments'],
		'attachmentData' => $__vars['attachmentData'],
		'content' => $__vars['content'],
		'linkPrefix' => $__vars['linkPrefix'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'comment' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'comment' => '!',
		'content' => '!',
		'linkPrefix' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	
	';
	$__templater->includeCss('xa_ams_comment.less');
	$__finalCompiled .= '

	<article class="message message--simple message--comment' . ($__templater->method($__vars['comment'], 'isIgnored', array()) ? ' is-ignored' : '') . ' js-comment js-inlineModContainer"
		data-author="' . ($__templater->escape($__vars['comment']['User']['username']) ?: $__templater->escape($__vars['comment']['username'])) . '"
		data-content="ams-comment-' . $__templater->escape($__vars['comment']['comment_id']) . '"
		id="js-comment-' . $__templater->escape($__vars['comment']['comment_id']) . '">

		<span class="u-anchorTarget" id="ams-comment-' . $__templater->escape($__vars['comment']['comment_id']) . '"></span>

		<div class="message-inner">
			<div class="message-cell message-cell--user">
				' . $__templater->callMacro('message_macros', 'user_info_simple', array(
		'user' => $__vars['comment']['User'],
		'fallbackName' => $__vars['comment']['username'],
	), $__vars) . '
			</div>
			<div class="message-cell message-cell--main">
				<div class="js-quickEditTarget">
					<div class="message-content js-messageContent">
						<header class="message-attribution message-attribution--plain">
							<ul class="listInline listInline--bullet">
								<li class="message-attribution-user">
									' . $__templater->func('avatar', array($__vars['comment']['User'], 'xxs', false, array(
	))) . '
									<h4 class="attribution">' . $__templater->func('username_link', array($__vars['comment']['User'], true, array(
		'defaultname' => $__vars['comment']['username'],
	))) . '</h4>
								</li>
								<li>
									<a href="' . $__templater->func('link', array('ams/comments', $__vars['comment'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['comment']['comment_date'], array(
	))) . '</a>
								</li>
							</ul>
						</header>

						';
	if ($__vars['comment']['comment_state'] == 'deleted') {
		$__finalCompiled .= '
							<div class="messageNotice messageNotice--deleted">
								' . $__templater->callMacro('deletion_macros', 'notice', array(
			'log' => $__vars['comment']['DeletionLog'],
		), $__vars) . '
							</div>
						';
	} else if ($__vars['comment']['comment_state'] == 'moderated') {
		$__finalCompiled .= '
							<div class="messageNotice messageNotice--moderated">
								' . 'Bài viết này đang chờ phê duyệt của người kiểm duyệt và không nhìn thấy được đối với khách truy cập bình thường.' . '
							</div>
						';
	}
	$__finalCompiled .= '
						';
	if ($__vars['comment']['warning_message']) {
		$__finalCompiled .= '
							<div class="messageNotice messageNotice--warning">
								' . $__templater->escape($__vars['comment']['warning_message']) . '
							</div>
						';
	}
	$__finalCompiled .= '
						';
	if ($__templater->method($__vars['comment'], 'isIgnored', array())) {
		$__finalCompiled .= '
							<div class="messageNotice messageNotice--ignored">
								' . 'Bạn đang bỏ qua nội dung bởi thành viên này.' . '
							</div>
						';
	}
	$__finalCompiled .= '

						<div class="message-userContent lbContainer js-lbContainer"
							data-lb-id="ams_comment-' . $__templater->escape($__vars['comment']['comment_id']) . '"
							data-lb-caption-desc="' . ($__vars['comment']['User'] ? $__templater->escape($__vars['comment']['User']['username']) : $__templater->escape($__vars['comment']['username'])) . ' &middot; ' . $__templater->func('date_time', array($__vars['comment']['comment_date'], ), true) . '">

							<article class="message-body js-selectToQuote">
								' . $__templater->func('bb_code', array($__vars['comment']['message'], 'ams_comment', $__vars['comment'], ), true) . '
								<div class="js-selectToQuoteEnd">&nbsp;</div>
							</article>

							';
	if ($__vars['comment']['attach_count']) {
		$__finalCompiled .= '
								' . $__templater->callMacro('message_macros', 'attachments', array(
			'attachments' => $__vars['comment']['Attachments'],
			'message' => $__vars['comment'],
			'canView' => $__templater->method($__vars['comment'], 'canViewAttachments', array()),
		), $__vars) . '
							';
	}
	$__finalCompiled .= '
						</div>

						';
	if ($__vars['comment']['last_edit_date']) {
		$__finalCompiled .= '
							<div class="message-lastEdit">
								';
		if ($__vars['comment']['user_id'] == $__vars['comment']['last_edit_user_id']) {
			$__finalCompiled .= '
									' . 'Sửa lần cuối' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['comment']['last_edit_date'], array(
			))) . '
								';
		} else {
			$__finalCompiled .= '
									' . 'Sửa bởi Amin' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['comment']['last_edit_date'], array(
			))) . '
								';
		}
		$__finalCompiled .= '
							</div>
						';
	}
	$__finalCompiled .= '

						';
	if ($__vars['xf']['options']['xaAmsSignatureOnComments']) {
		$__finalCompiled .= '
							' . $__templater->callMacro('message_macros', 'signature', array(
			'user' => $__vars['comment']['User'],
		), $__vars) . '
						';
	}
	$__finalCompiled .= '
					</div>

					<footer class="message-footer">
						';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
									';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
												' . $__templater->func('react', array(array(
		'content' => $__vars['comment'],
		'link' => 'ams/comments/react',
		'list' => '< .js-comment | .js-reactionsList',
	))) . '
												';
	if ($__templater->method($__vars['content'], 'canReplyToComment', array())) {
		$__compilerTemp2 .= '
													';
		$__vars['quoteLink'] = $__templater->preEscaped($__templater->func('link', array($__vars['linkPrefix'] . '/comment', $__vars['content'], array('quote' => $__vars['comment']['comment_id'], ), ), true));
		$__compilerTemp2 .= '
													';
		if ($__vars['xf']['options']['multiQuote']) {
			$__compilerTemp2 .= '
														<a href="' . $__templater->escape($__vars['quoteLink']) . '"
															class="actionBar-action actionBar-action--mq u-jsOnly js-multiQuote"
															title="' . $__templater->filter('Chuyển chế độ Multi - Quote', array(array('for_attr', array()),), true) . '"
															data-message-id="' . $__templater->escape($__vars['comment']['comment_id']) . '"
															data-mq-action="add">
															' . 'Trích dẫn' . '
														</a>
													';
		}
		$__compilerTemp2 .= '
													<a href="' . $__templater->escape($__vars['quoteLink']) . '"
														class="actionBar-action actionBar-action--reply"
														title="' . $__templater->filter('Trả lời, trích dẫn bài viết này', array(array('for_attr', array()),), true) . '"
														data-xf-click="quote"
														data-quote-href="' . $__templater->func('link', array('ams/comments/quote', $__vars['comment'], ), true) . '">' . 'Trả lời' . '</a>
												';
	}
	$__compilerTemp2 .= '
											';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__compilerTemp1 .= '
										<div class="actionBar-set actionBar-set--external">
											' . $__compilerTemp2 . '
										</div>
									';
	}
	$__compilerTemp1 .= '

									';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
												';
	if ($__templater->method($__vars['comment'], 'canUseInlineModeration', array())) {
		$__compilerTemp3 .= '
													<span class="actionBar-action actionBar-action--inlineMod">
														' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['comment']['comment_id'],
			'class' => 'js-inlineModToggle',
			'data-xf-init' => 'tooltip',
			'title' => 'Chọn để kiểm duyệt',
			'label' => 'Chọn để kiểm duyệt',
			'hiddenlabel' => 'true',
			'_type' => 'option',
		))) . '
													</span>
												';
	}
	$__compilerTemp3 .= '
												';
	if ($__templater->method($__vars['comment'], 'canReport', array())) {
		$__compilerTemp3 .= '
													<a href="' . $__templater->func('link', array('ams/comments/report', $__vars['comment'], ), true) . '" 
														class="actionBar-action actionBar-action--report" 
														data-xf-click="overlay">' . 'Báo cáo' . '</a>
												';
	}
	$__compilerTemp3 .= '

												';
	$__vars['hasActionBarMenu'] = false;
	$__compilerTemp3 .= '
												';
	if ($__templater->method($__vars['comment'], 'canEdit', array())) {
		$__compilerTemp3 .= '
													';
		$__templater->includeJs(array(
			'src' => 'xf/message.js',
			'min' => '1',
		));
		$__compilerTemp3 .= '
													<a href="' . $__templater->func('link', array('ams/comments/edit', $__vars['comment'], ), true) . '"
														class="actionBar-action actionBar-action--edit actionBar-action--menuItem"
														data-xf-click="quick-edit"
														data-editor-target="#js-comment-' . $__templater->escape($__vars['comment']['comment_id']) . ' .js-quickEditTarget"
														data-menu-closer="true">' . 'Chỉnh sửa' . '</a>
													';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
												';
	}
	$__compilerTemp3 .= '
												';
	if ($__vars['comment']['edit_count'] AND $__templater->method($__vars['comment'], 'canViewHistory', array())) {
		$__compilerTemp3 .= '
													<a href="' . $__templater->func('link', array('ams/comments/history', $__vars['comment'], ), true) . '" 
														class="actionBar-action actionBar-action--history actionBar-action--menuItem"
														data-xf-click="toggle"
														data-target="#js-comment-' . $__templater->escape($__vars['comment']['comment_id']) . ' .js-historyTarget"
														data-menu-closer="true">' . 'Lịch sử' . '</a>
													';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
												';
	}
	$__compilerTemp3 .= '
												';
	if ($__templater->method($__vars['comment'], 'canDelete', array())) {
		$__compilerTemp3 .= '
													<a href="' . $__templater->func('link', array('ams/comments/delete', $__vars['comment'], ), true) . '" 
														class="actionBar-action actionBar-action--delete actionBar-action--menuItem" 
														data-xf-click="overlay">' . 'Xóa' . '</a>
													';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
												';
	}
	$__compilerTemp3 .= '
												';
	if ($__templater->method($__vars['comment'], 'canReassign', array())) {
		$__compilerTemp3 .= '
													<a href="' . $__templater->func('link', array('ams/comments/reassign', $__vars['comment'], ), true) . '" 
														class="actionBar-action actionBar-action--reassign actionBar-action--menuItem" 
														data-xf-click="overlay">' . 'Chỉ định' . '</a>
													';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
												';
	}
	$__compilerTemp3 .= '
												';
	if ($__templater->method($__vars['comment'], 'canChangeDate', array())) {
		$__compilerTemp3 .= '
													<a href="' . $__templater->func('link', array('ams/comments/change-date', $__vars['comment'], ), true) . '" 
														class="actionBar-action actionBar-action--date actionBar-action--menuItem" 
														data-xf-click="overlay">' . 'Change date' . '</a>
													';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
												';
	}
	$__compilerTemp3 .= '												
												';
	if ($__templater->method($__vars['comment'], 'canCleanSpam', array())) {
		$__compilerTemp3 .= '
													<a href="' . $__templater->func('link', array('spam-cleaner', $__vars['comment'], ), true) . '" 
														class="actionBar-action actionBar-action--spam actionBar-action--menuItem" 
														data-xf-click="overlay">' . 'Spam' . '</a>
													';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
												';
	}
	$__compilerTemp3 .= '
												';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewIps', array()) AND $__vars['comment']['ip_id']) {
		$__compilerTemp3 .= '
													<a href="' . $__templater->func('link', array('ams/comments/ip', $__vars['comment'], ), true) . '" 
														class="actionBar-action actionBar-action--ip actionBar-action--menuItem" 
														data-xf-click="overlay">' . 'IP' . '</a>
													';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
												';
	}
	$__compilerTemp3 .= '
												';
	if ($__templater->method($__vars['comment'], 'canWarn', array())) {
		$__compilerTemp3 .= '
													<a href="' . $__templater->func('link', array('ams/comments/warn', $__vars['comment'], ), true) . '" 
														class="actionBar-action actionBar-action--warn actionBar-action--menuItem">' . 'Cảnh cáo' . '</a>
													';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
												';
	} else if ($__vars['comment']['warning_id'] AND $__templater->method($__vars['xf']['visitor'], 'canViewWarnings', array())) {
		$__compilerTemp3 .= '
													<a href="' . $__templater->func('link', array('warnings', array('warning_id' => $__vars['comment']['warning_id'], ), ), true) . '" 
														class="actionBar-action actionBar-action--warn actionBar-action--menuItem" 
														data-xf-click="overlay">' . 'Xem cảnh cáo' . '</a>
													';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
												';
	}
	$__compilerTemp3 .= '

												';
	if ($__vars['hasActionBarMenu']) {
		$__compilerTemp3 .= '
													<a class="actionBar-action actionBar-action--menuTrigger"
														data-xf-click="menu"
														title="' . 'Thêm tùy chọn' . '"
														role="button"
														tabindex="0"
														aria-expanded="false"
														aria-haspopup="true">&#8226;&#8226;&#8226;</a>

													<div class="menu" data-menu="menu" aria-hidden="true" data-menu-builder="actionBar">
														<div class="menu-content">
															<h4 class="menu-header">' . 'Thêm tùy chọn' . '</h4>
															<div class="js-menuBuilderTarget"></div>
														</div>
													</div>
												';
	}
	$__compilerTemp3 .= '
											';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__compilerTemp1 .= '
										<div class="actionBar-set actionBar-set--internal">
											' . $__compilerTemp3 . '
										</div>
									';
	}
	$__compilerTemp1 .= '
								';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
							<div class="message-actionBar actionBar">
								' . $__compilerTemp1 . '
							</div>
						';
	}
	$__finalCompiled .= '

						<div class="reactionsBar js-reactionsList ' . ($__vars['comment']['reactions'] ? 'is-active' : '') . '">
							' . $__templater->func('reactions', array($__vars['comment'], 'ams/comments/reactions', array())) . '
						</div>
					</footer>

					<div class="js-historyTarget toggleTarget" data-href="trigger-href"></div>
				</div>
			</div>
		</div>
	</article>
';
	return $__finalCompiled;
}
),
'comment_simple' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'comment' => '!',
		'content' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	<div class="contentRow">
		<div class="contentRow-figure">
			' . $__templater->func('avatar', array($__vars['comment']['User'], 'xxs', false, array(
		'defaultname' => $__vars['comment']['username'],
	))) . '
		</div>
		
		<div class="contentRow-main contentRow-main--close">
			<a href="' . $__templater->func('link', array('ams/comments', $__vars['comment'], ), true) . '">' . $__templater->escape($__vars['content']['title']) . '</a>

			<div class="contentRow-snippet">
				' . $__templater->func('smilie', array($__templater->func('snippet', array($__vars['comment']['message'], 150, array('stripBbCode' => true, 'stripQuote' => true, ), ), false), ), true) . '
			</div>
			
			<div class="contentRow-minor contentRow-minor--smaller">
				<ul class="listInline listInline--bullet">
					<li>
						' . ($__templater->escape($__vars['comment']['User']['username']) ?: $__templater->escape($__vars['comment']['username'])) . '
					</li>					
					<li>' . $__templater->func('date_dynamic', array($__vars['comment']['comment_date'], array(
	))) . '</li>
				</ul>
			</div>
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'comment_deleted' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'comment' => '!',
		'content' => '!',
		'linkPrefix' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	
	';
	$__templater->includeCss('xa_ams_comment.less');
	$__finalCompiled .= '

	<section class="message message--simple message--deleted message--comment' . ($__templater->method($__vars['comment'], 'isIgnored', array()) ? ' is-ignored' : '') . ' js-comment js-inlineModContainer"
		data-author="' . ($__templater->escape($__vars['comment']['User']['username']) ?: $__templater->escape($__vars['comment']['username'])) . '"
		data-content="ams-comment-' . $__templater->escape($__vars['comment']['comment_id']) . '">

		<span class="u-anchorTarget" id="ams-comment-' . $__templater->escape($__vars['comment']['comment_id']) . '"></span>
		<div class="message-inner">
			<div class="message-cell message-cell--user">
				' . $__templater->callMacro('message_macros', 'user_info_simple', array(
		'user' => $__vars['comment']['User'],
		'fallbackName' => $__vars['comment']['username'],
	), $__vars) . '
			</div>
			<div class="message-cell message-cell--main">
				<header class="message-attribution message-attribution--plain">
					<ul class="listInline listInline--bullet">
						<li class="message-attribution-user">
							' . $__templater->func('avatar', array($__vars['comment']['User'], 'xxs', false, array(
	))) . '
							<h4 class="attribution">' . $__templater->func('username_link', array($__vars['comment']['User'], true, array(
		'defaultname' => $__vars['comment']['username'],
	))) . '</h4>
						</li>
						<li>' . $__templater->func('date_dynamic', array($__vars['comment']['comment_date'], array(
	))) . '</li>
					</ul>
				</header>

				<div class="messageNotice messageNotice--deleted">
					' . $__templater->callMacro('deletion_macros', 'notice', array(
		'log' => $__vars['comment']['DeletionLog'],
	), $__vars) . '

					<a href="' . $__templater->func('link', array('ams/comments/show', $__vars['comment'], ), true) . '" class="u-jsOnly" data-xf-click="inserter" data-replace="[data-content=ams-comment-' . $__templater->escape($__vars['comment']['comment_id']) . ']">' . 'Hiển thị' . $__vars['xf']['language']['ellipsis'] . '</a>
				</div>
			</div>
		</div>
	</section>
';
	return $__finalCompiled;
}
),
'comment_add' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'comments' => '!',
		'attachmentData' => '!',
		'content' => '!',
		'linkPrefix' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	
	';
	$__vars['isPreRegComment'] = $__templater->method($__vars['content'], 'canAddCommentPreReg', array());
	$__finalCompiled .= '
	';
	if ($__templater->method($__vars['content'], 'canAddComment', array()) OR $__vars['isPreRegComment']) {
		$__finalCompiled .= '
		';
		$__templater->includeJs(array(
			'src' => 'xf/message.js',
			'min' => '1',
		));
		$__vars['lastPost'] = $__templater->filter($__vars['comments'], array(array('last', array()),), false);
		$__finalCompiled .= $__templater->form('

			' . '' . '
			' . '' . '

			<div class="block-container">
				<div class="block-body">
					' . $__templater->callMacro('quick_reply_macros', 'body', array(
			'message' => $__vars['content']['draft_comment']['message'],
			'attachmentData' => $__vars['attachmentData'],
			'forceHash' => $__vars['content']['draft_comment']['attachment_hash'],
			'messageSelector' => '.js-comment',
			'supportsMultiQuote' => $__vars['xf']['options']['multiQuote'],
			'multiQuoteHref' => $__templater->func('link', array($__vars['linkPrefix'] . '/multi-quote', $__vars['content'], ), false),
			'multiQuoteStorageKey' => 'multiQuoteArticleItem',
			'simple' => true,
			'submitText' => 'Đăng bình luận',
			'lastDate' => $__vars['lastPost']['comment_date'],
			'showGuestControls' => (!$__vars['isPreRegComment']),
			'previewUrl' => $__templater->func('link', array($__vars['linkPrefix'] . '/preview', $__vars['content'], array('quick_reply' => 1, ), ), false),
		), $__vars) . '
				</div>
			</div>
		', array(
			'action' => $__templater->func('link', array($__vars['linkPrefix'] . '/add-comment', $__vars['content'], ), false),
			'ajax' => 'true',
			'draft' => $__templater->func('link', array($__vars['linkPrefix'] . '/draft', $__vars['content'], ), false),
			'class' => 'block js-quickReply',
			'data-xf-init' => 'attachment-manager quick-reply' . ((($__templater->method($__vars['xf']['visitor'], 'isShownCaptcha', array()) AND (!$__vars['isPreRegComment']))) ? ' guest-captcha' : ''),
			'data-message-container' => '< :prev | .js-replyNewCommentContainer',
		)) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'comments_status' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'content' => '!',
		'wrapperClass' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	
	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
					';
	if (!$__vars['content']['comments_open']) {
		$__compilerTemp1 .= '
						<dd class="blockStatus-message blockStatus-message--locked">
							' . 'Không mở trả lời sau này.' . '
						</dd>
					';
	}
	$__compilerTemp1 .= '
				';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
		<div class="' . $__templater->escape($__vars['wrapperClass']) . '">
			<dl class="blockStatus">
				<dt>' . 'Trạng thái' . '</dt>
				' . $__compilerTemp1 . '
			</dl>
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

' . '

' . '

';
	return $__finalCompiled;
}
);