<?php
// FROM HASH: 913410276513215dc1d295696b61818f
return array(
'macros' => array('review' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'review' => '!',
		'article' => '!',
		'showArticle' => false,
		'showAttachments' => true,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__templater->includeCss('xa_ams_review.less');
	$__finalCompiled .= '
	';
	$__templater->includeJs(array(
		'src' => 'xf/comment.js',
		'min' => '1',
	));
	$__finalCompiled .= '

	<div class="ams-review message message--simple' . ($__templater->method($__vars['review'], 'isIgnored', array()) ? ' is-ignored' : '') . ' js-review js-inlineModContainer"
		data-author="' . (($__vars['review']['is_anonymous'] ? 'Vô danh' : $__templater->escape($__vars['review']['User']['username'])) ?: $__templater->escape($__vars['review']['username'])) . '"
		data-content="review-' . $__templater->escape($__vars['review']['rating_id']) . '"
		id="js-review-' . $__templater->escape($__vars['review']['rating_id']) . '">

		<span class="u-anchorTarget" id="review-' . $__templater->escape($__vars['review']['rating_id']) . '"></span>
		<div class="message-inner">
			<span class="message-cell message-cell--user">
				';
	if ($__vars['review']['is_anonymous']) {
		$__finalCompiled .= '
					' . $__templater->callMacro('message_macros', 'user_info_simple', array(
			'user' => null,
			'fallbackName' => '',
		), $__vars) . '
				';
	} else {
		$__finalCompiled .= '
					' . $__templater->callMacro('message_macros', 'user_info_simple', array(
			'user' => $__vars['review']['User'],
			'fallbackName' => 'Thành viên đã bị xoá',
		), $__vars) . '
				';
	}
	$__finalCompiled .= '
			</span>
			<div class="message-cell message-cell--main">
				<div class="js-quickEditTarget">
					<div class="message-content js-messageContent">
						<div class="message-attribution message-attribution--plain">
							';
	if ($__vars['showArticle']) {
		$__finalCompiled .= '
								<div class="message-attribution-source">
									' . 'For ' . ((((('<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true)) . '">') . $__templater->func('prefix', array('ams_article', $__vars['article'], ), true)) . $__templater->escape($__vars['article']['title'])) . '</a>') . ' in ' . (((('<a href="' . $__templater->func('link', array('ams/categories', $__vars['article']['Category'], ), true)) . '">') . $__templater->escape($__vars['article']['Category']['title'])) . '</a>') . '' . '
								</div>
							';
	}
	$__finalCompiled .= '

							<ul class="listInline listInline--bullet">
								<li class="message-attribution-user">
									';
	if ($__vars['review']['is_anonymous']) {
		$__finalCompiled .= '
										' . $__templater->func('username_link', array(null, false, array(
			'defaultname' => 'Vô danh',
		))) . '
										';
		if ($__templater->method($__vars['review'], 'canViewAnonymousAuthor', array())) {
			$__finalCompiled .= '
											(' . $__templater->func('username_link', array($__vars['review']['User'], false, array(
				'defaultname' => 'Thành viên đã bị xoá',
			))) . ')
										';
		}
		$__finalCompiled .= '
									';
	} else {
		$__finalCompiled .= '
										' . $__templater->func('username_link', array($__vars['review']['User'], false, array(
			'defaultname' => 'Thành viên đã bị xoá',
		))) . '
									';
	}
	$__finalCompiled .= '
								</li>
								<li>
									' . $__templater->callMacro('rating_macros', 'stars', array(
		'rating' => $__vars['review']['rating'],
		'class' => 'ratingStars--smaller',
	), $__vars) . '
								</li>
								<li><a href="' . $__templater->func('link', array('ams/review', $__vars['review'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['review']['rating_date'], array(
	))) . '</a></li>
							</ul>
						</div>

						';
	if ($__vars['review']['rating_state'] == 'deleted') {
		$__finalCompiled .= '
							<div class="messageNotice messageNotice--deleted">
								' . $__templater->callMacro('deletion_macros', 'notice', array(
			'log' => $__vars['review']['DeletionLog'],
		), $__vars) . '
							</div>
						';
	} else if ($__vars['review']['rating_state'] == 'moderated') {
		$__finalCompiled .= '
							<div class="messageNotice messageNotice--moderated">
								' . 'Bài viết này đang chờ phê duyệt của người kiểm duyệt và không nhìn thấy được đối với khách truy cập bình thường.' . '
							</div>
						';
	}
	$__finalCompiled .= '
						';
	if ($__vars['review']['warning_message']) {
		$__finalCompiled .= '
							<div class="messageNotice messageNotice--warning">
								' . $__templater->escape($__vars['review']['warning_message']) . '
							</div>
						';
	}
	$__finalCompiled .= '
						';
	if ($__templater->method($__vars['review'], 'isIgnored', array())) {
		$__finalCompiled .= '
							<div class="messageNotice messageNotice--ignored">
								' . 'Bạn đang bỏ qua nội dung bởi thành viên này.' . '
							</div>
						';
	}
	$__finalCompiled .= '

						<div class="message-userContent lbContainer js-lbContainer"
							data-lb-id="review-' . $__templater->escape($__vars['review']['rating_id']) . '"
							data-lb-caption-desc="' . (($__vars['review']['is_anonymous'] ? 'Vô danh' : $__templater->escape($__vars['review']['User']['username'])) ?: $__templater->escape($__vars['review']['username'])) . ' &middot; ' . $__templater->func('date_time', array($__vars['review']['rating_date'], ), true) . '">

							' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
		'type' => 'ams_reviews',
		'group' => 'top',
		'onlyInclude' => $__vars['category']['review_field_cache'],
		'set' => $__vars['review']['custom_fields'],
		'wrapperClass' => 'ams-review-fields ams-review-fields--top',
	), $__vars) . '

							';
	if ($__vars['review']['pros']) {
		$__finalCompiled .= '
								<div class="message-body ams-pros-container">
									<span class="pros-header">' . 'Pros' . '</span>: <span class="pros-text">' . $__templater->func('structured_text', array($__vars['review']['pros'], ), true) . '</span>
								</div>
							';
	}
	$__finalCompiled .= '

							';
	if ($__vars['review']['cons']) {
		$__finalCompiled .= '
								<div class="message-body ams-cons-container">
									<span class="cons-header">' . 'Cons' . '</span>: <span class="cons-text">' . $__templater->func('structured_text', array($__vars['review']['cons'], ), true) . '</span>
								</div>
							';
	}
	$__finalCompiled .= '

							' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
		'type' => 'ams_reviews',
		'group' => 'middle',
		'onlyInclude' => $__vars['category']['review_field_cache'],
		'set' => $__vars['review']['custom_fields'],
		'wrapperClass' => 'ams-review-fields ams-review-fields--middle',
	), $__vars) . '

							<article class="message-body">
								' . $__templater->func('bb_code', array($__vars['review']['message'], 'ams_rating', $__vars['review'], ), true) . '
							</article>

							' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
		'type' => 'ams_reviews',
		'group' => 'bottom',
		'onlyInclude' => $__vars['category']['review_field_cache'],
		'set' => $__vars['review']['custom_fields'],
		'wrapperClass' => 'ams-review-fields ams-review-fields--bottom',
	), $__vars) . '

							';
	if ($__vars['review']['attach_count'] AND $__vars['showAttachments']) {
		$__finalCompiled .= '
								' . $__templater->callMacro('message_macros', 'attachments', array(
			'attachments' => $__vars['review']['Attachments'],
			'message' => $__vars['review'],
			'canView' => $__templater->method($__vars['review'], 'canViewAttachments', array()),
		), $__vars) . '
							';
	}
	$__finalCompiled .= '
						</div>

						';
	if ($__vars['review']['last_edit_date']) {
		$__finalCompiled .= '
							<div class="message-lastEdit">
								';
		if ($__vars['review']['user_id'] == $__vars['review']['last_edit_user_id']) {
			$__finalCompiled .= '
									' . 'Sửa lần cuối' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['review']['last_edit_date'], array(
			))) . '
								';
		} else {
			$__finalCompiled .= '
									' . 'Sửa bởi Amin' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['review']['last_edit_date'], array(
			))) . '
								';
		}
		$__finalCompiled .= '
							</div>
						';
	}
	$__finalCompiled .= '
					</div>

					';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
								';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
										' . $__templater->func('react', array(array(
		'content' => $__vars['review'],
		'link' => 'ams/review/react',
		'list' => '< .js-review | .js-reactionsList',
	))) . '
										';
	if ($__templater->method($__vars['review'], 'canReply', array())) {
		$__compilerTemp2 .= '
											<a class="actionBar-action actionBar-action--reply js-replyTrigger-' . $__templater->escape($__vars['review']['rating_id']) . '"
												data-xf-click="toggle"
												data-target=".js-commentsTarget-' . $__templater->escape($__vars['review']['rating_id']) . '"
												role="button"
												tabindex="0">
												' . 'Trả lời' . '
											</a>
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
	if ($__templater->method($__vars['review'], 'canUseInlineModeration', array())) {
		$__compilerTemp3 .= '
											<span class="actionBar-action actionBar-action--inlineMod">
												' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['review']['rating_id'],
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
	if ($__templater->method($__vars['review'], 'canReport', array())) {
		$__compilerTemp3 .= '
											<a href="' . $__templater->func('link', array('ams/review/report', $__vars['review'], ), true) . '" 
												class="actionBar-action actionBar-action--report" 
												data-xf-click="overlay">' . 'Báo cáo' . '</a>
										';
	}
	$__compilerTemp3 .= '

										';
	$__vars['hasActionBarMenu'] = false;
	$__compilerTemp3 .= '
										';
	if ($__templater->method($__vars['review'], 'canEdit', array())) {
		$__compilerTemp3 .= '
											';
		$__templater->includeJs(array(
			'src' => 'xf/message.js',
			'min' => '1',
		));
		$__compilerTemp3 .= '
											<a href="' . $__templater->func('link', array('ams/review/edit', $__vars['review'], ), true) . '"
												class="actionBar-action actionBar-action--edit actionBar-action--menuItem"
												data-xf-click="quick-edit"
												data-editor-target="#js-review-' . $__templater->escape($__vars['review']['rating_id']) . ' .js-quickEditTarget"
												data-menu-closer="true">' . 'Chỉnh sửa' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
										';
	}
	$__compilerTemp3 .= '
										';
	if ($__vars['review']['edit_count'] AND $__templater->method($__vars['review'], 'canViewHistory', array())) {
		$__compilerTemp3 .= '
											<a href="' . $__templater->func('link', array('ams/review/history', $__vars['review'], ), true) . '" 
												class="actionBar-action actionBar-action--history actionBar-action--menuItem"
												data-xf-click="toggle"
												data-target="#js-review-' . $__templater->escape($__vars['review']['rating_id']) . ' .js-historyTarget"
												data-menu-closer="true">' . 'Lịch sử' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
										';
	}
	$__compilerTemp3 .= '
										';
	if ($__templater->method($__vars['review'], 'canDelete', array('soft', ))) {
		$__compilerTemp3 .= '
											<a href="' . $__templater->func('link', array('ams/review/delete', $__vars['review'], ), true) . '" 
												class="actionBar-action actionBar-action--delete actionBar-action--menuItem" 
												data-xf-click="overlay">' . 'Xóa' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
										';
	}
	$__compilerTemp3 .= '
										';
	if (($__vars['review']['rating_state'] == 'deleted') AND $__templater->method($__vars['review'], 'canUndelete', array())) {
		$__compilerTemp3 .= ' 
											<a href="' . $__templater->func('link', array('ams/review/undelete', $__vars['review'], array('t' => $__templater->func('csrf_token', array(), false), ), ), true) . '" 
												class="actionBar-action actionBar-action--undelete actionBar-action--menuItem">' . 'Khôi phục' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
										';
	}
	$__compilerTemp3 .= '
										';
	if ($__templater->method($__vars['review'], 'canReassign', array())) {
		$__compilerTemp3 .= '
											<a href="' . $__templater->func('link', array('ams/review/reassign', $__vars['review'], ), true) . '" 
												class="actionBar-action actionBar-action--reassign actionBar-action--menuItem" 
												data-xf-click="overlay">' . 'Chỉ định' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
										';
	}
	$__compilerTemp3 .= '
										';
	if ($__templater->method($__vars['review'], 'canChangeDate', array())) {
		$__compilerTemp3 .= '
											<a href="' . $__templater->func('link', array('ams/review/change-date', $__vars['review'], ), true) . '" 
												class="actionBar-action actionBar-action--date actionBar-action--menuItem" 
												data-xf-click="overlay">' . 'Change date' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
										';
	}
	$__compilerTemp3 .= '									
										';
	if ($__templater->method($__vars['review'], 'canCleanSpam', array())) {
		$__compilerTemp3 .= '
											<a href="' . $__templater->func('link', array('spam-cleaner', $__vars['review'], ), true) . '" 
												class="actionBar-action actionBar-action--spam actionBar-action--menuItem" 
												data-xf-click="overlay">' . 'Spam' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
										';
	}
	$__compilerTemp3 .= '
										';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewIps', array()) AND $__vars['review']['ip_id']) {
		$__compilerTemp3 .= '
											<a href="' . $__templater->func('link', array('ams/review/ip', $__vars['review'], ), true) . '" 
												class="actionBar-action actionBar-action--ip actionBar-action--menuItem" 
												data-xf-click="overlay">' . 'IP' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
										';
	}
	$__compilerTemp3 .= '
										';
	if ($__templater->method($__vars['review'], 'canWarn', array())) {
		$__compilerTemp3 .= '
											<a href="' . $__templater->func('link', array('ams/review/warn', $__vars['review'], ), true) . '" 
												class="actionBar-action actionBar-action--warn actionBar-action--menuItem">' . 'Cảnh cáo' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
										';
	} else if ($__vars['review']['warning_id'] AND $__templater->method($__vars['xf']['visitor'], 'canViewWarnings', array())) {
		$__compilerTemp3 .= ' 
											<a href="' . $__templater->func('link', array('warnings', array('warning_id' => $__vars['review']['warning_id'], ), ), true) . '" 
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

					<div class="reactionsBar js-reactionsList ' . ($__vars['review']['reactions'] ? 'is-active' : '') . '">
						' . $__templater->func('reactions', array($__vars['review'], 'ams/review/reactions', array())) . '
					</div>

					<div class="js-historyTarget toggleTarget" data-href="trigger-href"></div>

					';
	$__compilerTemp4 = '';
	$__compilerTemp4 .= '

							';
	if ($__vars['review']['author_response']) {
		$__compilerTemp4 .= '
								' . $__templater->callMacro(null, 'author_reply_row', array(
			'review' => $__vars['review'],
			'article' => $__vars['article'],
		), $__vars) . '
							';
	} else if ($__templater->method($__vars['review'], 'canReply', array())) {
		$__compilerTemp4 .= '
								<div class="js-replyNewMessageContainer"></div>
							';
	}
	$__compilerTemp4 .= '

							';
	if ($__templater->method($__vars['review'], 'canReply', array())) {
		$__compilerTemp4 .= '
								';
		$__templater->includeJs(array(
			'src' => 'xf/message.js',
			'min' => '1',
		));
		$__compilerTemp4 .= '
								<div class="message-responseRow js-commentsTarget-' . $__templater->escape($__vars['review']['rating_id']) . ' toggleTarget">
									' . $__templater->form('

										<div class="comment-inner">
											<span class="comment-avatar">
												' . $__templater->func('avatar', array($__vars['xf']['visitor'], 'xxs', false, array(
		))) . '
											</span>
											<div class="comment-main">
												' . $__templater->formTextArea(array(
			'name' => 'message',
			'rows' => '1',
			'autosize' => 'true',
			'maxlength' => $__vars['xf']['options']['messageMaxLength'],
			'data-toggle-autofocus' => '1',
			'class' => 'comment-input js-editor',
		)) . '
												<div>
													' . $__templater->button('Gửi trả lời', array(
			'type' => 'submit',
			'class' => 'button--primary button--small',
			'icon' => 'reply',
		), '', array(
		)) . '
												</div>
											</div>
										</div>
									', array(
			'action' => $__templater->func('link', array('ams/review/reply', $__vars['review'], ), false),
			'ajax' => 'true',
			'class' => 'comment',
			'data-xf-init' => 'quick-reply',
			'data-message-container' => '< .js-messageResponses | .js-replyNewMessageContainer',
			'data-submit-hide' => '.js-commentsTarget-' . $__vars['review']['rating_id'] . ', .js-replyTrigger-' . $__vars['review']['rating_id'],
		)) . '
								</div>
							';
	}
	$__compilerTemp4 .= '

						';
	if (strlen(trim($__compilerTemp4)) > 0) {
		$__finalCompiled .= '
						<div class="message-responses js-messageResponses">
						' . $__compilerTemp4 . '
						</div>
					';
	}
	$__finalCompiled .= '
				</div>
			</div>

			';
	$__compilerTemp5 = '';
	$__compilerTemp5 .= '
							';
	if ($__templater->method($__vars['review'], 'isContentVotingSupported', array())) {
		$__compilerTemp5 .= '
								' . $__templater->callMacro('content_vote_macros', 'vote_control', array(
			'link' => 'ams/review/vote',
			'content' => $__vars['review'],
		), $__vars) . '
							';
	}
	$__compilerTemp5 .= '
						';
	if (strlen(trim($__compilerTemp5)) > 0) {
		$__finalCompiled .= '
				<div class="message-cell message-cell--vote">
					<div class="message-column">
						' . $__compilerTemp5 . '
					</div>
				</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'author_reply_row' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'review' => '!',
		'article' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	
	<div class="message-responseRow">
		<div class="comment">
			<div class="comment-inner">
				<span class="comment-avatar">
					' . $__templater->func('avatar', array($__vars['article']['User'], 'xxs', false, array(
		'defaultname' => $__vars['article']['username'],
	))) . '
				</span>
				<div class="comment-main">
					<div class="comment-content">
						<div class="comment-contentWrapper">
							' . $__templater->func('username_link', array($__vars['article']['User'], true, array(
		'defaultname' => $__vars['article']['username'],
		'class' => 'comment-user',
	))) . '
							<div class="comment-body">' . $__templater->func('structured_text', array($__vars['review']['author_response'], ), true) . '</div>
							';
	if ($__templater->method($__vars['article'], 'canViewContributors', array()) AND ($__vars['review']['author_response_contributor_user_id'] AND ($__vars['review']['author_response_contributor_user_id'] != $__vars['article']['user_id']))) {
		$__finalCompiled .= '
								<div class="comment-note">(' . 'Response by' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('username_link', array($__vars['review']['AuthorResponseContributorUser'], false, array(
			'defaultname' => $__vars['review']['author_response_contributor_username'],
		))) . ')</div>
							';
	}
	$__finalCompiled .= '
						</div>
					</div>

					<div class="comment-actionBar actionBar">
						<div class="actionBar-set actionBar-set--internal">
							';
	if ($__templater->method($__vars['review'], 'canDeleteAuthorResponse', array())) {
		$__finalCompiled .= '
								<a href="' . $__templater->func('link', array('ams/review/reply-delete', $__vars['review'], ), true) . '"
									class="actionBar-action actionBar-action--delete actionBar-action--menuItem"
									data-xf-click="overlay">
									' . 'Xóa' . '
								</a>
							';
	}
	$__finalCompiled .= '
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'review_simple' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'review' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	
	<div class="contentRow">
		<div class="contentRow-figure">
			' . $__templater->func('avatar', array(($__vars['review']['is_anonymous'] ? null : $__vars['review']['User']), 'xxs', false, array(
	))) . '
		</div>
		
		<div class="contentRow-main contentRow-main--close">
			<a href="' . $__templater->func('link', array('ams/review', $__vars['review'], ), true) . '">' . $__templater->func('prefix', array('ams_article', $__vars['review']['Article'], ), true) . $__templater->escape($__vars['review']['Article']['title']) . '</a>

			<div class="contentRow-snippet contentRow-lesser">
				' . $__templater->callMacro('rating_macros', 'stars', array(
		'rating' => $__vars['review']['rating'],
	), $__vars) . '
			</div>
			
			<div class="contentRow-snippet">
				' . $__templater->func('smilie', array($__templater->func('snippet', array($__vars['review']['message'], 150, array('stripBbCode' => true, 'stripQuote' => true, ), ), false), ), true) . '
			</div>			

			<div class="contentRow-minor contentRow-minor--smaller">
				<ul class="listInline listInline--bullet">
					<li>
						';
	if ($__vars['review']['is_anonymous']) {
		$__finalCompiled .= '
							' . 'Vô danh' . '
						';
	} else {
		$__finalCompiled .= '
							' . ($__templater->escape($__vars['review']['User']['username']) ?: $__templater->escape($__vars['review']['username'])) . '
						';
	}
	$__finalCompiled .= '
					</li>
					<li>' . $__templater->func('date_dynamic', array($__vars['review']['rating_date'], array(
	))) . '</li>
				</ul>
			</div>
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'rating' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'rating' => '!',
		'article' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__templater->includeCss('xa_ams_review.less');
	$__finalCompiled .= '

	<div class="ams-review message message--simple' . ($__templater->method($__vars['rating'], 'isIgnored', array()) ? ' is-ignored' : '') . '"
		data-author="' . ($__templater->escape($__vars['rating']['User']['username']) ?: $__templater->escape($__vars['rating']['username'])) . '"
		data-content="review-' . $__templater->escape($__vars['rating']['rating_id']) . '"
		id="js-review-' . $__templater->escape($__vars['rating']['rating_id']) . '">

		<span class="u-anchorTarget" id="review-' . $__templater->escape($__vars['rating']['rating_id']) . '"></span>

		<div class="message-inner">
			<span class="message-cell message-cell--user">
				' . $__templater->callMacro('message_macros', 'user_info_simple', array(
		'user' => $__vars['rating']['User'],
		'fallbackName' => 'Thành viên đã bị xoá',
	), $__vars) . '
			</span>
			<div class="message-cell message-cell--main">
				<div class="message-content js-messageContent">
					<div class="message-attribution message-attribution--plain">
						<ul class="listInline listInline--bullet">
							<li class="message-attribution-user">
								' . $__templater->func('username_link', array($__vars['rating']['User'], false, array(
		'defaultname' => 'Thành viên đã bị xoá',
	))) . '
							</li>
							<li>
								' . $__templater->callMacro('rating_macros', 'stars', array(
		'rating' => $__vars['rating']['rating'],
		'class' => 'ratingStars--smaller',
	), $__vars) . '
							</li>
							<li><a href="" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['rating']['rating_date'], array(
	))) . '</a></li>
						</ul>
					</div>
				</div>

				';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
							';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
									';
	if ($__templater->method($__vars['rating'], 'canDelete', array('hard', ))) {
		$__compilerTemp2 .= '
										<a href="' . $__templater->func('link', array('ams/review/delete-rating', $__vars['rating'], ), true) . '" 
											class="actionBar-action actionBar-action--delete" 
											data-xf-click="overlay">' . 'Xóa' . '</a>
									';
	}
	$__compilerTemp2 .= '
								';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__compilerTemp1 .= '
								<div class="actionBar-set actionBar-set--internal">
								' . $__compilerTemp2 . '
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

' . '

' . '

';
	return $__finalCompiled;
}
);