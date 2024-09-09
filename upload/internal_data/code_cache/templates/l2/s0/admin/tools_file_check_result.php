<?php
// FROM HASH: 471e948edbaa15cbd31d2019e2f8258b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Kết quả kiểm tra tập tin');
	$__finalCompiled .= '

';
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	<form action="' . $__templater->func('link', array('tools/file-check', ), true) . '" method="post" class="u-pullRight">
		' . $__templater->button('Kiểm tra lại', array(
		'type' => 'submit',
	), '', array(
	)) . '
		' . $__templater->func('csrf_input') . '
	</form>
');
	$__finalCompiled .= '

';
	if ($__vars['fileCheck']['check_state'] == 'success') {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success blockMessage--iconic">
		' . 'All ' . $__templater->filter($__vars['fileCheck']['total_checked'], array(array('number', array()),), true) . ' checked files are present and correct.' . ' ' . $__templater->func('smilie', array(':)', ), true) . '
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		' . $__templater->filter('Check completed on ' . $__templater->filter($__vars['fileCheck']['total_checked'], array(array('number', array()),), false) . ' files. The files listed below have contents different from those originally downloaded.

If you have edited these files yourself, you may ignore this message, otherwise you should investigate further as this may be evidence of corrupted or altered files.', array(array('nl2br', array()),), true) . '
	</div>

	';
		if ($__vars['results']) {
			$__finalCompiled .= '
		<div class="block">
			<div class="block-container">
				<div class="block-body">
					';
			$__compilerTemp1 = '';
			if ($__templater->isTraversable($__vars['addOns'])) {
				foreach ($__vars['addOns'] AS $__vars['addOnId'] => $__vars['addOn']) {
					$__compilerTemp1 .= '
							';
					if ($__vars['results']['missing'][$__vars['addOnId']] OR $__vars['results']['inconsistent'][$__vars['addOnId']]) {
						$__compilerTemp1 .= '
								' . $__templater->dataRow(array(
							'rowtype' => 'subsection',
							'rowclass' => 'dataList-row--noHover',
						), array(array(
							'_type' => 'cell',
							'html' => $__templater->escape($__vars['addOn']['title']),
						))) . '

								';
						if ($__templater->isTraversable($__vars['results']['missing'][$__vars['addOnId']])) {
							foreach ($__vars['results']['missing'][$__vars['addOnId']] AS $__vars['path']) {
								$__compilerTemp1 .= '
									' . $__templater->dataRow(array(
									'rowclass' => 'dataList-row--noHover',
								), array(array(
									'dir' => 'auto',
									'_type' => 'cell',
									'html' => '
											' . $__templater->escape($__vars['path']) . '
											<span class="label label--primary label--smallest" title="' . $__templater->filter('Không tìm thấy tệp tin.', array(array('for_attr', array()),), true) . '" data-xf-init="tooltip">
												' . 'Lỗi' . '
											</span>
										',
								))) . '
								';
							}
						}
						$__compilerTemp1 .= '

								';
						if ($__templater->isTraversable($__vars['results']['inconsistent'][$__vars['addOnId']])) {
							foreach ($__vars['results']['inconsistent'][$__vars['addOnId']] AS $__vars['path']) {
								$__compilerTemp1 .= '
									' . $__templater->dataRow(array(
									'rowclass' => 'dataList-row--noHover',
								), array(array(
									'dir' => 'auto',
									'_type' => 'cell',
									'html' => '
											' . $__templater->escape($__vars['path']) . '
											<span class="label label--primary label--smallest" title="' . $__templater->filter('Tệp chứa nội dung đã chỉnh sửa.', array(array('for_attr', array()),), true) . '" data-xf-init="tooltip">
												' . 'Nội dung không mong muốn' . '
											</span>
										',
								))) . '
								';
							}
						}
						$__compilerTemp1 .= '
							';
					}
					$__compilerTemp1 .= '
						';
				}
			}
			$__finalCompiled .= $__templater->dataList('
						' . $__compilerTemp1 . '
					', array(
			)) . '
				</div>
			</div>
		</div>
	';
		} else {
			$__finalCompiled .= '
		<div class="blockMessage">' . 'Không thể tìm thấy tệp kết quả kiểm tra tập tin. Vui lòng chạy kiểm tra lại.' . '</div>
	';
		}
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
}
);