<?php
// FROM HASH: 7eb78ce27c48cebe18f0aaa1b6553549
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Sửa cuộc đối thoại');
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped('Trò chuyện'), $__templater->func('link', array('conversations', ), false), array(
	));
	$__finalCompiled .= '
';
	$__templater->breadcrumb($__templater->preEscaped($__templater->escape($__vars['conversation']['title'])), $__templater->func('link', array('conversations', $__vars['conversation'], ), false), array(
	));
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => $__vars['conversation']['title'],
		'maxlength' => $__templater->func('max_length', array($__vars['conversation'], 'title', ), false),
	), array(
		'label' => 'Tiêu đề',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'open_invite',
		'checked' => ($__vars['conversation']['open_invite'] ? 'checked' : ''),
		'label' => 'Cho phép mọi người trong cuộc trò chuyện mời người khác',
		'_type' => 'option',
	),
	array(
		'name' => 'conversation_locked',
		'checked' => ($__vars['conversation']['conversation_open'] ? '' : 'checked'),
		'label' => 'Khóa cuộc trò chuyện',
		'hint' => 'Không cho phép phản hồi',
		'_type' => 'option',
	)), array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('conversations/edit', $__vars['conversation'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);