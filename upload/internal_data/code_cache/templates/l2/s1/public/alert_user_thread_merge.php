<?php
// FROM HASH: 6767197a5d9620ba9fb527702291d347
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'Chủ đề của bạn ' . $__templater->escape($__vars['extra']['title']) . ' đã được gộp vào ' . ((((('<a href="' . $__templater->func('base_url', array($__vars['extra']['targetLink'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->func('prefix', array('thread', $__vars['extra']['prefix_id'], ), true)) . $__templater->escape($__vars['extra']['targetTitle'])) . '</a>') . '.' . '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Lý do' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	return $__finalCompiled;
}
);