<?php
// FROM HASH: 5b4786ca764a8e2ecc9590357d561580
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' reacted to your page ' . (((('<a href="' . $__templater->func('link', array('ams/page', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['content']['title'])) . '</a>') . ' on the article ' . (((('<a href="' . $__templater->func('link', array('ams/page', $__vars['content'], ), true)) . '">') . $__templater->escape($__vars['content']['Content']['title'])) . '</a>') . ' with ' . $__templater->filter($__templater->func('alert_reaction', array($__vars['extra']['reaction_id'], ), false), array(array('preescaped', array()),), true) . '.';
	return $__finalCompiled;
}
);