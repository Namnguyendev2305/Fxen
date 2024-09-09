<?php
// FROM HASH: 6974d11e5e7c1d5380669eb4b8548af6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Article prompts ');
	$__finalCompiled .= '

' . $__templater->includeTemplate('base_prompt_list', $__vars) . '

<div class="block">
	<div class="block-container">
		<h2 class="block-header">' . 'Default article prompt' . '</h2>
		<div class="block-body">
			' . $__templater->dataList('
				' . $__templater->dataRow(array(
	), array(array(
		'href' => $__templater->func('link', array('phrases/edit-by-name', array(), array('title' => 'ams_article_prompt.default', ), ), false),
		'class' => 'dataList-cell',
		'_type' => 'cell',
		'html' => 'Article title',
	))) . '
			', array(
	)) . '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);