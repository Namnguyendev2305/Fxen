<?php
// FROM HASH: 51edfdf3e8f2666ff07f5b90e56d33b7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' reacted to your comment on article ' . $__templater->escape($__vars['content']['Content']['title']) . ' with ' . $__templater->func('reaction_title', array($__vars['extra']['reaction_id'], ), true) . '.' . '

<push:url>' . $__templater->func('link', array('canonical:ams/comments', $__vars['content'], ), true) . '</push:url>
<push:tag>ams_comment_reaction_' . $__templater->escape($__vars['content']['comment_id']) . '_' . $__templater->escape($__vars['extra']['reaction_id']) . '</push:tag>';
	return $__finalCompiled;
}
);