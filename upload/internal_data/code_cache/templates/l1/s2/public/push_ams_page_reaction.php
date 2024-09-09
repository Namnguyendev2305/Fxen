<?php
// FROM HASH: f9bcc25a66af229745bf8bf4bb37155a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' reacted to your page ' . $__templater->escape($__vars['content']['title']) . ' on the article ' . $__templater->escape($__vars['content']['Content']['title']) . ' with ' . $__templater->func('reaction_title', array($__vars['extra']['reaction_id'], ), true) . '.' . '

<push:url>' . $__templater->func('link', array('canonical:ams/page', $__vars['content'], ), true) . '</push:url>
<push:tag>ams_page_reaction_' . $__templater->escape($__vars['content']['page_id']) . '_' . $__templater->escape($__vars['extra']['reaction_id']) . '</push:tag>';
	return $__finalCompiled;
}
);