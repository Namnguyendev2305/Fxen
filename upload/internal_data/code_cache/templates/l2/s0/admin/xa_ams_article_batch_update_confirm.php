<?php
// FROM HASH: 437a8a5eba8b0d2debf10485bd2cdbb7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Batch update articles');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__vars['articleIds']) {
		$__compilerTemp1 .= '
					<span role="presentation" aria-hidden="true">&middot;</span>
					<a href="' . $__templater->func('link', array('xa-ams/list', null, array('criteria' => $__vars['criteria'], 'all' => true, ), ), true) . '">' . 'Xem hoặc lọc lại' . '</a>
				';
	}
	$__compilerTemp2 = array(array(
		'value' => '0',
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['categories'])) {
		foreach ($__vars['categories'] AS $__vars['category']) {
			$__compilerTemp2[] = array(
				'value' => $__vars['category']['value'],
				'label' => $__templater->escape($__vars['category']['label']),
				'disabled' => $__vars['category']['disabled'],
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp3 = '';
	if ($__vars['hasPrefixes']) {
		$__compilerTemp3 .= '
					' . 'If the selected articles(s) have any prefixes applied which are not valid in the selected category, those prefixes will be removed.' . '
				';
	}
	$__compilerTemp4 = '';
	if ($__vars['prefixes']['prefixesGrouped']) {
		$__compilerTemp4 .= '
				' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'actions[apply_article_prefix]',
			'label' => 'Đặt tiền tố',
			'_dependent' => array('
							' . $__templater->callMacro('public:prefix_macros', 'select', array(
			'prefixes' => $__vars['prefixes']['prefixesGrouped'],
			'name' => 'actions[prefix_id]',
			'type' => 'ams_article',
		), $__vars) . '
						'),
			'_type' => 'option',
		)), array(
			'explain' => 'The prefix will only be applied if it is valid for the category the article is in or is being moved to.',
		)) . '
			';
	}
	$__compilerTemp5 = '';
	if ($__vars['articleIds']) {
		$__compilerTemp5 .= '
		' . $__templater->formHiddenVal('article_ids', $__templater->filter($__vars['articleIds'], array(array('json', array()),), false), array(
		)) . '
	';
	} else {
		$__compilerTemp5 .= '
		' . $__templater->formHiddenVal('criteria', $__templater->filter($__vars['criteria'], array(array('json', array()),), false), array(
		)) . '
	';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<h2 class="block-header">' . 'Update articles' . '</h2>
		<div class="block-body">
			' . $__templater->formRow('
				' . $__templater->filter($__vars['total'], array(array('number', array()),), true) . '
				' . $__compilerTemp1 . '
			', array(
		'label' => 'Matched articles',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formSelectRow(array(
		'name' => 'actions[category_id]',
	), $__compilerTemp2, array(
		'label' => 'Move to category',
		'explain' => $__compilerTemp3,
	)) . '

			' . $__compilerTemp4 . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'actions[approve]',
		'value' => 'approve',
		'label' => 'Approve articles',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[unapprove]',
		'value' => 'unapprove',
		'label' => 'Unapprove articles',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[soft_delete]',
		'value' => 'soft_delete',
		'label' => 'Soft delete articles',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'actions[lock]',
		'value' => 'lock',
		'label' => 'Lock comments',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[unlock]',
		'value' => 'unlock',
		'label' => 'Unlock comments',
		'_type' => 'option',
	)), array(
	)) . '
			
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'actions[lockRatings]',
		'value' => 'lockRatings',
		'label' => 'Lock ratings',
		'_type' => 'option',
	),
	array(
		'name' => 'actions[unlockRatings]',
		'value' => 'unlockRatings',
		'label' => 'Unlock ratings',
		'_type' => 'option',
	)), array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Update articles',
		'icon' => 'save',
	), array(
	)) . '
	</div>

	' . $__compilerTemp5 . '
', array(
		'action' => $__templater->func('link', array('xa-ams/batch-update/action', ), false),
		'class' => 'block',
	)) . '

';
	$__compilerTemp6 = '';
	if ($__vars['articleIds']) {
		$__compilerTemp6 .= '
		' . $__templater->formHiddenVal('article_ids', $__templater->filter($__vars['articleIds'], array(array('json', array()),), false), array(
		)) . '
	';
	} else {
		$__compilerTemp6 .= '
		' . $__templater->formHiddenVal('criteria', $__templater->filter($__vars['criteria'], array(array('json', array()),), false), array(
		)) . '
	';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<h2 class="block-header">' . 'Delete articles' . '</h2>
		<div class="block-body">
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'actions[delete]',
		'label' => '
					' . 'Confirm deletion of ' . $__templater->filter($__vars['total'], array(array('number', array()),), true) . ' articles' . '
				',
		'_type' => 'option',
	)), array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'name' => 'confirm_delete',
		'icon' => 'delete',
	), array(
	)) . '
	</div>

	' . $__compilerTemp6 . '
', array(
		'action' => $__templater->func('link', array('xa-ams/batch-update/action', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);