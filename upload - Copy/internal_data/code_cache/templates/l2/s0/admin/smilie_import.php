<?php
// FROM HASH: 16d0297f4101ff1fd6437ac12a9f9d8b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Nhập mặt cười');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array(array(
		'value' => 'upload',
		'label' => 'Nhập bằng cách tải lên tệp XML',
		'hint' => 'Use this option to import an XML file containing smilie definitions. Before proceding to the next step, you should ensure that you have manually uploaded all necessary smilie images to your server in the appropriate locations.',
		'_dependent' => array($__templater->formUpload(array(
		'name' => 'upload',
		'accept' => '.xml',
	))),
		'_type' => 'option',
	));
	if ($__vars['smilieXmlFiles']) {
		$__compilerTemp2 = $__templater->mergeChoiceOptions(array(), $__vars['smilieXmlFiles']);
		$__compilerTemp1[] = array(
			'value' => 'imported',
			'label' => 'Import smilies from XML generated by data import system',
			'hint' => 'If you use the Tools / Import data to import smilies from another system, the results will be left in an XML file from which you can import here.',
			'_dependent' => array($__templater->formSelect(array(
			'name' => 'filename',
		), $__compilerTemp2)),
			'_type' => 'option',
		);
	}
	$__compilerTemp1[] = array(
		'value' => 'directory',
		'label' => 'Nhập từ một thư mục trên máy chủ của bạn',
		'hint' => 'Use this option to scan a web-accessible directory containing smilie images and then manually enter configuration data for each smilie to be imported. Ensure that the smilie images are uploaded before proceeding with this step.',
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'directory',
		'placeholder' => 'styles/default/xenforo/smilies...',
	))),
		'_type' => 'option',
	);
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRadioRow(array(
		'name' => 'mode',
		'value' => 'upload',
	), $__compilerTemp1, array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Tiến hành' . $__vars['xf']['language']['ellipsis'],
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('smilies/import-form', ), false),
		'upload' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);