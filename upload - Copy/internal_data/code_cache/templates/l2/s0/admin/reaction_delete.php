<?php
// FROM HASH: cde74a8d7a6a3556fd505a1f1db031b7
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
				' . 'Vui lòng xác nhận rằng bạn muốn xóa những điều sau' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('reactions/edit', $__vars['reaction'], ), true) . '">' . $__templater->escape($__vars['reaction']['title']) . '</a></strong>
				<span>' . 'This will delete all reactions of this type.' . '</span>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('reactions/delete', $__vars['reaction'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);