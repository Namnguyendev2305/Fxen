<?php
// FROM HASH: 9eede8e2bad77cd4137f940abf24d92b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Nhật ký Kiểm duyệt viên');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array(array(
		'value' => '0',
		'label' => 'Tất cả',
		'_type' => 'option',
	));
	$__compilerTemp1 = $__templater->mergeChoiceOptions($__compilerTemp1, $__vars['logUsers']);
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body block-row">
			<span>
				' . 'Lọc bởi thành viên' . $__vars['xf']['language']['label_separator'] . '
				' . $__templater->formSelect(array(
		'name' => 'user_id',
		'value' => $__vars['userId'],
		'class' => 'input--inline',
	), $__compilerTemp1) . '
			</span>

			' . $__templater->button('Lọc', array(
		'type' => 'submit',
	), '', array(
	)) . '
		</div>
	</div>
', array(
		'action' => $__templater->func('link', array('logs/moderator', ), false),
		'class' => 'block',
	)) . '

';
	if (!$__templater->test($__vars['entries'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				';
		$__compilerTemp2 = '';
		if ($__templater->isTraversable($__vars['entries'])) {
			foreach ($__vars['entries'] AS $__vars['entry']) {
				$__compilerTemp2 .= '
						' . $__templater->dataRow(array(
				), array(array(
					'_type' => 'cell',
					'html' => '
								<div>
									<a href="' . $__templater->func('link', array('logs/moderator', $__vars['entry'], ), true) . '" data-xf-click="overlay">' . $__templater->filter($__vars['entry']['action_text'], array(array('strip_tags', array()),), true) . '</a>
									<div class="dataList-subRow">' . $__templater->escape($__vars['entry']['content_title']) . '</div>
								</div>
							',
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->func('username_link', array($__vars['entry']['User'], false, array(
					'href' => $__templater->func('link', array('users/edit', $__vars['entry']['User'], ), false),
				))),
				),
				array(
					'class' => 'u-ltr',
					'_type' => 'cell',
					'html' => ($__vars['entry']['ip_address'] ? $__templater->filter($__vars['entry']['ip_address'], array(array('ip', array()),), true) : ''),
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->func('date_dynamic', array($__vars['entry']['log_date'], array(
				))),
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => 'Hành động',
		),
		array(
			'_type' => 'cell',
			'html' => 'Thành viên',
		),
		array(
			'_type' => 'cell',
			'html' => 'Địa chỉ IP',
		),
		array(
			'_type' => 'cell',
			'html' => 'Ngày',
		))) . '
					' . $__compilerTemp2 . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			</div>
			<div class="block-footer">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['entries'], $__vars['total'], ), true) . '</span>
			</div>
		</div>
		' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'logs/moderator',
			'params' => $__vars['linkFilters'],
			'wrapperclass' => 'block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'Không có nhật ký nào được ghi nhận.' . '</div>
';
	}
	return $__finalCompiled;
}
);