<?php
// FROM HASH: dc97b01bad23bb524d7b969f30c18da9
return array(
'macros' => array('series_page_options' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'series' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__templater->setPageParam('searchConstraints', array('Articles' => array('search_type' => 'ams_article', ), 'This series' => array('search_type' => 'ams_article', 'c' => array('series' => array($__vars['series']['series_id'], ), ), ), ));
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';

	return $__finalCompiled;
}
);