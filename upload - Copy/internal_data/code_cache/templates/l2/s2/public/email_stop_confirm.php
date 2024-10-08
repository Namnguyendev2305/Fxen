<?php
// FROM HASH: 1c96d58ede7b2cc55ff6af57156f371f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Stop email notifications');
	$__finalCompiled .= '

';
	$__templater->setPageParam('head.' . 'robots', $__templater->preEscaped('<meta name="robots" content="noindex" />'));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['actions']) {
		$__compilerTemp1 .= '
			<div class="block-body">
				';
		$__compilerTemp2 = $__templater->mergeChoiceOptions(array(), $__vars['actions']);
		$__compilerTemp2[] = array(
			'value' => 'all',
			'label' => 'Stop all emails from ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '',
			'_type' => 'option',
		);
		$__compilerTemp1 .= $__templater->formRadioRow(array(
			'name' => 'stop',
			'value' => ($__vars['defaultAction'] ?: 'all'),
		), $__compilerTemp2, array(
			'label' => 'Xác nhận hành động',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'submit' => 'Stop emails',
		), array(
		)) . '
		';
	} else {
		$__compilerTemp1 .= '
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Bạn có chắc chắn muốn dừng tất cả email từ ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '?' . '
				', array(
			'rowtype' => 'confirm',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'submit' => 'Stop emails',
			'icon' => 'notificationsOff',
		), array(
			'rowtype' => 'simple',
		)) . '
			' . $__templater->formHiddenVal('stop', 'all', array(
		)) . '
		';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		' . $__compilerTemp1 . '
	</div>

	' . $__templater->formHiddenVal('c', $__vars['confirmKey'], array(
	)) . '
', array(
		'action' => $__templater->func('link', array('email-stop', $__vars['user'], ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);