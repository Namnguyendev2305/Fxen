<?php
// FROM HASH: 9b23d58014796fb147f4edc013d5ec45
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['title']) . ' - ' . 'Lịch sử nội dung');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__vars['breadcrumbs']);
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<h2 class="block-tabHeader tabs" data-xf-init="tabs" role="tablist">
			<a class="tabs-tab is-active" role="tab" tabindex="0" aria-controls="' . $__templater->func('unique_id', array('ehFormatted', ), true) . '">' . 'Định dạng' . '</a>
			<a class="tabs-tab" role="tab" tabindex="0" aria-controls="' . $__templater->func('unique_id', array('ehRaw', ), true) . '">' . 'Nguyên bản' . '</a>
		</h2>
		<ul class="tabPanes block-body">
			<li class="block-row is-active" role="tabpanel" id="' . $__templater->func('unique_id', array('ehFormatted', ), true) . '">
				' . $__templater->filter($__templater->method($__vars['handler'], 'getHtmlFormattedContent', array($__vars['editHistory']['old_text'], $__vars['content'], )), array(array('raw', array()),), true) . '
			</li>
			<li class="block-row" role="tabpanel" id="' . $__templater->func('unique_id', array('ehRaw', ), true) . '">
				' . $__templater->formTextArea(array(
		'rows' => '10',
		'readonly' => 'readonly',
		'value' => $__vars['editHistory']['old_text'],
	)) . '
			</li>
		</ul>
		' . $__templater->form('
			<span class="block-footer-controls">
				' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'confirm',
		'value' => '1',
		'_dependent' => array('
							' . $__templater->button('
								' . 'Khôi phục' . '
							', array(
		'type' => 'submit',
		'name' => 'revert',
		'value' => '1',
		'class' => 'button--primary',
	), '', array(
	)) . '
						'),
		'_type' => 'option',
	))) . '
			</span>
		', array(
		'action' => $__templater->func('link', array('edit-history/revert', $__vars['editHistory'], ), false),
		'class' => 'block-footer',
		'ajax' => 'true',
	)) . '
	</div>
</div>';
	return $__finalCompiled;
}
);