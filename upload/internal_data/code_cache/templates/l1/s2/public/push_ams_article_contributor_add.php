<?php
// FROM HASH: 97b5f8f3c7dc40aa55dd87613eaa0a73
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' added you as a contributor for the article ' . ($__templater->func('prefix', array('ams_article', $__vars['content'], 'plain', ), true) . $__templater->escape($__vars['content']['title'])) . '.' . '
<push:url>' . $__templater->func('link', array('canonical:ams', $__vars['content'], ), true) . '</push:url>';
	return $__finalCompiled;
}
);