<?php
// FROM HASH: 6af51a68ca2323317bb1e2f5687fb0f5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="contentRow-figure contentRow-figure--fixedBookmarkIcon">
	';
	if ($__vars['content']['icon_date']) {
		$__finalCompiled .= '
		<div class="contentRow-figureContainer">
			' . $__templater->func('ams_series_icon', array($__vars['content'], 's', $__templater->func('link', array('ams/series', $__vars['content'], ), false), ), true) . ' 
		</div>
	';
	} else {
		$__finalCompiled .= '
		' . $__templater->func('avatar', array($__vars['content']['User'], 's', false, array(
			'defaultname' => $__vars['content']['User']['username'],
		))) . '
	';
	}
	$__finalCompiled .= '
</div>';
	return $__finalCompiled;
}
);