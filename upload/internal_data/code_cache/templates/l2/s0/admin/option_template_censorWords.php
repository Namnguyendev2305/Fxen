<?php
// FROM HASH: 596ca4981e2ee767e3c21e1c79d947f0
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['choices'])) {
		foreach ($__vars['choices'] AS $__vars['counter'] => $__vars['choice']) {
			$__compilerTemp1 .= '
			<li class="inputGroup">
				' . $__templater->formTextBox(array(
				'name' => $__vars['inputName'] . '[' . $__vars['counter'] . '][word]',
				'value' => $__vars['choice']['word'],
				'placeholder' => 'Word or phrase',
				'size' => '20',
			)) . '
				<span class="inputGroup-splitter"></span>
				' . $__templater->formTextBox(array(
				'name' => $__vars['inputName'] . '[' . $__vars['counter'] . '][replace]',
				'value' => $__vars['choice']['replace'],
				'placeholder' => 'Sự thay thế (không bắt buộc)',
				'size' => '20',
			)) . '
			</li>
		';
		}
	}
	$__finalCompiled .= $__templater->formRow('

	<ul class="listPlain inputGroup-container">
		' . $__compilerTemp1 . '

		<li class="inputGroup" data-xf-init="field-adder" data-increment-format="' . $__templater->escape($__vars['inputName']) . '[{counter}]">
			' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[' . $__vars['nextCounter'] . '][word]',
		'placeholder' => 'Word or phrase',
		'size' => '20',
	)) . '
			<span class="inputGroup-splitter"></span>
			' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[' . $__vars['nextCounter'] . '][replace]',
		'placeholder' => 'Sự thay thế (không bắt buộc)',
		'size' => '20',
	)) . '
		</li>
	</ul>
', array(
		'rowtype' => 'input',
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
		'rowclass' => $__vars['rowClass'],
	));
	return $__finalCompiled;
}
);