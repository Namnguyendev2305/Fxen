<?php
// FROM HASH: 85a91335c18a9004ca804112f1046d09
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => $__vars['inputName'] . '[enabled]',
		'selected' => $__vars['option']['option_value']['enabled'],
		'label' => 'Bật đăng ký',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[emailConfirmation]',
		'selected' => $__vars['option']['option_value']['emailConfirmation'],
		'label' => 'Bật xác nhận email',
		'hint' => 'If selected, users will need to click on a link in an email before their registration is completed.',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[moderation]',
		'selected' => $__vars['option']['option_value']['moderation'],
		'label' => 'Bật phê duyệt bằng tay',
		'hint' => 'If selected, an administrator will need to manually approve users before their registration is completed.',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[requireDob]',
		'selected' => $__vars['option']['option_value']['requireDob'],
		'label' => 'Require date of birth',
		'_type' => 'option',
	),
	array(
		'selected' => ($__vars['option']['option_value']['minimumAge'] ? true : false),
		'label' => 'Tuổi tối thiểu' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formNumberBox(array(
		'name' => $__vars['inputName'] . '[minimumAge]',
		'value' => ($__vars['option']['option_value']['minimumAge'] ?: 13),
		'min' => '1',
		'units' => 'Năm',
	))),
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[requireEmailChoice]',
		'selected' => $__vars['option']['option_value']['requireEmailChoice'],
		'label' => 'Require site email preference',
		'hint' => 'If selected, users must choose at registration whether or not to receive site emails. The default value depends on <code>registrationDefaults</code> and users may change their preference later.',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[requireLocation]',
		'selected' => $__vars['option']['option_value']['requireLocation'],
		'label' => 'Require location',
		'_type' => 'option',
	)), array(
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
		'rowclass' => $__vars['rowClass'],
	));
	return $__finalCompiled;
}
);