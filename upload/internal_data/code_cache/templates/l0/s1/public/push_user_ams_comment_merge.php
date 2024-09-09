<?php
// FROM HASH: 5c55d114ba81c1dc65404aba4789df28
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Your comments in the article ' . ($__templater->func('prefix', array('ams_article', $__vars['extra']['prefix_id'], ), true) . $__templater->escape($__vars['extra']['title'])) . ' were merged together.' . '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Reason' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	$__finalCompiled .= '
<push:url>' . $__templater->func('base_url', array($__vars['extra']['articleLink'], 'canonical', ), true) . '</push:url>';
	return $__finalCompiled;
}
);