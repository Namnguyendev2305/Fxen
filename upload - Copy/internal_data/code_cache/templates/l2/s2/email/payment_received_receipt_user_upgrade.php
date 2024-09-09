<?php
// FROM HASH: fdd61de73981c6c9d6ceed96a9ffe556
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>' . 'Biên nhận nâng cấp tài khoản của bạn tại ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '' . '</mail:subject>

<p>' . 'Cảm ơn bạn đã mua gói nâng cấp tài khoản tại <a href="' . $__templater->func('link', array('canonical:index', ), true) . '">' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '</a>.' . '</p>

<table border="0" width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td><b>' . 'Mục đã mua' . '</b></td>
	<td align="right"><b>' . 'Giá' . '</b></td>
</tr>
<tr>
	<td><a href="' . $__templater->func('link', array('canonical:account/upgrades', ), true) . '">' . $__templater->escape($__vars['purchasable']['title']) . '</a></td>
	<td align="right">' . $__templater->escape($__templater->method($__vars['purchasable']['purchasable'], 'getCostPhraseForPurchaseRequest', array($__vars['purchaseRequest'], ))) . '</td>
</tr>
</table>

<p><a href="' . $__templater->func('link', array('canonical:account/upgrades', ), true) . '" class="button">' . 'Quản lý nâng cấp tài khoản của bạn' . '</a></p>

';
	if ($__templater->method($__vars['xf']['toUser'], 'canUseContactForm', array())) {
		$__finalCompiled .= '
	<p>' . 'Cám ơn vì bạn đã thanh toán. Nếu bạn có thắc mắc, vui lòng <a href="' . $__templater->func('link', array('canonical:misc/contact', ), true) . '">liên hệ với chúng tôi</a>.' . '</p>
';
	} else {
		$__finalCompiled .= '
	<p>' . 'Cám ơn vì bạn đã thanh toán.' . '</p>
';
	}
	return $__finalCompiled;
}
);