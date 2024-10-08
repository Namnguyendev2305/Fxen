<?php
// FROM HASH: 954b0a7c43209674a124e132e0db00cb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[limit]',
		'value' => $__vars['options']['limit'],
		'min' => '0',
	), array(
		'label' => 'Maximum usernames',
		'explain' => 'In order to prevent the \'Members online\' widget becoming too large on a busy board, you may limit the number of names before a \'... and X more\' link is added to terminate the list. A value of 0 disables the limit.',
	)) . '

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[followedOnline]',
		'selected' => $__vars['options']['followedOnline'],
		'label' => 'Bật dòng "Những người bạn theo dõi"',
		'_type' => 'option',
	),
	array(
		'name' => 'options[staffOnline]',
		'selected' => $__vars['options']['staffOnline'],
		'label' => 'Bật khối \'BQT trực tuyến\'',
		'_dependent' => array($__templater->formCheckBox(array(
	), array(array(
		'name' => 'options[staffQuery]',
		'selected' => $__vars['options']['staffQuery'],
		'label' => 'Chạy truy vấn chuyên dụng khi cần thiết',
		'hint' => 'When more users are online than are allowed to be shown (see above), some online staff members may be omitted. Enabling this option will cause an extra database query to be run when necessary, to ensure that all staff are displayed.',
		'_type' => 'option',
	)))),
		'_type' => 'option',
	)), array(
	));
	return $__finalCompiled;
}
);