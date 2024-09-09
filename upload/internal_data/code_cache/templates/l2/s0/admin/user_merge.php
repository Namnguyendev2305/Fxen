<?php
// FROM HASH: bba9ddd24964d585566ba9cccd17f85f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Gộp thành viên');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('
				' . $__templater->escape($__vars['user']['username']) . '
			', array(
		'label' => 'Thành viên nguồn',
		'explain' => 'Thành viên này sẽ bị xóa.',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'username',
		'ac' => 'single',
	), array(
		'label' => 'Thành viên đích',
		'explain' => '' . $__templater->escape($__vars['user']['username']) . ' sẽ được gộp vào thành viên này và tất cả nội dung của ' . $__templater->escape($__vars['user']['username']) . ' sẽ thuộc về thành viên này.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Gộp',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('users/merge', $__vars['user'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);