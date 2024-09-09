<?php
// FROM HASH: 6ef85e85dead8f56c8f0d9a537da0929
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Manage watched forums');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['state'] == 'delete') {
		$__compilerTemp1 .= '
					' . 'Bạn có chắc chắn muốn dừng theo dõi <b>tất cả</b> diễn đàn không?' . '
				';
	} else {
		$__compilerTemp1 .= '
					' . 'Bạn có chắc chắn muốn cập nhật cài đặt thông báo email cho <b>tất cả</b> diễn đàn không?' . '
				';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-row">
			' . $__templater->formInfoRow('
				' . $__compilerTemp1 . '
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Tiến hành',
		'icon' => 'notificationsOff',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('watched/forums/manage', null, array('state' => $__vars['state'], ), ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);