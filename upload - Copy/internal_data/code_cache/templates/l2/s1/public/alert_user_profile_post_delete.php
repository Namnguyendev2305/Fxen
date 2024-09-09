<?php
// FROM HASH: 815417d69d9aa3edba05b7a8327945f6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['extra']['profileUserId'] == $__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
	' . '<a href="{link}">Cập nhật trạng thái</a> của bạn đã bị xóa.' . '
';
	} else {
		$__finalCompiled .= '
	' . 'Trạng thái của bạn cho ' . (((('<a href="' . $__templater->func('base_url', array($__vars['extra']['profileLink'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['extra']['profileUser'])) . '</a>') . ' đã bị xóa.' . '
';
	}
	$__finalCompiled .= '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Lý do' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	return $__finalCompiled;
}
);