<?php
// FROM HASH: 448f691771efbc8b0f82caa0b4a62b2f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Nhật ký quản trị viên');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body block-row">
			<span class="u-ltr">' . $__templater->escape($__vars['entry']['request_url']) . '</span>
			<ul class="listInline listInline--bullet u-muted">
				<li>' . 'Tạo ra bởi' . $__vars['xf']['language']['label_separator'] . ' ' . ($__vars['entry']['User'] ? (((('<a href="' . $__templater->func('link', array('users/edit', $__vars['entry'], ), true)) . '">') . $__templater->escape($__vars['entry']['User']['username'])) . '</a>') : 'Tài khoản không xác định') . '</li>
				<li class="u-ltr">' . ($__vars['entry']['ip_address'] ? $__templater->filter($__vars['entry']['ip_address'], array(array('ip', array()),), true) : '') . '</li>
				<li>' . $__templater->func('date_dynamic', array($__vars['entry']['request_date'], array(
	))) . '</li>
			</ul>
		</div>

		<h3 class="block-minorHeader">' . 'Request state' . '</h3>
		<div class="block-body block-body--contained block-row" dir="ltr">
			' . $__templater->func('dump_simple', array($__vars['entry']['request_data'], ), true) . '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);