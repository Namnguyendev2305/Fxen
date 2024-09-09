<?php
// FROM HASH: 3b5ab0ddc1f768f81611bef1b688ec5d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['isWatched']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Ngừng theo dõi diễn đàn');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Theo dõi diễn đàn');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['forum'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['isWatched']) {
		$__compilerTemp1 .= '
				' . $__templater->formInfoRow('
					' . 'Bạn có chắc chắn muốn bỏ theo dõi diễn đàn này?' . '
				', array(
			'rowtype' => 'confirm',
		)) . '
				' . $__templater->formHiddenVal('stop', '1', array(
		)) . '
			';
	} else {
		$__compilerTemp1 .= '
				';
		if ($__vars['forum']['allowed_watch_notifications'] != 'none') {
			$__compilerTemp1 .= '
					';
			$__compilerTemp2 = array(array(
				'value' => 'thread',
				'label' => 'Các chủ đề mới',
				'_type' => 'option',
			));
			if ($__vars['forum']['allowed_watch_notifications'] == 'all') {
				$__compilerTemp2[] = array(
					'value' => 'message',
					'label' => 'Bình luận mới',
					'_type' => 'option',
				);
			}
			$__compilerTemp2[] = array(
				'value' => '',
				'hint' => 'Diễn đàn sẽ vẫn được liệt kê trên trang diễn đàn đã theo dõi, có thể được sử dụng để liệt kê các diễn đàn mà bạn theo dõi.',
				'label' => 'Không gửi thông báo',
				'_type' => 'option',
			);
			$__compilerTemp1 .= $__templater->formRadioRow(array(
				'name' => 'notify',
				'value' => 'thread',
			), $__compilerTemp2, array(
				'label' => 'Gửi thông báo',
			)) . '

					' . $__templater->formCheckBoxRow(array(
			), array(array(
				'name' => 'send_alert',
				'value' => '1',
				'selected' => true,
				'label' => 'Thông báo',
				'_type' => 'option',
			),
			array(
				'name' => 'send_email',
				'value' => '1',
				'label' => 'Emails',
				'_type' => 'option',
			)), array(
				'label' => 'Gửi các thông báo qua',
			)) . '
				';
		}
		$__compilerTemp1 .= '
			';
	}
	$__compilerTemp3 = '';
	if ($__vars['isWatched']) {
		$__compilerTemp3 .= '
			' . $__templater->formSubmitRow(array(
			'submit' => 'Bỏ theo dõi',
			'icon' => 'notificationsOff',
		), array(
			'rowtype' => 'simple',
		)) . '
		';
	} else {
		$__compilerTemp3 .= '
			' . $__templater->formSubmitRow(array(
			'submit' => 'Theo dõi',
			'icon' => 'notificationsOn',
		), array(
		)) . '
		';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '
		</div>
		' . $__compilerTemp3 . '
	</div>
', array(
		'action' => $__templater->func('link', array('forums/watch', $__vars['forum'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);