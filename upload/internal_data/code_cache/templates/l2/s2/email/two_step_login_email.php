<?php
// FROM HASH: 7fe42d9e26ffce7b5691e135aa0dc1ba
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>' . '' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' - Xác nhận đăng nhập' . '</mail:subject>

' . '<p>Chào ' . $__templater->escape($__vars['user']['username']) . ',</p>

<p>Để hoàn tất việc đăng nhập vào tài khoản của bạn (hoặc để hoàn thành thiết lập xác minh hai bước) tại ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . ', bạn phải nhập mã sau đây:</p>' . '

<h2>' . $__templater->escape($__vars['code']) . '</h2>

' . 'Mã này có hiệu lực trong 15 phút<br />
<br />
Đăng nhập đã được yêu cầu thông qua IP ' . $__templater->escape($__vars['ip']) . '. Nếu bạn không yêu cầu, bạn nên thay đổi mật khẩu khẩn cấp.</p>';
	return $__finalCompiled;
}
);