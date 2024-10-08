<?php
// FROM HASH: f8c17ae74e1ac7b3fc36966a09cabb11
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Cập nhật chủ đề hàng loạt');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__vars['threadIds']) {
		$__compilerTemp1 .= '
					<span role="presentation" aria-hidden="true">&middot;</span>
					<a href="' . $__templater->func('link', array('threads/list', null, array('criteria' => $__vars['criteria'], 'all' => true, ), ), true) . '">' . 'Xem hoặc lọc lại' . '</a>
				';
	}
	$__compilerTemp2 = array(array(
		'value' => '0',
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['forums'])) {
		foreach ($__vars['forums'] AS $__vars['forum']) {
			$__compilerTemp2[] = array(
				'value' => $__vars['forum']['value'],
				'label' => $__templater->escape($__vars['forum']['label']),
				'disabled' => $__vars['forum']['disabled'],
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp3 = '';
	if ($__vars['hasPrefixes']) {
		$__compilerTemp3 .= '
					' . 'If the selected thread(s) have any prefixes applied which are not valid in the selected forum, those prefixes will be removed.' . '
				';
	}
	$__compilerTemp4 = array(array(
		'value' => '',
		'_type' => 'option',
	));
	$__compilerTemp4 = $__templater->mergeChoiceOptions($__compilerTemp4, $__vars['threadTypes']);
	$__compilerTemp5 = '';
	if ($__vars['prefixes']['prefixesGrouped']) {
		$__compilerTemp5 .= '
				' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'actions[apply_thread_prefix]',
			'label' => 'Đặt tiền tố',
			'_dependent' => array('
							' . $__templater->callMacro('public:prefix_macros', 'select', array(
			'prefixes' => $__vars['prefixes']['prefixesGrouped'],
			'name' => 'actions[prefix_id]',
			'type' => 'thread',
		), $__vars) . '
						'),
			'_type' => 'option',
		)), array(
			'explain' => 'Tiền tố sẽ chỉ được áp dụng nếu nó là hợp lệ cho diễn đàn mà các chủ đề ở trong hoặc đang được chuyển đến.',
		)) . '
			';
	}
	$__compilerTemp6 = '';
	if ($__vars['threadIds']) {
		$__compilerTemp6 .= '
		' . $__templater->formHiddenVal('thread_ids', $__templater->filter($__vars['threadIds'], array(array('json', array()),), false), array(
		)) . '
	';
	} else {
		$__compilerTemp6 .= '
		' . $__templater->formHiddenVal('criteria', $__templater->filter($__vars['criteria'], array(array('json', array()),), false), array(
		)) . '
	';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<h2 class="block-header">' . 'Cập nhật chủ đề' . '</h2>
		<div class="block-body">
			' . $__templater->formRow('
				' . $__templater->filter($__vars['total'], array(array('number', array()),), true) . '
				' . $__compilerTemp1 . '
			', array(
		'label' => 'Các chủ đề được so khớp',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formSelectRow(array(
		'name' => 'actions[node_id]',
	), $__compilerTemp2, array(
		'label' => 'Chuyển đến chuyên mục',
		'explain' => $__compilerTemp3,
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'actions[discussion_type]',
	), $__compilerTemp4, array(
		'label' => 'Thay đổi loại chủ đề',
		'explain' => 'The thread type will only be changed if it is valid for the forum the thread is in or is being moved to.',
	)) . '

			' . $__compilerTemp5 . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'actions[stick]',
		'value' => 'stick',
		'label' => 'Ghim chủ đề',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[unstick]',
		'value' => 'unstick',
		'label' => 'Bỏ ghim chủ đề',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[lock]',
		'value' => 'lock',
		'label' => 'Khóa chủ đề',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[unlock]',
		'value' => 'unlock',
		'label' => 'Mở khóa chủ đề',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[approve]',
		'value' => 'approve',
		'label' => 'Duyệt chủ đề',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[unapprove]',
		'value' => 'unapprove',
		'label' => 'Không duyệt chủ đề',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[soft_delete]',
		'value' => 'soft_delete',
		'label' => 'Xóa tạm chủ đề',
		'_type' => 'option',
	)), array(
	)) . '

		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Cập nhật chủ đề',
		'icon' => 'save',
	), array(
	)) . '
	</div>

	' . $__compilerTemp6 . '
', array(
		'action' => $__templater->func('link', array('threads/batch-update/action', ), false),
		'class' => 'block',
	)) . '

';
	$__compilerTemp7 = '';
	if ($__vars['threadIds']) {
		$__compilerTemp7 .= '
		' . $__templater->formHiddenVal('thread_ids', $__templater->filter($__vars['threadIds'], array(array('json', array()),), false), array(
		)) . '
	';
	} else {
		$__compilerTemp7 .= '
		' . $__templater->formHiddenVal('criteria', $__templater->filter($__vars['criteria'], array(array('json', array()),), false), array(
		)) . '
	';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<h2 class="block-header">' . 'Xóa các chủ đề' . '</h2>
		<div class="block-body">
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'actions[delete]',
		'label' => '
					' . 'Xác nhận xóa ' . $__templater->filter($__vars['total'], array(array('number', array()),), true) . ' chủ đề' . '
				',
		'_type' => 'option',
	)), array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'name' => 'confirm_delete',
		'icon' => 'delete',
	), array(
	)) . '
	</div>

	' . $__compilerTemp7 . '
', array(
		'action' => $__templater->func('link', array('threads/batch-update/action', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);