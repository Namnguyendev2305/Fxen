<?php
// FROM HASH: 4879439fb098efb93860cce95df09202
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '
';
	$__templater->includeCss('message.less');
	$__finalCompiled .= '
<div class="embeddedAmsArticle block--messages">
	<div class="block-row block-row--separated" data-author="' . ($__templater->escape($__vars['article']['User']['username']) ?: $__templater->escape($__vars['article']['username'])) . '">
		<div class="contentRow amsArticleSearchResultRow">
			';
	if (($__vars['article']['CoverImage'] OR $__vars['article']['Category']['content_image_url']) OR (($__vars['article']['SeriesPart']['Series'] AND $__vars['article']['SeriesPart']['Series']['icon_date']))) {
		$__finalCompiled .= '
				<span class="contentRow-figure">
					';
		if ($__vars['article']['CoverImage']) {
			$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">
							' . $__templater->func('ams_article_thumbnail', array($__vars['article'], ), true) . '
						</a>				
					';
		} else if ($__vars['article']['SeriesPart']['Series'] AND $__vars['article']['SeriesPart']['Series']['icon_date']) {
			$__finalCompiled .= '
						' . $__templater->func('ams_series_icon', array($__vars['article']['SeriesPart']['Series'], 's', $__templater->func('link', array('ams', $__vars['article'], ), false), ), true) . '
					';
		} else if ($__vars['article']['Category']['content_image_url']) {
			$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">
							' . $__templater->func('ams_category_icon', array($__vars['article'], ), true) . '
						</a>				
					';
		}
		$__finalCompiled .= '
				</span>
			';
	}
	$__finalCompiled .= '
			<div class="contentRow-main">
				<h3 class="contentRow-title">
					<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">' . $__templater->func('prefix', array('ams_article', $__vars['article'], ), true) . ' ' . $__templater->escape($__vars['article']['title']) . '</a>
				</h3>

				<div class="contentRow-snippet">
					' . $__templater->func('snippet', array($__vars['article']['message'], 300, array('stripQuote' => true, ), ), true) . '
				</div>

				<div class="contentRow-minor contentRow-minor--hideLinks">
					<ul class="listInline listInline--bullet">
						<li>' . $__templater->func('username_link', array($__vars['article']['User'], false, array(
		'defaultname' => $__vars['article']['username'],
	))) . '</li>
						<li>' . $__templater->func('date_dynamic', array($__vars['article']['publish_date'], array(
	))) . '</li>
						';
	if ($__vars['article']['author_rating']) {
		$__finalCompiled .= '
							<li>
								' . $__templater->callMacro('rating_macros', 'stars_text', array(
			'rating' => $__vars['article']['author_rating'],
			'text' => 'Author rating' . $__vars['xf']['language']['label_separator'],
			'rowClass' => 'ratingStarsRow',
			'starsClass' => 'ratingStars--smaller ratingStars--amsAuthorRating',
		), $__vars) . '
							</li>
						';
	}
	$__finalCompiled .= '
						';
	if ($__vars['article']['rating_avg'] AND $__vars['article']['rating_count']) {
		$__finalCompiled .= '
							<li>
								' . $__templater->callMacro('rating_macros', 'stars_text', array(
			'rating' => $__vars['article']['rating_avg'],
			'count' => $__vars['article']['rating_count'],
			'rowClass' => 'ratingStarsRow',
			'starsClass' => 'ratingStars--smaller',
		), $__vars) . '
							</li>
						';
	}
	$__finalCompiled .= '
						';
	if ($__vars['article']['comment_count']) {
		$__finalCompiled .= '<li>' . 'Comments' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->filter($__vars['article']['comment_count'], array(array('number', array()),), true) . '</li>';
	}
	$__finalCompiled .= '
						';
	if ($__vars['article']['review_count']) {
		$__finalCompiled .= '<li>' . 'Reviews' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->filter($__vars['article']['review_count'], array(array('number_short', array()),), true) . '</li>';
	}
	$__finalCompiled .= '
						<li>' . 'Category' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->func('link', array('ams/categories', $__vars['article']['Category'], ), true) . '">' . $__templater->escape($__vars['article']['Category']['title']) . '</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);