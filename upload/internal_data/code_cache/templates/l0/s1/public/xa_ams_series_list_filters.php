<?php
// FROM HASH: eeb8bfa64b07c305aa1ddd7a1a43f7b4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->form('

	' . '
	<div class="menu-row menu-row--separated">
		' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'featured',
		'selected' => $__vars['filters']['featured'],
		'label' => 'Featured series',
		'_type' => 'option',
	),
	array(
		'name' => 'community',
		'selected' => $__vars['filters']['community'],
		'label' => 'Community series',
		'_type' => 'option',
	),
	array(
		'name' => 'has_articles',
		'selected' => $__vars['filters']['has_articles'],
		'label' => 'Series with articles',
		'_type' => 'option',
	))) . '
	</div>

	' . '
	<div class="menu-row menu-row--separated">
		' . 'Title' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formTextBox(array(
		'name' => 'title',
		'value' => $__vars['filters']['title'],
	)) . '
		</div>
	</div>
	
	' . '
	<div class="menu-row menu-row--separated">
		' . 'Series that mention' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formTextBox(array(
		'name' => 'term',
		'value' => $__vars['filters']['term'],
	)) . '
		</div>
	</div>		

	' . '
	<div class="menu-row menu-row--separated">
		' . 'Created by' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formTextBox(array(
		'name' => 'creator',
		'value' => ($__vars['creatorFilter'] ? $__vars['creatorFilter']['username'] : ''),
		'ac' => 'single',
	)) . '
		</div>
	</div>

	' . '
	<div class="menu-row menu-row--separated">
		' . 'Sort by' . $__vars['xf']['language']['label_separator'] . '
		<div class="inputGroup u-inputSpacer">
			' . $__templater->formSelect(array(
		'name' => 'order',
		'value' => ($__vars['filters']['order'] ?: 'last_part_date'),
	), array(array(
		'value' => 'last_part_date',
		'label' => 'Latest article',
		'_type' => 'option',
	),
	array(
		'value' => 'create_date',
		'label' => 'Create date',
		'_type' => 'option',
	),
	array(
		'value' => 'article_count',
		'label' => 'Articles',
		'_type' => 'option',
	),
	array(
		'value' => 'title',
		'label' => 'Title',
		'_type' => 'option',
	))) . '
			<span class="inputGroup-splitter"></span>
			' . $__templater->formSelect(array(
		'name' => 'direction',
		'value' => ($__vars['filters']['direction'] ?: 'desc'),
	), array(array(
		'value' => 'desc',
		'label' => 'Descending',
		'_type' => 'option',
	),
	array(
		'value' => 'asc',
		'label' => 'Ascending',
		'_type' => 'option',
	))) . '
		</div>
	</div>

	<div class="menu-footer">
		<span class="menu-footer-controls">
			' . $__templater->button('Filter', array(
		'type' => 'submit',
		'class' => 'button--primary',
	), '', array(
	)) . '
		</span>
	</div>
	' . $__templater->formHiddenVal('apply', '1', array(
	)) . '
', array(
		'action' => $__templater->func('link', array('ams/series/filters', null, ), false),
	));
	return $__finalCompiled;
}
);