<?php
// FROM HASH: f8be7638486f0ea81cdcdc8e48f89e67
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' reacted to your review on the article ' . $__templater->escape($__vars['content']['Content']['title']) . ' with ' . $__templater->func('reaction_title', array($__vars['extra']['reaction_id'], ), true) . '.' . '

<push:url>' . $__templater->func('link', array('canonical:ams/review', $__vars['content'], ), true) . '</push:url>
<push:tag>ams_rating_reaction_' . $__templater->escape($__vars['content']['rating_id']) . '_' . $__templater->escape($__vars['extra']['reaction_id']) . '</push:tag>';
	return $__finalCompiled;
}
);