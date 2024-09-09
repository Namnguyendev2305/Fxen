<?php
// FROM HASH: f7d2cc1e51e844b1ae6e769d46d84a5b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('multi_quote_macros', 'block', array(
		'quotes' => $__vars['quotes'],
		'messages' => $__vars['comments'],
		'containerRelation' => 'Content',
		'dateKey' => 'comment_date',
		'bbCodeContext' => 'ams_comment',
	), $__vars);
	return $__finalCompiled;
}
);