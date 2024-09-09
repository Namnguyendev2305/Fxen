<?php
// FROM HASH: ac8c867f0b803afda8539298e787361e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['xf']['cookieConsent'], 'getMode', array()) == 'advanced') {
		$__finalCompiled .= '
	<div class="u-pageCentered">
		' . $__templater->callMacro(null, 'misc_cookies::cookie_consent_form', array(), $__vars) . '
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="u-alignCenter">
		' . 'Trang web này sử dụng cookie để giúp cá nhân hóa nội dung, điều chỉnh trải nghiệm của bạn và giúp bạn luôn đăng nhập nếu bạn đăng ký thành viên.<br />
Bằng cách tiếp tục sử dụng trang web này, bạn đồng ý với việc chúng tôi sử dụng cookie.' . '
	</div>

	<div class="u-inputSpacer u-alignCenter">
		' . $__templater->button('Chấp nhận', array(
			'icon' => 'confirm',
			'href' => $__templater->func('link', array('account/dismiss-notice', null, array('notice_id' => $__vars['notice']['notice_id'], ), ), false),
			'class' => 'js-noticeDismiss button--notice',
		), '', array(
		)) . '
		' . $__templater->button('Tìm hiểu thêm.' . $__vars['xf']['language']['ellipsis'], array(
			'href' => $__templater->func('link', array('help/cookies', ), false),
			'class' => 'button--notice',
		), '', array(
		)) . '
	</div>
';
	}
	return $__finalCompiled;
}
);