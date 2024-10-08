<?php
// FROM HASH: be26446d6c4c50b21c46d756bbe9aa44
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Nhật ký lỗi máy chủ');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body block-row">
			<ul class="listInline listInline--bullet u-ltr">
				<li><span class="u-dimmed">' . $__templater->escape($__vars['entry']['exception_type']) . ':</span> ' . $__templater->escape($__vars['entry']['message']) . '</li>
				<li class="u-dimmed">' . $__templater->escape($__vars['entry']['filename']) . ':' . $__templater->escape($__vars['entry']['line']) . '</li>
			</ul>
			<ul class="listInline listInline--bullet u-muted">
				<li class="u-muted">' . 'Tạo ra bởi' . $__vars['xf']['language']['label_separator'] . ' ' . ($__vars['entry']['User'] ? (((('<a href="' . $__templater->func('link', array('users/edit', $__vars['entry']['User'], ), true)) . '">') . $__templater->escape($__vars['entry']['User']['username'])) . '</a>') : 'Tài khoản không xác định') . '</li>
				<li>' . $__templater->func('date_time', array($__vars['entry']['exception_date'], ), true) . '</li>
			</ul>
		</div>

		<h3 class="block-minorHeader">' . 'Stack trace' . '</h3>
		<div class="block-body block-body--contained block-row" dir="ltr">
			<pre>' . $__templater->escape($__vars['entry']['trace_string']) . '</pre>
		</div>

		<h3 class="block-minorHeader">' . 'Request state' . '</h3>
		<div class="block-body block-body--contained block-row" dir="ltr">
			' . $__templater->func('dump_simple', array($__vars['entry']['request_state'], ), true) . '
		</div>

		<div class="block-footer">
			<span class="block-footer-controls">' . $__templater->button('', array(
		'href' => $__templater->func('link', array('logs/server-errors/delete', $__vars['entry'], ), false),
		'icon' => 'delete',
		'overlay' => 'true',
	), '', array(
	)) . '</span>
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);