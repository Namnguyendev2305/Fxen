<?php
// FROM HASH: 04ffce3170053dd14c9088cd4c53fec5
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
		'value' => 'view_count',
		'label' => 'Views',
		'_type' => 'option',
	),
	array(
		'value' => 'random',
		'label' => 'Random',
		'_type' => 'option',
	)), array(
		'label' => 'Sort order',
		'explain' => 'Select the sort order to fetch articles by for this widget',
	)) . '

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[limit]',
		'value' => $__vars['options']['limit'],
		'min' => '1',
	), array(
		'label' => 'Maximum entries',
	)) . '

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[exclude_featured]',
		'value' => '1',
		'selected' => $__vars['options']['exclude_featured'],
		'label' => 'Exclude featured articles',
		'hint' => 'Checking this option will exclude any featured articles from being fetched for this widget. ',
		'_type' => 'option',
	)), array(
	)) . '

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[cutOffDays]',
		'value' => $__vars['options']['cutOffDays'],
		'min' => '0',
	), array(
		'label' => 'Cut off days',
		'explain' => 'This is the number of days old that a article can be in order for it to be fetched.  Articles that are older than the cutoff date will not be fetch.  Leave this option set to 0 to bypass the cut off date.',
	)) . '

' . $__templater->formRadioRow(array(
		'name' => 'options[style]',
		'value' => ($__vars['options']['style'] ?: 'simple'),
	), array(array(
		'value' => 'simple',
		'label' => 'Simple',
		'hint' => 'A simple view, designed for narrow spaces such as sidebars.',
		'_type' => 'option',
	),
	array(
		'value' => 'simple_carousel',
		'label' => 'Simple' . ' - ' . 'Carousel',
		'hint' => 'A carousel view, displaying the articles in a simple carousel style slider. <b>This display style is designed for use in the xf sideBar only!</b> <font color="red">This display style will not render properly (or at all) in the xf side<b>Nav</b>!</font>',
		'_type' => 'option',
	),
	array(
		'value' => 'carousel',
		'label' => 'Full' . ' - ' . 'Carousel',
		'hint' => 'A carousel view, displaying articles in a full carousel style slider. This display style is not designed for use in sidebar or sidenav positions.',
		'_type' => 'option',
	),
	array(
		'value' => 'grid',
		'label' => 'Full' . ' - ' . 'Grid block',
		'hint' => 'A full size view, displaying articles in a grid block container (best used with random sort order).  This display style is not designed for use in sidebar or sidenav positions.',
		'_type' => 'option',
	),
	array(
		'value' => 'list_view',
		'label' => 'Full' . ' - ' . 'List view',
		'hint' => 'A full size view, displaying as a standard article list using list view layout type.  This display style is not designed for use in sidebar or sidenav positions.',
		'_type' => 'option',
	),
	array(
		'value' => 'grid_view',
		'label' => 'Full' . ' - ' . 'Grid view',
		'hint' => 'A full size view, displaying as a standard article list using grid view layout type.  This display style is not designed for use in sidebar or sidenav positions.',
		'_type' => 'option',
	),
	array(
		'value' => 'tile_view',
		'label' => 'Full' . ' - ' . 'Tile view',
		'hint' => 'A full size view, displaying as a standard article list using tile view layout type.  This display style is not designed for use in sidebar or sidenav positions.',
		'_type' => 'option',
	),
	array(
		'value' => 'article_view',
		'label' => 'Full' . ' - ' . 'Article view',
		'hint' => 'A full size view, displaying as a standard article list using article view layout type.  This display style is not designed for use in sidebar or sidenav positions.',
		'_type' => 'option',
	)), array(
		'label' => 'Display style',
		'explain' => '<b><span style="color:red;">Important Note</span></b>:  If the viewing user does not have permission to view ams article attachments, they won\'t be able to view Grid Block, Grid View, Tile View or Article View layouts, they will instead view Carousel (in place of Grid Block) or List View (in place of Grid View, TIle View or Article View). ',
	)) . '

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[require_cover_or_content_image]',
		'value' => '1',
		'selected' => $__vars['options']['require_cover_or_content_image'],
		'label' => 'Require cover or content image',
		'hint' => 'Only articles that have a cover image set or are in a category that has a content image set, will be fetched. ',
		'_type' => 'option',
	)), array(
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[block_title_link]',
		'value' => $__vars['options']['block_title_link'],
	), array(
		'label' => 'Block title link',
		'explain' => 'Add a specific URL that you want the block title to link to.  Leaving this blank will link to "New Articles"
',
	)) . '

<hr class="formRowSep" />

' . $__templater->formTokenInputRow(array(
		'name' => 'options[tags]',
		'value' => $__vars['options']['tags'],
		'href' => $__templater->func('link_type', array('public', 'misc/tag-auto-complete', ), false),
	), array(
		'label' => 'Tags',
		'explain' => 'Only articles that have these tags applied to them will be fetched.',
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
		'label' => 'All categories or contextual category',
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
		'explain' => 'If no categories are explicitly selected, this widget will pull from all categories unless used within an AMS category. In this case, the content will be limited to that category and descendents.',
	));
	return $__finalCompiled;
}
);