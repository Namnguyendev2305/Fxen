<?php
// FROM HASH: 52720edcea8fce1d074ed2f4f7935e63
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Nhập từ XML');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formUploadRow(array(
		'name' => 'upload',
		'accept' => '.xml',
	), array(
		'label' => 'Nhập bằng cách tải lên tệp XML',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'import',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array($__vars['urlPrefix'] . '/import', ), false),
		'upload' => 'true',
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);