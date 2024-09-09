<?php
// FROM HASH: 54e92975c86b78e4d9b119001b366fa8
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="contentRow-figure contentRow-figure--fixedBookmarkIcon">
	';
	if ($__vars['content']['CoverImage']) {
		$__finalCompiled .= '
		<div class="contentRow-figureContainer">
			<a href="' . $__templater->func('link', array('ams', $__vars['content'], ), true) . '">
				' . $__templater->func('ams_article_thumbnail', array($__vars['content'], ), true) . '
			</a>			
		</div>
	';
	} else if ($__vars['content']['SeriesPart']['Series'] AND $__vars['content']['SeriesPart']['Series']['icon_date']) {
		$__finalCompiled .= '
		<div class="contentRow-figureContainer">
			' . $__templater->func('ams_series_icon', array($__vars['content']['SeriesPart']['Series'], 's', $__templater->func('link', array('ams', $__vars['content'], ), false), ), true) . '
		</div>
	';
	} else if ($__vars['content']['Category']['content_image_url']) {
		$__finalCompiled .= '
		<div class="contentRow-figureContainer">
			<a href="' . $__templater->func('link', array('ams', $__vars['content'], ), true) . '">
				' . $__templater->func('ams_category_icon', array($__vars['content'], ), true) . '
			</a>			
		</div>
	';
	} else {
		$__finalCompiled .= '
		' . $__templater->func('avatar', array($__vars['content']['User'], 's', false, array(
			'defaultname' => $__vars['content']['username'],
		))) . '
	';
	}
	$__finalCompiled .= '
</div>';
	return $__finalCompiled;
}
);