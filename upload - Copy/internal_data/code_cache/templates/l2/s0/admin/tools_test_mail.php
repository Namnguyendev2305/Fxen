<?php
// FROM HASH: 56684b883b0123b8a4632cd76098ecd5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Thử nghiệm email gửi đi');
	$__finalCompiled .= '
';
	$__templater->pageParams['pageDescription'] = $__templater->preEscaped('Sử dụng công cụ này để chẩn đoán các vấn đề vận chuyển thư đi.');
	$__templater->pageParams['pageDescriptionMeta'] = true;
	$__finalCompiled .= '

';
	if ($__vars['result']) {
		$__finalCompiled .= '
	';
		if ($__vars['result']['code'] > 0) {
			$__finalCompiled .= '
		<div class="blockMessage blockMessage--success">
			' . 'Email đã được gửi thành công mà không có lỗi.' . '
			';
			if ($__vars['transportClass'] == 'Swift_SendmailTransport') {
				$__finalCompiled .= '
				' . 'Please note that error tracking may be limited when using sendmail. If you do not receive the email, please check the server\'s email log for more details.' . '
			';
			}
			$__finalCompiled .= '
		</div>
	';
		} else {
			$__finalCompiled .= '
		<div class="blockMessage blockMessage--error">
			' . 'Đã xảy ra lỗi khi cố gắng gửi email.' . '
		</div>
	';
		}
		$__finalCompiled .= '
	';
		if ($__vars['result']['log']) {
			$__finalCompiled .= '
		<div class="block">
			<div class="block-container">
				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						' . 'Mở rộng chi tiết nhật ký' . '
					</span>
				</h3>
				<div class="block-body block-body--contained block-body--collapsible" tabindex="-1">
					<div class="block-row">
						<pre>' . $__templater->escape($__vars['result']['log']) . '</pre>
					</div>
				</div>
			</div>
		</div>
	';
		}
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['transportExtra']) {
		$__compilerTemp1 .= ' (' . $__templater->escape($__vars['transportExtra']) . ')';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'email',
		'value' => $__vars['email'],
		'type' => 'email',
		'dir' => 'ltr',
	), array(
		'label' => 'Email',
	)) . '

			' . $__templater->formRow('
				<code>\\' . $__templater->escape($__vars['transportClass']) . $__compilerTemp1 . '</code>
			', array(
		'label' => 'Lớp vận chuyển email',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Chạy thử nghiệm',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('tools/test-email', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);