<?php
// FROM HASH: c1c6f62979bd3c293fa1ae116e26dfba
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . 'Tài khoản đã được phê duyệt trên ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '' . '
</mail:subject>

' . '<p>' . $__templater->escape($__vars['user']['username']) . ', tài khoản bạn đăng ký tại ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . ' hiện đã được chấp thuận. Bây giờ bạn có thể truy cập trang web của chúng tôi như một thành viên đã đăng ký. </p>' . '

<h2>' . '<a href="' . $__templater->func('link', array('canonical:index', ), true) . '">Truy cập ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '</a>' . '</h2>';
	return $__finalCompiled;
}
);