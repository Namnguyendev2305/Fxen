<?php
// FROM HASH: e3286350aca1e9d734dd51dd9a17a4d9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['provider']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Vô hiệu hóa xác minh hai bước' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['provider']['title']));
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Vô hiệu hóa xác minh hai bước');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__templater->wrapTemplate('account_wrapper', $__vars);
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['provider']) {
		$__compilerTemp1 .= '
					' . 'Bạn có chắc chắn muốn tắt phương pháp xác minh hai bước \'' . $__templater->escape($__vars['provider']['title']) . '\' không?' . '
				';
	} else {
		$__compilerTemp1 .= '
					' . 'Bạn có chắc chắn muốn tắt xác minh hai bước không?' . '
				';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . $__compilerTemp1 . '
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Xác nhận',
		'icon' => 'disable',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('account/two-step/disable', $__vars['provider'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);