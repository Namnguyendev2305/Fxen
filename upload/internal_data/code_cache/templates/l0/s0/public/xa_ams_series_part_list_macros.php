<?php
// FROM HASH: a94cf6cb83a2f610fbcf02dc63ed73a5
return array(
'macros' => array('series_part_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'seriesPart' => '!',
		'series' => '!',
		'article' => '!',
		'category' => null,
		'showWatched' => true,
		'allowInlineMod' => false,
		'chooseName' => '',
		'extraInfo' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__templater->includeCss('structured_list.less');
	$__finalCompiled .= '
	';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '

	<div class="structItem structItem--article ' . ($__vars['article']['prefix_id'] ? ('is-prefix' . $__templater->escape($__vars['article']['prefix_id'])) : '') . ' ' . ($__templater->method($__vars['article'], 'isIgnored', array()) ? 'is-ignored' : '') . ((($__templater->method($__vars['article'], 'isUnread', array()) AND (!$__vars['forceRead']))) ? ' is-unread' : '') . (($__vars['article']['article_state'] == 'moderated') ? ' is-moderated' : '') . (($__vars['article']['article_state'] == 'deleted') ? ' is-deleted' : '') . ' js-inlineModContainer js-articleListItem-' . $__templater->escape($__vars['article']['article_id']) . '" data-author="' . ($__templater->escape($__vars['article']['User']['username']) ?: $__templater->escape($__vars['article']['username'])) . '">
		<div class="structItem-cell structItem-cell--icon structItem-cell--iconExpanded structItem-cell--iconAmsCoverImage">
			<div class="structItem-iconContainer">
				';
	if ($__vars['article']['CoverImage']) {
		$__finalCompiled .= '
					<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">
						' . $__templater->func('ams_article_thumbnail', array($__vars['article'], ), true) . '
					</a>
				';
	} else if ($__vars['series']['icon_date']) {
		$__finalCompiled .= '
					' . $__templater->func('ams_series_icon', array($__vars['series'], 's', $__templater->func('link', array('ams', $__vars['article'], ), false), ), true) . '
				';
	} else if ($__vars['article']['Category']['content_image_url']) {
		$__finalCompiled .= '
					<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">
						' . $__templater->func('ams_category_icon', array($__vars['article'], ), true) . '
					</a>
				';
	} else {
		$__finalCompiled .= '
					' . $__templater->func('avatar', array($__vars['article']['User'], 'm', false, array(
			'defaultname' => ($__vars['article']['username'] ?: 'Deleted member'),
		))) . '
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
		<div class="structItem-cell structItem-cell--main structItem-cell--listViewLayout" data-xf-init="touch-proxy">
			';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
					';
	if ($__vars['article']['Featured']) {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--attention" aria-hidden="true" title="' . $__templater->filter('Featured', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'Featured' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
					';
	if ($__vars['showWatched'] AND $__vars['xf']['visitor']['user_id']) {
		$__compilerTemp1 .= '
						';
		if ($__vars['article']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__compilerTemp1 .= '
							<li>
								<i class="structItem-status structItem-status--watched" aria-hidden="true" title="' . $__templater->filter('Article watched', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Article watched' . '</span>
							</li>
						';
		} else if ((!$__vars['category']) AND $__vars['article']['Category']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__compilerTemp1 .= '
							<li>
								<i class="structItem-status structItem-status--watched" aria-hidden="true" title="' . $__templater->filter('Category watched', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Category watched' . '</span>
							</li>
						';
		}
		$__compilerTemp1 .= '
					';
	}
	$__compilerTemp1 .= '
				';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
				<ul class="structItem-statuses">
				' . $__compilerTemp1 . '
				</ul>
			';
	}
	$__finalCompiled .= '

			<div class="structItem-articleCategoryTitleHeader">
				<ul class="structItem-parts">
					<li><a href="' . $__templater->func('link', array('ams/categories', $__vars['article']['Category'], ), true) . '">' . $__templater->escape($__vars['article']['Category']['title']) . '</a></li>
				</ul>
			</div>

			<div class="structItem-title">
				';
	if ($__vars['article']['prefix_id']) {
		$__finalCompiled .= '
					';
		if ($__vars['category']) {
			$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('ams/categories', $__vars['category'], array('prefix_id' => $__vars['article']['prefix_id'], ), ), true) . '" class="labelLink">' . $__templater->func('prefix', array('ams_article', $__vars['article'], 'html', '', ), true) . '</a>
					';
		} else {
			$__finalCompiled .= '
						' . $__templater->func('prefix', array('ams_article', $__vars['article'], 'html', '', ), true) . '
					';
		}
		$__finalCompiled .= '
				';
	}
	$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" class="" data-tp-primary="on">' . $__templater->escape($__vars['article']['title']) . '</a>
			</div>

			<div class="structItem-articleDescription">
				' . $__templater->func('snippet', array($__vars['article']['message'], 300, array('stripQuote' => true, ), ), true) . '
			</div>

			<div class="structItem-listViewMeta">
				<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--author">
					<dt></dt>
					';
	if ($__vars['article']['User']['Profile']['xa_ams_author_name']) {
		$__finalCompiled .= '
						<dd>' . $__templater->func('username_link', array(array('user_id' => $__vars['article']['User']['user_id'], 'username' => $__vars['article']['User']['Profile']['xa_ams_author_name'], ), false, array(
			'defaultname' => $__vars['article']['User']['Profile']['xa_ams_author_name'],
		))) . '</dd>
					';
	} else {
		$__finalCompiled .= '
						<dd>' . $__templater->func('username_link', array($__vars['article']['User'], false, array(
			'defaultname' => $__vars['article']['username'],
		))) . '</dd>
					';
	}
	$__finalCompiled .= '
				</dl>

				<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--publishdate">
					<dt></dt>
					<dd><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" rel="nofollow" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['article']['publish_date'], array(
	))) . '</a></dd>
				</dl>

				';
	if ($__vars['article']['author_rating'] AND $__vars['article']['Category']['allow_author_rating']) {
		$__finalCompiled .= '
					<div class="structItem-metaItem  structItem-metaItem--rating">
						' . $__templater->callMacro('rating_macros', 'stars_text', array(
			'rating' => $__vars['article']['author_rating'],
			'text' => 'Author rating',
			'rowClass' => 'ratingStarsRow--justified',
			'starsClass' => 'ratingStars--smaller ratingStars--amsAuthorRating',
		), $__vars) . '
					</div>
				';
	}
	$__finalCompiled .= '
				';
	if ($__vars['article']['rating_avg'] AND $__vars['article']['rating_count']) {
		$__finalCompiled .= '
					<div class="structItem-metaItem  structItem-metaItem--rating">
						' . $__templater->callMacro('rating_macros', 'stars_text', array(
			'rating' => $__vars['article']['rating_avg'],
			'count' => $__vars['article']['rating_count'],
			'rowClass' => 'ratingStarsRow--justified',
			'starsClass' => 'ratingStars--smaller',
		), $__vars) . '
					</div>
				';
	}
	$__finalCompiled .= '
				';
	if ($__vars['article']['view_count']) {
		$__finalCompiled .= '
					<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--views">
						<dt>' . 'Views' . '</dt>
						<dd>' . $__templater->filter($__vars['article']['view_count'], array(array('number', array()),), true) . '</dd>
					</dl>
				';
	}
	$__finalCompiled .= '
				';
	if ($__vars['article']['reaction_score']) {
		$__finalCompiled .= '
					<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--reaction_score">
						<dt>' . 'Reaction score' . '</dt>
						<dd>' . $__templater->filter($__vars['article']['reaction_score'], array(array('number', array()),), true) . '</dd>
					</dl>
				';
	}
	$__finalCompiled .= '
				';
	if ($__vars['article']['comment_count']) {
		$__finalCompiled .= '
					<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--comments">
						<dt>' . 'Comments' . '</dt>
						<dd><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '#comments" class="u-concealed">' . $__templater->filter($__vars['article']['comment_count'], array(array('number', array()),), true) . '</a></dd>
					</dl>
				';
	}
	$__finalCompiled .= '
				';
	if ($__vars['article']['review_count']) {
		$__finalCompiled .= '
					<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--reviews">
						<dt>' . 'Reviews' . '</dt>
						<dd><a href="' . $__templater->func('link', array('ams/reviews', $__vars['article'], ), true) . '" class="u-concealed">' . $__templater->filter($__vars['article']['review_count'], array(array('number', array()),), true) . '</a></dd>
					</dl>
				';
	}
	$__finalCompiled .= '
				';
	if ($__vars['article']['last_update'] AND ($__vars['article']['last_update'] > $__vars['article']['publish_date'])) {
		$__finalCompiled .= '
					<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--lastUpdate">
						<dt>' . 'Updated' . '</dt>
						<dd><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['article']['last_update'], array(
		))) . '</a></dd>
					</dl>
				';
	}
	$__finalCompiled .= '
			</div>

			<div class="actionBar actionBarSeries">
				<div class="actionBar-set actionBar-set--internal">
					';
	if ($__templater->method($__vars['seriesPart'], 'canEdit', array())) {
		$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('ams/series-part/edit', $__vars['seriesPart'], ), true) . '" 
							class="actionBar-action actionBar-action--edit" 
							data-xf-click="overlay">' . 'Edit' . '</a>
					';
	}
	$__finalCompiled .= '
					';
	if ($__templater->method($__vars['seriesPart'], 'canRemove', array())) {
		$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('ams/series-part/remove', $__vars['seriesPart'], ), true) . '" 
							class="actionBar-action actionBar-action--remove" 
							data-xf-click="overlay">' . 'Remove' . '</a>
					';
	}
	$__finalCompiled .= '
				</div>
			</div>
		</div>
	</div>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';

	return $__finalCompiled;
}
);