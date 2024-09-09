<?php
// FROM HASH: 0ae5917a1ec0e04d2906f3d48a5e25d1
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Quản lý các chủ đề theo dõi');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['state'] == 'delete') {
		$__compilerTemp1 .= '
					' . 'Bạn có chắc chắn muốn ngừng theo dõi <b>tất cả</b> các chủ đề?' . '
				';
	} else {
		$__compilerTemp1 .= '
					' . 'Bạn có chắn chắn muốn cập nhật cài đặt thông báo email cho <b>tất cả</b> chủ đề?' . '
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
		'action' => $__templater->func('link', array('watched/threads/manage', null, array('state' => $__vars['state'], ), ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);