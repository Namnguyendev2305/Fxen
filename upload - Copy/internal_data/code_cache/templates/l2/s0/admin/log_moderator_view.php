<?php
// FROM HASH: d848b637889df7273e2c928ec6542a69
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Nhật ký kiểm duyệt viên');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('
				<a href="' . $__templater->func('link', array('users/edit', $__vars['entry']['User'], ), true) . '">' . $__templater->escape($__vars['entry']['User']['username']) . '</a>
			', array(
		'label' => 'Thành viên',
	)) . '
			';
	if ($__vars['entry']['ip_address']) {
		$__finalCompiled .= '
				' . $__templater->formRow('
					<a href="' . $__templater->func('link_type', array('public', 'misc/ip-info', null, array('ip' => $__templater->filter($__vars['entry']['ip_address'], array(array('ip', array()),), false), ), ), true) . '" target="_blank" class="u-ltr">' . $__templater->filter($__vars['entry']['ip_address'], array(array('ip', array()),), true) . '</a>
				', array(
			'label' => 'Địa chỉ IP',
		)) . '
			';
	}
	$__finalCompiled .= '
			' . $__templater->formRow('
				' . $__templater->func('date_dynamic', array($__vars['entry']['log_date'], array(
	))) . '
			', array(
		'label' => 'Ngày',
	)) . '
			' . $__templater->formRow('
				' . $__templater->escape($__vars['entry']['action_text']) . '
			', array(
		'label' => 'Hành động',
	)) . '
			' . $__templater->formRow('
				<a href="' . $__templater->func('base_url', array($__vars['entry']['content_url'], ), true) . '">' . $__templater->escape($__vars['entry']['content_title']) . '</a>
				<div class="u-muted">' . 'Bởi ' . ($__templater->escape($__vars['entry']['content_username']) ?: 'N/A') . '' . '</div>
			', array(
		'label' => 'Nội dung',
	)) . '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);