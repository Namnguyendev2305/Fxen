<?php
// FROM HASH: 3ed1030f3e26a61f161599591b046d7b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Thông tin địa chỉ IP của khách trực tuyến');
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped('Đang truy cập'), $__templater->func('link', array('online', ), false), array(
	));
	$__finalCompiled .= '

' . $__templater->callMacro('helper_ip', 'ip_block', array(
		'ip' => $__vars['ip'],
	), $__vars);
	return $__finalCompiled;
}
);