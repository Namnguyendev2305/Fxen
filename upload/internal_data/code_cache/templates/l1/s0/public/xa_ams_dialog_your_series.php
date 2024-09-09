<?php
// FROM HASH: 250a8b221dedb61b4479b6c0410cf308
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('xa_ams_editor_dialog_ams', 'series_list', array(
		'page' => $__vars['page'],
		'series' => $__vars['series'],
		'listClass' => 'js-yourSeriesList',
		'link' => 'ams/series/dialog/yours',
		'hasMore' => $__vars['hasMore'],
	), $__vars);
	return $__finalCompiled;
}
);