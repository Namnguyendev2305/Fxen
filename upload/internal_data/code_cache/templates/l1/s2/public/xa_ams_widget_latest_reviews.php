<?php
// FROM HASH: e798f5713836e623ef0a16dd9a93434a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__templater->test($__vars['reviews'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block"' . $__templater->func('widget_data', array($__vars['widget'], ), true) . '>
		<div class="block-container">
			<h3 class="block-minorHeader">
				<a href="' . $__templater->func('link', array('ams/latest-reviews', ), true) . '" rel="nofollow">' . ($__templater->escape($__vars['title']) ?: 'Latest reviews') . '</a>
			</h3>
			<ul class="block-body">
				';
		if ($__templater->isTraversable($__vars['reviews'])) {
			foreach ($__vars['reviews'] AS $__vars['review']) {
				$__finalCompiled .= '
					<li class="block-row">
						' . $__templater->callMacro('xa_ams_review_macros', 'review_simple', array(
					'review' => $__vars['review'],
				), $__vars) . '
					</li>
				';
			}
		}
		$__finalCompiled .= '
			</ul>
		</div>
	</div>
';
	}
	return $__finalCompiled;
}
);