<?php
// FROM HASH: 1357ffdb245356d57b9710fbbd52484b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Xác nhận hành động');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Tính năng này sẽ cố gắng tự động nhập các thay đổi mẫu tùy chỉnh của bạn với bất kỳ bản cập nhật nào cho mẫu mà họ dựa vào. Vì đây là quy trình tự động nên bạn nên kiểm tra mẫu tùy chỉnh của mình sau khi hợp nhất để đảm bảo rằng chúng là chính xác.' . '
				<strong>' . 'Nếu xung đột được phát hiện trong khi cố gắng hợp nhất, không có sự hợp nhất tự động sẽ xảy ra. Bạn sẽ cần tự giải quyết xung đột.' . '</strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Gộp',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
	' . $__templater->func('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->func('link', array('templates/auto-merge', ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);