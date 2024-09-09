<?php
// FROM HASH: fbe4f4fbafa70926b5cf8a62568210fb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Restart import' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['title']));
	$__finalCompiled .= '

<div class="blocks">
	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Nhập đang chờ xử lý từ ' . $__templater->escape($__vars['title']) . ' đã được tìm thấy. Bạn có thể khởi động lại nhập này bằng cách sử dụng nút dưới đây.' . '
				', array(
		'rowtype' => 'confirm',
	)) . '
			</div>
			' . $__templater->formSubmitRow(array(
		'submit' => 'Restart import',
	), array(
		'rowtype' => 'simple',
	)) . '
		</div>
	', array(
		'action' => $__templater->func('link', array('import/run', ), false),
		'class' => 'block',
	)) . '

	<div class="blocks-textJoiner"><span></span><em>' . 'Hoặc' . '</em><span></span></div>

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Ngoài ra, bạn có thể hủy việc nhập này để bắt đầu một việc nhập dữ liệu mới.' . '

					<div>
						' . $__templater->formCheckBox(array(
		'standalone' => 'true',
	), array(array(
		'name' => 'confirm',
		'data-xf-init' => 'disabler',
		'data-container' => '.js-submitDisable',
		'label' => '
								' . 'Xác nhận hành động' . '
							',
		'_type' => 'option',
	))) . '
					</div>
				', array(
		'rowtype' => 'confirm',
	)) . '
			</div>
			' . $__templater->formSubmitRow(array(
		'submit' => 'Cancel import',
	), array(
		'rowtype' => 'simple',
		'rowclass' => 'js-submitDisable',
	)) . '
		</div>
	', array(
		'action' => $__templater->func('link', array('import/cancel', ), false),
		'class' => 'block',
	)) . '
</div>';
	return $__finalCompiled;
}
);