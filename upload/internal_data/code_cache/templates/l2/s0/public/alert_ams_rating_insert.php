<?php
// FROM HASH: 2d56b48a8218a7d32538a791c0ef6674
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['content']['is_review']) {
		$__finalCompiled .= '	
	';
		if ($__vars['content']['is_anonymous']) {
			$__finalCompiled .= '
		' . '' . 'Vô danh' . ' reviewed the article ' . ((((('<a href="' . $__templater->func('link', array('ams/review', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->func('prefix', array('ams_article', $__vars['content']['Article'], ), true)) . $__templater->escape($__vars['content']['Article']['title'])) . '</a>') . '.' . '
	';
		} else {
			$__finalCompiled .= '
		' . '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' reviewed the article ' . ((((('<a href="' . $__templater->func('link', array('ams/review', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->func('prefix', array('ams_article', $__vars['content']['Article'], ), true)) . $__templater->escape($__vars['content']['Article']['title'])) . '</a>') . '.' . '
	';
		}
		$__finalCompiled .= '	
';
	} else {
		$__finalCompiled .= '
	';
		if ($__vars['content']['is_anonymous']) {
			$__finalCompiled .= '	
		' . '' . 'Vô danh' . ' rated the article ' . ((((('<a href="' . $__templater->func('link', array('ams', $__vars['content']['Article'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->func('prefix', array('ams_article', $__vars['content']['Article'], ), true)) . $__templater->escape($__vars['content']['Article']['title'])) . '</a>') . '.' . '
	';
		} else {
			$__finalCompiled .= '
		' . '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' rated the article ' . ((((('<a href="' . $__templater->func('link', array('ams', $__vars['content']['Article'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->func('prefix', array('ams_article', $__vars['content']['Article'], ), true)) . $__templater->escape($__vars['content']['Article']['title'])) . '</a>') . '.' . '
	';
		}
		$__finalCompiled .= '		
';
	}
	return $__finalCompiled;
}
);