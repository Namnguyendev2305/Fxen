<?php
// FROM HASH: 16e9f323c35abc6e514897e5793bbc66
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('xa_ams_review_macros', 'review', array(
		'review' => $__vars['review'],
		'article' => $__vars['article'],
	), $__vars);
	return $__finalCompiled;
}
);