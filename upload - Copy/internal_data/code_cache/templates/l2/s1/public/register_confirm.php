<?php
// FROM HASH: 14ba5689ba2ab56aaf8d763f69700811
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->setPageParam('head.' . 'robots', $__templater->preEscaped('<meta name="robots" content="noindex" />'));
	$__finalCompiled .= '

<div class="blockMessage">
	';
	if ($__vars['xf']['visitor']['user_state'] == 'moderated') {
		$__finalCompiled .= '
		' . 'Your email has been confirmed. Your registration must now be approved by an administrator. You will receive an email when a decision has been taken.' . '
	';
	} else if (($__templater->method($__vars['xf']['visitor'], 'getPreviousValue', array('user_state', )) == 'email_confirm_edit')) {
		$__finalCompiled .= '
		' . 'Email của bạn đã được xác nhận và tài khoản của bạn đã được kích hoạt đầy đủ trở lại.' . '
	';
	} else {
		$__finalCompiled .= '
		' . 'Email của bạn đã được xác nhận và việc đăng ký của bạn đã hoàn tất.' . '
	';
	}
	$__finalCompiled .= '

	';
	if ($__vars['preRegContentUrl']) {
		$__finalCompiled .= '
		<br />
		<br />
		' . 'The content you created before registering has been posted automatically.' . '
		<div style="margin-top: .5em">
			' . $__templater->button('View your content', array(
			'href' => $__vars['preRegContentUrl'],
		), '', array(
		)) . '
		</div>
	';
	}
	$__finalCompiled .= '

	<ul>
		';
	if ($__vars['redirect']) {
		$__finalCompiled .= '<li><a href="' . $__templater->escape($__vars['redirect']) . '">' . 'Return to the page you were viewing' . '</a></li>';
	}
	$__finalCompiled .= '
		<li><a href="' . $__templater->func('link', array('index', ), true) . '">' . 'Trở về trang chủ diễn đàn' . '</a></li>
		';
	if ($__templater->method($__vars['xf']['visitor'], 'canEditProfile', array())) {
		$__finalCompiled .= '
			<li><a href="' . $__templater->func('link', array('account', ), true) . '">' . 'Sửa chi tiết tài khoản của bạn' . '</a></li>
		';
	}
	$__finalCompiled .= '
	</ul>
</div>';
	return $__finalCompiled;
}
);