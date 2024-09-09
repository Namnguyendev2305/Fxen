<?php
// FROM HASH: bd37a46852e29406a1572aecbb6caca9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formSelectRow(array(
		'name' => 'options[order]',
		'value' => $__vars['options']['order'],
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
		'value' => 'review_count',
		'label' => 'Reviews',
		'_type' => 'option',
	),
	array(
		'value' => 'view_count',
		'label' => 'Views',
		'_type' => 'option',
	)), array(
		'label' => 'Sort order',
		'explain' => 'Select the sort order to fetch articles by for this widget',
	)) . '

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[featured_articles_only]',
		'value' => '1',
		'selected' => $__vars['options']['featured_articles_only'],
		'label' => 'Featured articles only',
		'hint' => 'If enabled, only featured articles will be fetched.',
		'_type' => 'option',
	)), array(
	)) . '

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[limit]',
		'value' => $__vars['options']['limit'],
		'min' => '1',
	), array(
		'label' => 'Marker limit',
	)) . '

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[container_height]',
		'value' => $__vars['options']['container_height'],
		'min' => '200',
	), array(
		'label' => 'Container height',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[block_title_link]',
		'value' => $__vars['options']['block_title_link'],
	), array(
		'label' => 'Block title link',
		'explain' => 'Add a specific URL that you want the block title to link to.  Leaving this blank will link to "New Articles"
',
	)) . '

';
	$__compilerTemp1 = array(array(
		'value' => '0',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Any' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['prefixGroups'])) {
		foreach ($__vars['prefixGroups'] AS $__vars['groupId'] => $__vars['prefixGroup']) {
			if (($__templater->func('count', array($__vars['prefixesGrouped'][$__vars['groupId']], ), false) > 0)) {
				$__compilerTemp1[] = array(
					'label' => $__templater->func('prefix_group', array('ams_article', $__vars['groupId'], ), false),
					'_type' => 'optgroup',
					'options' => array(),
				);
				end($__compilerTemp1); $__compilerTemp2 = key($__compilerTemp1);
				if ($__templater->isTraversable($__vars['prefixesGrouped'][$__vars['groupId']])) {
					foreach ($__vars['prefixesGrouped'][$__vars['groupId']] AS $__vars['prefixId'] => $__vars['prefix']) {
						$__compilerTemp1[$__compilerTemp2]['options'][] = array(
							'value' => $__vars['prefixId'],
							'label' => $__templater->func('prefix_title', array('ams_article', $__vars['prefixId'], ), true),
							'_type' => 'option',
						);
					}
				}
			}
		}
	}
	$__finalCompiled .= $__templater->formSelectRow(array(
		'name' => 'options[article_prefix_ids][]',
		'size' => '7',
		'multiple' => 'true',
		'value' => ($__vars['options']['article_prefix_ids'] ?: 0),
	), $__compilerTemp1, array(
		'label' => 'Prefixes',
	)) . '

';
	$__compilerTemp3 = array(array(
		'value' => '0',
		'label' => 'All categories',
		'_type' => 'option',
	));
	$__compilerTemp4 = $__templater->method($__vars['categoryTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp4)) {
		foreach ($__compilerTemp4 AS $__vars['treeEntry']) {
			$__compilerTemp3[] = array(
				'value' => $__vars['treeEntry']['record']['category_id'],
				'label' => '
			' . $__templater->filter($__templater->func('repeat', array('&nbsp;&nbsp;', $__vars['treeEntry']['depth'], ), false), array(array('raw', array()),), true) . $__templater->escape($__vars['treeEntry']['record']['title']) . '
		',
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formSelectRow(array(
		'name' => 'options[article_category_ids][]',
		'value' => ($__vars['options']['article_category_ids'] ?: 0),
		'multiple' => 'multiple',
		'size' => '7',
	), $__compilerTemp3, array(
		'label' => 'Category limit',
	));
	return $__finalCompiled;
}
);