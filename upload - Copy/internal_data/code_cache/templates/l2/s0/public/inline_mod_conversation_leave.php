<?php
// FROM HASH: 26a5225d574e7becc0ec01845a608fec
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Rời cuộc trò chuyện');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['conversations'])) {
		foreach ($__vars['conversations'] AS $__vars['conversation']) {
			$__compilerTemp1 .= '
		' . $__templater->formHiddenVal('ids[]', $__vars['conversation']['conversation_id'], array(
			)) . '
	';
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Rời khỏi cuộc hội thoại sẽ xóa nó ra khỏi danh sách các cuộc hội thoại' . '
			', array(
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'recipient_state',
	), array(array(
		'value' => 'deleted',
		'checked' => 'checked',
		'label' => 'Cho phép tin nhắn trong tương lai',
		'hint' => 'Nếu cuộc trò chuyện này nhận được phản hồi khác trong tương lai, cuộc trò chuyện này sẽ được khôi phục vào hộp thư đến của bạn.',
		'_type' => 'option',
	),
	array(
		'value' => 'deleted_ignored',
		'label' => 'Bỏ qua tin nhắn trong tương lai',
		'hint' => 'Bạn sẽ không được thông báo về bất kỳ phản hồi nào trong tương lai và cuộc trò chuyện sẽ vẫn bị xóa.',
		'_type' => 'option',
	)), array(
		'label' => 'Xử lý tin nhắn trong tương lai',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
	</div>

	' . $__compilerTemp1 . '

	' . $__templater->formHiddenVal('type', 'conversation', array(
	)) . '
	' . $__templater->formHiddenVal('action', 'leave', array(
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