<?php
// FROM HASH: 70fa4c7b65b7714bc16bbe5fbe87b5f0
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Imgur Upload');
	$__finalCompiled .= '

';
	$__templater->includeCss('attachments.less');
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['attachment'])) {
		foreach ($__vars['attachment'] AS $__vars['a']) {
			$__compilerTemp1 .= '
							<li class="js-attachmentFile" style="position:relative;margin-bottom: 10px;">
								<img src="' . $__templater->escape($__vars['a']) . '" class="js-attachmentThumb" width="100%" height="auto" style="max-width:700px;border: 1px solid #ccc">
								<input class="input" value="' . $__templater->escape($__vars['a']) . '" type="text" style="position: absolute;bottom: 5px;max-width: 700px;left: 0;box-sizing: border-box;text-align: center;background: #e8e8e8b8;">
							</li>
						';
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
				' . $__templater->formRow('
					' . '' . '
					<ul class="attachUploadList">
						' . $__compilerTemp1 . '
					</ul>
				', array(
		'label' => 'Uploaded images',
	)) . '
				' . $__templater->formUploadRow(array(
		'id' => 'filesupload',
		'name' => 'attachment[]',
		'multiple' => 'multiple',
		'accept' => '.' . $__templater->filter($__vars['constraints']['extensions'], array(array('join', array(',.', )),), false),
	), array(
		'label' => 'Attach file',
		'explain' => 'You may close this window/tab once you have uploaded your files to return to your content.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Upload',
		'icon' => 'upload',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('attachments/imgur', ), false),
		'class' => 'block',
		'upload' => 'true',
	)) . '
';
	$__templater->inlineJs('
');
	return $__finalCompiled;
}
);