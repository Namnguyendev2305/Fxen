<?php
// FROM HASH: 84687b08e1697f07078849e525204f09
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Xác nhận hành động');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Vui lòng xác nhận rằng bạn muốn đặt lại thông báo sau' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('notices/edit', $__vars['notice'], ), true) . '">' . $__templater->escape($__vars['notice']['title']) . '</a></strong>
				' . 'Resetting this notice will display it to all of the users matching the notice criteria, even if they have previously dismissed it. Note that this will not restore the notice to guests who have dismissed it.' . '
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Khôi phục',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('notices/reset', $__vars['notice'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);