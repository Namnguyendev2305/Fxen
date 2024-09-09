<?php
// FROM HASH: 863540cd457fc5ba8c38ae68eb484ed4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('tools_rebuild', 'rebuild_job', array(
		'header' => 'AMS: ' . 'Rebuild categories',
		'job' => 'XenAddons\\AMS:Category',
	), $__vars) . '
' . '

' . $__templater->callMacro('tools_rebuild', 'rebuild_job', array(
		'header' => 'AMS: ' . 'Rebuild articles',
		'job' => 'XenAddons\\AMS:ArticleItem',
	), $__vars) . '
' . '

' . $__templater->callMacro('tools_rebuild', 'rebuild_job', array(
		'header' => 'AMS: ' . 'Rebuild article location data',
		'job' => 'XenAddons\\AMS:ArticleLocationData',
	), $__vars) . '
' . '

' . $__templater->callMacro('tools_rebuild', 'rebuild_job', array(
		'header' => 'AMS: ' . 'Rebuild series',
		'job' => 'XenAddons\\AMS:Series',
	), $__vars) . '
' . '

' . $__templater->callMacro('tools_rebuild', 'rebuild_job', array(
		'header' => 'AMS: ' . 'Rebuild series parts',
		'job' => 'XenAddons\\AMS:SeriesPart',
	), $__vars) . '
' . '

' . $__templater->callMacro('tools_rebuild', 'rebuild_job', array(
		'header' => 'AMS: ' . 'Rebuild user counts',
		'job' => 'XenAddons\\AMS:UserArticleCount',
	), $__vars) . '
' . '

';
	$__vars['amsArticleMdBody'] = $__templater->preEscaped('
	' . $__templater->formCheckBoxRow(array(
		'name' => 'options[types]',
		'listclass' => 'listColumns',
	), array(array(
		'value' => 'attachments',
		'label' => 'Đính kèm',
		'selected' => true,
		'_type' => 'option',
	)), array(
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro('tools_rebuild', 'rebuild_job', array(
		'header' => 'AMS: ' . 'Rebuild article embed metadata',
		'body' => $__vars['amsArticleMdBody'],
		'job' => 'XenAddons\\AMS:AmsArticleEmbedMetadata',
	), $__vars) . '
' . '

';
	$__vars['amsArticlePageMdBody'] = $__templater->preEscaped('
	' . $__templater->formCheckBoxRow(array(
		'name' => 'options[types]',
		'listclass' => 'listColumns',
	), array(array(
		'value' => 'attachments',
		'label' => 'Đính kèm',
		'selected' => true,
		'_type' => 'option',
	)), array(
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro('tools_rebuild', 'rebuild_job', array(
		'header' => 'AMS: ' . 'Rebuild article page embed metadata',
		'body' => $__vars['amsArticlePageMdBody'],
		'job' => 'XenAddons\\AMS:AmsArticlePageEmbedMetadata',
	), $__vars) . '
' . '

';
	$__vars['amsCommentMdBody'] = $__templater->preEscaped('
	' . $__templater->formCheckBoxRow(array(
		'name' => 'options[types]',
		'listclass' => 'listColumns',
	), array(array(
		'value' => 'attachments',
		'label' => 'Đính kèm',
		'selected' => true,
		'_type' => 'option',
	)), array(
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro('tools_rebuild', 'rebuild_job', array(
		'header' => 'AMS: ' . 'Rebuild article comment embed metadata',
		'body' => $__vars['amsCommentMdBody'],
		'job' => 'XenAddons\\AMS:AmsCommentEmbedMetadata',
	), $__vars) . '
' . '

';
	$__vars['amsReviewMdBody'] = $__templater->preEscaped('
	' . $__templater->formCheckBoxRow(array(
		'name' => 'options[types]',
		'listclass' => 'listColumns',
	), array(array(
		'value' => 'attachments',
		'label' => 'Đính kèm',
		'selected' => true,
		'_type' => 'option',
	)), array(
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro('tools_rebuild', 'rebuild_job', array(
		'header' => 'AMS: ' . 'Rebuild article review embed metadata',
		'body' => $__vars['amsReviewMdBody'],
		'job' => 'XenAddons\\AMS:AmsReviewEmbedMetadata',
	), $__vars) . '
' . '

';
	$__vars['amsSeriesMdBody'] = $__templater->preEscaped('
	' . $__templater->formCheckBoxRow(array(
		'name' => 'options[types]',
		'listclass' => 'listColumns',
	), array(array(
		'value' => 'attachments',
		'label' => 'Đính kèm',
		'selected' => true,
		'_type' => 'option',
	)), array(
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro('tools_rebuild', 'rebuild_job', array(
		'header' => 'AMS: ' . 'Rebuild series embed metadata',
		'body' => $__vars['amsSeriesMdBody'],
		'job' => 'XenAddons\\AMS:AmsSeriesEmbedMetadata',
	), $__vars) . '
';
	return $__finalCompiled;
}
);