<?php
// FROM HASH: ad7bf1866c7f60b95d26c41ce62e8aff
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
				' . 'Vui lòng xác nhận rằng bạn muốn hủy kích hoạt nhà cung cấp sau đây' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('connected-accounts/edit', $__vars['provider'], ), true) . '">' . $__templater->escape($__vars['provider']['title']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Hủy kích hoạt',
		'icon' => 'delete',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('connected-accounts/deactivate', $__vars['provider'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);