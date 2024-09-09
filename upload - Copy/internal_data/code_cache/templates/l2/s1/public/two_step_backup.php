<?php
// FROM HASH: abd0dae0788503fb0a12ad235cc7f4c5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formInfoRow('Mã dự phòng có thể được sử dụng khi bạn không có quyền truy cập vào phương pháp xác minh thay thế. Khi mã dự phòng được sử dụng, nó sẽ không còn được sử dụng nữa. Bạn sẽ nhận được một email khi bạn đăng nhập bằng mã dự phòng.', array(
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'code',
		'autofocus' => 'autofocus',
		'inputmode' => 'numeric',
		'pattern' => '[0-9\\s]*',
	), array(
		'label' => 'Mã dự phòng',
	));
	return $__finalCompiled;
}
);