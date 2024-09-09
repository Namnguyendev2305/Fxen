<?php
// FROM HASH: 9269733c686d046a47024b1dc4a2cf27
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Article prefixes');
	$__finalCompiled .= '

' . $__templater->includeTemplate('base_prefix_list', $__vars);
	return $__finalCompiled;
}
);