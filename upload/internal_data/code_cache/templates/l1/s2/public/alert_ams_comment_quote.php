<?php
// FROM HASH: 5c1a0c00a5329498a22929f42c363e1a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' quoted your comment on the article ' . (((('<a href="' . $__templater->func('link', array('ams/comments', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['content']['Content']['title'])) . '</a>') . '.';
	return $__finalCompiled;
}
);