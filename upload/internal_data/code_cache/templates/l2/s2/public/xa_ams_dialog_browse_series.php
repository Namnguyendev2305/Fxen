<?php
// FROM HASH: c0048db113e50b65f514d612aa9fef80
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('xa_ams_editor_dialog_ams', 'series_list', array(
		'page' => $__vars['page'],
		'series' => $__vars['series'],
		'listClass' => 'js-browseSeriesList',
		'link' => 'ams/series/dialog/browse',
		'hasMore' => $__vars['hasMore'],
	), $__vars);
	return $__finalCompiled;
}
);