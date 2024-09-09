<?php
// FROM HASH: bfc36254685d5f3fb0b76f37b617a47f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' commented on the article ' . (((('<a href="' . $__templater->func('link', array('ams/comments', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['content']['Content']['title'])) . '</a>') . '. There may be more comments after this.';
	return $__finalCompiled;
}
);