<?php
// FROM HASH: 17d2c324770e07f966443458496c1223
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'A page ' . (((('<a href="' . $__templater->func('base_url', array($__vars['extra']['link'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['extra']['title'])) . '</a>') . ' on the article ' . ((((('<a href="' . $__templater->func('base_url', array($__vars['extra']['link'], ), true)) . '">') . $__templater->func('prefix', array('ams_article', $__vars['extra']['prefix_id'], ), true)) . $__templater->escape($__vars['extra']['articleTitle'])) . '</a>') . ' was reassigned to you.' . '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Lý do' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	return $__finalCompiled;
}
);