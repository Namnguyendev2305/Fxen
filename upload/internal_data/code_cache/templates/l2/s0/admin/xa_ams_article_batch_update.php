<?php
// FROM HASH: 798cb7b5c60869a3b3c41dc2e9a9997f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Batch update articles');
	$__finalCompiled .= '

';
	if ($__vars['success']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success blockMessage--iconic">' . 'Bản cập nhật hàng loạt đã được hoàn thành.' . '</div>
';
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->includeTemplate('xa_ams_helper_article_search_criteria', $__vars) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'search',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('xa-ams/batch-update/confirm', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);