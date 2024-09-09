<?php
// FROM HASH: 1b268ec040c230472a401e9588487b62
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formAssetUploadRow(array(
		'name' => $__vars['inputName'],
		'value' => $__vars['option']['option_value'],
		'asset' => 'xa_ams_map_markers',
	), array(
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
	));
	return $__finalCompiled;
}
);