<?php
// FROM HASH: 28f6d444fc52dcdac91444f4c9590737
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Nhật ký link proxy');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body block-row">
			' . $__templater->formTextBox(array(
		'name' => 'url',
		'value' => $__vars['filters']['url'],
		'placeholder' => 'URL chứa' . $__vars['xf']['language']['ellipsis'],
		'class' => 'input--inline',
	)) . '

			<span>
				' . 'Sắp xếp theo' . $__vars['xf']['language']['label_separator'] . '
				' . $__templater->formSelect(array(
		'name' => 'order',
		'value' => ($__vars['filters']['order'] ? $__vars['filters']['order'] : 'last_request_date'),
		'class' => 'input--inline',
	), array(array(
		'value' => 'last_request_date',
		'label' => 'Yêu cầu cuối cùng',
		'_type' => 'option',
	),
	array(
		'value' => 'first_request_date',
		'label' => 'Yêu cầu đầu tiên',
		'_type' => 'option',
	),
	array(
		'value' => 'hits',
		'label' => 'Lượt',
		'_type' => 'option',
	))) . '
			</span>

			' . $__templater->button('Tới', array(
		'type' => 'submit',
	), '', array(
	)) . '
		</div>
	</div>
', array(
		'action' => $__templater->func('link', array('logs/link-proxy', ), false),
		'class' => 'block',
	)) . '

';
	if (!$__templater->test($__vars['entries'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['entries'])) {
			foreach ($__vars['entries'] AS $__vars['entry']) {
				$__compilerTemp1 .= '
						' . $__templater->dataRow(array(
				), array(array(
					'href' => $__templater->func('link', array('logs/link-proxy', $__vars['entry'], ), false),
					'overlay' => 'true',
					'_type' => 'cell',
					'html' => '
								<div class="dataList-textRow">' . $__templater->escape($__vars['entry']['url']) . '</div>
								<div class="dataList-subRow">
									<ul class="listInline listInline--bullet">
										<li>' . 'Yêu cầu đầu tiên' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['entry']['first_request_date'], array(
				))) . '</li>
										<li>' . 'Yêu cầu cuối cùng' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['entry']['last_request_date'], array(
				))) . '</li>
									</ul>
								</div>
							',
				),
				array(
					'href' => $__templater->func('link', array('logs/link-proxy', $__vars['entry'], ), false),
					'class' => 'dataList-cell--min',
					'overlay' => 'true',
					'_type' => 'cell',
					'html' => '
								' . $__templater->filter($__vars['entry']['hits'], array(array('number', array()),), true) . '
							',
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => 'Link',
		),
		array(
			'_type' => 'cell',
			'html' => 'Lượt',
		))) . '
					' . $__compilerTemp1 . '
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
			'link' => 'logs/link-proxy',
			'params' => $__vars['filters'],
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