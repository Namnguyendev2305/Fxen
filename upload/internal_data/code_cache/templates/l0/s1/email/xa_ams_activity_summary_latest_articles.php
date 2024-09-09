<?php
// FROM HASH: 04e5e42b069e634f069cf2e9d830b83d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__templater->test($__vars['articles'], 'empty', array())) {
		$__finalCompiled .= '
	' . $__templater->callMacro('activity_summary_macros', 'outer_header', array(
			'title' => $__vars['title'],
		), $__vars) . '

	';
		if ($__templater->isTraversable($__vars['articles'])) {
			foreach ($__vars['articles'] AS $__vars['article']) {
				$__finalCompiled .= '
		';
				$__vars['header'] = $__templater->preEscaped('
			<a href="' . $__templater->func('link', array('canonical:ams', $__vars['article'], ), true) . '">' . $__templater->escape($__vars['article']['title']) . '</a>
		');
				$__finalCompiled .= '

		';
				$__compilerTemp1 = '';
				if ($__vars['article']['last_update'] > $__vars['article']['publish_date']) {
					$__compilerTemp1 .= '								
				&middot; <span class="u-muted">' . 'Updated' . '</span>
				' . $__templater->func('date_dynamic', array($__vars['article']['last_update'], array(
					))) . '
			';
				}
				$__compilerTemp2 = '';
				if ($__vars['article']['author_rating'] AND $__vars['article']['Category']['allow_author_rating']) {
					$__compilerTemp2 .= '
				&middot;
				<span style="font-size:14pt; font-weight:700; color:#176093;">
					' . (((((($__vars['article']['author_rating'] >= 1) ? '&#9733;' : '&#9734;') . (($__vars['article']['author_rating'] >= 2) ? '&#9733;' : '&#9734;')) . (($__vars['article']['author_rating'] >= 3) ? '&#9733;' : '&#9734;')) . (($__vars['article']['author_rating'] >= 4) ? '&#9733;' : '&#9734;')) . (($__vars['article']['author_rating'] >= 5) ? '&#9733;' : '&#9734;')) . '
				</span>
			';
				}
				$__compilerTemp3 = '';
				if ($__vars['article']['rating_count'] AND $__vars['article']['Category']['allow_ratings']) {
					$__compilerTemp3 .= '
				&middot;
				<span style="font-size:14pt; font-weight:700; color:#f9c479;">
					' . (((((($__vars['article']['rating_avg'] >= 1) ? '&#9733;' : '&#9734;') . (($__vars['article']['rating_avg'] >= 2) ? '&#9733;' : '&#9734;')) . (($__vars['article']['rating_avg'] >= 3) ? '&#9733;' : '&#9734;')) . (($__vars['article']['rating_avg'] >= 4) ? '&#9733;' : '&#9734;')) . (($__vars['article']['rating_avg'] >= 5) ? '&#9733;' : '&#9734;')) . '
				</span>
			';
				}
				$__compilerTemp4 = '';
				if ($__vars['article']['view_count']) {
					$__compilerTemp4 .= '
				&middot; ' . 'Views' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->filter($__vars['article']['view_count'], array(array('number_short', array()),), true) . '
			';
				}
				$__compilerTemp5 = '';
				if ($__vars['article']['Category']['allow_comments'] AND $__vars['article']['comment_count']) {
					$__compilerTemp5 .= '
				&middot; ' . 'Comments' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->filter($__vars['article']['comment_count'], array(array('number_short', array()),), true) . '
			';
				}
				$__compilerTemp6 = '';
				if ($__vars['article']['Category']['allow_ratings'] AND $__vars['article']['review_count']) {
					$__compilerTemp6 .= '
				&middot; ' . 'Reviews' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->filter($__vars['article']['review_count'], array(array('number_short', array()),), true) . '
			';
				}
				$__compilerTemp7 = '';
				if ($__vars['article']['reaction_score']) {
					$__compilerTemp7 .= '
				&middot; ' . 'Reaction score' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->filter($__vars['article']['reaction_score'], array(array('number_short', array()),), true) . '
			';
				}
				$__vars['attribution'] = $__templater->preEscaped('
			' . ($__vars['article']['User'] ? $__templater->escape($__vars['article']['User']['username']) : $__templater->escape($__vars['article']['username'])) . '
			&middot; ' . $__templater->func('date_time', array($__vars['article']['publish_date'], ), true) . '
			' . $__compilerTemp1 . '
			' . $__compilerTemp2 . '
			' . $__compilerTemp3 . '
			' . $__compilerTemp4 . '
			' . $__compilerTemp5 . '
			' . $__compilerTemp6 . '
			' . $__compilerTemp7 . '
		');
				$__finalCompiled .= '

		';
				$__compilerTemp8 = '';
				if ($__vars['article']['cover_image_id'] AND ($__vars['article']['CoverImage'] AND $__vars['article']['CoverImage']['thumbnail_url'])) {
					$__compilerTemp8 .= '
					<div style="float: left; width: 100px; padding-bottom: 10px; margin-right: 20px;">
						<span style="max-width: 100px;">
							<a href="' . $__templater->func('link', array('canonical:ams', $__vars['article'], ), true) . '"><img src="' . $__templater->escape($__vars['article']['CoverImage']['thumbnail_url']) . '" alt="' . $__templater->escape($__vars['article']['title']) . '" style="display: block; width:100%;" /></a>
						</span>
					</div>
				';
				} else if ($__vars['article']['Category']['content_image_url']) {
					$__compilerTemp8 .= '
					<div style="float: left; width: 100px; padding-bottom: 10px; margin-right: 20px;">
						<span style="max-width: 100px;">
							<a href="' . $__templater->func('link', array('canonical:ams', $__vars['article'], ), true) . '"><img src="' . $__templater->func('base_url', array($__vars['article']['Category']['content_image_url'], ), true) . '" style="display: block; width:100%;"/></a>
						</span>
					</div>
				';
				}
				$__compilerTemp9 = '';
				if (!$__vars['displayHeader']) {
					$__compilerTemp9 .= '
						<div style="padding-bottom: 10px; font-weight:700; font-size: 14pt;">
							<a href="' . $__templater->func('link', array('canonical:ams', $__vars['article'], ), true) . '">' . $__templater->escape($__vars['article']['title']) . '</a>
						</div>
					';
				}
				$__compilerTemp10 = '';
				if ($__vars['displayDescription'] AND ($__vars['article']['description'] != '')) {
					$__compilerTemp10 .= '
						<div style="padding-bottom: 20px; font-weight:700;">
							' . $__templater->func('bb_code_type_snippet', array('emailHtml', $__vars['article']['description'], 'ams_article', $__vars['article']['description'], 200, ), true) . '
						</div>
					';
				}
				$__compilerTemp11 = '';
				if ($__vars['snippetType'] == 'rich_text') {
					$__compilerTemp11 .= '
						' . $__templater->func('bb_code_type_snippet', array('emailHtml', $__vars['article']['message'], 'ams_article', $__vars['article'], 300, ), true) . '
					';
				} else {
					$__compilerTemp11 .= '
						' . $__templater->func('snippet', array($__vars['article']['message'], 300, array('stripBbCode' => true, 'stripQuote' => true, ), ), true) . '
					';
				}
				$__vars['content'] = $__templater->preEscaped('
			<div style="width: 100%; margin: 0 auto;">
				' . $__compilerTemp8 . '

				<div>
					' . $__compilerTemp9 . '

					' . $__compilerTemp10 . '

					' . $__compilerTemp11 . '
				</div>
			</div>
		');
				$__finalCompiled .= '

		';
				$__vars['footer'] = $__templater->preEscaped('
			' . 'Category' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->func('link', array('canonical:ams/categories', $__vars['article']['Category'], ), true) . '">' . $__templater->escape($__vars['article']['Category']['title']) . '</a>
		');
				$__finalCompiled .= '

		';
				$__vars['footerOpposite'] = $__templater->preEscaped('
			<a href="' . $__templater->func('link', array('canonical:ams', $__vars['article'], ), true) . '" class="button button--link">' . 'View this article' . '</a>
		');
				$__finalCompiled .= '

		' . $__templater->callMacro('activity_summary_macros', 'block', array(
					'header' => ($__vars['displayHeader'] ? $__vars['header'] : ''),
					'attribution' => ($__vars['displayAttribution'] ? $__vars['attribution'] : ''),
					'content' => $__vars['content'],
					'footer' => ($__vars['displayFooter'] ? $__vars['footer'] : ''),
					'footerOpposite' => ($__vars['displayFooterOpposite'] ? $__vars['footerOpposite'] : ''),
				), $__vars) . '
	';
			}
		}
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
}
);