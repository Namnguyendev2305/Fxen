<?php
// FROM HASH: 6d728fba2e6e67b92cfc6995b5f3ce08
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Nhật ký image proxy');
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
		'value' => 'views',
		'label' => 'Lượt',
		'_type' => 'option',
	),
	array(
		'value' => 'file_size',
		'label' => 'Dung lượng',
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
		'action' => $__templater->func('link', array('logs/image-proxy', ), false),
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
						';
				$__compilerTemp2 = '';
				if ($__templater->method($__vars['entry'], 'isValid', array())) {
					$__compilerTemp2 .= '
									<img src="' . $__templater->func('link', array('logs/image-proxy/image', $__vars['entry'], ), true) . '" alt="" />
								';
				} else {
					$__compilerTemp2 .= '
									<span class="dataList-imagePlaceholder"></span>
								';
				}
				$__compilerTemp3 = '';
				if ($__vars['entry']['file_size']) {
					$__compilerTemp3 .= '<li>' . 'Dung lượng' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->filter($__vars['entry']['file_size'], array(array('file_size', array()),), true) . '</li>';
				}
				$__compilerTemp1 .= $__templater->dataRow(array(
				), array(array(
					'class' => 'dataList-cell--min dataList-cell--alt dataList-cell--image dataList-cell--imageMediumWide',
					'href' => $__templater->func('link', array('logs/image-proxy', $__vars['entry'], ), false),
					'overlay' => 'true',
					'_type' => 'cell',
					'html' => '
								' . $__compilerTemp2 . '
							',
				),
				array(
					'href' => $__templater->func('link', array('logs/image-proxy', $__vars['entry'], ), false),
					'overlay' => 'true',
					'_type' => 'cell',
					'html' => '
								<div class="dataList-textRow">' . $__templater->escape($__vars['entry']['url']) . '</div>
								<div class="dataList-subRow">
									<ul class="listInline listInline--bullet">
										' . $__compilerTemp3 . '
										<li>' . 'Yêu cầu đầu tiên' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['entry']['first_request_date'], array(
				))) . '</li>
										<li>' . 'Yêu cầu cuối cùng' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['entry']['last_request_date'], array(
				))) . '</li>
									</ul>
								</div>
							',
				),
				array(
					'href' => $__templater->func('link', array('logs/image-proxy', $__vars['entry'], ), false),
					'class' => 'dataList-cell--min',
					'overlay' => 'true',
					'_type' => 'cell',
					'html' => '
								' . $__templater->filter($__vars['entry']['views'], array(array('number', array()),), true) . '
							',
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'colspan' => '2',
			'_type' => 'cell',
			'html' => 'Ảnh',
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
			'link' => 'logs/image-proxy',
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