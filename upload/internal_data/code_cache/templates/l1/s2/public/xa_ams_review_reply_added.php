<?php
// FROM HASH: d70494696470ff74cce11df344443941
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('xa_ams_review_macros', 'author_reply_row', array(
		'review' => $__vars['review'],
		'article' => $__vars['article'],
	), $__vars);
	return $__finalCompiled;
}
);