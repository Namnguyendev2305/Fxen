<?php
// FROM HASH: 444a7ca4aea6e0ea1514a6e15dd2f16c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if ($__vars['showRatingFilter']) {
		$__compilerTemp1 .= '
		<div class="menu-row menu-row--separated">
			' . 'Avg rating' . $__vars['xf']['language']['label_separator'] . '
			<div class="u-inputSpacer">
				' . $__templater->formSelect(array(
			'name' => 'rating_avg',
			'value' => $__vars['filters']['rating_avg'],
		), array(array(
			'value' => '',
			'label' => 'Any',
			'_type' => 'option',
		),
		array(
			'value' => '5',
			'label' => '5 Stars',
			'_type' => 'option',
		),
		array(
			'value' => '4',
			'label' => '4 Stars &amp; up',
			'_type' => 'option',
		),
		array(
			'value' => '3',
			'label' => '3 Stars &amp; up',
			'_type' => 'option',
		),
		array(
			'value' => '2',
			'label' => '2 Stars &amp; up',
			'_type' => 'option',
		))) . '
			</div>
		</div>
	';
	}
	$__compilerTemp2 = '';
	if (!$__templater->test($__vars['prefixesGrouped'], 'empty', array())) {
		$__compilerTemp2 .= '
		<div class="menu-row menu-row--separated">
			' . 'Prefix' . $__vars['xf']['language']['label_separator'] . '
			<div class="u-inputSpacer">
				' . $__templater->callMacro('prefix_macros', 'select', array(
			'prefixes' => $__vars['prefixesGrouped'],
			'type' => 'ams_article',
			'selected' => ($__vars['filters']['prefix_id'] ?: 0),
			'name' => 'prefix_id',
			'noneLabel' => $__vars['xf']['language']['parenthesis_open'] . 'Any' . $__vars['xf']['language']['parenthesis_close'],
		), $__vars) . '
			</div>
		</div>
	';
	}
	$__compilerTemp3 = '';
	if (($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('xa_ams', 'viewModerated', )) OR $__templater->method($__vars['xf']['visitor'], 'hasPermission', array('xa_ams', 'viewDeleted', )))) {
		$__compilerTemp3 .= '
		<div class="menu-row menu-row--separated">
			' . 'Content state' . $__vars['xf']['language']['label_separator'] . '
			<div class="u-inputSpacer">
				';
		$__compilerTemp4 = array(array(
			'value' => '',
			'label' => 'Any',
			'_type' => 'option',
		)
,array(
			'value' => 'visible',
			'label' => 'Visible',
			'_type' => 'option',
		));
		if ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('xa_ams', 'viewModerated', ))) {
			$__compilerTemp4[] = array(
				'value' => 'moderated',
				'label' => 'Moderated',
				'_type' => 'option',
			);
		}
		if ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('xa_ams', 'viewDeleted', ))) {
			$__compilerTemp4[] = array(
				'value' => 'deleted',
				'label' => 'Deleted',
				'_type' => 'option',
			);
		}
		$__compilerTemp3 .= $__templater->formSelect(array(
			'name' => 'state',
			'value' => $__vars['filters']['state'],
		), $__compilerTemp4) . '
			</div>
		</div>
	';
	}
	$__finalCompiled .= $__templater->form('

	' . '
	<div class="menu-row menu-row--separated">
		' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'featured',
		'selected' => $__vars['filters']['featured'],
		'label' => 'Featured articles',
		'_type' => 'option',
	),
	array(
		'name' => 'is_rated',
		'selected' => $__vars['filters']['is_rated'],
		'label' => 'Articles that have been rated',
		'_type' => 'option',
	),
	array(
		'name' => 'has_reviews',
		'selected' => $__vars['filters']['has_reviews'],
		'label' => 'Articles with reviews',
		'_type' => 'option',
	),
	array(
		'name' => 'has_comments',
		'selected' => $__vars['filters']['has_comments'],
		'label' => 'Articles with comments',
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
		' . 'Articles that mention' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formTextBox(array(
		'name' => 'term',
		'value' => $__vars['filters']['term'],
	)) . '
		</div>
	</div>		

	' . '
	' . $__compilerTemp1 . '
	
	' . '
	' . $__compilerTemp2 . '

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
		' . 'Last updated' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formSelect(array(
		'name' => 'last_days',
		'value' => ($__vars['filters']['last_days'] ?: $__vars['forum']['list_date_limit_days']),
	), array(array(
		'value' => '-1',
		'label' => 'Any time',
		'_type' => 'option',
	),
	array(
		'value' => '7',
		'label' => '' . '7' . ' days',
		'_type' => 'option',
	),
	array(
		'value' => '14',
		'label' => '' . '14' . ' days',
		'_type' => 'option',
	),
	array(
		'value' => '30',
		'label' => '' . '30' . ' days',
		'_type' => 'option',
	),
	array(
		'value' => '60',
		'label' => '' . '2' . ' months',
		'_type' => 'option',
	),
	array(
		'value' => '90',
		'label' => '' . '3' . ' months',
		'_type' => 'option',
	),
	array(
		'value' => '182',
		'label' => '' . '6' . ' months',
		'_type' => 'option',
	),
	array(
		'value' => '365',
		'label' => '1 year',
		'_type' => 'option',
	))) . '
		</div>
	</div>

	' . '
	' . $__compilerTemp3 . '
	
	' . '
	<div class="menu-row menu-row--separated">
		' . 'Sort by' . $__vars['xf']['language']['label_separator'] . '
		<div class="inputGroup u-inputSpacer">
			' . $__templater->formSelect(array(
		'name' => 'order',
		'value' => ($__vars['filters']['order'] ?: $__vars['xf']['options']['xaAmsListDefaultOrder']),
	), array(array(
		'value' => 'publish_date',
		'label' => 'Publish date',
		'_type' => 'option',
	),
	array(
		'value' => 'last_update',
		'label' => 'Last update',
		'_type' => 'option',
	),
	array(
		'value' => 'rating_weighted',
		'label' => 'Rating',
		'_type' => 'option',
	),
	array(
		'value' => 'reaction_score',
		'label' => 'Reaction score',
		'_type' => 'option',
	),
	array(
		'value' => 'view_count',
		'label' => 'Views',
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
		'action' => $__templater->func('link', array(($__vars['category'] ? 'ams/categories/filters' : 'ams/filters'), $__vars['category'], ), false),
	));
	return $__finalCompiled;
}
);