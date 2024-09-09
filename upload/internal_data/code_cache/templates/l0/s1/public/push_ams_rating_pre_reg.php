<?php
// FROM HASH: 2bcafe57533fa0693a304bcbdf76a1f4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Welcome to ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '!' . '
' . 'Your review to the article ' . ($__templater->func('prefix', array('ams_article', $__vars['content']['Article'], 'plain', ), true) . $__templater->escape($__vars['content']['Article']['title'])) . ' was submitted.' . '
<push:url>' . $__templater->func('link', array('canonical:ams/review', $__vars['content'], ), true) . '</push:url>';
	return $__finalCompiled;
}
);