<?php
// FROM HASH: 0a4b1602d7224abfa67756d3efa98f9b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' added the article ' . ((((('<a href="' . $__templater->func('link', array('ams', $__vars['content']['Article'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->func('prefix', array('ams_article', $__vars['content']['Article'], ), true)) . $__templater->escape($__vars['content']['Article']['title'])) . '</a>') . ' to the series ' . (((('<a href="' . $__templater->func('link', array('ams/series', $__vars['content']['Series'], ), true)) . '">') . $__templater->escape($__vars['content']['Series']['title'])) . '</a>') . '.';
	return $__finalCompiled;
}
);