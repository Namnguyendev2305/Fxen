<?php
// FROM HASH: 95457daa9a83a5c860195f22b557991f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['extra']['profileUserId'] == $__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
	' . '<a href="' . $__templater->func('base_url', array($__vars['extra']['link'], ), true) . '">Cập nhật trạng thái</a> của bạn đã bị sửa.' . '
';
	} else {
		$__finalCompiled .= '
	' . 'Trạng thái của bạn trên hồ sơ ' . (((('<a href="' . $__templater->func('base_url', array($__vars['extra']['link'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['extra']['profileUser'])) . '</a>') . '\'s đã được chỉnh sửa.' . '
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