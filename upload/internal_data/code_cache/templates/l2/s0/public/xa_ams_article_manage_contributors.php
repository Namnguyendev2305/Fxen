<?php
// FROM HASH: a7a567a061ea4b4c969aac5960143885
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Manage contributors/co-authors');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['article'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['article'], 'canRemoveContributors', array()) AND !$__templater->test($__vars['contributors'], 'empty', array())) {
		$__compilerTemp1 .= '
				';
		$__compilerTemp2 = array();
		if ($__templater->isTraversable($__vars['contributors'])) {
			foreach ($__vars['contributors'] AS $__vars['contributor']) {
				if ($__vars['contributor']['is_co_author']) {
					$__compilerTemp2[] = array(
						'value' => $__vars['contributor']['user_id'],
						'label' => $__templater->escape($__vars['contributor']['User']['username']) . ' - ' . 'Co-author',
						'_type' => 'option',
					);
				}
			}
		}
		if ($__templater->isTraversable($__vars['contributors'])) {
			foreach ($__vars['contributors'] AS $__vars['contributor']) {
				if (!$__vars['contributor']['is_co_author']) {
					$__compilerTemp2[] = array(
						'value' => $__vars['contributor']['user_id'],
						'label' => $__templater->escape($__vars['contributor']['User']['username']),
						'_type' => 'option',
					);
				}
			}
		}
		$__compilerTemp1 .= $__templater->formCheckBoxRow(array(
			'name' => 'remove_contributors',
		), $__compilerTemp2, array(
			'label' => 'Remove contributors/co-authors',
		)) . '
			';
	}
	$__compilerTemp3 = '';
	if ($__templater->method($__vars['article'], 'canAddContributors', array())) {
		$__compilerTemp3 .= '
				' . $__templater->formTokenInputRow(array(
			'name' => 'add_contributors',
			'href' => $__templater->func('link', array('members/find', ), false),
		), array(
			'label' => 'Add contributors',
			'explain' => '
						' . 'Phân tách các tên bằng dấu (,).' . '
						' . 'You may have up to a combination of ' . $__templater->filter($__vars['maxContributors'], array(array('number', array()),), true) . ' contributor(s) and or co-author(s).' . '
					',
		)) . '
			';
	}
	$__compilerTemp4 = '';
	if ($__templater->method($__vars['article'], 'canAddCoAuthors', array())) {
		$__compilerTemp4 .= '
				' . $__templater->formTokenInputRow(array(
			'name' => 'add_co_authors',
			'href' => $__templater->func('link', array('members/find', ), false),
		), array(
			'label' => 'Add co-authors',
			'explain' => '
						' . 'Phân tách các tên bằng dấu (,).' . '
						' . 'You may have up to a combination of ' . $__templater->filter($__vars['maxContributors'], array(array('number', array()),), true) . ' contributor(s) and or co-author(s).' . '
					',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '

			' . $__compilerTemp3 . '

			' . $__compilerTemp4 . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('ams/manage-contributors', $__vars['article'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);