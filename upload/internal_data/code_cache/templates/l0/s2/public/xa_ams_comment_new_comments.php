<?php
// FROM HASH: aff77998628b95c2b13255b5d9b168a5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['firstUnshownComment']) {
		$__finalCompiled .= '
	<div class="message">
		<div class="message-inner">
			<div class="message-cell message-cell--alert">
				' . 'There are more comments to display.' . ' <a href="' . $__templater->func('link', array('ams/comments', $__vars['firstUnshownComment'], ), true) . '">' . 'View them?' . '</a>
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__templater->isTraversable($__vars['comments'])) {
		foreach ($__vars['comments'] AS $__vars['comment']) {
			$__finalCompiled .= '
	' . $__templater->callMacro('xa_ams_comment_macros', 'comment', array(
				'comment' => $__vars['comment'],
				'content' => $__vars['content'],
				'linkPrefix' => $__vars['linkPrefix'],
			), $__vars) . '
';
		}
	}
	return $__finalCompiled;
}
);