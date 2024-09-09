<?php
// FROM HASH: 5b4fc30f01cda673baab5101f163589f
return array(
'macros' => array('tile_view_layout' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'category' => null,
		'filterPrefix' => false,
		'showWatched' => true,
		'showSticky' => false,
		'allowInlineMod' => true,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__templater->includeCss('structured_list.less');
	$__finalCompiled .= '

	';
	$__vars['extras'] = $__templater->func('property', array('xaAmsTileViewLayoutElements', ), false);
	$__finalCompiled .= '

	<li class="tile-container ' . ($__vars['article']['prefix_id'] ? ('is-prefix' . $__templater->escape($__vars['article']['prefix_id'])) : '') . ' ' . ($__templater->method($__vars['article'], 'isIgnored', array()) ? 'is-ignored' : '') . ((($__templater->method($__vars['article'], 'isUnread', array()) AND (!$__vars['forceRead']))) ? ' is-unread' : '') . (($__vars['article']['article_state'] == 'moderated') ? ' is-moderated' : '') . (($__vars['article']['article_state'] == 'deleted') ? ' is-deleted' : '') . (($__vars['article']['article_state'] == 'draft') ? ' is-draft' : '') . ' js-inlineModContainer js-articleListItem-' . $__templater->escape($__vars['article']['article_id']) . '" data-author="' . ($__templater->escape($__vars['article']['User']['username']) ?: $__templater->escape($__vars['article']['username'])) . '">
		<div class="tile-item large-tile-item">
			';
	if ($__vars['article']['CoverImage']) {
		$__finalCompiled .= '
				<a class="tile-image-link" style="background: url(' . $__templater->func('link', array('ams/cover-image', $__vars['article'], ), true) . ') no-repeat center center transparent; background-size: cover;" href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '"></a>
			';
	} else if ($__vars['article']['Category']['content_image_url']) {
		$__finalCompiled .= '
				<a class="tile-image-link" style="background: url(' . $__templater->func('base_url', array($__vars['article']['Category']['content_image_url'], ), true) . ') no-repeat center center transparent; background-size: cover;" href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '"></a>
			';
	} else {
		$__finalCompiled .= '
				<a class="tile-image-link" style="background: #185886; background-size: cover;" href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '"></a>
			';
	}
	$__finalCompiled .= '

			<div class="tile-caption tile-caption-large">
				<h3>
					<span class="tile-item-heading">
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
								';
			if ($__vars['filterPrefix']) {
				$__finalCompiled .= '
									<a href="' . $__templater->func('link', array('ams', null, array('prefix_id' => $__vars['article']['prefix_id'], ), ), true) . '" class="labelLink" rel="nofollow">' . $__templater->func('prefix', array('ams_article', $__vars['article'], 'html', '', ), true) . '</a>
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
						';
	}
	$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" class="" data-tp-primary="on">' . $__templater->escape($__vars['article']['title']) . '</a>
					</span>
				</h3>

				';
	if ($__vars['extras']['author_rating'] OR $__vars['extras']['rating_avg']) {
		$__finalCompiled .= ' 
					<ul class="listInline listInline--bullet tile-item-rating">
						';
		if ($__vars['extras']['author_rating'] AND ($__vars['article']['author_rating'] AND $__vars['article']['Category']['allow_author_rating'])) {
			$__finalCompiled .= '
							<li>
								' . $__templater->callMacro('rating_macros', 'stars', array(
				'rating' => $__vars['article']['author_rating'],
				'class' => 'ratingStars--smaller ratingStars--amsAuthorRating',
			), $__vars) . '
							</li>
						';
		}
		$__finalCompiled .= '
						';
		if ($__vars['extras']['rating_avg'] AND ($__vars['article']['rating_avg'] AND $__vars['article']['review_count'])) {
			$__finalCompiled .= '
							<li>
								' . $__templater->callMacro('rating_macros', 'stars', array(
				'rating' => $__vars['article']['rating_avg'],
				'class' => 'ratingStars--smaller',
			), $__vars) . '
							</li>
						';
		}
		$__finalCompiled .= '
					</ul>
				';
	}
	$__finalCompiled .= '

				';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= $__templater->escape($__templater->method($__vars['article'], 'getArticleLocationForList', array()));
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
					<div class="tile-item-location">
						' . $__compilerTemp1 . '

						';
		if ($__templater->method($__vars['article'], 'canViewArticleMap', array())) {
			$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('ams/map-overlay', $__vars['article'], ), true) . '" rel="nofollow" class="tile-item-location-icon" data-xf-click="overlay">' . $__templater->fontAwesome('fa-map-marker-alt', array(
			)) . '</a>
						';
		}
		$__finalCompiled .= '
					</div>	
				';
	}
	$__finalCompiled .= '

				';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
						';
	if ($__vars['allowInlineMod'] AND $__templater->method($__vars['article'], 'canUseInlineModeration', array())) {
		$__compilerTemp2 .= '
							<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['article']['article_id'],
			'class' => 'js-inlineModToggle',
			'data-xf-init' => ($__templater->method($__vars['article'], 'canUseInlineModeration', array()) ? 'tooltip' : ''),
			'title' => ($__templater->method($__vars['article'], 'canUseInlineModeration', array()) ? 'Select for moderation' : ''),
			'_type' => 'option',
		))) . '</li>
						';
	}
	$__compilerTemp2 .= '
						';
	if ($__vars['extras']['share_this_article']) {
		$__compilerTemp2 .= '
							<li class="u-flexStretch"><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '"
								class="u-muted"
								data-xf-init="share-tooltip"
								data-href="' . $__templater->func('link', array('ams/share', $__vars['article'], ), true) . '"
								aria-label="' . $__templater->filter('Share', array(array('for_attr', array()),), true) . '"
								rel="nofollow">
								' . $__templater->fontAwesome('fa-share-alt', array(
		)) . '
							</a></li>
						';
	}
	$__compilerTemp2 .= '
						';
	if ($__vars['article']['Featured']) {
		$__compilerTemp2 .= '
							<li>
								<i class="structItem-status structItem-status--attention" aria-hidden="true" title="' . $__templater->filter('Featured', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Featured' . '</span>
							</li>
						';
	}
	$__compilerTemp2 .= '
						';
	if ($__vars['article']['has_poll']) {
		$__compilerTemp2 .= '
							<li>
								<i class="structItem-status structItem-status--poll" aria-hidden="true" title="' . $__templater->filter('Poll', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Poll' . '</span>
							</li>
						';
	}
	$__compilerTemp2 .= '
						';
	if ($__vars['article']['article_state'] == 'moderated') {
		$__compilerTemp2 .= '
							<li>
								<i class="structItem-status structItem-status--moderated" aria-hidden="true" title="' . $__templater->filter('Awaiting approval', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Awaiting approval' . '</span>
							</li>
						';
	}
	$__compilerTemp2 .= '
						';
	if ($__vars['article']['article_state'] == 'deleted') {
		$__compilerTemp2 .= '
							<li>
								<i class="structItem-status structItem-status--deleted" aria-hidden="true" title="' . $__templater->filter('Deleted', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Deleted' . '</span>
							</li>
						';
	}
	$__compilerTemp2 .= '
						';
	if ($__vars['article']['article_state'] == 'draft') {
		$__compilerTemp2 .= '
							<li>
								<i class="structItem-status structItem-status--moderated" aria-hidden="true" title="' . $__templater->filter('draft', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'draft' . '</span>
							</li>
						';
	}
	$__compilerTemp2 .= '
						';
	if ($__vars['showWatched'] AND $__vars['xf']['visitor']['user_id']) {
		$__compilerTemp2 .= '
							';
		if ($__vars['article']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__compilerTemp2 .= '
								<li>
									<i class="structItem-status structItem-status--watched" aria-hidden="true" title="' . $__templater->filter('Article watched', array(array('for_attr', array()),), true) . '"></i>
									<span class="u-srOnly">' . 'Article watched' . '</span>
								</li>
							';
		} else if ((!$__vars['category']) AND $__vars['article']['Category']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__compilerTemp2 .= '
								<li>
									<i class="structItem-status structItem-status--watched" aria-hidden="true" title="' . $__templater->filter('Category watched', array(array('for_attr', array()),), true) . '"></i>
									<span class="u-srOnly">' . 'Category watched' . '</span>
								</li>
							';
		}
		$__compilerTemp2 .= '
						';
	}
	$__compilerTemp2 .= '
						';
	if ($__vars['article']['sticky'] AND $__vars['showSticky']) {
		$__compilerTemp2 .= '
							<li>
								<i class="structItem-status structItem-status--sticky" aria-hidden="true" title="' . $__templater->filter('Sticky', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Sticky' . '</span>
							</li>
						';
	}
	$__compilerTemp2 .= '
					';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__finalCompiled .= '
					<ul class="tile-item-extraInfo tile-item-minor">
					' . $__compilerTemp2 . '
					</ul>
				';
	}
	$__finalCompiled .= '

				';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
						';
	if ($__vars['extras']['username']) {
		$__compilerTemp3 .= '
							<li>
								';
		if ($__vars['article']['User']['Profile']['xa_ams_author_name']) {
			$__compilerTemp3 .= '
									' . $__templater->func('username_link', array(array('user_id' => $__vars['article']['User']['user_id'], 'username' => $__vars['article']['User']['Profile']['xa_ams_author_name'], ), false, array(
				'defaultname' => $__vars['article']['User']['Profile']['xa_ams_author_name'],
				'class' => 'tile-username',
			))) . '
								';
		} else {
			$__compilerTemp3 .= '
									' . $__templater->func('username_link', array($__vars['article']['User'], false, array(
				'defaultname' => ($__vars['article']['username'] ?: 'Deleted member'),
				'class' => 'tile-username',
			))) . '
								';
		}
		$__compilerTemp3 .= '
							</li>
						';
	}
	$__compilerTemp3 .= '
						';
	if ($__vars['extras']['publish_date']) {
		$__compilerTemp3 .= '
							<li><time class="publish-date">' . $__templater->func('date_dynamic', array($__vars['article']['publish_date'], array(
		))) . '</time></li>

							';
		if ($__vars['article']['last_update'] AND ($__vars['article']['last_update'] > $__vars['article']['publish_date'])) {
			$__compilerTemp3 .= '								
								<li>
									<time class="publish-date"><span>' . 'Updated' . '
									' . $__templater->func('date_dynamic', array($__vars['article']['last_update'], array(
			))) . '</span></time>
								</li>
							';
		}
		$__compilerTemp3 .= '
						';
	}
	$__compilerTemp3 .= '
						';
	if ($__vars['article']['article_read_time'] AND $__vars['extras']['article_read_time']) {
		$__compilerTemp3 .= '
							<li>' . '' . $__templater->escape($__vars['article']['article_read_time']) . ' min read' . '</li>
						';
	}
	$__compilerTemp3 .= '
						';
	if ($__vars['extras']['category_title']) {
		$__compilerTemp3 .= '
							<li><a class="category-title category-' . $__templater->escape($__vars['articlead']['category_id']) . '" href="' . $__templater->func('link', array('ams/categories', $__vars['article']['Category'], ), true) . '">' . $__templater->escape($__vars['article']['Category']['title']) . '</a></li>
						';
	}
	$__compilerTemp3 .= '
					';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__finalCompiled .= '
					<ul class="listInline listInline--bullet">
					' . $__compilerTemp3 . '
					</ul>
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
	</li>
';
	return $__finalCompiled;
}
),
'grid_view_layout' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'category' => null,
		'filterPrefix' => false,
		'showWatched' => true,
		'showSticky' => false,
		'allowInlineMod' => true,
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
	$__vars['extras'] = $__templater->func('property', array('xaAmsGridViewLayoutElements', ), false);
	$__finalCompiled .= '

	<li class="grid-container ' . ($__vars['article']['prefix_id'] ? ('is-prefix' . $__templater->escape($__vars['article']['prefix_id'])) : '') . ' ' . ($__templater->method($__vars['article'], 'isIgnored', array()) ? 'is-ignored' : '') . ((($__templater->method($__vars['article'], 'isUnread', array()) AND (!$__vars['forceRead']))) ? ' is-unread' : '') . (($__vars['article']['article_state'] == 'moderated') ? ' is-moderated' : '') . (($__vars['article']['article_state'] == 'deleted') ? ' is-deleted' : '') . (($__vars['article']['article_state'] == 'draft') ? ' is-draft' : '') . ' js-inlineModContainer js-articleListItem-' . $__templater->escape($__vars['article']['article_id']) . '" data-author="' . ($__templater->escape($__vars['article']['User']['username']) ?: $__templater->escape($__vars['article']['username'])) . '">
		<div class="grid-item large-grid-item">
			<div style="overflow: hidden;">
				';
	if ($__vars['article']['CoverImage']) {
		$__finalCompiled .= '
					<a class="grid-image-link" style="background: url(' . $__templater->func('link', array('ams/cover-image', $__vars['article'], ), true) . ') no-repeat center center transparent; background-size: cover;" href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '"></a>
				';
	} else if ($__vars['article']['Category']['content_image_url']) {
		$__finalCompiled .= '
					<a class="grid-image-link" style="background: url(' . $__templater->func('base_url', array($__vars['article']['Category']['content_image_url'], ), true) . ') no-repeat center center transparent; background-size: cover;" href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '"></a>
				';
	} else {
		$__finalCompiled .= '
					<a class="grid-image-link" style="background: #185886; background-size: cover;" href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '"></a>
				';
	}
	$__finalCompiled .= '
			</div>
			
			<div class="grid-caption grid-caption-large">
				';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
						';
	if ($__vars['extras']['share_this_article']) {
		$__compilerTemp1 .= '
							<li class="u-flexStretch"><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '"
								class="u-muted"
								data-xf-init="share-tooltip"
								data-href="' . $__templater->func('link', array('ams/share', $__vars['article'], ), true) . '"
								aria-label="' . $__templater->filter('Share', array(array('for_attr', array()),), true) . '"
								rel="nofollow">
								' . $__templater->fontAwesome('fa-share-alt', array(
		)) . '
							</a></li>
						';
	}
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
	if ($__vars['article']['has_poll']) {
		$__compilerTemp1 .= '
							<li>
								<i class="structItem-status structItem-status--poll" aria-hidden="true" title="' . $__templater->filter('Poll', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Poll' . '</span>
							</li>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__vars['article']['article_state'] == 'moderated') {
		$__compilerTemp1 .= '
							<li>
								<i class="structItem-status structItem-status--moderated" aria-hidden="true" title="' . $__templater->filter('Awaiting approval', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Awaiting approval' . '</span>
							</li>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__vars['article']['article_state'] == 'deleted') {
		$__compilerTemp1 .= '
							<li>
								<i class="structItem-status structItem-status--deleted" aria-hidden="true" title="' . $__templater->filter('Deleted', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Deleted' . '</span>
							</li>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__vars['article']['article_state'] == 'draft') {
		$__compilerTemp1 .= '
							<li>
								<i class="structItem-status structItem-status--moderated" aria-hidden="true" title="' . $__templater->filter('Deleted', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'draft' . '</span>
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
	if ($__vars['article']['sticky'] AND $__vars['showSticky']) {
		$__compilerTemp1 .= '
							<li>
								<i class="structItem-status structItem-status--sticky" aria-hidden="true" title="' . $__templater->filter('Sticky', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Sticky' . '</span>
							</li>
						';
	}
	$__compilerTemp1 .= '
					';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
					<ul class="structItem-statuses grid-item-minor">
					' . $__compilerTemp1 . '
					</ul>
				';
	}
	$__finalCompiled .= '

				';
	if ((((!$__vars['category']) OR $__templater->method($__vars['category'], 'hasChildren', array()))) AND $__vars['extras']['category']) {
		$__finalCompiled .= '
					<div class="grid-item-category-title-header">
						<a href="' . $__templater->func('link', array('ams/categories', $__vars['article']['Category'], ), true) . '">' . $__templater->escape($__vars['article']['Category']['title']) . '</a>
					</div>
				';
	}
	$__finalCompiled .= '

				<h3>
					<span class="grid-item-heading">
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
								';
			if ($__vars['filterPrefix']) {
				$__finalCompiled .= '
									<a href="' . $__templater->func('link', array('ams', null, array('prefix_id' => $__vars['article']['prefix_id'], ), ), true) . '" class="labelLink" rel="nofollow">' . $__templater->func('prefix', array('ams_article', $__vars['article'], 'html', '', ), true) . '</a>
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
						';
	}
	$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" class="" data-tp-primary="on">' . $__templater->escape($__vars['article']['title']) . '</a>
					</span>		
				</h3>

				';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
						';
	if ($__vars['extraInfo']) {
		$__compilerTemp2 .= '
							<li>' . $__templater->escape($__vars['extraInfo']) . '</li>
						';
	}
	$__compilerTemp2 .= '
						';
	if ($__vars['chooseName']) {
		$__compilerTemp2 .= '
							<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'name' => $__vars['chooseName'] . '[]',
			'value' => $__vars['article']['article_id'],
			'class' => 'js-chooseItem',
			'_type' => 'option',
		))) . '</li>
						';
	} else if ($__vars['allowInlineMod'] AND $__templater->method($__vars['article'], 'canUseInlineModeration', array())) {
		$__compilerTemp2 .= '
							<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['article']['article_id'],
			'class' => 'js-inlineModToggle',
			'data-xf-init' => 'tooltip',
			'title' => $__templater->filter('Select for moderation', array(array('for_attr', array()),), false),
			'_type' => 'option',
		))) . '</li>
						';
	}
	$__compilerTemp2 .= '
					';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__finalCompiled .= '
					<ul class="grid-item-extraInfo grid-item-minor">
					' . $__compilerTemp2 . '
					</ul>
				';
	}
	$__finalCompiled .= '

				<ul class="listInline listInline--bullet">
					<li>
						';
	if ($__vars['article']['User']['Profile']['xa_ams_author_name']) {
		$__finalCompiled .= '
							' . $__templater->func('username_link', array(array('user_id' => $__vars['article']['User']['user_id'], 'username' => $__vars['article']['User']['Profile']['xa_ams_author_name'], ), false, array(
			'defaultname' => $__vars['article']['User']['Profile']['xa_ams_author_name'],
			'class' => 'u-muted',
		))) . '
						';
	} else {
		$__finalCompiled .= '
							' . $__templater->func('username_link', array($__vars['article']['User'], false, array(
			'defaultname' => ($__vars['article']['username'] ?: 'Deleted member'),
			'class' => 'u-muted',
		))) . '
						';
	}
	$__finalCompiled .= '
					</li>
					<li><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" class="u-muted">' . $__templater->func('date_dynamic', array($__vars['article']['publish_date'], array(
	))) . '</a></li>
					';
	if ($__vars['article']['last_update'] AND ($__vars['article']['last_update'] > $__vars['article']['publish_date'])) {
		$__finalCompiled .= '								
						<li>
							<span class="u-muted">' . 'Updated' . '
							' . $__templater->func('date_dynamic', array($__vars['article']['last_update'], array(
		))) . '</span>
						</li>
					';
	}
	$__finalCompiled .= '
					';
	if ($__vars['article']['article_read_time'] AND $__vars['extras']['article_read_time']) {
		$__finalCompiled .= '
						<li>
							<span class="u-muted">' . '' . $__templater->escape($__vars['article']['article_read_time']) . ' min read' . '</span>
						</li>
					';
	}
	$__finalCompiled .= '
					';
	if ($__vars['article']['author_rating'] AND ($__vars['article']['Category']['allow_author_rating'] AND $__vars['extras']['author_rating'])) {
		$__finalCompiled .= '
						<li>
							' . $__templater->callMacro('rating_macros', 'stars', array(
			'rating' => $__vars['article']['author_rating'],
			'class' => 'ratingStars--amsAuthorRating',
		), $__vars) . '
						</li>
					';
	}
	$__finalCompiled .= '
					';
	if ($__vars['article']['rating_avg'] AND ($__vars['article']['rating_count'] AND $__vars['extras']['rating_avg'])) {
		$__finalCompiled .= '
						<li>
							' . $__templater->callMacro('rating_macros', 'stars', array(
			'rating' => $__vars['article']['rating_avg'],
			'class' => '',
		), $__vars) . '
						</li>
					';
	}
	$__finalCompiled .= '
					';
	if ($__vars['article']['view_count'] AND $__vars['extras']['view_count']) {
		$__finalCompiled .= '
						<li>
							<span class="u-muted">' . 'Views' . ': 
							' . $__templater->filter($__vars['article']['view_count'], array(array('number_short', array()),), true) . '</span>
						</li>
					';
	}
	$__finalCompiled .= '
					';
	if ($__vars['article']['reaction_score'] AND $__vars['extras']['reaction_score']) {
		$__finalCompiled .= '
						<li>
							<span class="u-muted">' . 'Reaction score' . ': 
							' . $__templater->filter($__vars['article']['reaction_score'], array(array('number_short', array()),), true) . '</span>
						</li>
					';
	}
	$__finalCompiled .= '
					';
	if ($__vars['article']['comment_count'] AND $__vars['extras']['comment_count']) {
		$__finalCompiled .= '
						<li>
							<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '#comments" class="u-muted"><span>' . 'Comments' . ':</span> ' . $__templater->filter($__vars['article']['comment_count'], array(array('number_short', array()),), true) . '</a>
						</li>
					';
	}
	$__finalCompiled .= '
					';
	if ($__vars['article']['review_count'] AND $__vars['extras']['review_count']) {
		$__finalCompiled .= '
						<li>
							<a href="' . $__templater->func('link', array('ams/reviews', $__vars['article'], ), true) . '" class="u-muted"><span>' . 'Reviews' . ':</span> ' . $__templater->filter($__vars['article']['review_count'], array(array('number_short', array()),), true) . '</a>
						</li>
					';
	}
	$__finalCompiled .= '
				</ul>

				';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= $__templater->escape($__templater->method($__vars['article'], 'getArticleLocationForList', array()));
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__finalCompiled .= '
					<div class="grid-item-location">
						' . $__compilerTemp3 . '

						';
		if ($__templater->method($__vars['article'], 'canViewArticleMap', array())) {
			$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('ams/map-overlay', $__vars['article'], ), true) . '" rel="nofollow" class="grid-item-location-icon" data-xf-click="overlay">' . $__templater->fontAwesome('fa-map-marker-alt', array(
			)) . '</a>
						';
		}
		$__finalCompiled .= '
					</div>	
				';
	}
	$__finalCompiled .= '

				';
	if ($__vars['extras']['preview_snippet']) {
		$__finalCompiled .= '
					<div class="grid-description">
						' . $__templater->func('snippet', array($__vars['article']['message'], $__vars['xf']['options']['xaAmsSnippetLengthGV'], array('stripQuote' => true, ), ), true) . '
					</div>
				';
	}
	$__finalCompiled .= '

				';
	if ($__vars['extras']['custom_fields']) {
		$__finalCompiled .= '
					';
		$__vars['amsCustomFieldGroupNames'] = array('header', 'above_article', 'below_article', 'new_tab', 'sidebar', 'self_place', );
		$__finalCompiled .= '
					';
		$__compilerTemp4 = '';
		$__compilerTemp4 .= '
									';
		if ($__templater->isTraversable($__vars['amsCustomFieldGroupNames'])) {
			foreach ($__vars['amsCustomFieldGroupNames'] AS $__vars['amsCustomFieldGroupName']) {
				$__compilerTemp4 .= '
										' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
					'type' => 'ams_articles',
					'group' => $__vars['amsCustomFieldGroupName'],
					'set' => $__vars['article']['custom_fields'],
					'onlyInclude' => $__vars['article']['Category']['field_cache'],
					'additionalFilters' => array('display_on_list', ),
					'wrapperClass' => 'gridViewLayout-fields gridViewLayout-fields--before',
					'valueClass' => 'pairs pairs--columns pairs--fixedSmall',
				), $__vars) . '
									';
			}
		}
		$__compilerTemp4 .= '
								';
		if (strlen(trim($__compilerTemp4)) > 0) {
			$__finalCompiled .= '
						<div class="grid-item-articleCustomFieldsOnList">
							<div class="amsGridView-amsDescription">
								' . $__compilerTemp4 . '
							</div>
						</div>
					';
		}
		$__finalCompiled .= '
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
	</li>
';
	return $__finalCompiled;
}
),
'list_view_layout' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'category' => null,
		'filterPrefix' => false,
		'showWatched' => true,
		'showSticky' => false,
		'allowInlineMod' => true,
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

	';
	$__vars['extras'] = $__templater->func('property', array('xaAmsListViewLayoutElements', ), false);
	$__finalCompiled .= '

	<div class="structItem structItem--article ' . ($__vars['article']['prefix_id'] ? ('is-prefix' . $__templater->escape($__vars['article']['prefix_id'])) : '') . ' ' . ($__templater->method($__vars['article'], 'isIgnored', array()) ? 'is-ignored' : '') . ((($__templater->method($__vars['article'], 'isUnread', array()) AND (!$__vars['forceRead']))) ? ' is-unread' : '') . (($__vars['article']['article_state'] == 'moderated') ? ' is-moderated' : '') . (($__vars['article']['article_state'] == 'deleted') ? ' is-deleted' : '') . (($__vars['article']['article_state'] == 'draft') ? ' is-draft' : '') . ' js-inlineModContainer js-articleListItem-' . $__templater->escape($__vars['article']['article_id']) . '" data-author="' . ($__templater->escape($__vars['article']['User']['username']) ?: $__templater->escape($__vars['article']['username'])) . '">
		';
	if ($__vars['extras']['cover_image']) {
		$__finalCompiled .= '
			<div class="structItem-cell structItem-cell--icon structItem-cell--iconExpanded structItem-cell--iconAmsCoverImage">
				<div class="structItem-iconContainer">
					';
		if ($__vars['article']['CoverImage'] AND $__vars['article']['CoverImage']['thumbnail_url']) {
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
		';
	}
	$__finalCompiled .= '
		
		<div class="structItem-cell structItem-cell--main structItem-cell--listViewLayout" data-xf-init="touch-proxy">
			';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
					';
	if ($__vars['extras']['share_this_article']) {
		$__compilerTemp1 .= '
						<li class="u-flexStretch"><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '"
							class="u-muted structItem-status"
							data-xf-init="share-tooltip"
							data-href="' . $__templater->func('link', array('ams/share', $__vars['article'], ), true) . '"
							aria-label="' . $__templater->filter('Share', array(array('for_attr', array()),), true) . '"
							rel="nofollow">
							' . $__templater->fontAwesome('fa-share-alt', array(
		)) . '
						</a></li>
					';
	}
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
	if ($__vars['article']['has_poll']) {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--poll" aria-hidden="true" title="' . $__templater->filter('Poll', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'Poll' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
					';
	if ($__vars['article']['article_state'] == 'draft') {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--moderated" aria-hidden="true" title="' . $__templater->filter('draft', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'draft' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
					';
	if ($__vars['article']['article_state'] == 'moderated') {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--moderated" aria-hidden="true" title="' . $__templater->filter('Awaiting approval', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'Awaiting approval' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
					';
	if ($__vars['article']['article_state'] == 'deleted') {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--deleted" aria-hidden="true" title="' . $__templater->filter('Deleted', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'Deleted' . '</span>
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
	if ($__vars['article']['sticky'] AND $__vars['showSticky']) {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--sticky" aria-hidden="true" title="' . $__templater->filter('Sticky', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'Sticky' . '</span>
						</li>
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

			';
	if ((((!$__vars['category']) OR $__templater->method($__vars['category'], 'hasChildren', array()))) AND $__vars['extras']['category']) {
		$__finalCompiled .= '
				<div class="structItem-articleCategoryTitleHeader">
					<a href="' . $__templater->func('link', array('ams/categories', $__vars['article']['Category'], ), true) . '">' . $__templater->escape($__vars['article']['Category']['title']) . '</a>
				</div>
			';
	}
	$__finalCompiled .= '

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
						';
			if ($__vars['filterPrefix']) {
				$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('ams', null, array('prefix_id' => $__vars['article']['prefix_id'], ), ), true) . '" class="labelLink" rel="nofollow">' . $__templater->func('prefix', array('ams_article', $__vars['article'], 'html', '', ), true) . '</a>
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
				';
	}
	$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" class="" data-tp-primary="on">' . $__templater->escape($__vars['article']['title']) . '</a>
			</div>

			<div class="structItem-minor">
				';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
						';
	if ($__vars['extraInfo']) {
		$__compilerTemp2 .= '
							<li>' . $__templater->escape($__vars['extraInfo']) . '</li>
						';
	}
	$__compilerTemp2 .= '
						';
	if ($__vars['chooseName']) {
		$__compilerTemp2 .= '
							<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'name' => $__vars['chooseName'] . '[]',
			'value' => $__vars['article']['article_id'],
			'class' => 'js-chooseItem',
			'_type' => 'option',
		))) . '</li>
						';
	} else if ($__vars['allowInlineMod'] AND $__templater->method($__vars['article'], 'canUseInlineModeration', array())) {
		$__compilerTemp2 .= '
							<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['article']['article_id'],
			'class' => 'js-inlineModToggle',
			'data-xf-init' => 'tooltip',
			'title' => $__templater->filter('Select for moderation', array(array('for_attr', array()),), false),
			'_type' => 'option',
		))) . '</li>
						';
	}
	$__compilerTemp2 .= '
					';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__finalCompiled .= '
					<ul class="structItem-extraInfo">
					' . $__compilerTemp2 . '
					</ul>
				';
	}
	$__finalCompiled .= '

				';
	if ($__vars['article']['article_state'] == 'deleted') {
		$__finalCompiled .= '
					';
		if ($__vars['extraInfo']) {
			$__finalCompiled .= '<span class="structItem-extraInfo">' . $__templater->escape($__vars['extraInfo']) . '</span>';
		}
		$__finalCompiled .= '

					' . $__templater->callMacro('deletion_macros', 'notice', array(
			'log' => $__vars['article']['DeletionLog'],
		), $__vars) . '
				';
	} else {
		$__finalCompiled .= '
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
				'defaultname' => ($__vars['article']['username'] ?: 'Deleted member'),
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
		if ($__vars['article']['last_update'] AND ($__vars['article']['last_update'] > $__vars['article']['publish_date'])) {
			$__finalCompiled .= '
							<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--lastUpdate">
								<dt>' . 'Updated' . '</dt>
								<dd>' . $__templater->func('date_dynamic', array($__vars['article']['last_update'], array(
			))) . '</dd>
							</dl>
						';
		}
		$__finalCompiled .= '
						';
		if ($__vars['article']['article_read_time'] AND $__vars['extras']['article_read_time']) {
			$__finalCompiled .= '
							<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--articleReadTime">
								<dt></dt>
								<dd>' . '' . $__templater->escape($__vars['article']['article_read_time']) . ' min read' . '</dd>
							</dl>
						';
		}
		$__finalCompiled .= '
						';
		if ($__vars['article']['author_rating'] AND ($__vars['article']['Category']['allow_author_rating'] AND $__vars['extras']['author_rating'])) {
			$__finalCompiled .= '
							<div class="structItem-metaItem structItem-metaItem--rating">
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
		if ($__vars['article']['rating_avg'] AND ($__vars['article']['rating_count'] AND $__vars['extras']['rating_avg'])) {
			$__finalCompiled .= '
							<div class="structItem-metaItem structItem-metaItem--rating">
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
		if ($__vars['article']['view_count'] AND $__vars['extras']['view_count']) {
			$__finalCompiled .= '
							<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--views">
								<dt>' . 'Views' . '</dt>
								<dd>' . $__templater->filter($__vars['article']['view_count'], array(array('number', array()),), true) . '</dd>
							</dl>
						';
		}
		$__finalCompiled .= '
						';
		if ($__vars['article']['reaction_score'] AND $__vars['extras']['reaction_score']) {
			$__finalCompiled .= '
							<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--reaction_score">
								<dt>' . 'Reaction score' . '</dt>
								<dd>' . $__templater->filter($__vars['article']['reaction_score'], array(array('number', array()),), true) . '</dd>
							</dl>
						';
		}
		$__finalCompiled .= '
						';
		if ($__vars['article']['comment_count'] AND $__vars['extras']['comment_count']) {
			$__finalCompiled .= '
							<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--comments">
								<dt><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '#comments" class="u-concealed">' . 'Comments' . '</a></dt>
								<dd><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '#comments" class="u-concealed">' . $__templater->filter($__vars['article']['comment_count'], array(array('number', array()),), true) . '</a></dd>
							</dl>
						';
		}
		$__finalCompiled .= '
						';
		if ($__vars['article']['review_count'] AND $__vars['extras']['review_count']) {
			$__finalCompiled .= '
							<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--reviews">
								<dt><a href="' . $__templater->func('link', array('ams/reviews', $__vars['article'], ), true) . '" class="u-concealed">' . 'Reviews' . '</a></dt>
								<dd><a href="' . $__templater->func('link', array('ams/reviews', $__vars['article'], ), true) . '" class="u-concealed">' . $__templater->filter($__vars['article']['review_count'], array(array('number', array()),), true) . '</a></dd>
							</dl>
						';
		}
		$__finalCompiled .= '
					</div>
				';
	}
	$__finalCompiled .= '
			</div>

			';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= $__templater->escape($__templater->method($__vars['article'], 'getArticleLocationForList', array()));
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__finalCompiled .= '
				<div class="structItem-articleLocation">
					' . $__compilerTemp3 . '

					';
		if ($__templater->method($__vars['article'], 'canViewArticleMap', array())) {
			$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('ams/map-overlay', $__vars['article'], ), true) . '" rel="nofollow" class="structItem-articleLocationIcon" data-xf-click="overlay">' . $__templater->fontAwesome('fa-map-marker-alt', array(
			)) . '</a>
					';
		}
		$__finalCompiled .= '
				</div>	
			';
	}
	$__finalCompiled .= '

			';
	if ($__vars['article']['article_state'] != 'deleted') {
		$__finalCompiled .= '
				';
		if ($__vars['extras']['preview_snippet']) {
			$__finalCompiled .= '
					<div class="structItem-articleDescription">
						' . $__templater->func('snippet', array($__vars['article']['message'], $__vars['xf']['options']['xaAmsSnippetLengthLV'], array('stripQuote' => true, ), ), true) . '
					</div>
				';
		}
		$__finalCompiled .= '
			';
	}
	$__finalCompiled .= '

			';
	if ($__vars['extras']['custom_fields']) {
		$__finalCompiled .= '
				';
		$__vars['amsCustomFieldGroupNames'] = array('header', 'above_article', 'below_article', 'new_tab', 'sidebar', 'self_place', );
		$__finalCompiled .= '
				';
		$__compilerTemp4 = '';
		$__compilerTemp4 .= '
							';
		if ($__templater->isTraversable($__vars['amsCustomFieldGroupNames'])) {
			foreach ($__vars['amsCustomFieldGroupNames'] AS $__vars['amsCustomFieldGroupName']) {
				$__compilerTemp4 .= '
								' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
					'type' => 'ams_articles',
					'group' => $__vars['amsCustomFieldGroupName'],
					'set' => $__vars['article']['custom_fields'],
					'onlyInclude' => $__vars['article']['Category']['field_cache'],
					'additionalFilters' => array('display_on_list', ),
					'wrapperClass' => 'listViewLayout-fields listViewLayout-fields--before',
					'valueClass' => 'pairs pairs--columns pairs--fixedSmall',
				), $__vars) . '
							';
			}
		}
		$__compilerTemp4 .= '
						';
		if (strlen(trim($__compilerTemp4)) > 0) {
			$__finalCompiled .= '
					<div class="structItem-articleCustomFields">
						' . $__compilerTemp4 . '
					</div>
				';
		}
		$__finalCompiled .= '
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'article_view_layout' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'category' => null,
		'filterPrefix' => false,
		'showWatched' => true,
		'showSticky' => false,
		'allowInlineMod' => true,
		'chooseName' => '',
		'extraInfo' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__templater->includeCss('message.less');
	$__finalCompiled .= '
	';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '

	';
	$__vars['extras'] = $__templater->func('property', array('xaAmsArticleViewLayoutElements', ), false);
	$__finalCompiled .= '

	<div class="message message--simple message--articleView ' . ((($__vars['article']['sticky'] AND $__vars['showSticky'])) ? 'sticky' : '') . ' ' . ($__vars['article']['prefix_id'] ? ('is-prefix' . $__templater->escape($__vars['article']['prefix_id'])) : '') . ' ' . ($__templater->method($__vars['article'], 'isIgnored', array()) ? 'is-ignored' : '') . ((($__templater->method($__vars['article'], 'isUnread', array()) AND (!$__vars['forceRead']))) ? ' is-unread' : '') . (($__vars['article']['article_state'] == 'moderated') ? ' is-moderated' : '') . (($__vars['article']['article_state'] == 'deleted') ? ' is-deleted' : '') . ' js-inlineModContainer js-amsArticle" id="js-amsArticle-' . $__templater->escape($__vars['article']['article_id']) . '">
		<span class="u-anchorTarget" id="ams-article-' . $__templater->escape($__vars['article']['article_id']) . '"></span>
		<div class="message-inner">
			<div class="message-cell message-cell--main">
				<div class="message-attribution-source message-attribution-amsCategoryTitle">
					';
	if ((((!$__vars['category']) OR $__templater->method($__vars['category'], 'hasChildren', array()))) AND $__vars['extras']['category']) {
		$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('ams/categories', $__vars['article']['Category'], ), true) . '">' . $__templater->escape($__vars['article']['Category']['title']) . '</a>
					';
	}
	$__finalCompiled .= '

					<ul class="message-attribution-opposite message-attribution-opposite--list ams-muted">
						';
	if ($__vars['chooseName']) {
		$__finalCompiled .= '
							<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'name' => $__vars['chooseName'] . '[]',
			'value' => $__vars['article']['article_id'],
			'class' => 'js-chooseItem',
			'_type' => 'option',
		))) . '</li>
						';
	} else if ($__vars['allowInlineMod'] AND $__templater->method($__vars['article'], 'canUseInlineModeration', array())) {
		$__finalCompiled .= '
							<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['article']['article_id'],
			'class' => 'js-inlineModToggle',
			'data-xf-init' => 'tooltip',
			'title' => $__templater->filter('Select for moderation', array(array('for_attr', array()),), false),
			'_type' => 'option',
		))) . '</li>
						';
	}
	$__finalCompiled .= '

						';
	if ($__vars['extras']['share_this_article']) {
		$__finalCompiled .= '
							<li class="u-flexStretch"><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '"
								class="u-muted"
								data-xf-init="share-tooltip"
								data-href="' . $__templater->func('link', array('ams/share', $__vars['article'], ), true) . '"
								aria-label="' . $__templater->filter('Share', array(array('for_attr', array()),), true) . '"
								rel="nofollow">
								' . $__templater->fontAwesome('fa-share-alt', array(
		)) . '
							</a></li>
						';
	}
	$__finalCompiled .= '

						';
	if ($__vars['article']['Featured']) {
		$__finalCompiled .= '
							<li>' . $__templater->fontAwesome('fa-bullhorn', array(
			'title' => $__templater->filter('Featured', array(array('for_attr', array()),), false),
		)) . '</li> 
						';
	}
	$__finalCompiled .= '
						';
	if ($__vars['article']['has_poll']) {
		$__finalCompiled .= '
							<li>' . $__templater->fontAwesome('fa-chart-bar', array(
			'title' => $__templater->filter('Poll', array(array('for_attr', array()),), false),
		)) . '</li> 
						';
	}
	$__finalCompiled .= '
						';
	if ($__vars['article']['article_state'] == 'moderated') {
		$__finalCompiled .= '
							<li>' . $__templater->fontAwesome('fa-shield', array(
			'title' => $__templater->filter('Awaiting approval', array(array('for_attr', array()),), false),
		)) . '</li>
						';
	}
	$__finalCompiled .= '
						';
	if ($__vars['article']['article_state'] == 'deleted') {
		$__finalCompiled .= '
							<li>' . $__templater->fontAwesome('fa-trash-alt', array(
			'title' => $__templater->filter('Deleted', array(array('for_attr', array()),), false),
		)) . '</li> 
						';
	}
	$__finalCompiled .= '
						';
	if ($__vars['showWatched'] AND $__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
							';
		if ($__vars['article']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__finalCompiled .= '
								<li>' . $__templater->fontAwesome('fa-eye', array(
				'title' => $__templater->filter('Article watched', array(array('for_attr', array()),), false),
			)) . '</li>
							';
		} else if ((!$__vars['category']) AND $__vars['article']['Category']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__finalCompiled .= '
								<li>' . $__templater->fontAwesome('fa-eye', array(
				'title' => $__templater->filter('Category watched', array(array('for_attr', array()),), false),
			)) . '</li>
							';
		}
		$__finalCompiled .= '
						';
	}
	$__finalCompiled .= '
						';
	if ($__vars['article']['sticky'] AND $__vars['showSticky']) {
		$__finalCompiled .= '
							<li>' . $__templater->fontAwesome('fa-thumbtack', array(
			'title' => $__templater->filter('Sticky', array(array('for_attr', array()),), false),
		)) . '</li>
						';
	}
	$__finalCompiled .= '
					</ul>
				</div>

				<div class="message-attribution message-attribution-amsArticleTitle">
					<h2 class="message-attribution-main contentRow-title">
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
								';
			if ($__vars['filterPrefix']) {
				$__finalCompiled .= '
									<a href="' . $__templater->func('link', array('ams', null, array('prefix_id' => $__vars['article']['prefix_id'], ), ), true) . '" class="labelLink" rel="nofollow">' . $__templater->func('prefix', array('ams_article', $__vars['article'], 'html', '', ), true) . '</a>
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
						';
	}
	$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" class="" >' . $__templater->escape($__vars['article']['title']) . '</a>
					</h2>
				</div>

				';
	if ($__vars['article']['article_state'] != 'deleted') {
		$__finalCompiled .= '
					';
		$__compilerTemp1 = '';
		$__compilerTemp1 .= $__templater->escape($__templater->method($__vars['article'], 'getArticleLocationForList', array()));
		if (strlen(trim($__compilerTemp1)) > 0) {
			$__finalCompiled .= '
						<div class="message-attribution message-attribution-amsArticleLocation">
							' . $__compilerTemp1 . '

							';
			if ($__templater->method($__vars['article'], 'canViewArticleMap', array())) {
				$__finalCompiled .= '
								<a href="' . $__templater->func('link', array('ams/map-overlay', $__vars['article'], ), true) . '" rel="nofollow" class="message-attribution-amsArticleLocationIcon" data-xf-click="overlay">' . $__templater->fontAwesome('fa-map-marker-alt', array(
				)) . '</a>
							';
			}
			$__finalCompiled .= '
						</div>	
					';
		}
		$__finalCompiled .= '
				';
	}
	$__finalCompiled .= '

				';
	if ($__vars['article']['article_state'] != 'deleted') {
		$__finalCompiled .= '
					<div class="message-attribution message-attribution-amsArticleMeta">
						<ul class="listInline listInline--bullet">
							<li>
								';
		if ($__vars['article']['User']['Profile']['xa_ams_author_name']) {
			$__finalCompiled .= '
									' . $__templater->func('username_link', array(array('user_id' => $__vars['article']['User']['user_id'], 'username' => $__vars['article']['User']['Profile']['xa_ams_author_name'], ), false, array(
				'defaultname' => $__vars['article']['User']['Profile']['xa_ams_author_name'],
				'class' => 'u-muted',
			))) . '
								';
		} else {
			$__finalCompiled .= '
									' . $__templater->func('username_link', array($__vars['article']['User'], false, array(
				'defaultname' => ($__vars['article']['username'] ?: 'Deleted member'),
				'class' => 'u-muted',
			))) . '
								';
		}
		$__finalCompiled .= '
							</li>
							<li><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" class="u-muted">' . $__templater->func('date_dynamic', array($__vars['article']['publish_date'], array(
		))) . '</a></li>
							';
		if ($__vars['article']['last_update'] > $__vars['article']['publish_date']) {
			$__finalCompiled .= '								
								<li>
									<span class="u-muted">' . 'Updated' . '</span>
									' . $__templater->func('date_dynamic', array($__vars['article']['last_update'], array(
			))) . '
								</li>
							';
		}
		$__finalCompiled .= '
							';
		if ($__vars['article']['article_read_time'] AND $__vars['extras']['article_read_time']) {
			$__finalCompiled .= '
								<li>
									<span class="u-muted">' . '' . $__templater->escape($__vars['article']['article_read_time']) . ' min read' . '</span>
								</li>
							';
		}
		$__finalCompiled .= '
							';
		if ($__vars['article']['author_rating'] AND ($__vars['article']['Category']['allow_author_rating'] AND $__vars['extras']['author_rating'])) {
			$__finalCompiled .= '
								<li>
									' . $__templater->callMacro('rating_macros', 'stars', array(
				'rating' => $__vars['article']['author_rating'],
				'class' => 'ratingStars--amsAuthorRating',
			), $__vars) . '
								</li>
							';
		}
		$__finalCompiled .= '
							';
		if ($__vars['article']['rating_count'] AND ($__vars['article']['Category']['allow_ratings'] AND $__vars['extras']['rating_avg'])) {
			$__finalCompiled .= '
								<li>
									' . $__templater->callMacro('rating_macros', 'stars', array(
				'rating' => $__vars['article']['rating_avg'],
				'class' => '',
			), $__vars) . '
								</li>
							';
		}
		$__finalCompiled .= '
							';
		if ($__vars['article']['view_count'] AND $__vars['extras']['view_count']) {
			$__finalCompiled .= '
								<li>
									<span class="u-muted">' . 'Views' . ': </span>
									' . $__templater->filter($__vars['article']['view_count'], array(array('number_short', array()),), true) . '
								</li>
							';
		}
		$__finalCompiled .= '
							';
		if ($__vars['article']['reaction_score'] AND $__vars['extras']['reaction_score']) {
			$__finalCompiled .= '
								<li>
									<span class="u-muted">' . 'Reaction score' . ': </span>
									' . $__templater->filter($__vars['article']['reaction_score'], array(array('number_short', array()),), true) . '
								</li>
							';
		}
		$__finalCompiled .= '
							';
		if ($__vars['article']['Category']['allow_comments'] AND ($__vars['article']['comment_count'] AND $__vars['extras']['comment_count'])) {
			$__finalCompiled .= '
								<li>
									<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '#comments" class="u-muted"><span>' . 'Comments' . ':</span> ' . $__templater->filter($__vars['article']['comment_count'], array(array('number_short', array()),), true) . '</a>
								</li>
							';
		}
		$__finalCompiled .= '
							';
		if ($__vars['article']['Category']['allow_ratings'] AND ($__vars['article']['review_count'] AND $__vars['extras']['review_count'])) {
			$__finalCompiled .= '
								<li>
									<a href="' . $__templater->func('link', array('ams/reviews', $__vars['article'], ), true) . '" class="u-muted"><span>' . 'Reviews' . ':</span> ' . $__templater->filter($__vars['article']['review_count'], array(array('number_short', array()),), true) . '</a>
								</li>
							';
		}
		$__finalCompiled .= '
						</ul>
					</div>
				';
	}
	$__finalCompiled .= '

				';
	if ($__vars['article']['article_state'] == 'deleted') {
		$__finalCompiled .= '
					<div class="message-content js-messageContent">
						<div class="messageNotice messageNotice--deleted">
							' . $__templater->callMacro('deletion_macros', 'notice', array(
			'log' => $__vars['article']['DeletionLog'],
		), $__vars) . '
						</div>
					</div>
				';
	} else if ($__vars['article']['article_state'] == 'moderated') {
		$__finalCompiled .= '
					<div class="message-content js-messageContent">
						<div class="messageNotice messageNotice--moderated">
							' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '
						</div>
					</div>
				';
	}
	$__finalCompiled .= '

				';
	if ($__vars['article']['CoverImage'] AND $__vars['extras']['cover_image']) {
		$__finalCompiled .= '
					<div class="amsCoverImage ' . ($__vars['article']['cover_image_caption'] ? 'has-caption' : '') . '">
						<div class="amsCoverImage-container">
							<div class="amsCoverImage-container-image js-coverImageContainerImage">
								<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" class="" ><img src="' . $__templater->func('link', array('ams/cover-image', $__vars['article'], ), true) . '" alt="' . $__templater->escape($__vars['article']['CoverImage']['filename']) . '" class="js-articleCoverImage" /></a>
							</div>
						</div>
					</div>

					';
		if ($__vars['article']['cover_image_caption']) {
			$__finalCompiled .= '
						<div class="amsCoverImage-caption">
							' . $__templater->func('snippet', array($__vars['article']['cover_image_caption'], 500, array('stripBbCode' => true, ), ), true) . '
						</div>
					';
		}
		$__finalCompiled .= '
				';
	}
	$__finalCompiled .= '

				';
	if (($__vars['article']['article_state'] != 'deleted') AND (($__vars['extras']['preview_snippet'] OR $__vars['extras']['custom_fields']))) {
		$__finalCompiled .= '
					<div class="message-content js-messageContent">
						<div class="message-userContent lbContainer js-lbContainer"
							data-lb-id="amsArticle-' . $__templater->escape($__vars['article']['article_id']) . '"
							data-lb-caption-desc="' . ($__vars['article']['User'] ? $__templater->escape($__vars['article']['User']['username']) : $__templater->escape($__vars['article']['username'])) . ' &middot; ' . $__templater->func('date_time', array($__vars['article']['publish_date'], ), true) . '">

							';
		if ($__vars['extras']['preview_snippet']) {
			$__finalCompiled .= '
								<blockquote class="message-body">
									' . $__templater->func('snippet', array($__vars['article']['message'], $__vars['xf']['options']['xaAmsSnippetLengthAV'], array('stripQuote' => true, ), ), true) . '
								</blockquote>
							';
		}
		$__finalCompiled .= '

							';
		if ($__vars['extras']['custom_fields']) {
			$__finalCompiled .= '
								';
			$__vars['amsCustomFieldGroupNames'] = array('header', 'above_article', 'below_article', 'new_tab', 'sidebar', 'self_place', );
			$__finalCompiled .= '
								';
			$__compilerTemp2 = '';
			$__compilerTemp2 .= '
											';
			if ($__templater->isTraversable($__vars['amsCustomFieldGroupNames'])) {
				foreach ($__vars['amsCustomFieldGroupNames'] AS $__vars['amsCustomFieldGroupName']) {
					$__compilerTemp2 .= '
												' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
						'type' => 'ams_articles',
						'group' => $__vars['amsCustomFieldGroupName'],
						'set' => $__vars['article']['custom_fields'],
						'onlyInclude' => $__vars['article']['Category']['field_cache'],
						'additionalFilters' => array('display_on_list', ),
						'wrapperClass' => 'articleViewLayout-fields articleViewLayout-fields--before articleBody-fields',
						'valueClass' => 'pairs pairs--columns pairs--fixedSmall',
					), $__vars) . '
											';
				}
			}
			$__compilerTemp2 .= '
										';
			if (strlen(trim($__compilerTemp2)) > 0) {
				$__finalCompiled .= '
									<blockquote class="message-body">
										' . $__compilerTemp2 . '
									</blockquote>
								';
			}
			$__finalCompiled .= '
							';
		}
		$__finalCompiled .= '
						</div>
					</div>
				';
	}
	$__finalCompiled .= '

				';
	if ($__vars['extras']['view_article_button'] OR (($__vars['xf']['options']['enableTagging'] AND ($__vars['article']['tags'] AND $__vars['extras']['tags'])))) {
		$__finalCompiled .= '
					<footer class="message-footer">
						<div class="message-actionBar actionBar">
							<div class="actionBar-set actionBar-set--external">
								';
		if ($__vars['extras']['view_article_button']) {
			$__finalCompiled .= '
									' . $__templater->button('
										' . 'View article' . $__vars['xf']['language']['ellipsis'] . '
									', array(
				'href' => $__templater->func('link', array('ams', $__vars['article'], ), false),
				'class' => 'button--link',
			), '', array(
			)) . '
								';
		}
		$__finalCompiled .= '
							</div>

							';
		$__compilerTemp3 = '';
		$__compilerTemp3 .= '
												';
		if ($__vars['xf']['options']['enableTagging'] AND ($__vars['article']['tags'] AND $__vars['extras']['tags'])) {
			$__compilerTemp3 .= '
													<div class="contentRow contentRow--hideFigureNarrow">
														<div class="contentRow-main">
															<div class="p-description">
																<ul class="listInline listInline--bullet">
																	<li>
																		' . $__templater->fontAwesome('fa-tags', array(
				'title' => $__templater->filter('Tags', array(array('for_attr', array()),), false),
			)) . '
																		<span class="u-srOnly">' . 'Tags' . '</span>
																		';
			if ($__templater->isTraversable($__vars['article']['tags'])) {
				foreach ($__vars['article']['tags'] AS $__vars['tag']) {
					$__compilerTemp3 .= '
																			<a href="' . $__templater->func('link', array('tags', $__vars['tag'], ), true) . '" class="tagItem" dir="auto">' . $__templater->escape($__vars['tag']['tag']) . '</a>
																		';
				}
			}
			$__compilerTemp3 .= '
																	</li>
																</ul>
															</div>
														</div>
													</div>
												';
		}
		$__compilerTemp3 .= '
											';
		if (strlen(trim($__compilerTemp3)) > 0) {
			$__finalCompiled .= '
								<div class="actionBar-set actionBar-set--internal">  
									<div class="block">
										<div class="blockMessage blockMessage--none blockMessage--close">
											' . $__compilerTemp3 . '
										</div>
									</div>	
								</div>
							';
		}
		$__finalCompiled .= '
						</div>
					</footer>
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'article_simple' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'withMeta' => true,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	
	<div class="contentRow">
		<div class="contentRow-figure">
			' . $__templater->func('avatar', array($__vars['article']['User'], 'xxs', false, array(
	))) . '
		</div>
		
		<div class="contentRow-main contentRow-main--close">
			<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">' . $__templater->func('prefix', array('ams_article', $__vars['article'], ), true) . $__templater->escape($__vars['article']['title']) . '</a>

			';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= $__templater->escape($__templater->method($__vars['article'], 'getArticleLocationForList', array()));
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
				<div class="contentRow-snippet contentRow-minor contentRow-minor--smaller">
					' . $__compilerTemp1 . '

					';
		if ($__templater->method($__vars['article'], 'canViewArticleMap', array())) {
			$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('ams/map-overlay', $__vars['article'], ), true) . '" rel="nofollow" style="padding-left:3px;" data-xf-click="overlay">' . $__templater->fontAwesome('fa-map-marker-alt', array(
			)) . '</a>
					';
		}
		$__finalCompiled .= '
				</div>	
			';
	}
	$__finalCompiled .= '
			
			<div class="contentRow-snippet">
				' . $__templater->func('smilie', array($__templater->func('snippet', array($__vars['article']['message'], 100, array('stripBbCode' => true, 'stripQuote' => true, ), ), false), ), true) . '
			</div>				

			';
	if ($__vars['withMeta']) {
		$__finalCompiled .= '
				<div class="contentRow-minor contentRow-minor--smaller">
					<ul class="listInline listInline--bullet">
						';
		if ($__vars['article']['User']['Profile']['xa_ams_author_name']) {
			$__finalCompiled .= '
							<li>' . $__templater->escape($__vars['article']['User']['Profile']['xa_ams_author_name']) . '</li>
						';
		} else {
			$__finalCompiled .= '
							<li>' . ($__templater->escape($__vars['article']['User']['username']) ?: $__templater->escape($__vars['article']['username'])) . '</li>
						';
		}
		$__finalCompiled .= '
						<li>' . 'Updated' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['article']['last_update'], array(
		))) . '</li>
						';
		if ($__vars['article']['article_read_time']) {
			$__finalCompiled .= '
							<li>' . '' . $__templater->escape($__vars['article']['article_read_time']) . ' min read' . '</li>
						';
		}
		$__finalCompiled .= '
					</ul>
				</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'article_list_item_struct_item' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'item' => '!',
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
	if ($__vars['item']['LastComment'] AND $__templater->method($__vars['item']['LastComment'], 'isUnread', array())) {
		$__finalCompiled .= '
		';
		$__vars['link'] = $__templater->preEscaped($__templater->func('link', array('ams/article-comments/unread', $__vars['item'], ), true));
		$__finalCompiled .= '
	';
	} else {
		$__finalCompiled .= '
		';
		$__vars['link'] = $__templater->preEscaped($__templater->func('link', array('ams', $__vars['item'], ), true));
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
	<div class="structItem structItem--middle' . ((($__vars['item']['LastComment'] AND $__templater->method($__vars['item']['LastComment'], 'isUnread', array()))) ? ' is-unread' : '') . '" data-author="' . ($__templater->escape($__vars['item']['User']['username']) ?: $__templater->escape($__vars['item']['username'])) . '">
		<div class="structItem-cell structItem-cell--icon structItem-cell--iconFixedSmall">
			<div class="structItem-iconContainer">
				';
	if ($__vars['item']['CoverImage']) {
		$__finalCompiled .= '
					<a href="' . $__templater->escape($__vars['link']) . '">
						' . $__templater->func('ams_article_thumbnail', array($__vars['item'], ), true) . '
					</a>
					' . $__templater->func('avatar', array($__vars['item']['User'], 's', false, array(
			'href' => '',
			'class' => 'avatar--separated structItem-secondaryIcon',
		))) . '
				';
	} else if ($__vars['item']['SeriesPart']['Series'] AND $__vars['item']['SeriesPart']['Series']['icon_date']) {
		$__finalCompiled .= '
					' . $__templater->func('ams_series_icon', array($__vars['item']['SeriesPart']['Series'], 'm', $__templater->func('link', array('ams', $__vars['item'], ), false), ), true) . '
					' . $__templater->func('avatar', array($__vars['item']['User'], 's', false, array(
			'href' => '',
			'class' => 'avatar--separated structItem-secondaryIcon',
		))) . '
				';
	} else if ($__vars['item']['Category']['content_image_url']) {
		$__finalCompiled .= '
					<a href="' . $__templater->escape($__vars['link']) . '">
						' . $__templater->func('ams_category_icon', array($__vars['item'], ), true) . '
					</a>
					' . $__templater->func('avatar', array($__vars['item']['User'], 's', false, array(
			'href' => '',
			'class' => 'avatar--separated structItem-secondaryIcon',
		))) . '
				';
	} else {
		$__finalCompiled .= '
					' . $__templater->func('avatar', array($__vars['item']['User'], 'm', false, array(
			'defaultname' => ($__vars['item']['username'] ?: 'Deleted member'),
		))) . '
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
		<div class="structItem-cell structItem-cell--main" data-xf-init="touch-proxy">
			<div class="structItem-title">
				<a href="' . $__templater->escape($__vars['link']) . '" class="" data-tp-primary="on">' . $__templater->escape($__vars['item']['title']) . '</a>
			</div>

			<div class="structItem-minor">
				';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
							';
	if ($__vars['extraInfo']) {
		$__compilerTemp1 .= '
								<li>' . $__templater->escape($__vars['extraInfo']) . '</li>
							';
	}
	$__compilerTemp1 .= '
							';
	if ($__vars['chooseName']) {
		$__compilerTemp1 .= '
								<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'name' => $__vars['chooseName'] . '[]',
			'value' => $__vars['item']['article_id'],
			'class' => 'js-chooseItem',
			'_type' => 'option',
		))) . '</li>
							';
	}
	$__compilerTemp1 .= '
						';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
					<ul class="structItem-extraInfo">
						' . $__compilerTemp1 . '
					</ul>
				';
	}
	$__finalCompiled .= '
				<ul class="structItem-parts">
					<li>' . $__templater->func('username_link', array($__vars['item']['User'], false, array(
		'defaultname' => ($__vars['item']['username'] ?: 'Deleted member'),
	))) . '</li>
					<li>' . 'Article' . '</li>
					<li>' . $__templater->func('date_dynamic', array($__vars['item']['publish_date'], array(
	))) . '</li>
					';
	if ($__vars['item']['article_read_time']) {
		$__finalCompiled .= '
						<li>' . '' . $__templater->escape($__vars['item']['article_read_time']) . ' min read' . '</li>
					';
	}
	$__finalCompiled .= '
					';
	if ($__vars['item']['category_id'] AND $__vars['item']['Category']) {
		$__finalCompiled .= '
						<li>' . 'Category' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['item']['Category']['title']) . '</li>
					';
	}
	$__finalCompiled .= '
				</ul>
			</div>
		</div>
		<div class="structItem-cell structItem-cell--meta">
			<dl class="pairs pairs--justified">
				<dt>' . 'Comments' . '</dt>
				<dd>' . $__templater->filter($__vars['item']['comment_count'], array(array('number', array()),), true) . '</dd>
			</dl>
		</div>
		<div class="structItem-cell structItem-cell--latest">
			';
	if ($__vars['item']['LastComment']) {
		$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('ams/comments', $__vars['item']['LastComment'], ), true) . '" rel="nofollow">' . $__templater->func('date_dynamic', array($__vars['item']['last_comment_date'], array(
			'class' => 'structItem-latestDate',
		))) . '</a>
				<div class="structItem-minor">
					' . $__templater->func('username_link', array($__vars['item']['LastCommenter'], false, array(
		))) . '
				</div>
			';
	} else {
		$__finalCompiled .= '
				-
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

' . '

' . '

';
	return $__finalCompiled;
}
);