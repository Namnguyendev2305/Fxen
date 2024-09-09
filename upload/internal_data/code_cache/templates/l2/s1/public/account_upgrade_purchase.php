<?php
// FROM HASH: a1deabe2fc0be951f32f68089f0d152e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Thanks for your purchase!');
	$__finalCompiled .= '

';
	$__templater->wrapTemplate('account_wrapper', $__vars);
	$__finalCompiled .= '

<div class="blockMessage">' . 'Cảm ơn bạn đã nâng cấp.<br />
<br />
Sau khi thanh toán được xác nhận, tài khoản của bạn sẽ được nâng cấp.' . '</div>';
	return $__finalCompiled;
}
);