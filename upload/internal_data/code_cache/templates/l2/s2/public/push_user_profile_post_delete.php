<?php
// FROM HASH: 96b7808a8eac0e3d902ba3f5802ab2ee
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
	' . 'Trạng thái của bạn cho ' . $__templater->escape($__vars['extra']['profileUser']) . ' đã bị xóa.' . '
	<push:url>' . $__templater->func('base_url', array($__vars['extra']['profileLink'], 'canonical', ), true) . '</push:url>
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