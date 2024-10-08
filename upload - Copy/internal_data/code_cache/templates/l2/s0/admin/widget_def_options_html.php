<?php
// FROM HASH: c561c656cac0645ca1618259f9c0636a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formCodeEditorRow(array(
		'name' => 'options[template]',
		'value' => $__vars['template']['template'],
		'class' => 'codeEditor--short',
		'mode' => 'html',
	), array(
		'label' => 'Template',
		'explain' => 'Bạn có thể sử dụng cú pháp mẫu XenForo ở đây',
	)) . '

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[advanced_mode]',
		'value' => '1',
		'selected' => $__vars['options']['advanced_mode'],
		'label' => 'Chế độ nâng cao',
		'hint' => 'If enabled, the HTML for your page will not be contained within a block.',
		'_type' => 'option',
	)), array(
	)) . '

';
	if ($__vars['options']['template_title']) {
		$__finalCompiled .= '
	' . $__templater->formHiddenVal('options[template_title]', $__vars['options']['template_title'], array(
		)) . '
';
	}
	return $__finalCompiled;
}
);