<?php
// FROM HASH: 9f060ecc4e650c9e8e2fd27a359c018c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' mentioned you in a review on article ' . (((('<a href="' . $__templater->func('link', array('ams/review', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['content']['Content']['title'])) . '</a>') . '.';
	return $__finalCompiled;
}
);