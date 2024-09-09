<?php
// FROM HASH: d817b15108c70e8141a22966fa4aca5c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Chủ đề của bạn ' . $__templater->escape($__vars['extra']['title']) . ' đã được gộp vào ' . ($__templater->func('prefix', array('thread', $__vars['extra']['prefix_id'], 'plain', ), true) . $__templater->escape($__vars['extra']['targetTitle'])) . '.' . '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Lý do' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	$__finalCompiled .= '
<push:url>' . $__templater->func('base_url', array($__vars['extra']['targetLink'], 'canonical', ), true) . '</push:url>';
	return $__finalCompiled;
}
);