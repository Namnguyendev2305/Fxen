<?php
// FROM HASH: fc834779b322dedf81c8173d22c1745e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Tìm nhật ký nhà cung cấp thanh toán');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array(array(
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Tất cả' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp1 = $__templater->mergeChoiceOptions($__compilerTemp1, $__vars['profiles']);
	$__compilerTemp2 = array(array(
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Tất cả' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp2 = $__templater->mergeChoiceOptions($__compilerTemp2, $__vars['purchasables']);
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'purchase_request_key',
	), array(
		'label' => 'Purchase request key',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'transaction_id',
	), array(
		'label' => 'Transaction ID',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'subscriber_id',
	), array(
		'label' => 'Subscriber ID',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'username',
		'ac' => 'single',
	), array(
		'label' => 'Thành viên',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'payment_profile_id',
	), $__compilerTemp1, array(
		'label' => 'Tài khoản thanh toán',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'purchasable_type_id',
	), $__compilerTemp2, array(
		'label' => 'Purchasable type',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'search',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('logs/payment-provider', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);