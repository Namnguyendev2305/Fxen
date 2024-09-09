<?php
// FROM HASH: 76490d59392bbe74a142f36d0fbcac1b
return array(
'macros' => array('featured_grid' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'featuredArticles' => '!',
		'featuredArticlesCount' => '!',
		'category' => null,
		'viewAllLink' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if (!$__templater->test($__vars['featuredArticles'], 'empty', array())) {
		$__finalCompiled .= '
		';
		$__templater->includeCss('carousel.less');
		$__finalCompiled .= '
		';
		$__templater->includeCss('xa_ams.less');
		$__finalCompiled .= '
		';
		$__templater->includeCss('xa_ams_featured_grid.less');
		$__finalCompiled .= '

		';
		$__vars['extras'] = $__templater->func('property', array('xaAmsFeaturedArticlesGridBlockElements', ), false);
		$__finalCompiled .= '

		<div class="carousel carousel--withFooter carousel--amsFeaturedArticles">		
			<ul class="ams-featured-grid">
				';
		$__vars['i'] = 0;
		if ($__templater->isTraversable($__vars['featuredArticles'])) {
			foreach ($__vars['featuredArticles'] AS $__vars['article']) {
				$__vars['i']++;
				$__finalCompiled .= '
					';
				if ($__vars['i'] == 1) {
					$__finalCompiled .= '
						<li class="first">
							';
					if ($__vars['featuredArticlesCount'] < 3) {
						$__finalCompiled .= '
								<div class="item medium-item ' . ((($__templater->method($__vars['article'], 'isUnread', array()) AND (!$__vars['forceRead']))) ? ' is-unread' : '') . '">
									' . $__templater->callMacro(null, 'article_cover_image', array(
							'article' => $__vars['article'],
							'extras' => $__vars['extras'],
							'blockType' => 'featured_grid',
						), $__vars) . '

									' . $__templater->callMacro(null, 'article_caption', array(
							'article' => $__vars['article'],
							'extras' => $__vars['extras'],
							'extraHeadingClass' => '',
							'blockType' => 'featured_grid',
						), $__vars) . '
								</div>
							';
					} else {
						$__finalCompiled .= '
								<div class="item large-item ' . ((($__templater->method($__vars['article'], 'isUnread', array()) AND (!$__vars['forceRead']))) ? ' is-unread' : '') . '">
									' . $__templater->callMacro(null, 'article_cover_image', array(
							'article' => $__vars['article'],
							'extras' => $__vars['extras'],
							'blockType' => 'featured_grid',
						), $__vars) . '

									' . $__templater->callMacro(null, 'article_caption', array(
							'article' => $__vars['article'],
							'extras' => $__vars['extras'],
							'extraHeadingClass' => '',
							'blockType' => 'featured_grid',
						), $__vars) . '
								</div>
							';
					}
					$__finalCompiled .= '
						</li>
					';
				}
				$__finalCompiled .= '

					';
				if ($__vars['i'] == 2) {
					$__finalCompiled .= '
						<li class="second">
							<div class="item medium-item ' . ((($__templater->method($__vars['article'], 'isUnread', array()) AND (!$__vars['forceRead']))) ? ' is-unread' : '') . '">
								' . $__templater->callMacro(null, 'article_cover_image', array(
						'article' => $__vars['article'],
						'extras' => $__vars['extras'],
						'blockType' => 'featured_grid',
					), $__vars) . '

								' . $__templater->callMacro(null, 'article_caption', array(
						'article' => $__vars['article'],
						'extras' => $__vars['extras'],
						'extraHeadingClass' => 'heading-small',
						'blockType' => 'featured_grid',
					), $__vars) . '
							</div>
						</li>
					';
				}
				$__finalCompiled .= '

					';
				if ($__vars['i'] == 3) {
					$__finalCompiled .= '
						<li class="second">
							<div class="item medium-item-2 ' . ((($__templater->method($__vars['article'], 'isUnread', array()) AND (!$__vars['forceRead']))) ? ' is-unread' : '') . '">
								' . $__templater->callMacro(null, 'article_cover_image', array(
						'article' => $__vars['article'],
						'extras' => $__vars['extras'],
						'blockType' => 'featured_grid',
					), $__vars) . '

								' . $__templater->callMacro(null, 'article_caption', array(
						'article' => $__vars['article'],
						'extras' => $__vars['extras'],
						'extraHeadingClass' => 'heading-small',
						'blockType' => 'featured_grid',
					), $__vars) . '
							</div>
						</li>
					';
				}
				$__finalCompiled .= '
				';
			}
		}
		$__finalCompiled .= '
			</ul>

			' . $__templater->callMacro(null, 'featured_footer', array(
			'viewAllLink' => $__vars['viewAllLink'],
		), $__vars) . '
		</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'featured_carousel' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'featuredArticles' => '!',
		'category' => null,
		'viewAllLink' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if (!$__templater->test($__vars['featuredArticles'], 'empty', array())) {
		$__finalCompiled .= '
		';
		$__templater->includeCss('carousel.less');
		$__finalCompiled .= '
		';
		$__templater->includeCss('lightslider.less');
		$__finalCompiled .= '
		';
		$__templater->includeCss('xa_ams.less');
		$__finalCompiled .= '
		
		';
		$__templater->includeJs(array(
			'prod' => 'xf/carousel-compiled.js',
			'dev' => 'vendor/lightslider/lightslider.min.js, xf/carousel.js',
		));
		$__finalCompiled .= '

		';
		$__vars['extras'] = $__templater->func('property', array('xaAmsFeaturedCarouselElements', ), false);
		$__finalCompiled .= '
		';
		$__vars['showType'] = $__templater->func('property', array('xaAmsFeaturedCarouselShowType', ), false);
		$__finalCompiled .= '

		<div class="carousel carousel--withFooter carousel--amsFeaturedArticles">
			<ul class="carousel-body ' . (($__vars['showType'] == 'show2') ? 'carousel-body--show2' : 'carousel-body--show1') . '" data-xf-init="carousel">
				';
		if ($__templater->isTraversable($__vars['featuredArticles'])) {
			foreach ($__vars['featuredArticles'] AS $__vars['article']) {
				$__finalCompiled .= '
					<li>
						<div class="carousel-item ' . ((($__templater->method($__vars['article'], 'isUnread', array()) AND (!$__vars['forceRead']))) ? ' is-unread' : '') . '">
							<div class="contentRow">
								<div class="contentRow-main">
									';
				if ((((!$__vars['category']) OR $__templater->method($__vars['category'], 'hasChildren', array()))) AND $__vars['extras']['category']) {
					$__finalCompiled .= '
										<div class="contentRow-amsCategory">
											<a href="' . $__templater->func('link', array('ams/categories', $__vars['article']['Category'], ), true) . '">' . $__templater->escape($__vars['article']['Category']['title']) . '</a>
										</div>
									';
				}
				$__finalCompiled .= '

									' . $__templater->callMacro(null, 'article_cover_image', array(
					'article' => $__vars['article'],
					'extras' => $__vars['extras'],
					'blockType' => 'featured_carousel',
				), $__vars) . '
									
									<h4 class="contentRow-title"><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">' . $__templater->func('prefix', array('ams_article', $__vars['article'], ), true) . $__templater->escape($__vars['article']['title']) . '</a></h4>

									' . $__templater->callMacro(null, 'article_location', array(
					'article' => $__vars['article'],
					'extras' => $__vars['extras'],
					'blockType' => 'featured_carousel',
				), $__vars) . '

									';
				if ($__vars['extras']['preview_snippet']) {
					$__finalCompiled .= '
										<div class="contentRow-lesser">
											' . $__templater->func('snippet', array($__vars['article']['message'], $__vars['xf']['options']['xaAmsSnippetLengthFC'], array('stripQuote' => true, ), ), true) . '
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
					$__compilerTemp1 = '';
					$__compilerTemp1 .= '
													';
					if ($__templater->isTraversable($__vars['amsCustomFieldGroupNames'])) {
						foreach ($__vars['amsCustomFieldGroupNames'] AS $__vars['amsCustomFieldGroupName']) {
							$__compilerTemp1 .= '
														' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
								'type' => 'ams_articles',
								'group' => $__vars['amsCustomFieldGroupName'],
								'set' => $__vars['article']['custom_fields'],
								'onlyInclude' => $__vars['article']['Category']['field_cache'],
								'additionalFilters' => array('display_on_list', ),
								'wrapperClass' => 'carouselLayout-fields carouselLayout-fields--before',
								'valueClass' => 'pairs pairs--columns pairs--fixedSmall',
							), $__vars) . '
													';
						}
					}
					$__compilerTemp1 .= '
												';
					if (strlen(trim($__compilerTemp1)) > 0) {
						$__finalCompiled .= '
											<div class="contentRow-lesser contentRow-articleCustomFields">
												' . $__compilerTemp1 . '
											</div>
										';
					}
					$__finalCompiled .= '
									';
				}
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
											<li><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" rel="nofollow" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['article']['publish_date'], array(
				))) . '</a></li>
											';
				if ($__vars['article']['last_update'] AND ($__vars['article']['last_update'] > $__vars['article']['publish_date'])) {
					$__finalCompiled .= '
												<li>' . 'Cập nhật' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['article']['last_update'], array(
					))) . '</li>
											';
				}
				$__finalCompiled .= '
											';
				if ($__vars['article']['article_read_time'] AND $__vars['extras']['article_read_time']) {
					$__finalCompiled .= '
												<li>' . '' . $__templater->escape($__vars['article']['article_read_time']) . ' min read' . '</li>
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
				if ($__vars['article']['rating_avg'] AND ($__vars['article']['rating_count'] AND ($__vars['article']['Category']['allow_ratings'] AND $__vars['extras']['rating_avg']))) {
					$__finalCompiled .= '
												<li>
													' . $__templater->callMacro('rating_macros', 'stars', array(
						'rating' => $__vars['article']['rating_avg'],
					), $__vars) . '
												</li>
											';
				}
				$__finalCompiled .= '
											';
				if ($__vars['article']['view_count'] AND $__vars['extras']['view_count']) {
					$__finalCompiled .= '
												<li>' . 'Lượt xem' . ': ' . $__templater->filter($__vars['article']['view_count'], array(array('number_short', array()),), true) . '</li>
											';
				}
				$__finalCompiled .= '
											';
				if ($__vars['article']['reaction_score'] AND $__vars['extras']['reaction_score']) {
					$__finalCompiled .= '
												<li>' . 'Điểm tương tác' . ': ' . $__templater->filter($__vars['article']['reaction_score'], array(array('number_short', array()),), true) . '</li>
											';
				}
				$__finalCompiled .= '
											';
				if ($__vars['article']['comment_count'] AND $__vars['extras']['comment_count']) {
					$__finalCompiled .= '
												<li><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '#comments" class="u-concealed">' . 'Bình luận' . ': ' . $__templater->filter($__vars['article']['comment_count'], array(array('number_short', array()),), true) . '</a></li>
											';
				}
				$__finalCompiled .= '
											';
				if ($__vars['article']['review_count'] AND $__vars['extras']['review_count']) {
					$__finalCompiled .= '
												<li><a href="' . $__templater->func('link', array('ams/reviews', $__vars['article'], ), true) . '" class="u-concealed">' . 'Reviews' . ': ' . $__templater->filter($__vars['article']['review_count'], array(array('number_short', array()),), true) . '</a></li>
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
													aria-label="' . $__templater->filter('Chia sẻ', array(array('for_attr', array()),), true) . '"
													rel="nofollow">
													' . $__templater->fontAwesome('fa-share-alt', array(
					)) . '
												</a></li>
											';
				}
				$__finalCompiled .= '
										</ul>
									</div>
								</div>
							</div>
						</div>
					</li>
				';
			}
		}
		$__finalCompiled .= '
			</ul>

			' . $__templater->callMacro(null, 'featured_footer', array(
			'viewAllLink' => $__vars['viewAllLink'],
		), $__vars) . '
		</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'article_cover_image' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'extras' => '',
		'blockType' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if ($__vars['blockType'] == 'featured_grid') {
		$__finalCompiled .= '
		';
		if ($__vars['article']['CoverImage']) {
			$__finalCompiled .= '
			<a class="image-link" style="background: url(' . $__templater->func('link', array('ams/cover-image', $__vars['article'], ), true) . ') no-repeat center center transparent; background-size: cover;" href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '"></a>
		';
		} else if ($__vars['article']['Category']['content_image_url']) {
			$__finalCompiled .= '
			<a class="image-link" style="background: url(' . $__templater->func('base_url', array($__vars['article']['Category']['content_image_url'], ), true) . ') no-repeat center center transparent; background-size: cover;" href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '"></a>
		';
		} else {
			$__finalCompiled .= '
			<a class="image-link" style="background: #185886; background-size: cover;" href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '"></a>
		';
		}
		$__finalCompiled .= '
	';
	} else if ($__vars['blockType'] == 'featured_carousel') {
		$__finalCompiled .= '
		';
		if ($__vars['article']['CoverImage']) {
			$__finalCompiled .= '
			<div class="contentRow-figure">
				<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">
					' . $__templater->func('ams_article_thumbnail', array($__vars['article'], ), true) . '
				</a>
			</div>
		';
		} else if ($__vars['article']['SeriesPart']['Series'] AND $__vars['article']['SeriesPart']['Series']['icon_date']) {
			$__finalCompiled .= '
			<div class="contentRow-figure">
				' . $__templater->func('ams_series_icon', array($__vars['article']['SeriesPart']['Series'], 's', $__templater->func('link', array('ams', $__vars['article'], ), false), ), true) . '
			</div>
		';
		} else if ($__vars['article']['Category']['content_image_url']) {
			$__finalCompiled .= '
			<div class="contentRow-figure">
				<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">
					' . $__templater->func('ams_category_icon', array($__vars['article'], ), true) . '
				</a>
			</div>
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'article_caption' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'extras' => '!',
		'extraHeadingClass' => '',
		'blockType' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	<div class="caption">
		' . $__templater->callMacro(null, 'article_heading', array(
		'article' => $__vars['article'],
		'extras' => $__vars['extras'],
		'extraHeadingClass' => $__vars['extraHeadingClass'],
	), $__vars) . '

		' . $__templater->callMacro(null, 'article_ratings', array(
		'article' => $__vars['article'],
		'extras' => $__vars['extras'],
	), $__vars) . '

		' . $__templater->callMacro(null, 'article_location', array(
		'article' => $__vars['article'],
		'extras' => $__vars['extras'],
		'blockType' => $__vars['blockType'],
	), $__vars) . '

		' . $__templater->callMacro(null, 'article_meta', array(
		'article' => $__vars['article'],
		'extras' => $__vars['extras'],
	), $__vars) . '
	</div>
';
	return $__finalCompiled;
}
),
'article_heading' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'extras' => '',
		'extraHeadingClass' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	<h3>
		<span class="item-heading ' . ($__templater->escape($__vars['extraHeadingClass']) ?: '') . '">
			<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">' . $__templater->func('prefix', array('ams_article', $__vars['article'], ), true) . $__templater->escape($__vars['article']['title']) . '</a>
		</span>		
	</h3>
';
	return $__finalCompiled;
}
),
'article_ratings' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'extras' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

 	';
	if ($__vars['extras']['author_rating'] OR $__vars['extras']['rating_avg']) {
		$__finalCompiled .= ' 
		<ul class="listInline listInline--bullet item-rating">
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
	return $__finalCompiled;
}
),
'article_location' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'extras' => '',
		'blockType' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= $__templater->escape($__templater->method($__vars['article'], 'getArticleLocationForList', array()));
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
		<div class="' . (($__vars['blockType'] == 'featured_grid') ? 'item-location' : 'contentRow-minor contentRow-minor--smaller contentRow-articleLocation') . '">
			' . $__compilerTemp1 . '

			';
		if ($__templater->method($__vars['article'], 'canViewArticleMap', array())) {
			$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('ams/map-overlay', $__vars['article'], ), true) . '" rel="nofollow" 
					class="' . (($__vars['blockType'] == 'featured_grid') ? 'item-location-icon' : 'contentRow-articleLocationIcon') . '" 
					data-xf-click="overlay">' . $__templater->fontAwesome('fa-map-marker-alt', array(
			)) . '</a>
			';
		}
		$__finalCompiled .= '
		</div>	
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'article_meta' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'extras' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
			';
	if ($__vars['extras']['username']) {
		$__compilerTemp1 .= '
				<li>
					';
		if ($__vars['article']['User']['Profile']['xa_ams_author_name']) {
			$__compilerTemp1 .= '
						' . $__templater->func('username_link', array(array('user_id' => $__vars['article']['User']['user_id'], 'username' => $__vars['article']['User']['Profile']['xa_ams_author_name'], ), false, array(
				'defaultname' => $__vars['article']['User']['Profile']['xa_ams_author_name'],
				'class' => 'category-title',
			))) . '
					';
		} else {
			$__compilerTemp1 .= '
						' . $__templater->func('username_link', array($__vars['article']['User'], false, array(
				'defaultname' => ($__vars['article']['username'] ?: 'Thành viên đã bị xoá'),
				'class' => 'category-title',
			))) . '
					';
		}
		$__compilerTemp1 .= '
				</li> 
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['extras']['publish_date']) {
		$__compilerTemp1 .= '
				<li><time class="publish-date">' . $__templater->func('date_dynamic', array($__vars['article']['publish_date'], array(
		))) . '</time></li> 
				';
		if ($__vars['article']['last_update'] AND ($__vars['article']['last_update'] > $__vars['article']['publish_date'])) {
			$__compilerTemp1 .= '								
					<li>
						<time class="publish-date"><span>' . 'Cập nhật' . '
						' . $__templater->func('date_dynamic', array($__vars['article']['last_update'], array(
			))) . '</span></time>
					</li>
				';
		}
		$__compilerTemp1 .= '
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['article']['article_read_time'] AND $__vars['extras']['article_read_time']) {
		$__compilerTemp1 .= '
				<li>' . '' . $__templater->escape($__vars['article']['article_read_time']) . ' min read' . '</li>
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['extras']['category_title']) {
		$__compilerTemp1 .= '
				<li><a class="category-title category-' . $__templater->escape($__vars['article']['category_id']) . '" href="' . $__templater->func('link', array('ams/categories', $__vars['article'], ), true) . '">' . $__templater->escape($__vars['article']['Category']['title']) . '</a></li>
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['extras']['share_this_article']) {
		$__compilerTemp1 .= '
				<li class="u-flexStretch"><a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '"
					class="article-share"
					data-xf-init="share-tooltip"
					data-href="' . $__templater->func('link', array('ams/share', $__vars['article'], ), true) . '"
					aria-label="' . $__templater->filter('Chia sẻ', array(array('for_attr', array()),), true) . '"
					rel="nofollow">
					' . $__templater->fontAwesome('fa-share-alt', array(
		)) . '
				</a></li>
			';
	}
	$__compilerTemp1 .= '
		';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '										
		<ul class="listInline listInline--bullet">
		' . $__compilerTemp1 . '
		</ul>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'featured_footer' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'viewAllLink' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	<div class="carousel-footer">
		<a href="' . $__templater->escape($__vars['viewAllLink']) . '">
			' . 'View all featured articles' . '	
		</a>
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

' . '

' . '

' . '

';
	return $__finalCompiled;
}
);