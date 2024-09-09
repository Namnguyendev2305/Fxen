<?php
// FROM HASH: 0103c7b53edb354c9678dcbdb95e1d95
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['canInlineMod']) {
		$__finalCompiled .= '
	';
		$__templater->includeJs(array(
			'src' => 'xf/inline_mod.js',
			'min' => '1',
		));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

<div class="block" data-xf-init="' . ($__vars['canInlineMod'] ? 'inline-mod' : '') . '" data-type="ams_comment" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
	<div class="block-container">
		<div class="block-body">
			' . $__templater->callMacro('xa_ams_comment_macros', 'comment', array(
		'comment' => $__vars['comment'],
		'content' => $__vars['content'],
		'linkPrefix' => 'ams/article-comments',
	), $__vars) . '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);