<?php
// FROM HASH: 35e1fb1deb80c863414a4059fe572c1f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Kiểm duyệt trực tuyến - Di chuyển bài viết');
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
	$__compilerTemp3 = '';
	if ($__templater->isTraversable($__vars['posts'])) {
		foreach ($__vars['posts'] AS $__vars['post']) {
			$__compilerTemp3 .= '
		' . $__templater->formHiddenVal('ids[]', $__vars['post']['post_id'], array(
			)) . '
	';
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body js-prefixListenContainer">
			' . $__templater->formInfoRow('Bạn có chắc chắn muốn di chuyển ' . $__templater->escape($__vars['total']) . ' bài viết đến chủ đề mới?', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'thread_type',
		'value' => $__vars['type'],
	), array(array(
		'value' => 'new',
		'checked' => 'checked',
		'labelclass' => 'u-featuredText',
		'label' => 'Chủ đề mới',
		'_dependent' => array('
						<label>' . 'Diễn đàn chuyển đến
' . $__vars['xf']['language']['label_separator'] . '</label>
						' . $__templater->formSelect(array(
		'name' => 'node_id',
		'value' => $__vars['first']['Thread']['node_id'],
		'class' => 'js-nodeList',
	), $__compilerTemp1) . '
					', '
						<label>' . 'Tiêu đề mới của chủ đề' . $__vars['xf']['language']['label_separator'] . '</label>
						' . $__templater->formPrefixInput($__vars['prefixes'], array(
		'type' => 'thread',
		'prefix-value' => $__vars['first']['Thread']['prefix_id'],
		'textbox-value' => $__vars['first']['Thread']['title'],
		'autofocus' => 'autofocus',
		'href' => $__templater->func('link', array('forums/prefixes', ), false),
		'listen-to' => '< .js-prefixListenContainer | .js-nodeList',
		'maxlength' => $__templater->func('max_length', array($__vars['first']['Thread'], 'title', ), false),
	)) . '
					'),
		'_type' => 'option',
	),
	array(
		'value' => 'existing',
		'labelclass' => 'u-featuredText',
		'label' => 'Existing thread',
		'_dependent' => array('
						<label>' . 'Thread URL' . $__vars['xf']['language']['label_separator'] . '</label>
						' . $__templater->formTextBox(array(
		'name' => 'existing_url',
		'type' => 'url',
	)) . '
					'),
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->callMacro('helper_action', 'author_alert', array(
		'selected' => ($__vars['total'] == 1),
	), $__vars) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'move',
	), array(
	)) . '
	</div>

	' . $__compilerTemp3 . '

	' . $__templater->formHiddenVal('type', 'post', array(
	)) . '
	' . $__templater->formHiddenVal('action', 'move', array(
	)) . '
	' . $__templater->formHiddenVal('confirmed', '1', array(
	)) . '

	' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
', array(
		'action' => $__templater->func('link', array('inline-mod', ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);