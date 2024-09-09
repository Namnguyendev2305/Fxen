<?php
// FROM HASH: 9221869e68e2ed5b2fa032d7fd578a3a
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
			'label' => 'Tất cả',
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
			' . 'Tiền tố' . $__vars['xf']['language']['label_separator'] . '
			<div class="u-inputSpacer">
				' . $__templater->callMacro('prefix_macros', 'select', array(
			'prefixes' => $__vars['prefixesGrouped'],
			'type' => 'ams_article',
			'selected' => ($__vars['filters']['prefix_id'] ?: 0),
			'name' => 'prefix_id',
			'noneLabel' => $__vars['xf']['language']['parenthesis_open'] . 'Tất cả' . $__vars['xf']['language']['parenthesis_close'],
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
			'label' => 'Tất cả',
			'_type' => 'option',
		)
,array(
			'value' => 'visible',
			'label' => 'Hiển thị',
			'_type' => 'option',
		));
		if ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('xa_ams', 'viewModerated', ))) {
			$__compilerTemp4[] = array(
				'value' => 'moderated',
				'label' => 'Cần kiểm duyệt',
				'_type' => 'option',
			);
		}
		if ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('xa_ams', 'viewDeleted', ))) {
			$__compilerTemp4[] = array(
				'value' => 'deleted',
				'label' => 'Bị xóa',
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
		' . 'Tiêu đề' . $__vars['xf']['language']['label_separator'] . '
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
		' . 'Cập nhật mới nhất' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formSelect(array(
		'name' => 'last_days',
		'value' => ($__vars['filters']['last_days'] ?: $__vars['forum']['list_date_limit_days']),
	), array(array(
		'value' => '-1',
		'label' => 'Tất cả thời gian',
		'_type' => 'option',
	),
	array(
		'value' => '7',
		'label' => '' . '7' . ' ngày',
		'_type' => 'option',
	),
	array(
		'value' => '14',
		'label' => '' . '14' . ' ngày',
		'_type' => 'option',
	),
	array(
		'value' => '30',
		'label' => '' . '30' . ' ngày',
		'_type' => 'option',
	),
	array(
		'value' => '60',
		'label' => '' . '2' . ' tháng',
		'_type' => 'option',
	),
	array(
		'value' => '90',
		'label' => '' . '3' . ' tháng',
		'_type' => 'option',
	),
	array(
		'value' => '182',
		'label' => '' . '6' . ' tháng',
		'_type' => 'option',
	),
	array(
		'value' => '365',
		'label' => '1 Năm',
		'_type' => 'option',
	))) . '
		</div>
	</div>

	' . '
	' . $__compilerTemp3 . '
	
	' . '
	<div class="menu-row menu-row--separated">
		' . 'Sắp xếp theo' . $__vars['xf']['language']['label_separator'] . '
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
		'label' => 'Bình chọn',
		'_type' => 'option',
	),
	array(
		'value' => 'reaction_score',
		'label' => 'Điểm tương tác',
		'_type' => 'option',
	),
	array(
		'value' => 'view_count',
		'label' => 'Lượt xem',
		'_type' => 'option',
	),
	array(
		'value' => 'title',
		'label' => 'Tiêu đề',
		'_type' => 'option',
	))) . '
			<span class="inputGroup-splitter"></span>
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
		'action' => $__templater->func('link', array('ams/authors/filters', $__vars['user'], ), false),
	));
	return $__finalCompiled;
}
);