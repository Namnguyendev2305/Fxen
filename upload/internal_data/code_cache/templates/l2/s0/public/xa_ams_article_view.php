<?php
// FROM HASH: c87e0c0c65b64f7566b4a7a19b6e9336
return array(
'extensions' => array('structured_data_extra_params' => function($__templater, array $__vars, $__extensions = null)
{
	return array();
},
'structured_data' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
		$__finalCompiled .= '
        ';
	$__vars['ldJson'] = $__templater->method($__vars['article'], 'getLdStructuredData', array($__vars['page'], $__templater->renderExtension('structured_data_extra_params', $__vars, $__extensions), ));
	$__finalCompiled .= '
        ';
	if ($__vars['ldJson']) {
		$__finalCompiled .= '
            <script type="application/ld+json">
                ' . $__templater->filter($__vars['ldJson'], array(array('json', array(true, )),array('raw', array()),), true) . '
            </script>
        ';
	}
	$__finalCompiled .= '
    ';
	return $__finalCompiled;
}),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->func('prefix', array('ams_article', $__vars['article'], 'escaped', ), true) . ($__vars['article']['meta_title'] ? $__templater->escape($__vars['article']['meta_title']) : $__templater->escape($__vars['article']['title'])));
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	if (!$__templater->method($__vars['article'], 'isSearchEngineIndexable', array())) {
		$__finalCompiled .= '
	';
		$__templater->setPageParam('head.' . 'metaNoindex', $__templater->preEscaped('<meta name="robots" content="noindex" />'));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['article']['meta_description']) {
		$__finalCompiled .= '
	';
		$__vars['descSnippet'] = $__templater->func('snippet', array($__vars['article']['meta_description'], 250, array('stripBbCode' => true, ), ), false);
		$__finalCompiled .= '
';
	} else if ($__vars['article']['description']) {
		$__finalCompiled .= '
	';
		$__vars['descSnippet'] = $__templater->func('snippet', array($__vars['article']['description'], 250, array('stripBbCode' => true, ), ), false);
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__vars['descSnippet'] = $__templater->func('snippet', array($__vars['article']['message'], 250, array('stripBbCode' => true, ), ), false);
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

' . $__templater->callMacro('metadata_macros', 'metadata', array(
		'title' => ($__vars['article']['og_title'] ? $__vars['article']['og_title'] : ($__vars['article']['meta_title'] ? $__vars['article']['meta_title'] : $__vars['article']['title'])),
		'description' => $__vars['descSnippet'],
		'type' => 'article',
		'shareUrl' => $__templater->func('link', array('canonical:ams', $__vars['article'], ), false),
		'canonicalUrl' => $__templater->func('link', array('canonical:ams', $__vars['article'], array('page' => (($__vars['page'] > 1) ? $__vars['page'] : null), ), ), false),
		'imageUrl' => ($__vars['article']['CoverImage'] ? $__templater->func('link', array('canonical:ams/cover-image', $__vars['article'], ), false) : ($__vars['article']['Category']['content_image_url'] ? $__templater->func('base_url', array($__vars['article']['Category']['content_image_url'], true, ), false) : '')),
		'twitterCard' => 'summary_large_image',
	), $__vars) . '

';
	$__templater->setPageParam('ldJsonHtml', '
    ' . '' . '
    ' . $__templater->renderExtension('structured_data', $__vars, $__extensions) . '
');
	$__finalCompiled .= '

';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['pageSelected'] = 'overview';
	$__templater->wrapTemplate('xa_ams_article_wrapper', $__compilerTemp1);
	$__finalCompiled .= '

' . $__templater->callMacro('lightbox_macros', 'setup', array(
		'canViewAttachments' => $__templater->method($__vars['article'], 'canViewAttachments', array()),
	), $__vars) . '

<div class="block">
	';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
				' . $__templater->callMacro('xa_ams_article_wrapper_macros', 'action_buttons', array(
		'article' => $__vars['article'],
		'seriesToc' => $__vars['seriesToc'],
		'articlePages' => $__vars['articlePages'],
		'isFullView' => $__vars['isFullView'],
		'showRateButton' => true,
		'showAddPageButton' => true,
		'showAddToSeriesButton' => true,
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

	';
	if ($__vars['article']['CoverImage'] AND $__vars['article']['cover_image_above_article']) {
		$__finalCompiled .= '
		<div class="amsCoverImage ' . ($__vars['article']['cover_image_caption'] ? 'has-caption' : '') . '">
			<div class="amsCoverImage-container">
				<div class="amsCoverImage-container-image js-coverImageContainerImage">
					';
		if ($__templater->method($__vars['article'], 'canViewAttachments', array())) {
			$__finalCompiled .= '					
						<img src="' . $__templater->func('link', array('ams/cover-image', $__vars['article'], ), true) . '" alt="' . $__templater->escape($__vars['article']['CoverImage']['filename']) . '" class="js-articleCoverImage" />
					';
		} else {
			$__finalCompiled .= '
						<div style="text-align: center;">
							' . $__templater->func('ams_article_thumbnail', array($__vars['article'], ), true) . '
						</div>
					';
		}
		$__finalCompiled .= '						
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
	if ($__vars['poll'] AND (!$__vars['isFullView'])) {
		$__finalCompiled .= '
		' . $__templater->callMacro('poll_macros', 'poll_block', array(
			'poll' => $__vars['poll'],
		), $__vars) . '
	';
	}
	$__finalCompiled .= '	
	
	' . $__templater->widgetPosition('xa_ams_article_view_above_article', array(
		'article' => $__vars['article'],
	)) . '
	
	<div class="block-container">
		<div class="block-body lbContainer js-articleBody"
			data-xf-init="lightbox"
			data-lb-id="article-' . $__templater->escape($__vars['article']['article_id']) . '"
			data-lb-caption-desc="' . ($__vars['article']['User'] ? $__templater->escape($__vars['article']['User']['username']) : $__templater->escape($__vars['article']['username'])) . ' &middot; ' . $__templater->func('date_time', array($__vars['article']['publish_date'], ), true) . '"
			id="js-articleBody-' . $__templater->escape($__vars['article']['article_id']) . '">

			<div class="articleBody">
				<article class="articleBody-main js-lbContainer">
					
					' . $__templater->callAdsMacro('ams_article_view_above_article', array(
		'article' => $__vars['article'],
	), $__vars) . '
					
					';
	if (!$__vars['trimmedArticle']) {
		$__finalCompiled .= '
						' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
			'type' => 'ams_articles',
			'group' => 'above_article',
			'onlyInclude' => $__vars['category']['field_cache'],
			'set' => $__vars['article']['custom_fields'],
			'wrapperClass' => 'articleBody-fields articleBody-fields--before',
		), $__vars) . '
					';
	}
	$__finalCompiled .= '

					';
	if ($__vars['trimmedArticle']) {
		$__finalCompiled .= '
						' . $__templater->func('bb_code', array($__vars['trimmedArticle'], 'ams_article', $__vars['article'], ), true) . '

						<div class="block-rowMessage block-rowMessage--important">
							' . ($__vars['article']['Category']['content_term'] ? 'You do not have permission to view the full content of this ' . $__templater->filter($__vars['article']['Category']['content_term'], array(array('to_lower', array()),), true) . '.' : 'You do not have permission to view the full content of this article.') . '
							';
		if (!$__vars['xf']['visitor']['user_id']) {
			$__finalCompiled .= '
								<a href="' . $__templater->func('link', array('login', ), true) . '" data-xf-click="overlay">' . 'Đăng nhập hoặc Đăng ký.' . '</a>
							';
		}
		$__finalCompiled .= '
						</div>
					';
	} else if ($__vars['isFullView']) {
		$__finalCompiled .= '

						';
		if ($__vars['article']['overview_page_title']) {
			$__finalCompiled .= '
							<h2>' . $__templater->escape($__vars['article']['overview_page_title']) . '</h2>
						';
		}
		$__finalCompiled .= '

						' . $__templater->func('bb_code', array($__vars['article']['message'], 'ams_article', $__vars['article'], ), true) . '

						';
		if ($__templater->isTraversable($__vars['articlePages'])) {
			foreach ($__vars['articlePages'] AS $__vars['_article_page']) {
				$__finalCompiled .= '

							<h2>' . $__templater->escape($__vars['_article_page']['title']) . '</h2>

							';
				if ($__vars['_article_page']['display_byline']) {
					$__finalCompiled .= '
								<div class="message-attribution message-attribution-amsPageMeta">
									<ul class="listInline listInline--bullet">
										<li>
											' . $__templater->fontAwesome('fa-user', array(
						'title' => $__templater->filter('Tác giả', array(array('for_attr', array()),), false),
					)) . '
											<span class="u-srOnly">' . 'Tác giả' . '</span>
											';
					if ($__vars['_article_page']['User']['Profile']['xa_ams_author_name']) {
						$__finalCompiled .= '
												' . $__templater->func('username_link', array(array('user_id' => $__vars['_article_page']['user_id'], 'username' => $__vars['_article_page']['User']['Profile']['xa_ams_author_name'], ), false, array(
							'defaultname' => $__vars['_article_page']['User']['Profile']['xa_ams_author_name'],
							'class' => 'u-concealed',
						))) . '
											';
					} else {
						$__finalCompiled .= '
												' . $__templater->func('username_link', array($__vars['_article_page']['User'], false, array(
							'defaultname' => $__vars['_article_page']['username'],
							'class' => 'u-concealed',
						))) . '
											';
					}
					$__finalCompiled .= '
										</li>
										<li>
											' . $__templater->fontAwesome('fa-clock', array(
						'title' => $__templater->filter('Publish date', array(array('for_attr', array()),), false),
					)) . '
											<span class="u-srOnly">' . 'Publish date' . '</span>

											<a href="' . $__templater->func('link', array('ams/page', $__vars['_article_page'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['_article_page']['create_date'], array(
					))) . '</a>
										</li>
	

										';
					if ($__vars['_article_page']['edit_date'] > $__vars['_article_page']['create_date']) {
						$__finalCompiled .= '								
											<li>
												' . $__templater->fontAwesome('fa-clock', array(
							'title' => $__templater->filter('Last update', array(array('for_attr', array()),), false),
						)) . '
												<span class="u-concealed">' . 'Cập nhật' . '</span>

												' . $__templater->func('date_dynamic', array($__vars['_article_page']['edit_date'], array(
						))) . '
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
				if ($__vars['_article_page']['CoverImage'] AND $__vars['_article_page']['cover_image_above_page']) {
					$__finalCompiled .= '
								<div class="amsCoverImage ' . ($__vars['_article_page']['cover_image_caption'] ? 'has-caption' : '') . '">
									<div class="amsCoverImage-container">
										<div class="amsCoverImage-container-image js-coverImageContainerImage">
											<img src="' . $__templater->func('link', array('ams/page/cover-image', $__vars['_article_page'], ), true) . '" alt="' . $__templater->escape($__vars['_article_page']['CoverImage']['filename']) . '" class="js-articleCoverImage" />
										</div>
									</div>
								</div>

								';
					if ($__vars['_article_page']['cover_image_caption']) {
						$__finalCompiled .= '
									<div class="amsCoverImage-caption">
										' . $__templater->func('snippet', array($__vars['_article_page']['cover_image_caption'], 500, array('stripBbCode' => true, ), ), true) . '
									</div>
								';
					}
					$__finalCompiled .= '
							';
				}
				$__finalCompiled .= '

							' . $__templater->func('bb_code', array($__vars['_article_page']['message'], 'ams_page', $__vars['_article_page'], ), true) . '
						';
			}
		}
		$__finalCompiled .= '
					';
	} else {
		$__finalCompiled .= '
						';
		if ($__vars['article']['page_count'] AND $__vars['article']['overview_page_title']) {
			$__finalCompiled .= '
							<h2>' . $__templater->escape($__vars['article']['overview_page_title']) . '</h2>
						';
		}
		$__finalCompiled .= '

						' . $__templater->func('bb_code', array($__vars['article']['message'], 'ams_article', $__vars['article'], ), true) . '
					';
	}
	$__finalCompiled .= '

					';
	if (!$__vars['trimmedArticle']) {
		$__finalCompiled .= '
						' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
			'type' => 'ams_articles',
			'group' => 'below_article',
			'onlyInclude' => $__vars['category']['field_cache'],
			'set' => $__vars['article']['custom_fields'],
			'wrapperClass' => 'articleBody-fields articleBody-fields--after',
		), $__vars) . '
					';
	}
	$__finalCompiled .= '
					
					' . $__templater->callAdsMacro('ams_article_view_below_article', array(
		'article' => $__vars['article'],
	), $__vars) . '					

					';
	if ($__vars['nextPage'] OR (($__templater->method($__vars['article'], 'isInSeries', array(true, )) AND $__vars['seriesToc']))) {
		$__finalCompiled .= '
						<div style="padding-top: 10px;">
							';
		if ($__vars['nextPage']) {
			$__finalCompiled .= '
								<dl class="blockStatus blockStatus--info blockStatus--standalone">
									<dt></dt>
									<dd class="blockStatus-message amsNextPage">
										<span class="">' . 'Next page' . ':</span>
										<a href="' . $__templater->func('link', array('ams/page', $__vars['nextPage'], ), true) . '" class="" title="' . $__templater->escape($__vars['nextPage']['title']) . '">' . $__templater->escape($__vars['nextPage']['title']) . '</a>
									</dd>
								</dl>
							';
		}
		$__finalCompiled .= '

							';
		if ($__templater->method($__vars['article'], 'isInSeries', array(true, )) AND $__vars['seriesToc']) {
			$__finalCompiled .= '
								';
			if ($__vars['nextSeriesPart']) {
				$__finalCompiled .= '
									<dl class="blockStatus blockStatus--info blockStatus--standalone">
										<dt></dt>
										<dd class="blockStatus-message amsNextArticle">
											<span class="">' . 'Next article in the series \'' . $__templater->escape($__vars['nextSeriesPart']['Series']['title']) . '\'' . $__vars['xf']['language']['label_separator'] . '</span>
											<a href="' . $__templater->func('link', array('ams', $__vars['nextSeriesPart']['Article'], ), true) . '" class="" title="' . $__templater->escape($__vars['nextSeriesPart']['Article']['title']) . '">
												' . $__templater->escape($__vars['nextSeriesPart']['Article']['title']) . '</a>
										</dd>
									</dl>
								';
			}
			$__finalCompiled .= '

								';
			if ($__vars['previousSeriesPart']) {
				$__finalCompiled .= '
									<dl class="blockStatus blockStatus--info blockStatus--standalone">
										<dt></dt>
										<dd class="blockStatus-message amsPreviousArticle">
											<span class="">' . 'Previous article in the series \'' . $__templater->escape($__vars['previousSeriesPart']['Series']['title']) . '\'' . $__vars['xf']['language']['label_separator'] . '</span>
											<a href="' . $__templater->func('link', array('ams', $__vars['previousSeriesPart']['Article'], ), true) . '" class="" title="' . $__templater->escape($__vars['previousSeriesPart']['Article']['title']) . '">
												 ' . $__templater->escape($__vars['previousSeriesPart']['Article']['title']) . '</a>
										</dd>
									</dl>
								';
			}
			$__finalCompiled .= '
							';
		}
		$__finalCompiled .= '
						</div>				
					';
	}
	$__finalCompiled .= '

					';
	if (($__vars['xf']['options']['xaAmsGalleryLocation'] == 'below_article') AND $__vars['article']['attach_count']) {
		$__finalCompiled .= '
						';
		$__compilerTemp3 = '';
		$__compilerTemp3 .= '
									';
		if ($__templater->isTraversable($__vars['article']['Attachments'])) {
			foreach ($__vars['article']['Attachments'] AS $__vars['attachment']) {
				if ($__vars['attachment']['has_thumbnail'] AND (!$__templater->method($__vars['article'], 'isAttachmentEmbedded', array($__vars['attachment'], )))) {
					$__compilerTemp3 .= '
										';
					if ($__vars['article']['cover_image_above_article'] AND ($__vars['attachment']['attachment_id'] == $__vars['article']['cover_image_id'])) {
						$__compilerTemp3 .= '
											' . '
										';
					} else {
						$__compilerTemp3 .= '
											' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
							'attachment' => $__vars['attachment'],
							'canView' => $__templater->method($__vars['article'], 'canViewAttachments', array()),
						), $__vars) . '
										';
					}
					$__compilerTemp3 .= '
									';
				}
			}
		}
		$__compilerTemp3 .= '
								';
		if (strlen(trim($__compilerTemp3)) > 0) {
			$__finalCompiled .= '
							';
			$__templater->includeCss('attachments.less');
			$__finalCompiled .= '
							<ul class="attachmentList articleBody-attachments">
								' . $__compilerTemp3 . '
							</ul>
						';
		}
		$__finalCompiled .= '
					';
	} else {
		$__finalCompiled .= '
						';
		$__compilerTemp4 = '';
		$__compilerTemp4 .= '
									';
		if ($__templater->isTraversable($__vars['article']['Attachments'])) {
			foreach ($__vars['article']['Attachments'] AS $__vars['attachment']) {
				if ($__vars['attachment']['has_thumbnail'] AND (!$__templater->method($__vars['article'], 'isAttachmentEmbedded', array($__vars['attachment'], )))) {
					$__compilerTemp4 .= '
										' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
						'attachment' => $__vars['attachment'],
						'canView' => $__templater->method($__vars['article'], 'canViewAttachments', array()),
					), $__vars) . '
									';
				}
			}
		}
		$__compilerTemp4 .= '
								';
		if (strlen(trim($__compilerTemp4)) > 0) {
			$__finalCompiled .= '
							';
			$__templater->includeCss('attachments.less');
			$__finalCompiled .= '
							<ul class="attachmentList articleBody-attachments" style="display:none;">
								' . $__compilerTemp4 . '
							</ul>
						';
		}
		$__finalCompiled .= '
					';
	}
	$__finalCompiled .= '

					';
	if (($__vars['xf']['options']['xaAmsFilesLocation'] == 'below_article') AND $__vars['article']['attach_count']) {
		$__finalCompiled .= '
						';
		$__compilerTemp5 = '';
		$__compilerTemp5 .= '
									';
		if ($__templater->isTraversable($__vars['article']['Attachments'])) {
			foreach ($__vars['article']['Attachments'] AS $__vars['attachment']) {
				$__compilerTemp5 .= '
										';
				if ($__vars['attachment']['has_thumbnail'] OR $__vars['attachment']['is_video']) {
					$__compilerTemp5 .= '
											' . '
										';
				} else {
					$__compilerTemp5 .= '
											' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
						'attachment' => $__vars['attachment'],
						'canView' => $__templater->method($__vars['article'], 'canViewAttachments', array()),
					), $__vars) . '
										';
				}
				$__compilerTemp5 .= '
									';
			}
		}
		$__compilerTemp5 .= '
								';
		if (strlen(trim($__compilerTemp5)) > 0) {
			$__finalCompiled .= '
							';
			$__templater->includeCss('attachments.less');
			$__finalCompiled .= '
							<ul class="attachmentList articleBody-attachments">
								' . $__compilerTemp5 . '
							</ul>
						';
		}
		$__finalCompiled .= '
					';
	}
	$__finalCompiled .= '

					';
	$__compilerTemp6 = '';
	$__compilerTemp6 .= '
								';
	$__compilerTemp7 = '';
	$__compilerTemp7 .= '
										' . $__templater->func('react', array(array(
		'content' => $__vars['article'],
		'link' => 'ams/react',
		'list' => '< .js-articleBody | .js-reactionsList',
	))) . '
									';
	if (strlen(trim($__compilerTemp7)) > 0) {
		$__compilerTemp6 .= '
									<div class="actionBar-set actionBar-set--external">
									' . $__compilerTemp7 . '
									</div>
								';
	}
	$__compilerTemp6 .= '

								';
	$__compilerTemp8 = '';
	$__compilerTemp8 .= '
										';
	if ($__templater->method($__vars['article'], 'canReport', array())) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('ams/report', $__vars['article'], ), true) . '"
												class="actionBar-action actionBar-action--report" 
												data-xf-click="overlay">' . 'Báo cáo' . '</a>
										';
	}
	$__compilerTemp8 .= '

										';
	$__vars['hasActionBarMenu'] = false;
	$__compilerTemp8 .= '

										';
	if ($__templater->method($__vars['article'], 'canEdit', array())) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('ams/edit', $__vars['article'], ), true) . '"
												class="actionBar-action actionBar-action--edit actionBar-action--menuItem">' . 'Chỉnh sửa' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
										';
	}
	$__compilerTemp8 .= '

										';
	if ($__vars['article']['edit_count'] AND $__templater->method($__vars['article'], 'canViewHistory', array())) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('ams/history', $__vars['article'], ), true) . '" 
												class="actionBar-action actionBar-action--history actionBar-action--menuItem"
												data-xf-click="toggle"
												data-target="#js-articleBody-' . $__templater->escape($__vars['article']['article_id']) . ' .js-historyTarget"
												data-menu-closer="true">' . 'Lịch sử' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
										';
	}
	$__compilerTemp8 .= '

										';
	if ($__templater->method($__vars['article'], 'canDelete', array('soft', ))) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('ams/delete', $__vars['article'], ), true) . '"
												class="actionBar-action actionBar-action--delete actionBar-action--menuItem"
												data-xf-click="overlay">' . 'Xóa' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
										';
	}
	$__compilerTemp8 .= '

										';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewIps', array()) AND $__vars['article']['ip_id']) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('ams/ip', $__vars['article'], ), true) . '"
												class="actionBar-action actionBar-action--ip actionBar-action--menuItem"
												data-xf-click="overlay">' . 'IP' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
										';
	}
	$__compilerTemp8 .= '

										';
	if ($__templater->method($__vars['article'], 'canWarn', array())) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('ams/warn', $__vars['article'], ), true) . '"
												class="actionBar-action actionBar-action--warn actionBar-action--menuItem">' . 'Cảnh cáo' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
										';
	} else if ($__vars['article']['warning_id'] AND $__templater->method($__vars['xf']['visitor'], 'canViewWarnings', array())) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('warnings', array('warning_id' => $__vars['article']['warning_id'], ), ), true) . '"
												class="actionBar-action actionBar-action--warn actionBar-action--menuItem"
												data-xf-click="overlay">' . 'Xem cảnh cáo' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
										';
	}
	$__compilerTemp8 .= '

										';
	if ($__vars['hasActionBarMenu']) {
		$__compilerTemp8 .= '
											<a class="actionBar-action actionBar-action--menuTrigger"
												data-xf-click="menu"
												title="' . 'Thêm tùy chọn' . '"
												role="button"
												tabindex="0"
												aria-expanded="false"
												aria-haspopup="true">&#8226;&#8226;&#8226;</a>

											<div class="menu" data-menu="menu" aria-hidden="true" data-menu-builder="actionBar">
												<div class="menu-content">
													<h4 class="menu-header">' . 'Thêm tùy chọn' . '</h4>
													<div class="js-menuBuilderTarget"></div>
												</div>
											</div>
										';
	}
	$__compilerTemp8 .= '
									';
	if (strlen(trim($__compilerTemp8)) > 0) {
		$__compilerTemp6 .= '
									<div class="actionBar-set actionBar-set--internal">
									' . $__compilerTemp8 . '
									</div>
								';
	}
	$__compilerTemp6 .= '
							';
	if (strlen(trim($__compilerTemp6)) > 0) {
		$__finalCompiled .= '
						<div class="actionBar">
							' . $__compilerTemp6 . '
						</div>
					';
	}
	$__finalCompiled .= '

					<div class="reactionsBar js-reactionsList ' . ($__vars['article']['reactions'] ? 'is-active' : '') . '">
						' . $__templater->func('reactions', array($__vars['article'], 'ams/reactions', array())) . '
					</div>

					<div class="js-historyTarget toggleTarget" data-href="trigger-href"></div>
				</article>
			</div>
		</div>
	</div>
	
	' . $__templater->widgetPosition('xa_ams_article_view_below_article', array(
		'article' => $__vars['article'],
	)) . '
</div>

';
	$__compilerTemp9 = '';
	$__compilerTemp9 .= '
				';
	if ($__vars['article']['original_source']['os_article_author']) {
		$__compilerTemp9 .= '<li>' . $__templater->escape($__vars['article']['original_source']['os_article_author']) . '</li>';
	}
	$__compilerTemp9 .= '  
				';
	if ($__vars['article']['original_source']['os_article_date']) {
		$__compilerTemp9 .= '<li>' . $__templater->func('date_dynamic', array($__vars['article']['original_source']['os_article_date'], array(
		))) . '</li>';
	}
	$__compilerTemp9 .= '
				';
	if ($__vars['article']['original_source']['os_article_title']) {
		$__compilerTemp9 .= '
					';
		if ($__vars['article']['original_source']['os_source_url']) {
			$__compilerTemp9 .= '	
						<li><a href="' . $__templater->escape($__vars['article']['original_source']['os_source_url']) . '" target="_blank">' . $__templater->escape($__vars['article']['original_source']['os_article_title']) . '</a></li>
					';
		} else {
			$__compilerTemp9 .= '
						<li>' . $__templater->escape($__vars['article']['original_source']['os_article_title']) . '</li>
					';
		}
		$__compilerTemp9 .= '
				';
	}
	$__compilerTemp9 .= '  
				';
	if ($__vars['article']['original_source']['os_source_name']) {
		$__compilerTemp9 .= '
					';
		if ($__vars['article']['original_source']['os_source_url']) {
			$__compilerTemp9 .= '	
						<li><a href="' . $__templater->escape($__vars['article']['original_source']['os_source_url']) . '" target="_blank">' . $__templater->escape($__vars['article']['original_source']['os_source_name']) . '</a></li>
					';
		} else {
			$__compilerTemp9 .= '
						<li>' . $__templater->escape($__vars['article']['original_source']['os_source_name']) . '</li>
					';
		}
		$__compilerTemp9 .= '
				';
	}
	$__compilerTemp9 .= '  
			';
	if (strlen(trim($__compilerTemp9)) > 0) {
		$__finalCompiled .= '
	<div class="block">
		<div class="blockMessage">			
			<h4 class="block-textHeader">' . 'Original source' . '</h4>
			<ul class="listInline listInline--bullet">
			' . $__compilerTemp9 . '
			</ul>
		</div>
	</div>	
';
	}
	$__finalCompiled .= '

';
	if ($__vars['article']['location'] AND ($__templater->method($__vars['article'], 'canViewArticleMap', array()) AND ($__vars['category']['allow_location'] AND (($__vars['xf']['options']['xaAmsLocationDisplayType'] == 'map_below_content') AND $__vars['xf']['options']['xaAmsGoogleMapsEmbedApiKey'])))) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<h3 class="block-header">' . 'Nơi ở' . '</h3>
			<div class="block-body block-row contentRow-lesser">
				<p class="mapLocationName"><a href="' . $__templater->func('link', array('misc/location-info', '', array('location' => $__vars['article']['location'], ), ), true) . '" rel="nofollow" target="_blank" class="">' . $__templater->escape($__vars['article']['location']) . '</a></p>
			</div>	
			<div class="block-body block-row">
				<div class="mapContainer">
					<iframe
						width="100%" height="200" frameborder="0" style="border: 0"
						src="https://www.google.com/maps/embed/v1/place?key=' . $__templater->escape($__vars['xf']['options']['xaAmsGoogleMapsEmbedApiKey']) . '&q=' . $__templater->filter($__vars['article']['location'], array(array('censor', array()),), true) . ($__vars['xf']['options']['xaAmsLocalizeGoogleMaps'] ? ('&language=' . $__templater->filter($__vars['xf']['language']['language_code'], array(array('substr', array()),), true)) : '') . '">
					</iframe>
				</div>
			</div>	
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp10 = '';
	$__compilerTemp10 .= '
								';
	if ($__vars['article']['User']['Profile']['xa_ams_about_author'] AND $__vars['article']['about_author']) {
		$__compilerTemp10 .= '
									<div class="articleBody">
										<article class="articleBody-aboutAuthor">
											' . $__templater->func('bb_code', array($__vars['article']['User']['Profile']['xa_ams_about_author'], 'user:xa_ams_about_author', $__vars['article']['User'], ), true) . '
										</article>
									</div>
								';
	} else if ($__vars['article']['User']['Profile']['about'] AND ($__vars['article']['about_author'] AND $__vars['xf']['options']['xaAmsDisplayUserProfileAboutMe'])) {
		$__compilerTemp10 .= '
									<div class="articleBody">
										<article class="articleBody-aboutAuthor">
											' . $__templater->func('bb_code', array($__vars['article']['User']['Profile']['about'], 'user:about', $__vars['article']['User'], ), true) . '
										</article>
									</div>
								';
	}
	$__compilerTemp10 .= '
							';
	if (strlen(trim($__compilerTemp10)) > 0) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">	
			<div class="block-header">' . 'About author' . '</div>

			<div class="block-body ">
				<div class="block-row block-row--separated ">
					<div class="contentRow">
						<span class="contentRow-figure">
							' . $__templater->func('avatar', array($__vars['article']['User'], 's', false, array(
		))) . '
						</span>

						<div class="contentRow-main">
							<div class="contentRow-title">
								';
		if ($__vars['article']['User']['Profile']['xa_ams_author_name']) {
			$__finalCompiled .= '
									' . $__templater->func('username_link', array(array('user_id' => $__vars['article']['User']['user_id'], 'username' => $__vars['article']['User']['Profile']['xa_ams_author_name'], ), true, array(
				'defaultname' => $__vars['article']['User']['Profile']['xa_ams_author_name'],
			))) . '
								';
		} else {
			$__finalCompiled .= '
									' . $__templater->func('username_link', array($__vars['article']['User'], true, array(
			))) . '
								';
		}
		$__finalCompiled .= '
							</div>
							' . $__compilerTemp10 . '
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp11 = '';
	$__compilerTemp11 .= '
				';
	if ($__vars['xf']['options']['xaAmsDisplayShareBelowArticle']) {
		$__compilerTemp11 .= '
					' . $__templater->callMacro('share_page_macros', 'buttons', array(
			'iconic' => true,
			'label' => 'Chia sẻ' . ':',
		), $__vars) . '
				';
	}
	$__compilerTemp11 .= '
			';
	if (strlen(trim($__compilerTemp11)) > 0) {
		$__finalCompiled .= '
	<div class="block">
		<div class="blockMessage blockMessage--none">
			' . $__compilerTemp11 . '
		</div>
	</div>	
';
	}
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['latestReviews'], 'empty', array())) {
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

	<div class="block block--messages"
		data-xf-init="' . ($__vars['canInlineModReviews'] ? 'inline-mod' : '') . '"
		data-type="ams_rating"
		data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">

		<div class="block-container"
			data-xf-init="lightbox"
			data-lb-id="article-' . $__templater->escape($__vars['article']['article_id']) . '"
			data-lb-universal="' . $__templater->escape($__vars['xf']['options']['lightBoxUniversal']) . '">

			<h3 class="block-header">' . 'Latest reviews' . '</h3>
			<div class="block-body">
			';
		if ($__templater->isTraversable($__vars['latestReviews'])) {
			foreach ($__vars['latestReviews'] AS $__vars['review']) {
				$__finalCompiled .= '
				' . $__templater->callMacro('xa_ams_review_macros', 'review', array(
					'review' => $__vars['review'],
					'article' => $__vars['article'],
					'showAttachments' => true,
				), $__vars) . '
			';
			}
		}
		$__finalCompiled .= '
			</div>
			<div class="block-footer">
				<span class="block-footer-controls">' . $__templater->button('Read more' . $__vars['xf']['language']['ellipsis'], array(
			'class' => 'button--link',
			'href' => $__templater->func('link', array('ams/reviews', $__vars['article'], ), false),
		), '', array(
		)) . '</span>
			</div>
		</div>

		<div class="block-outer block-outer--after">
			' . $__templater->func('show_ignored', array(array(
			'wrapperclass' => 'block-outer-opposite',
		))) . '
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if (($__vars['xf']['options']['xaAmsMoreInCategoryLocation'] == 'below_article') AND !$__templater->test($__vars['categoryOthers'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<h3 class="block-header"><a href="' . $__templater->func('link', array('ams/categories', $__vars['article']['Category'], ), true) . '">' . 'More in ' . $__templater->escape($__vars['article']['Category']['title']) . '' . '</a></h3>
			<div class="block-body">
				';
		if (($__vars['xf']['options']['xaAmsMoreInCategoryLayoutType'] == 'article_view') AND $__templater->method($__vars['article'], 'canViewAttachments', array())) {
			$__finalCompiled .= '
					';
			if ($__templater->isTraversable($__vars['categoryOthers'])) {
				foreach ($__vars['categoryOthers'] AS $__vars['categoryOther']) {
					$__finalCompiled .= '
						' . $__templater->callMacro('xa_ams_article_list_macros', 'article_view_layout', array(
						'allowInlineMod' => false,
						'article' => $__vars['categoryOther'],
					), $__vars) . '
					';
				}
			}
			$__finalCompiled .= '
				';
		} else if (($__vars['xf']['options']['xaAmsMoreInCategoryLayoutType'] == 'grid_view') AND $__templater->method($__vars['article'], 'canViewAttachments', array())) {
			$__finalCompiled .= '
					';
			$__templater->includeCss('xa_ams.less');
			$__finalCompiled .= '
					';
			$__templater->includeCss('xa_ams_grid_view_layout.less');
			$__finalCompiled .= '

					<div class="gridContainerAmsGridView">		
						<ul class="ams-grid-view">
							';
			if ($__templater->isTraversable($__vars['categoryOthers'])) {
				foreach ($__vars['categoryOthers'] AS $__vars['categoryOther']) {
					$__finalCompiled .= '
								' . $__templater->callMacro('xa_ams_article_list_macros', 'grid_view_layout', array(
						'allowInlineMod' => false,
						'article' => $__vars['categoryOther'],
					), $__vars) . '
							';
				}
			}
			$__finalCompiled .= '
						</ul>
					</div>
				';
		} else if (($__vars['xf']['options']['xaAmsMoreInCategoryLayoutType'] == 'tile_view') AND $__templater->method($__vars['article'], 'canViewAttachments', array())) {
			$__finalCompiled .= '
					';
			$__templater->includeCss('xa_ams.less');
			$__finalCompiled .= '
					';
			$__templater->includeCss('xa_ams_tile_view_layout.less');
			$__finalCompiled .= '

					<div class="gridContainerAmsTileView">		
						<ul class="ams-tile-view">
							';
			if ($__templater->isTraversable($__vars['categoryOthers'])) {
				foreach ($__vars['categoryOthers'] AS $__vars['categoryOther']) {
					$__finalCompiled .= '
								' . $__templater->callMacro('xa_ams_article_list_macros', 'tile_view_layout', array(
						'allowInlineMod' => false,
						'article' => $__vars['categoryOther'],
					), $__vars) . '
							';
				}
			}
			$__finalCompiled .= '
						</ul>
					</div>							
				';
		} else {
			$__finalCompiled .= '
					<div class="structItemContainer structItemContainerAmsListView">
						';
			if ($__templater->isTraversable($__vars['categoryOthers'])) {
				foreach ($__vars['categoryOthers'] AS $__vars['categoryOther']) {
					$__finalCompiled .= '
							' . $__templater->callMacro('xa_ams_article_list_macros', 'list_view_layout', array(
						'allowInlineMod' => false,
						'article' => $__vars['categoryOther'],
					), $__vars) . '
						';
				}
			}
			$__finalCompiled .= '
					</div>
				';
		}
		$__finalCompiled .= '
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if (($__vars['xf']['options']['xaAmsMoreFromAuthorLocation'] == 'below_article') AND !$__templater->test($__vars['authorOthers'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			';
		if ($__vars['article']['User']['Profile']['xa_ams_author_name']) {
			$__finalCompiled .= '
				<h3 class="block-header"><a href="' . $__templater->func('link', array('ams/authors', $__vars['article']['User'], ), true) . '">' . 'More from ' . $__templater->escape($__vars['article']['User']['Profile']['xa_ams_author_name']) . '' . '</a></h3>
			';
		} else {
			$__finalCompiled .= '
				<h3 class="block-header"><a href="' . $__templater->func('link', array('ams/authors', $__vars['article']['User'], ), true) . '">' . 'More from ' . $__templater->escape($__vars['article']['User']['username']) . '' . '</a></h3>
			';
		}
		$__finalCompiled .= '

			<div class="block-body">
				';
		if (($__vars['xf']['options']['xaAmsMoreFromAuthorLayoutType'] == 'article_view') AND $__templater->method($__vars['article'], 'canViewAttachments', array())) {
			$__finalCompiled .= '
					';
			if ($__templater->isTraversable($__vars['authorOthers'])) {
				foreach ($__vars['authorOthers'] AS $__vars['authorOther']) {
					$__finalCompiled .= '
						' . $__templater->callMacro('xa_ams_article_list_macros', 'article_view_layout', array(
						'allowInlineMod' => false,
						'article' => $__vars['authorOther'],
					), $__vars) . '
					';
				}
			}
			$__finalCompiled .= '
				';
		} else if (($__vars['xf']['options']['xaAmsMoreFromAuthorLayoutType'] == 'grid_view') AND $__templater->method($__vars['article'], 'canViewAttachments', array())) {
			$__finalCompiled .= '
					';
			$__templater->includeCss('xa_ams.less');
			$__finalCompiled .= '
					';
			$__templater->includeCss('xa_ams_grid_view_layout.less');
			$__finalCompiled .= '

					<div class="gridContainerAmsGridView">		
						<ul class="ams-grid-view">
							';
			if ($__templater->isTraversable($__vars['authorOthers'])) {
				foreach ($__vars['authorOthers'] AS $__vars['authorOther']) {
					$__finalCompiled .= '
								' . $__templater->callMacro('xa_ams_article_list_macros', 'grid_view_layout', array(
						'allowInlineMod' => false,
						'article' => $__vars['authorOther'],
					), $__vars) . '
							';
				}
			}
			$__finalCompiled .= '
						</ul>
					</div>
				';
		} else if (($__vars['xf']['options']['xaAmsMoreFromAuthorLayoutType'] == 'tile_view') AND $__templater->method($__vars['article'], 'canViewAttachments', array())) {
			$__finalCompiled .= '
					';
			$__templater->includeCss('xa_ams.less');
			$__finalCompiled .= '
					';
			$__templater->includeCss('xa_ams_tile_view_layout.less');
			$__finalCompiled .= '

					<div class="gridContainerAmsTileView">		
						<ul class="ams-tile-view">
							';
			if ($__templater->isTraversable($__vars['authorOthers'])) {
				foreach ($__vars['authorOthers'] AS $__vars['authorOther']) {
					$__finalCompiled .= '
								' . $__templater->callMacro('xa_ams_article_list_macros', 'tile_view_layout', array(
						'allowInlineMod' => false,
						'article' => $__vars['authorOther'],
					), $__vars) . '
							';
				}
			}
			$__finalCompiled .= '
						</ul>
					</div>							
				';
		} else {
			$__finalCompiled .= '
					<div class="structItemContainer structItemContainerAmsListView">
						';
			if ($__templater->isTraversable($__vars['authorOthers'])) {
				foreach ($__vars['authorOthers'] AS $__vars['authorOther']) {
					$__finalCompiled .= '
							' . $__templater->callMacro('xa_ams_article_list_macros', 'list_view_layout', array(
						'allowInlineMod' => false,
						'article' => $__vars['authorOther'],
					), $__vars) . '
						';
				}
			}
			$__finalCompiled .= '
					</div>
				';
		}
		$__finalCompiled .= '		
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['article'], 'canViewComments', array())) {
		$__finalCompiled .= '
	<div class="columnContainer"
		data-xf-init="lightbox"
		data-lb-id="article-' . $__templater->escape($__vars['article']['article_id']) . '"
		data-lb-universal="' . $__templater->escape($__vars['xf']['options']['lightBoxUniversal']) . '">

		<span class="u-anchorTarget" id="comments"></span>

		<div class="columnContainer-comments">
			' . $__templater->callMacro('xa_ams_comment_macros', 'comment_list', array(
			'comments' => $__vars['comments'],
			'attachmentData' => $__vars['attachmentData'],
			'content' => $__vars['article'],
			'linkPrefix' => 'ams/article-comments',
			'link' => 'ams',
			'page' => $__vars['page'],
			'perPage' => $__vars['perPage'],
			'totalItems' => $__vars['totalItems'],
			'pageNavHash' => $__vars['pageNavHash'],
			'canInlineMod' => $__vars['canInlineModComments'],
		), $__vars) . '
		</div>
	</div>	
';
	}
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['articlePages'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp12 = '';
		if ($__vars['article']['overview_page_title']) {
			$__compilerTemp12 .= '
							' . $__templater->escape($__vars['article']['overview_page_title']) . '
						';
		} else {
			$__compilerTemp12 .= '
							' . 'Tổng quan' . '
						';
		}
		$__compilerTemp13 = '';
		if ($__templater->isTraversable($__vars['articlePages'])) {
			foreach ($__vars['articlePages'] AS $__vars['article_page']) {
				$__compilerTemp13 .= '
						<a href="' . $__templater->func('link', array('ams/page', $__vars['article_page'], ), true) . '" class="blockLink">
							' . $__templater->filter($__templater->func('repeat', array('&nbsp;&nbsp;', $__vars['article_page']['depth'], ), false), array(array('raw', array()),), true) . ' ' . $__templater->escape($__vars['article_page']['title']) . '</a>
					';
			}
		}
		$__compilerTemp14 = '';
		if ($__vars['xf']['options']['xaAmsViewFullArticle']) {
			$__compilerTemp14 .= '
						<a href="' . $__templater->func('link', array('ams', $__vars['article'], array('full' => 1, ), ), true) . '" class="blockLink ' . ($__vars['isFullView'] ? 'is-selected' : '') . '">' . ($__vars['article']['Category']['content_term'] ? 'View full ' . $__templater->filter($__vars['article']['Category']['content_term'], array(array('to_lower', array()),), true) . '' : 'View full article') . '</a>
					';
		}
		$__templater->modifySidebarHtml('articleTocSidebar', '
		<div class="block">
			<div class="block-container">
				<h3 class="block-header">' . 'Table of contents' . '</h3>
				<div class="block-body">
					<a class="blockLink ' . ((!$__vars['isFullView']) ? 'is-selected' : '') . '" href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">
						' . $__compilerTemp12 . '
					</a>

					' . $__compilerTemp13 . '

					' . $__compilerTemp14 . '
				</div>
			</div>
		</div>
	', 'replace');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['seriesToc'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp15 = '';
		if ($__templater->method($__vars['xf']['visitor'], 'canViewAmsSeries', array())) {
			$__compilerTemp15 .= '
						<a href="' . $__templater->func('link', array('ams/series', $__vars['article']['SeriesPart']['Series'], ), true) . '">' . 'Series table of contents' . '</a>
					';
		} else {
			$__compilerTemp15 .= '
						' . 'Series table of contents' . '
					';
		}
		$__compilerTemp16 = '';
		if ($__templater->isTraversable($__vars['seriesToc'])) {
			foreach ($__vars['seriesToc'] AS $__vars['seriesToc_part']) {
				$__compilerTemp16 .= '
						<a href="' . $__templater->func('link', array('ams', $__vars['seriesToc_part']['Article'], ), true) . '" class="blockLink ' . (($__vars['seriesToc_part']['series_part_id'] == $__vars['article']['series_part_id']) ? 'is-selected' : '') . '">' . $__templater->escape($__vars['seriesToc_part']['Article']['title']) . '</a>
					';
			}
		}
		$__templater->modifySidebarHtml('seriesTocSidebar', '
		<div class="block">
			<div class="block-container">
				<h3 class="block-header">
					' . $__compilerTemp15 . '
				</h3>
				<div class="block-body">
					' . $__compilerTemp16 . '
				</div>
			</div>
		</div>
	', 'replace');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '
		
';
	$__compilerTemp17 = '';
	if ($__vars['article']['User']['Profile']['xa_ams_author_name']) {
		$__compilerTemp17 .= '
						<dd>' . $__templater->func('username_link', array(array('user_id' => $__vars['article']['User']['user_id'], 'username' => $__vars['article']['User']['Profile']['xa_ams_author_name'], ), false, array(
			'defaultname' => $__vars['article']['User']['Profile']['xa_ams_author_name'],
		))) . '</dd>
					';
	} else {
		$__compilerTemp17 .= '
						<dd>' . $__templater->func('username_link', array($__vars['article']['User'], false, array(
			'defaultname' => $__vars['article']['username'],
		))) . '</dd>
					';
	}
	$__compilerTemp18 = '';
	if ($__vars['article']['article_read_time']) {
		$__compilerTemp18 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Article read time' . '</dt>
						<dd>' . '' . $__templater->escape($__vars['article']['article_read_time']) . ' min read' . '</dd>
					</dl>
				';
	}
	$__compilerTemp19 = '';
	if ($__vars['article']['view_count']) {
		$__compilerTemp19 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Lượt xem' . '</dt>
						<dd>' . $__templater->filter($__vars['article']['view_count'], array(array('number', array()),), true) . '</dd>
					</dl>
				';
	}
	$__compilerTemp20 = '';
	if ($__vars['article']['comment_count']) {
		$__compilerTemp20 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Bình luận' . '</dt>
						<dd>' . $__templater->filter($__vars['article']['comment_count'], array(array('number', array()),), true) . '</dd>
					</dl>
				';
	}
	$__compilerTemp21 = '';
	if ($__vars['article']['review_count']) {
		$__compilerTemp21 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Reviews' . '</dt>
						<dd>' . $__templater->filter($__vars['article']['review_count'], array(array('number', array()),), true) . '</dd>
					</dl>
				';
	}
	$__compilerTemp22 = '';
	if ($__vars['article']['last_update']) {
		$__compilerTemp22 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Last update' . '</dt>
						<dd>' . $__templater->func('date_dynamic', array($__vars['article']['last_update'], array(
		))) . '</dd>
					</dl>
				';
	}
	$__compilerTemp23 = '';
	if ($__vars['article']['author_rating'] AND $__vars['category']['allow_author_rating']) {
		$__compilerTemp23 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Author rating' . '</dt>
						<dd>
							' . $__templater->callMacro('rating_macros', 'stars', array(
			'rating' => $__vars['article']['author_rating'],
			'class' => 'ratingStars--amsAuthorRating',
		), $__vars) . '
						</dd>
					</dl>
				';
	}
	$__compilerTemp24 = '';
	if ($__vars['article']['rating_count'] AND $__vars['article']['rating_avg']) {
		$__compilerTemp24 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Bình chọn' . '</dt>
						<dd>
							' . $__templater->callMacro('rating_macros', 'stars_text', array(
			'rating' => $__vars['article']['rating_avg'],
			'count' => $__vars['article']['rating_count'],
			'rowClass' => 'ratingStarsRow--textBlock',
		), $__vars) . '
						</dd>
					</dl>
				';
	}
	$__compilerTemp25 = '';
	if ($__vars['article']['location'] AND ($__vars['category']['allow_location'] AND ((($__vars['xf']['options']['xaAmsLocationDisplayType'] == 'link') OR (!$__templater->method($__vars['article'], 'canViewArticleMap', array())))))) {
		$__compilerTemp25 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Nơi ở' . '</dt>
						<dd>
							<a href="' . $__templater->func('link', array('misc/location-info', '', array('location' => $__vars['article']['location'], ), ), true) . '" rel="nofollow" target="_blank" class="">' . $__templater->escape($__vars['article']['location']) . '</a>
						</dd>
					</dl>
				';
	}
	$__templater->modifySidebarHtml('infoSidebar', '
	<div class="block">
		<div class="block-container">
			<h3 class="block-minorHeader">' . ($__vars['article']['Category']['content_term'] ? '' . $__templater->escape($__vars['article']['Category']['content_term']) . ' information' : 'Article information') . '</h3>
			<div class="block-body block-row block-row--minor">
				<dl class="pairs pairs--justified">
					<dt>' . 'Tác giả' . '</dt>
					' . $__compilerTemp17 . '
				</dl>
				' . $__compilerTemp18 . '
				' . $__compilerTemp19 . '
				' . $__compilerTemp20 . '
				' . $__compilerTemp21 . '
				' . $__compilerTemp22 . '
				' . $__compilerTemp23 . '
				' . $__compilerTemp24 . '

				' . $__compilerTemp25 . '
			</div>
		</div>
	</div>
', 'replace');
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['article'], 'canViewContributors', array()) AND !$__templater->test($__vars['contributors'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp26 = '';
		$__compilerTemp27 = '';
		$__compilerTemp27 .= '
							';
		if ($__templater->isTraversable($__vars['contributors'])) {
			foreach ($__vars['contributors'] AS $__vars['contributor']) {
				if (!$__vars['contributor']['is_co_author']) {
					$__compilerTemp27 .= '
								<li>
									<div class="contentRow">
										<div class="contentRow-figure">
											' . $__templater->func('avatar', array($__vars['contributor']['User'], 'xxs', false, array(
					))) . '
										</div>

										<div class="contentRow-main contentRow-main--close">
											' . $__templater->func('username_link', array($__vars['contributor']['User'], true, array(
					))) . '
											<div class="contentRow-minor">
												' . $__templater->func('user_title', array($__vars['contributor']['User'], false, array(
					))) . '
											</div>
										</div>
									</div>
								</li>
							';
				}
			}
		}
		$__compilerTemp27 .= '
						';
		if (strlen(trim($__compilerTemp27)) > 0) {
			$__compilerTemp26 .= '
			<div class="block">
				<div class="block-container">
					<h3 class="block-minorHeader">
						';
			if ($__templater->method($__vars['article'], 'canManageContributors', array())) {
				$__compilerTemp26 .= '
							<a href="' . $__templater->func('link', array('ams/manage-contributors', $__vars['article'], ), true) . '" data-xf-click="overlay">
								' . 'Article contributors' . '
							</a>
						';
			} else {
				$__compilerTemp26 .= '
							' . 'Article contributors' . '
						';
			}
			$__compilerTemp26 .= '
					</h3>
					<div class="block-body block-row block-row--minor">
						<ul class="articleSidebarList">
						' . $__compilerTemp27 . '
						</ul>
					</div>	
				</div>
			</div>
		';
		}
		$__templater->modifySidebarHtml('articleContributors', '	
		' . $__compilerTemp26 . '
	', 'replace');
		$__finalCompiled .= '	
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp28 = '';
	$__compilerTemp29 = '';
	$__compilerTemp29 .= '
						' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
		'type' => 'ams_articles',
		'group' => 'sidebar',
		'onlyInclude' => $__vars['category']['field_cache'],
		'set' => $__vars['article']['custom_fields'],
		'wrapperClass' => '',
		'valueClass' => 'pairs pairs--justified',
	), $__vars) . '
					';
	if (strlen(trim($__compilerTemp29)) > 0) {
		$__compilerTemp28 .= '
		<div class="block">
			<div class="block-container">
				<h3 class="block-minorHeader">' . 'Additional information' . '</h3>
				<div class="block-body block-row block-row--minor">
					' . $__compilerTemp29 . '
				</div>	
			</div>
		</div>
	';
	}
	$__templater->modifySidebarHtml('additionalInfoSidebar', '
	' . $__compilerTemp28 . '
', 'replace');
	$__finalCompiled .= '

';
	$__compilerTemp30 = '';
	$__compilerTemp31 = '';
	$__compilerTemp31 .= '
					';
	if ($__templater->method($__vars['article'], 'hasViewableDiscussion', array())) {
		$__compilerTemp31 .= '
						' . $__templater->button('Join the discussion', array(
			'href' => $__templater->func('link', array('threads', $__vars['article']['Discussion'], ), false),
			'class' => 'button--fullWidth',
		), '', array(
		)) . '
					';
	}
	$__compilerTemp31 .= '
				';
	if (strlen(trim($__compilerTemp31)) > 0) {
		$__compilerTemp30 .= '
		<div class="block">
			<div class="block-container">
				' . $__compilerTemp31 . '
			</div>
		</div>
	';
	}
	$__templater->modifySidebarHtml('discussionButtonSidebar', '
	' . $__compilerTemp30 . '	
', 'replace');
	$__finalCompiled .= '

';
	if ($__vars['article']['location'] AND ($__templater->method($__vars['article'], 'canViewArticleMap', array()) AND ($__vars['category']['allow_location'] AND (($__vars['xf']['options']['xaAmsLocationDisplayType'] == 'map') AND $__vars['xf']['options']['xaAmsGoogleMapsEmbedApiKey'])))) {
		$__finalCompiled .= '
	';
		$__templater->modifySidebarHtml('locationSidebar', '
		<div class="block">
			<div class="block-container">
				<h3 class="block-minorHeader">' . 'Nơi ở' . '</h3>
				<div class="block-body block-row contentRow-lesser">
					<p class="mapLocationName"><a href="' . $__templater->func('link', array('misc/location-info', '', array('location' => $__vars['article']['location'], ), ), true) . '" rel="nofollow" target="_blank" class="">' . $__templater->escape($__vars['article']['location']) . '</a></p>
				</div>	
				<div class="block-body block-row">
					<div class="mapContainer">
						<iframe
							width="100%" height="200" frameborder="0" style="border: 0"
							src="https://www.google.com/maps/embed/v1/place?key=' . $__templater->escape($__vars['xf']['options']['xaAmsGoogleMapsEmbedApiKey']) . '&q=' . $__templater->filter($__vars['article']['location'], array(array('censor', array()),), true) . ($__vars['xf']['options']['xaAmsLocalizeGoogleMaps'] ? ('&language=' . $__templater->filter($__vars['xf']['language']['language_code'], array(array('substr', array()),), true)) : '') . '">
						</iframe>
					</div>
				</div>	
			</div>
		</div>
	', 'replace');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if (($__vars['xf']['options']['xaAmsFilesLocation'] == 'sidebar') AND $__vars['article']['attach_count']) {
		$__finalCompiled .= '
	';
		$__compilerTemp32 = '';
		$__compilerTemp33 = '';
		$__compilerTemp33 .= '
								';
		if ($__templater->isTraversable($__vars['article']['Attachments'])) {
			foreach ($__vars['article']['Attachments'] AS $__vars['attachment']) {
				$__compilerTemp33 .= '
									';
				if ($__vars['attachment']['has_thumbnail'] OR $__vars['attachment']['is_video']) {
					$__compilerTemp33 .= '
										' . '
									';
				} else {
					$__compilerTemp33 .= '
										' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
						'attachment' => $__vars['attachment'],
						'canView' => $__templater->method($__vars['article'], 'canViewAttachments', array()),
					), $__vars) . '
									';
				}
				$__compilerTemp33 .= '
								';
			}
		}
		$__compilerTemp33 .= '
							';
		if (strlen(trim($__compilerTemp33)) > 0) {
			$__compilerTemp32 .= '
			<div class="block">
				<div class="block-container">
					<h3 class="block-minorHeader">' . 'Downloads' . '</h3>
					';
			$__templater->includeCss('attachments.less');
			$__compilerTemp32 .= '
					<div class="block-body block-row">
						<ul class="attachmentList articleBody-attachments">
							' . $__compilerTemp33 . '
						</ul>
					</div>
				</div>
			</div>
		';
		}
		$__templater->modifySidebarHtml('fileAttachmentsSidebar', '
		' . $__compilerTemp32 . '
	', 'replace');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if (($__vars['xf']['options']['xaAmsMoreInCategoryLocation'] == 'sidebar') AND !$__templater->test($__vars['categoryOthers'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp34 = '';
		if ($__templater->isTraversable($__vars['categoryOthers'])) {
			foreach ($__vars['categoryOthers'] AS $__vars['categoryOther']) {
				$__compilerTemp34 .= '
						<li>
							' . $__templater->callMacro('xa_ams_article_list_macros', 'article_simple', array(
					'article' => $__vars['categoryOther'],
					'withMeta' => false,
				), $__vars) . '
						</li>
					';
			}
		}
		$__templater->modifySidebarHtml('moreArticlesInCategorySidebar', '
		<div class="block">
			<div class="block-container">
				<h3 class="block-minorHeader"><a href="' . $__templater->func('link', array('ams/categories', $__vars['article']['Category'], ), true) . '">' . 'More in ' . $__templater->escape($__vars['article']['Category']['title']) . '' . '</a></h3>
				<div class="block-body block-row">
					<ul class="articleSidebarList">
					' . $__compilerTemp34 . '
					</ul>
				</div>
			</div>
		</div>
	', 'replace');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if (($__vars['xf']['options']['xaAmsMoreFromAuthorLocation'] == 'sidebar') AND !$__templater->test($__vars['authorOthers'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp35 = '';
		if ($__vars['article']['User']['Profile']['xa_ams_author_name']) {
			$__compilerTemp35 .= '
					<h3 class="block-minorHeader"><a href="' . $__templater->func('link', array('ams/authors', $__vars['article']['User'], ), true) . '">' . 'More from ' . $__templater->escape($__vars['article']['User']['Profile']['xa_ams_author_name']) . '' . '</a></h3>
				';
		} else {
			$__compilerTemp35 .= '
					<h3 class="block-minorHeader"><a href="' . $__templater->func('link', array('ams/authors', $__vars['article']['User'], ), true) . '">' . 'More from ' . $__templater->escape($__vars['article']['User']['username']) . '' . '</a></h3>
				';
		}
		$__compilerTemp36 = '';
		if ($__templater->isTraversable($__vars['authorOthers'])) {
			foreach ($__vars['authorOthers'] AS $__vars['authorOther']) {
				$__compilerTemp36 .= '
						<li>
							' . $__templater->callMacro('xa_ams_article_list_macros', 'article_simple', array(
					'article' => $__vars['authorOther'],
					'withMeta' => false,
				), $__vars) . '
						</li>
					';
			}
		}
		$__templater->modifySidebarHtml('moreArticlesFromAuthorSidebar', '
		<div class="block">
			<div class="block-container">
				' . $__compilerTemp35 . '

				<div class="block-body block-row">
					<ul class="articleSidebarList">
					' . $__compilerTemp36 . '
					</ul>
				</div>
			</div>
		</div>
	', 'replace');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__vars['extras'] = $__templater->func('property', array('xaAmsShareThisArticleBlockElements', ), false);
	$__finalCompiled .= '
';
	if ($__vars['extras']['share_article_block']) {
		$__finalCompiled .= '
	';
		$__compilerTemp37 = '';
		$__compilerTemp38 = '';
		$__compilerTemp38 .= '
						<h3 class="block-minorHeader">' . ($__vars['article']['Category']['content_term'] ? 'Share this ' . $__templater->filter($__vars['article']['Category']['content_term'], array(array('to_lower', array()),), true) . '' : 'Share this article') . '</h3>
						';
		$__compilerTemp39 = '';
		$__compilerTemp39 .= '
									' . $__templater->callMacro('share_page_macros', 'buttons', array(
			'iconic' => true,
		), $__vars) . '
								';
		if (strlen(trim($__compilerTemp39)) > 0) {
			$__compilerTemp38 .= '
							<div class="block-body block-row block-row--separated">
								' . $__compilerTemp39 . '
							</div>
						';
		}
		$__compilerTemp38 .= '
						';
		$__compilerTemp40 = '';
		$__compilerTemp40 .= '
									';
		if ($__vars['extras']['url_bb_code']) {
			$__compilerTemp40 .= '
										' . $__templater->callMacro('share_page_macros', 'share_clipboard_input', array(
				'label' => 'Copy URL BB code',
				'text' => '[URL="' . $__templater->func('link', array('canonical:ams', $__vars['article'], ), false) . '"]' . $__vars['article']['title'] . '[/URL]',
			), $__vars) . '
									';
		}
		$__compilerTemp40 .= '
									';
		if ($__vars['extras']['ams_bb_code']) {
			$__compilerTemp40 .= '
										' . $__templater->callMacro('share_page_macros', 'share_clipboard_input', array(
				'label' => 'Copy AMS BB code',
				'text' => '[AMS=article, ' . $__vars['article']['article_id'] . '][/AMS]',
			), $__vars) . '
									';
		}
		$__compilerTemp40 .= '
								';
		if (strlen(trim($__compilerTemp40)) > 0) {
			$__compilerTemp38 .= '
							<div class="block-body block-row block-row--separated">
								' . $__compilerTemp40 . '
							</div>
						';
		}
		$__compilerTemp38 .= '
					';
		if (strlen(trim($__compilerTemp38)) > 0) {
			$__compilerTemp37 .= '
			<div class="block">
				<div class="block-container">
					' . $__compilerTemp38 . '
				</div>
			</div>
		';
		}
		$__templater->modifySidebarHtml('shareSidebar', '
		' . $__compilerTemp37 . '
	', 'replace');
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
}
);