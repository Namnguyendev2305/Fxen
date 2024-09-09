<?php
// FROM HASH: f2c4ec4357c2aeb33b2b613312772f7e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->func('prefix', array('ams_article', $__vars['article'], 'escaped', ), true) . $__templater->escape($__vars['article']['title']) . ' - ' . 'Ratings');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['pageSelected'] = 'ratings';
	$__templater->wrapTemplate('xa_ams_article_wrapper', $__compilerTemp1);
	$__finalCompiled .= '

';
	if ($__vars['canInlineModReviews']) {
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

<div class="block"
	data-xf-init="' . ($__vars['canInlineModReviews'] ? 'inline-mod' : '') . '"
	data-type="ams_rating"
	data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
	
	';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
					' . $__templater->callMacro('xa_ams_article_wrapper_macros', 'action_buttons', array(
		'article' => $__vars['article'],
		'showRateButton' => false,
		'canInlineMod' => $__vars['canInlineModReviews'],
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__finalCompiled .= '
		<div class="block-outer">
			<div class="block-outer-opposite">
				' . $__compilerTemp2 . '
			</div>
		</div>
	';
	}
	$__finalCompiled .= '

	<div class="block-container">
		<div class="block-body">
			';
	if ($__templater->isTraversable($__vars['ratings'])) {
		foreach ($__vars['ratings'] AS $__vars['rating']) {
			$__finalCompiled .= '
				' . $__templater->callMacro('xa_ams_review_macros', 'rating', array(
				'rating' => $__vars['rating'],
				'article' => $__vars['article'],
			), $__vars) . '
			';
		}
	}
	$__finalCompiled .= '
		</div>
	</div>
	';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
				' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'ams/ratings',
		'data' => $__vars['article'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '
			';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__finalCompiled .= '
		<div class="block-outer block-outer--after">
			' . $__compilerTemp3 . '
		</div>
	';
	}
	$__finalCompiled .= '
</div>';
	return $__finalCompiled;
}
);