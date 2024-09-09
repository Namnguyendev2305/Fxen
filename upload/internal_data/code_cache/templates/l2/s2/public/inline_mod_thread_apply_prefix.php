<?php
// FROM HASH: 6a58f732296596a4ac6656ad259000cf
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Kiểm duyệt trực tuyến - Áp dụng tiền tố');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['threads'])) {
		foreach ($__vars['threads'] AS $__vars['thread']) {
			$__compilerTemp1 .= '
		' . $__templater->formHiddenVal('ids[]', $__vars['thread']['thread_id'], array(
			)) . '
	';
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('Bạn có chắc chắn muốn áp dụng tiền tố được chỉ định bên dưới cho ' . $__templater->escape($__vars['total']) . ' chủ đề đã chọn?', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->callMacro('prefix_macros', 'row', array(
		'type' => 'thread',
		'prefixes' => $__vars['prefixes'],
		'selected' => $__vars['selectedPrefix'],
		'explain' => ((($__vars['forumCount'] > 1)) ? 'Các chủ đề bạn đã chọn nằm trong nhiều diễn đàn. Các chủ đề sẽ chỉ được cập nhật nếu tiền tố được chọn là hợp lệ trong diễn đàn.' : ''),
	), $__vars) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'confirm',
	), array(
	)) . '
	</div>

	' . $__compilerTemp1 . '

	' . $__templater->formHiddenVal('type', 'thread', array(
	)) . '
	' . $__templater->formHiddenVal('action', 'apply_prefix', array(
	)) . '
	' . $__templater->formHiddenVal('confirmed', '1', array(
	)) . '

	' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
', array(
		'action' => $__templater->func('link', array('inline-mod', ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);