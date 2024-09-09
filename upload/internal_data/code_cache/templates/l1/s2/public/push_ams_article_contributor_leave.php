<?php
// FROM HASH: 25b823e412685540cff736458f3284a7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' left the article contributors team for the article ' . ($__templater->func('prefix', array('ams_article', $__vars['content'], 'plain', ), true) . $__templater->escape($__vars['content']['title'])) . '.' . '
<push:url>' . $__templater->func('link', array('canonical:ams', $__vars['content'], ), true) . '</push:url>';
	return $__finalCompiled;
}
);