<?php
// FROM HASH: 18d7a8170e4fa460403d6bc6f7f7ec9a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . 'Kiểm tra độ an toàn tập tin trên ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '' . '
</mail:subject>

<p>' . 'Kiểm tra độ an toàn tập tin tự động đã được bắt đầu trên ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' ngày ' . $__templater->func('date_time', array($__vars['fileCheck']['check_date'], ), true) . ' và một số vấn đề đã được tìm thấy phải được giải quyết càng sớm càng tốt.' . '</p>

';
	if ($__vars['fileCheck']['total_missing'] AND $__vars['fileCheck']['total_inconsistent']) {
		$__finalCompiled .= '
	<p>' . 'Sau khi kiểm tra ' . $__templater->filter($__vars['fileCheck']['total_checked'], array(array('number', array()),), true) . ' tệp, chúng tôi tìm thấy ' . $__templater->filter($__vars['fileCheck']['total_missing'], array(array('number', array()),), true) . ' tệp bị thiếu và ' . $__templater->filter($__vars['fileCheck']['total_inconsistent'], array(array('number', array()),), true) . ' tệp chứa nội dung không mong muốn.' . '</p>
';
	} else if ($__vars['fileCheck']['total_missing']) {
		$__finalCompiled .= '
	<p>' . 'Sau khi kiểm tra ' . $__templater->filter($__vars['fileCheck']['total_checked'], array(array('number', array()),), true) . ' tệp chúng tôi tìm thấy ' . $__templater->filter($__vars['fileCheck']['total_missing'], array(array('number', array()),), true) . ' tệp bị thiếu.' . '</p>
';
	} else if ($__vars['fileCheck']['total_inconsistent']) {
		$__finalCompiled .= '
	<p>' . 'After checking ' . $__templater->filter($__vars['fileCheck']['total_checked'], array(array('number', array()),), true) . ' files we found ' . $__templater->filter($__vars['fileCheck']['total_inconsistent'], array(array('number', array()),), true) . ' files which contained unexpected contents. If you edited these files yourself you may ignore this warning but otherwise you should investigate further as this could be evidence of file corruption or potentially malicious alteration.' . '</p>
';
	}
	$__finalCompiled .= '

<table cellpadding="10" cellspacing="0" border="0" width="100%" class="linkBar">
	<tr>
		<td>
			<a href="' . $__templater->func('link_type', array('admin', 'canonical:tools/file-check/results', $__vars['fileCheck'], ), true) . '" class="button">' . 'Vui lòng xem lại các tệp tin' . '</a>
		</td>
	</tr>
</table>';
	return $__finalCompiled;
}
);