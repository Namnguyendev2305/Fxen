<?php
// FROM HASH: 5118b386ff8d7d2a9f613e399579b3a4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<li class="block-row block-row--separated ' . ($__templater->method($__vars['review'], 'isIgnored', array()) ? 'is-ignored' : '') . ' js-inlineModContainer" data-author="' . (($__vars['review']['is_anonymous'] ? 'Anonymous' : $__templater->escape($__vars['review']['User']['username'])) ?: $__templater->escape($__vars['review']['username'])) . '">
	<div class="contentRow ' . ((!$__templater->method($__vars['review'], 'isVisible', array())) ? 'is-deleted' : '') . '">
		<span class="contentRow-figure">
			';
	if ($__vars['review']['is_anonymous']) {
		$__finalCompiled .= '
				' . $__templater->func('avatar', array(null, 's', false, array(
			'defaultname' => 'Anonymous',
		))) . '
				';
	} else {
		$__finalCompiled .= '
				' . $__templater->func('avatar', array($__vars['review']['User'], 's', false, array(
			'defaultname' => ($__vars['review']['username'] ?: 'Deleted member'),
		))) . '
			';
	}
	$__finalCompiled .= '
		</span>
		<div class="contentRow-main">
			<h3 class="contentRow-title">
				<a href="' . $__templater->func('link', array('ams/review', $__vars['review'], ), true) . '">
					' . 'Review by \'' . ($__vars['review']['is_anonymous'] ? 'Anonymous' : $__templater->escape($__vars['review']['username'])) . '\' in article \'' . $__templater->escape($__vars['review']['Article']['title']) . '\'' . '
				</a>
			</h3>

			<div class="contentRow-snippet">' . $__templater->func('snippet', array($__vars['review']['message'], 300, array('term' => $__vars['options']['term'], 'stripQuote' => true, ), ), true) . '</div>

			<div class="contentRow-minor contentRow-minor--hideLinks">
				<ul class="listInline listInline--bullet">
					';
	if (($__vars['options']['mod'] == 'ams_rating') AND $__templater->method($__vars['review'], 'canUseInlineModeration', array())) {
		$__finalCompiled .= '
						<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['review']['rating_id'],
			'class' => 'js-inlineModToggle',
			'_type' => 'option',
		))) . '</li>
					';
	}
	$__finalCompiled .= '
					';
	if ($__vars['review']['is_anonymous']) {
		$__finalCompiled .= '
						<li>' . $__templater->func('username_link', array(null, false, array(
			'defaultname' => 'Anonymous',
		))) . '
						';
		if ($__templater->method($__vars['review'], 'canViewAnonymousAuthor', array())) {
			$__finalCompiled .= '
							(' . $__templater->func('username_link', array($__vars['review']['User'], false, array(
				'defaultname' => 'Deleted member',
			))) . ')
						';
		}
		$__finalCompiled .= '</li>
					';
	} else {
		$__finalCompiled .= '
						<li>' . $__templater->func('username_link', array($__vars['review']['User'], false, array(
			'defaultname' => '$review.username',
		))) . '</li>
					';
	}
	$__finalCompiled .= '
					<li>' . 'Article rating' . '</li>
					<li>' . $__templater->func('date_dynamic', array($__vars['review']['rating_date'], array(
	))) . '</li>
				</ul>
			</div>
		</div>
	</div>
</li>';
	return $__finalCompiled;
}
);