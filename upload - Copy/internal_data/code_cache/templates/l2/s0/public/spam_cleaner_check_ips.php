<?php
// FROM HASH: 69ca356c8cf0dd9d0ef253c4f529dd56
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Kiểm tra địa chỉ IP thành viên spam');
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped($__templater->escape($__vars['user']['username'])), $__templater->func('link', array('full:members', $__vars['user'], ), false), array(
	));
	$__finalCompiled .= '
';
	$__templater->breadcrumb($__templater->preEscaped('Dọn dẹp spam'), $__templater->func('link', array('full:spam-cleaner', $__vars['user'], ), false), array(
	));
	$__finalCompiled .= '

' . $__templater->callMacro('member_shared_ips_list', 'shared_block', array(
		'user' => $__vars['spammer'],
		'shared' => $__vars['shared'],
	), $__vars);
	return $__finalCompiled;
}
);