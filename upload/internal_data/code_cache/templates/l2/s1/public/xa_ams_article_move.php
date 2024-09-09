<?php
// FROM HASH: b109c1b69e8f7e4a164304dcf7814489
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Move article');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['article'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	$__compilerTemp2 = $__templater->method($__vars['categoryTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['treeEntry']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['treeEntry']['record']['category_id'],
				'label' => $__templater->func('repeat_raw', array('&nbsp; ', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp3 = '';
	if ($__templater->method($__vars['article'], 'canSendModeratorActionAlert', array())) {
		$__compilerTemp3 .= '
				' . $__templater->callMacro('helper_action', 'author_alert', array(
			'selected' => true,
		), $__vars) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body js-prefixListenContainer">
			' . $__templater->formPrefixInputRow($__vars['prefixes'], array(
		'type' => 'ams_article',
		'prefix-value' => $__vars['article']['prefix_id'],
		'textbox-value' => $__vars['article']['title'],
		'href' => $__templater->func('link', array('ams/prefixes', ), false),
		'listen-to' => '< .js-prefixListenContainer | .js-categoryList',
		'autofocus' => 'autofocus',
		'maxlength' => $__templater->func('max_length', array($__vars['article'], 'title', ), false),
	), array(
		'label' => 'Tiêu đề',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'target_category_id',
		'value' => $__vars['article']['category_id'],
		'class' => 'js-categoryList',
	), $__compilerTemp1, array(
		'label' => 'Destination category',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'notify_watchers',
		'value' => '1',
		'selected' => true,
		'label' => 'Notify members watching the destination category',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__compilerTemp3 . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('ams/move', $__vars['article'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);