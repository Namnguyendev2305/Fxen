<?php
// FROM HASH: c291453f47a2ced89cba08a90d0dc8cc
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Cố gắng gửi email đến ' . $__templater->filter($__vars['xf']['visitor']['email'], array(array('email_display', array()),), true) . ' đã thất bại. Hãy cập nhật email của bạn.' . '<br />
<a href="' . $__templater->func('link', array('account/email', ), true) . '">' . 'Update your contact details' . '</a>';
	return $__finalCompiled;
}
);