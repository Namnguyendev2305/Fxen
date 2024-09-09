<?php
// FROM HASH: c65cd23bba4f94370e02655624991f5e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped(($__vars['isLiked'] ? 'Bỏ thích nội dung' : 'Thích nội dung'));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['isLiked']) {
		$__compilerTemp1 .= '
					' . 'Bạn có chắc chắn muốn bỏ thích nội dung này?' . '
				';
	} else {
		$__compilerTemp1 .= '
					' . 'Bạn có chắc chắn muốn thích nội dung này?' . '
					';
		if ($__vars['contentTitle']) {
			$__compilerTemp1 .= '<strong>' . $__templater->escape($__vars['contentTitle']) . '</strong>';
		}
		$__compilerTemp1 .= '
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
		'icon' => 'confirm',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__vars['confirmUrl'],
		'class' => 'block',
	));
	return $__finalCompiled;
}
);