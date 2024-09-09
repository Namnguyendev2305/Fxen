<?php
// FROM HASH: 8367c5ffdbcfe0336bec42f0e86b94a2
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' replied to your review of the article ' . ((((('<a href="' . $__templater->func('link', array('ams/review', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->func('prefix', array('ams_article', $__vars['content']['Article'], ), true)) . $__templater->escape($__vars['content']['Article']['title'])) . '</a>') . '.';
	return $__finalCompiled;
}
);