<?php
// FROM HASH: 5a680b879c250d018e912d9ffe7a769b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' added a new page \'' . (((('<a href="' . $__templater->func('link', array('ams', $__vars['content']['Article'], array('article_page' => $__vars['content']['page_id'], ), ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['content']['title'])) . '</a>') . '\' to the article ' . ((((('<a href="' . $__templater->func('link', array('ams', $__vars['content']['Article'], ), true)) . '" class="">') . $__templater->func('prefix', array('ams_article', $__vars['content']['Article'], ), true)) . $__templater->escape($__vars['content']['Article']['title'])) . '</a>') . '.';
	return $__finalCompiled;
}
);