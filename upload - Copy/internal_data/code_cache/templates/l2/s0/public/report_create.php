<?php
// FROM HASH: dec4babbec657ef4cb021ef7b064d895
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Báo cáo nội dung');
	$__finalCompiled .= '

' . $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextAreaRow(array(
		'name' => 'message',
		'autosize' => 'true',
		'autofocus' => 'autofocus',
	), array(
		'label' => 'Lý do báo cáo',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Báo cáo',
	), array(
	)) . '
	</div>
', array(
		'action' => $__vars['confirmUrl'],
		'class' => 'block',
		'ajax' => 'true',
		'data-skip-overlay-redirect' => 'true',
	));
	return $__finalCompiled;
}
);