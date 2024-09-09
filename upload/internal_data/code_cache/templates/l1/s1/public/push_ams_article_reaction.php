<?php
// FROM HASH: 86a38bcd46d5d539e74e64c3fd17881b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' reacted to your article ' . $__templater->escape($__vars['content']['title']) . ' with ' . $__templater->func('reaction_title', array($__vars['extra']['reaction_id'], ), true) . '.' . '
<push:url>' . $__templater->func('link', array('canonical:ams', $__vars['content'], ), true) . '</push:url>
<push:tag>ams_article_reaction_' . $__templater->escape($__vars['content']['article_id']) . '_' . $__templater->escape($__vars['extra']['reaction_id']) . '</push:tag>';
	return $__finalCompiled;
}
);