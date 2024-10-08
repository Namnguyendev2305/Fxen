<?php
// FROM HASH: 24b4d8f209c4bae1913dc8adf3b3dd82
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
				' . 'Vui lòng xác nhận rằng bạn muốn xóa thành viên dưới đây dưới dạng quản trị viên' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('admins/edit', $__vars['admin'], ), true) . '">' . $__templater->escape($__vars['admin']['username']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->formPasswordBoxRow(array(
		'name' => 'visitor_password',
	), array(
		'label' => 'Mật khẩu của bạn',
		'explain' => 'Bạn phải nhập mật khẩu hiện tại để hợp thức hóa yêu cầu này.',
	)) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
	)) . '
	</div>

', array(
		'action' => $__templater->func('link', array('admins/delete', $__vars['admin'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);