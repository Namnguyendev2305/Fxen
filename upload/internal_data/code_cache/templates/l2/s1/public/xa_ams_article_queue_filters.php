<?php
// FROM HASH: 5affa53271dd62ed65db3487d08f7c95
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if (!$__templater->test($__vars['prefixesGrouped'], 'empty', array())) {
		$__compilerTemp1 .= '
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
	$__finalCompiled .= $__templater->form('

	' . '
	<div class="menu-row menu-row--separated">
		' . 'Content state' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formSelect(array(
		'name' => 'state',
		'value' => $__vars['filters']['state'],
	), array(array(
		'value' => '',
		'label' => 'Tất cả',
		'_type' => 'option',
	),
	array(
		'value' => 'draft',
		'label' => 'Draft',
		'_type' => 'option',
	),
	array(
		'value' => 'awaiting',
		'label' => 'Awaiting',
		'_type' => 'option',
	))) . '
		</div>
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
	' . $__compilerTemp1 . '

	' . '
	<div class="menu-row menu-row--separated">
		' . 'Tạo bởi' . $__vars['xf']['language']['label_separator'] . '
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
		'action' => $__templater->func('link', array('ams/article-queue-filters', ), false),
	));
	return $__finalCompiled;
}
);