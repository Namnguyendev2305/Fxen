<?php
// FROM HASH: fa72d7a40d34bbc9dff3ddd60a0bc62c
return array(
'extensions' => array('start' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	
	return $__finalCompiled;
},
'before_sort' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	
	return $__finalCompiled;
},
'end' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	
	return $__finalCompiled;
}),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = array(array(
		'value' => '-1',
		'label' => 'Tất cả',
		'_type' => 'option',
	));
	$__compilerTemp2 = $__templater->func('range', array(5, 1, ), false);
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['rating']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['rating'],
				'label' => '' . $__templater->escape($__vars['rating']) . ' star(s)',
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	' . $__templater->renderExtension('start', $__vars, $__extensions) . '

	' . '
	<div class="menu-row menu-row--separated">
		<label for="ctrl_rating">' . 'Bình chọn' . $__vars['xf']['language']['label_separator'] . '</label>
		<div class="u-inputSpacer">
			' . $__templater->formSelect(array(
		'name' => 'rating',
		'value' => $__vars['filters']['rating'],
		'id' => 'ctrl_rating',
	), $__compilerTemp1) . '
		</div>
	</div>
	
	' . '
	<div class="menu-row menu-row--separated">
		' . 'Reviews that mention' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formTextBox(array(
		'name' => 'term',
		'value' => $__vars['filters']['term'],
	)) . '
		</div>
	</div>		

	' . $__templater->renderExtension('before_sort', $__vars, $__extensions) . '

	' . '
	<div class="menu-row menu-row--separated">
		' . 'Sắp xếp theo' . $__vars['xf']['language']['label_separator'] . '
		<div class="inputGroup u-inputSpacer">
			<span class="u-srOnly" id="ctrl_sort_by">' . 'Sort order' . '</span>
			' . $__templater->formSelect(array(
		'name' => 'order',
		'value' => ($__vars['filters']['order'] ?: 'rating_date'),
	), array(array(
		'value' => 'rating_date',
		'label' => 'Ngày',
		'_type' => 'option',
	),
	array(
		'value' => 'vote_score',
		'label' => 'Most helpful',
		'_type' => 'option',
	),
	array(
		'value' => 'rating',
		'label' => 'Bình chọn',
		'_type' => 'option',
	))) . '
			<span class="inputGroup-splitter"></span>
			<span class="u-srOnly" id="ctrl_sort_direction">' . 'Sort direction' . '</span>
			' . $__templater->formSelect(array(
		'name' => 'direction',
		'value' => ($__vars['filters']['direction'] ?: 'desc'),
	), array(array(
		'value' => 'desc',
		'label' => 'Giảm dần',
		'_type' => 'option',
	),
	array(
		'value' => 'asc',
		'label' => 'Tăng dần',
		'_type' => 'option',
	))) . '
		</div>
	</div>

	' . $__templater->renderExtension('end', $__vars, $__extensions) . '

	<div class="menu-footer">
		<span class="menu-footer-controls">
			' . $__templater->button('Lọc', array(
		'type' => 'submit',
		'class' => 'button--primary',
	), '', array(
	)) . '
		</span>
	</div>
	' . $__templater->formHiddenVal('apply', '1', array(
	)) . '
', array(
		'action' => $__vars['actionLink'],
	));
	return $__finalCompiled;
}
);