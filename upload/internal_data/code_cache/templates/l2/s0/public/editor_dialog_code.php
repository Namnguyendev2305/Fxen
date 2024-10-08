<?php
// FROM HASH: da67710a8683d373b043b9efcdbfa36d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Chèn mã');
	$__finalCompiled .= '

<form class="block" id="editor_code_form">
	<div class="block-container">
		<div class="block-body" data-xf-init="code-editor-switcher-container">
			';
	$__compilerTemp1 = array();
	$__compilerTemp1[] = array(
		'label' => 'Non-language specific',
		'_type' => 'optgroup',
		'options' => array(),
	);
	end($__compilerTemp1); $__compilerTemp2 = key($__compilerTemp1);
	$__compilerTemp1[$__compilerTemp2]['options'][] = array(
		'value' => '',
		'label' => 'General code',
		'_type' => 'option',
	);
	$__compilerTemp1[$__compilerTemp2]['options'][] = array(
		'value' => 'rich',
		'label' => 'Rich (BB code)',
		'_type' => 'option',
	);
	$__compilerTemp1[] = array(
		'label' => 'Common languages',
		'_type' => 'optgroup',
		'options' => array(),
	);
	end($__compilerTemp1); $__compilerTemp3 = key($__compilerTemp1);
	if ($__templater->isTraversable($__vars['languages'])) {
		foreach ($__vars['languages'] AS $__vars['key'] => $__vars['language']) {
			if ($__vars['language']['common']) {
				$__compilerTemp1[$__compilerTemp3]['options'][] = array(
					'value' => $__vars['key'],
					'label' => $__templater->escape($__vars['language']['phrase']),
					'_type' => 'option',
				);
			}
		}
	}
	$__compilerTemp1[] = array(
		'label' => 'Other languages',
		'_type' => 'optgroup',
		'options' => array(),
	);
	end($__compilerTemp1); $__compilerTemp4 = key($__compilerTemp1);
	if ($__templater->isTraversable($__vars['languages'])) {
		foreach ($__vars['languages'] AS $__vars['key'] => $__vars['language']) {
			$__compilerTemp1[$__compilerTemp4]['options'][] = array(
				'value' => $__vars['key'],
				'label' => $__templater->escape($__vars['language']['phrase']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formSelectRow(array(
		'id' => 'editor_code_type',
		'class' => 'js-codeEditorSwitcher',
	), $__compilerTemp1, array(
		'label' => 'Ngôn ngữ',
	)) . '

			' . $__templater->formCodeEditorRow(array(
		'id' => 'editor_code_code',
		'class' => 'codeEditor--short',
	), array(
		'rowtype' => 'fullWidth noLabel',
		'rowclass' => 'js-codeEditorContainer',
		'label' => 'Mã',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Xem tiếp',
		'id' => 'editor_code_submit',
	), array(
	)) . '
	</div>
</form>';
	return $__finalCompiled;
}
);