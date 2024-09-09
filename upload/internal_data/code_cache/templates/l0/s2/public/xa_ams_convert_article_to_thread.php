<?php
// FROM HASH: 4b39b2d240c2ad9d346f3b9d2596becb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Convert article to thread');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['article'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__templater->includeJs(array(
		'src' => 'xf/prefix_menu.js',
		'min' => '1',
	));
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	$__compilerTemp2 = $__templater->method($__vars['nodeTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['treeEntry']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['treeEntry']['record']['node_id'],
				'disabled' => (($__vars['treeEntry']['record']['node_type_id'] != 'Forum') ? 'disabled' : ''),
				'label' => $__templater->func('repeat_raw', array('&nbsp; ', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
				'_type' => 'option',
			);
		}
	}
	$__templater->includeJs(array(
		'src' => 'xf/prefix_menu.js',
		'min' => '1',
	));
	$__compilerTemp3 = '';
	if (!$__vars['article']['Discussion']) {
		$__compilerTemp3 .= '
				' . $__templater->callMacro('tag_macros', 'edit_rows', array(
			'uneditableTags' => $__vars['uneditableTags'],
			'editableTags' => $__vars['editableTags'],
			'minTags' => $__vars['category']['min_tags'],
			'tagList' => 'tagList--article-' . $__vars['article']['article_id'],
		), $__vars) . '				
			';
	}
	$__compilerTemp4 = '';
	if ($__templater->method($__vars['article'], 'canSendModeratorActionAlert', array())) {
		$__compilerTemp4 .= '
				' . $__templater->callMacro('helper_action', 'author_alert', array(
			'selected' => true,
		), $__vars) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body js-prefixListenContainer">
			' . $__templater->formInfoRow('
				' . '<span style="color:red"> <b>Warning!</b> Performing this action will permanently and irreversibly delete the article and all of its contents (comments, ratings, reviews etc) upon successful conversion to a discussion thread!</span>' . '
			', array(
		'rowtype' => 'confirm',
	)) . '
			
			' . $__templater->formSelectRow(array(
		'name' => 'target_node_id',
		'value' => ($__vars['article']['Discussion'] ? $__vars['article']['Discussion']['node_id'] : 0),
		'class' => 'js-nodeList',
	), $__compilerTemp1, array(
		'label' => 'Destination forum',
	)) . '
			
			' . $__templater->formRow('
				' . '' . '
				' . $__templater->callMacro('prefix_macros', 'select', array(
		'type' => 'thread',
		'prefixes' => $__vars['threadPrefixes'],
		'href' => $__templater->func('link', array('forums/prefixes', ), false),
		'listenTo' => '< .js-prefixListenContainer | .js-nodeList',
	), $__vars) . '
			', array(
		'label' => 'Prefix',
		'rowtype' => 'input',
	)) . '	
			
			' . $__compilerTemp3 . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'notify_watchers',
		'value' => '1',
		'selected' => true,
		'label' => 'Notify members watching the destination forum',
		'_type' => 'option',
	)), array(
	)) . '
			
			' . $__compilerTemp4 . '
			
			' . $__templater->formInfoRow('
				' . 'Are you sure you want to convert this article to a thread?' . '
			', array(
		'rowtype' => 'confirm',
	)) . '			
		</div>
		
		' . $__templater->formSubmitRow(array(
		'icon' => 'confirm',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('ams/convert-to-thread', $__vars['article'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);