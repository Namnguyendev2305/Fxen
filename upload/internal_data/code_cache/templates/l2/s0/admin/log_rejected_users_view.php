<?php
// FROM HASH: 8880297f7eec171485a4fcbe9c379d20
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Nhật ký thành viên bị từ chối');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('
				' . $__templater->func('username_link', array($__vars['entry']['User'], false, array(
		'href' => $__templater->func('link', array('users/edit', $__vars['entry']['User'], ), false),
	))) . '
			', array(
		'label' => 'Thành viên bị từ chối',
	)) . '
			' . $__templater->formRow('
				' . $__templater->func('date_dynamic', array($__vars['entry']['reject_date'], array(
	))) . '
			', array(
		'label' => 'Ngày',
	)) . '
			';
	$__compilerTemp1 = '';
	if ($__vars['entry']['reject_user_id']) {
		$__compilerTemp1 .= '
					' . $__templater->func('username_link', array($__vars['entry']['RejectUser'], false, array(
			'href' => $__templater->func('link', array('users/edit', $__vars['entry']['RejectUser'], ), false),
		))) . '
				';
	} else {
		$__compilerTemp1 .= '
					' . 'N/A' . '
				';
	}
	$__finalCompiled .= $__templater->formRow('
				' . $__compilerTemp1 . '
			', array(
		'label' => 'Bị từ chối bởi',
	)) . '
			';
	$__compilerTemp2 = '';
	if ($__vars['entry']['reject_reason']) {
		$__compilerTemp2 .= '
					' . $__templater->escape($__vars['entry']['reject_reason']) . '
				';
	} else {
		$__compilerTemp2 .= '
					' . 'N/A' . '
				';
	}
	$__finalCompiled .= $__templater->formRow('
				' . $__compilerTemp2 . '
			', array(
		'label' => 'Lý do',
	)) . '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);