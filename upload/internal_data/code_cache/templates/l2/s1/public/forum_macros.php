<?php
// FROM HASH: cb5c154d3b99b5d36beb64054d5d8d8e
return array(
'macros' => array('forum_page_options' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'forum' => '!',
		'thread' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__templater->setPageParam('forum', $__vars['forum']);
	$__finalCompiled .= '

	';
	if ($__vars['thread']) {
		$__finalCompiled .= '
		';
		$__templater->setPageParam('searchConstraints', array('Chủ đề' => array('search_type' => 'post', ), 'Chuyên mục này' => array('search_type' => 'post', 'c' => array('nodes' => array($__vars['forum']['node_id'], ), 'child_nodes' => 1, ), ), 'Chủ đề này' => array('search_type' => 'post', 'c' => array('thread' => $__vars['thread']['thread_id'], ), ), ));
		$__finalCompiled .= '
	';
	} else {
		$__finalCompiled .= '
		';
		$__templater->setPageParam('searchConstraints', array('Chủ đề' => array('search_type' => 'post', ), 'Chuyên mục này' => array('search_type' => 'post', 'c' => array('nodes' => array($__vars['forum']['node_id'], ), 'child_nodes' => 1, ), ), ));
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';

	return $__finalCompiled;
}
);