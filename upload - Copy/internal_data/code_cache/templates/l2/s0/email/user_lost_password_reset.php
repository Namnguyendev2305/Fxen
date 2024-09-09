<?php
// FROM HASH: 6a6e960870eceea8d4ad7ada1ec3800b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . '' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' - Đặt lại mật khẩu' . '
</mail:subject>

' . '<p>' . $__templater->escape($__vars['user']['username']) . ', mật khẩu của bạn tại ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . ' đã được đặt lại. Bây giờ bạn có thể đăng nhập bằng mật khẩu mới.</p>' . '

<p><a href="' . $__templater->func('link', array('canonical:index', ), true) . '" class="button">' . 'Đăng nhập' . '</a></p>';
	return $__finalCompiled;
}
);