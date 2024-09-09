<?php
// FROM HASH: afcdc1bf5db3768098bb94a8e63ee478
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['extra']['expiry']) {
		$__finalCompiled .= '
	' . 'You will be unable to post comments on or rate the article ' . ((((('<a href="' . $__templater->func('link', array('ams', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->func('prefix', array('ams_article', $__vars['article'], ), true)) . $__templater->escape($__vars['content']['title'])) . '</a>') . ' until ' . $__templater->func('date', array($__vars['extra']['expiry'], ), true) . '.' . '
';
	} else {
		$__finalCompiled .= '
	' . 'You are no longer able to post comments on or rate the article ' . ((((('<a href="' . $__templater->func('link', array('ams', $__vars['content'], ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->func('prefix', array('ams_article', $__vars['article'], ), true)) . $__templater->escape($__vars['content']['title'])) . '</a>') . '.' . '
';
	}
	$__finalCompiled .= '
';
	if ($__vars['extra']['reason']) {
		$__finalCompiled .= 'Lý do' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['extra']['reason']);
	}
	return $__finalCompiled;
}
);