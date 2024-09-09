<?php
// FROM HASH: faa943c4749072dae44bb3f53a4c2b4f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . '' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '  - Yêu cầu xác nhận tài khoản' . '
</mail:subject>

' . '<p>' . $__templater->escape($__vars['user']['username']) . ', để hoàn tất đăng ký hoặc kích hoạt lại tài khoản của bạn tại ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . ', bạn cần phải xác nhận địa chỉ email bằng cách nhấp vào nút bên dưới.</p>' . '

<p><a href="' . $__templater->func('link', array('canonical:account-confirmation/email', $__vars['user'], array('c' => $__vars['confirmation']['confirmation_key'], ), ), true) . '" class="button">' . 'Xác nhận email của bạn' . '</a></p>';
	return $__finalCompiled;
}
);