<?php
// FROM HASH: 7d7284c79d415cb8f00e58fc2b519b21
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
	$__vars['ldJson'] = $__templater->method($__vars['articlePage'], 'getLdStructuredData', array(0, $__templater->renderExtension('structured_data_extra_params', $__vars, $__extensions), ));
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
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->func('prefix', array('ams_article', $__vars['article'], 'escaped', ), true) . ($__vars['article']['meta_title'] ? $__templater->escape($__vars['article']['meta_title']) : $__templater->escape($__vars['article']['title'])) . ' | ' . ($__vars['articlePage']['meta_title'] ? $__templater->escape($__vars['articlePage']['meta_title']) : $__templater->escape($__vars['articlePage']['title'])));
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
	if ($__vars['articlePage']['meta_description']) {
		$__finalCompiled .= '
	';
		$__vars['descSnippet'] = $__templater->func('snippet', array($__vars['articlePage']['meta_description'], 320, array('stripBbCode' => true, ), ), false);
		$__finalCompiled .= '
';
	} else if ($__vars['articlePage']['description']) {
		$__finalCompiled .= '
	';
		$__vars['descSnippet'] = $__templater->func('snippet', array($__vars['articlePage']['description'], 256, array('stripBbCode' => true, ), ), false);
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__vars['descSnippet'] = $__templater->func('snippet', array($__vars['articlePage']['message'], 250, array('stripBbCode' => true, ), ), false);
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['articlePage']['CoverImage']) {
		$__finalCompiled .= '
	';
		$__vars['imageUrl'] = $__templater->func('link', array('canonical:ams/page/cover-image', $__vars['articlePage'], ), false);
		$__finalCompiled .= '
';
	} else if ($__vars['article']['CoverImage']) {
		$__finalCompiled .= '
	';
		$__vars['imageUrl'] = $__templater->func('link', array('canonical:ams/cover-image', $__vars['article'], ), false);
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__vars['imageUrl'] = ($__vars['article']['Category']['content_image_url'] ? $__templater->func('base_url', array($__vars['article']['Category']['content_image_url'], true, ), false) : '');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

' . $__templater->callMacro('metadata_macros', 'metadata', array(
		'title' => ($__vars['articlePage']['og_title'] ? $__vars['articlePage']['og_title'] : ($__vars['articlePage']['meta_title'] ? $__vars['articlePage']['meta_title'] : $__vars['articlePage']['title'])) . ' | ' . ($__vars['article']['og_title'] ? $__vars['article']['og_title'] : ($__vars['article']['meta_title'] ? $__vars['article']['meta_title'] : $__vars['article']['title'])),
		'description' => $__vars['descSnippet'],
		'type' => 'article',
		'shareUrl' => $__templater->func('link', array('canonical:ams/page', $__vars['articlePage'], ), false),
		'canonicalUrl' => $__templater->func('link', array('canonical:ams/page', $__vars['articlePage'], ), false),
		'imageUrl' => $__vars['imageUrl'],
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
		'canViewAttachments' => $__templater->method($__vars['articlePage'], 'canViewPageAttachments', array()),
	), $__vars) . '

<div class="block">
	';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
				' . $__templater->callMacro('xa_ams_article_wrapper_macros', 'action_buttons', array(
		'article' => $__vars['article'],
		'seriesToc' => $__vars['seriesToc'],
		'articlePages' => $__vars['articlePages'],
		'articlePage' => $__vars['articlePage'],
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
	if ($__vars['articlePage']['CoverImage'] AND $__vars['articlePage']['cover_image_above_page']) {
		$__finalCompiled .= '
		<div class="amsCoverImage ' . ($__vars['articlePage']['cover_image_caption'] ? 'has-caption' : '') . '">
			<div class="amsCoverImage-container">
				<div class="amsCoverImage-container-image js-coverImageContainerImage">
					<img src="' . $__templater->func('link', array('ams/page/cover-image', $__vars['articlePage'], ), true) . '" alt="' . $__templater->escape($__vars['articlePage']['CoverImage']['filename']) . '" class="js-articleCoverImage" />
				</div>
			</div>
		</div>

		';
		if ($__vars['articlePage']['cover_image_caption']) {
			$__finalCompiled .= '
			<div class="amsCoverImage-caption">
				' . $__templater->func('snippet', array($__vars['articlePage']['cover_image_caption'], 500, array('stripBbCode' => true, ), ), true) . '
			</div>
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
	
	';
	if ($__vars['pagePoll']) {
		$__finalCompiled .= '
		' . $__templater->callMacro('poll_macros', 'poll_block', array(
			'poll' => $__vars['pagePoll'],
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

					<h2>' . $__templater->escape($__vars['articlePage']['title']) . '</h2>

					';
	if ($__vars['articlePage']['display_byline']) {
		$__finalCompiled .= '
						<div class="message-attribution message-attribution-amsPageMeta">
							<ul class="listInline listInline--bullet">
								<li>
									' . $__templater->fontAwesome('fa-user', array(
			'title' => $__templater->filter('Author', array(array('for_attr', array()),), false),
		)) . '
									<span class="u-srOnly">' . 'Author' . '</span>
									';
		if ($__vars['articlePage']['User']['Profile']['xa_ams_author_name']) {
			$__finalCompiled .= '
										' . $__templater->func('username_link', array(array('user_id' => $__vars['articlePage']['user_id'], 'username' => $__vars['articlePage']['User']['Profile']['xa_ams_author_name'], ), false, array(
				'defaultname' => $__vars['articlePage']['User']['Profile']['xa_ams_author_name'],
				'class' => 'u-concealed',
			))) . '
									';
		} else {
			$__finalCompiled .= '
										' . $__templater->func('username_link', array($__vars['articlePage']['User'], false, array(
				'defaultname' => $__vars['articlePage']['username'],
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

									<a href="' . $__templater->func('link', array('ams/page', $__vars['articlePage'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['articlePage']['create_date'], array(
		))) . '</a>
								</li>


								';
		if ($__vars['articlePage']['edit_date'] > $__vars['articlePage']['create_date']) {
			$__finalCompiled .= '								
									<li>
										' . $__templater->fontAwesome('fa-clock', array(
				'title' => $__templater->filter('Last update', array(array('for_attr', array()),), false),
			)) . '
										<span class="u-concealed">' . 'Updated' . '</span>

										' . $__templater->func('date_dynamic', array($__vars['articlePage']['edit_date'], array(
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
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
								';
	if ($__vars['articlePage']['warning_message']) {
		$__compilerTemp3 .= '
									<dd class="blockStatus-message blockStatus-message--warning">
										' . $__templater->escape($__vars['articlePage']['warning_message']) . '
									</dd>
								';
	}
	$__compilerTemp3 .= '
								';
	if ($__templater->method($__vars['articlePage'], 'isIgnored', array())) {
		$__compilerTemp3 .= '
									<dd class="blockStatus-message blockStatus-message--ignored">
										' . 'You are ignoring content by this member.' . '
									</dd>
								';
	}
	$__compilerTemp3 .= '
							';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__finalCompiled .= '
						<dl class="blockStatus blockStatus--standalone">
							<dt>' . 'Status' . '</dt>
							' . $__compilerTemp3 . '
						</dl>
					';
	}
	$__finalCompiled .= '	

					' . $__templater->func('bb_code', array($__vars['articlePage']['message'], 'ams_page', $__vars['articlePage'], ), true) . '
					
					' . $__templater->callAdsMacro('ams_article_view_below_article', array(
		'article' => $__vars['article'],
	), $__vars) . '					

					';
	if ((($__vars['article']['page_count'] AND $__vars['articlePages'])) OR (($__templater->method($__vars['article'], 'isInSeries', array(true, )) AND $__vars['seriesToc']))) {
		$__finalCompiled .= '
						<div style="padding-top: 10px;">
							';
		if (($__vars['article']['page_count'] AND $__vars['articlePages'])) {
			$__finalCompiled .= '
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
			if ($__vars['articlePage'] AND (!$__vars['previousPage'])) {
				$__finalCompiled .= '
									<dl class="blockStatus blockStatus--info blockStatus--standalone">
										<dt></dt>
										<dd class="blockStatus-message amsPreviousPage">
											<span class="">' . 'Previous page' . ':</span>
											';
				if ($__vars['article']['overview_page_title']) {
					$__finalCompiled .= '
												<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" class="" title="' . $__templater->escape($__vars['article']['overview_page_title']) . '">' . $__templater->escape($__vars['article']['overview_page_title']) . '</a>
											';
				} else {
					$__finalCompiled .= '
												<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '" class="" title="' . 'Overview' . '">' . 'Overview' . '</a>
											';
				}
				$__finalCompiled .= '
										</dd>
									</dl>
								';
			}
			$__finalCompiled .= '

								';
			if ($__vars['previousPage']) {
				$__finalCompiled .= '						
									<dl class="blockStatus blockStatus--info blockStatus--standalone">
										<dt></dt>
										<dd class="blockStatus-message amsPreviousPage">
											<span class="">' . 'Previous page' . ':</span>
											<a href="' . $__templater->func('link', array('ams/page', $__vars['previousPage'], ), true) . '" class="" title="' . $__templater->escape($__vars['previousPage']['title']) . '">' . $__templater->escape($__vars['previousPage']['title']) . '</a>
										</dd>
									</dl>
								';
			}
			$__finalCompiled .= '
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
	if ($__vars['articlePage']['attach_count']) {
		$__finalCompiled .= '
						';
		$__compilerTemp4 = '';
		$__compilerTemp4 .= '
									';
		if ($__templater->isTraversable($__vars['articlePage']['Attachments'])) {
			foreach ($__vars['articlePage']['Attachments'] AS $__vars['attachment']) {
				if ($__vars['attachment']['has_thumbnail'] AND (!$__templater->method($__vars['articlePage'], 'isAttachmentEmbedded', array($__vars['attachment'], )))) {
					$__compilerTemp4 .= '
										';
					if ($__vars['articlePage']['cover_image_above_page'] AND ($__vars['attachment']['attachment_id'] == $__vars['articlePage']['cover_image_id'])) {
						$__compilerTemp4 .= '
											' . '
										';
					} else {
						$__compilerTemp4 .= '
											' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
							'attachment' => $__vars['attachment'],
							'canView' => $__templater->method($__vars['articlePage'], 'canViewPageAttachments', array()),
						), $__vars) . '
										';
					}
					$__compilerTemp4 .= '
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
							<ul class="attachmentList articleBody-attachments">
								' . $__compilerTemp4 . '
							</ul>
						';
		}
		$__finalCompiled .= '

						';
		$__compilerTemp5 = '';
		$__compilerTemp5 .= '
									';
		if ($__templater->isTraversable($__vars['articlePage']['Attachments'])) {
			foreach ($__vars['articlePage']['Attachments'] AS $__vars['attachment']) {
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
						'canView' => $__templater->method($__vars['articlePage'], 'canViewPageAttachments', array()),
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
		'content' => $__vars['articlePage'],
		'link' => 'ams/page/react',
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
											<a href="' . $__templater->func('link', array('ams/page/report', $__vars['articlePage'], ), true) . '"
												class="actionBar-action actionBar-action--report" 
												data-xf-click="overlay">' . 'Report' . '</a>
										';
	}
	$__compilerTemp8 .= '

										';
	$__vars['hasActionBarMenu'] = false;
	$__compilerTemp8 .= '

										';
	if ($__templater->method($__vars['articlePage'], 'canEdit', array())) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('ams/page/edit', $__vars['articlePage'], ), true) . '"
												class="actionBar-action actionBar-action--edit actionBar-action--menuItem">' . 'Edit' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
										';
	}
	$__compilerTemp8 .= '

										';
	if ($__vars['articlePage']['edit_count'] AND $__templater->method($__vars['articlePage'], 'canViewHistory', array())) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('ams/page/history', $__vars['articlePage'], ), true) . '" 
												class="actionBar-action actionBar-action--history actionBar-action--menuItem"
												data-xf-click="toggle"
												data-target="#js-articleBody-' . $__templater->escape($__vars['article']['article_id']) . ' .js-historyTarget"
												data-menu-closer="true">' . 'History' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
										';
	}
	$__compilerTemp8 .= '

										';
	if ($__templater->method($__vars['articlePage'], 'canDelete', array('soft', ))) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('ams/page/delete', $__vars['articlePage'], ), true) . '"
												class="actionBar-action actionBar-action--delete actionBar-action--menuItem"
												data-xf-click="overlay">' . 'Delete' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
										';
	}
	$__compilerTemp8 .= '

										';
	if ($__templater->method($__vars['articlePage'], 'canReassign', array())) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('ams/page/reassign', $__vars['articlePage'], ), true) . '"
												class="actionBar-action actionBar-action--reassign actionBar-action--menuItem" 
												data-xf-click="overlay">' . 'Reassign' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
										';
	}
	$__compilerTemp8 .= '

										';
	if ($__templater->method($__vars['articlePage'], 'canSetCoverImage', array())) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('ams/page/set-cover-image', $__vars['articlePage'], ), true) . '" 
												class="actionBar-action actionBar-action--cover-image actionBar-action--menuItem"
												data-xf-click="overlay">' . 'Set cover image' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
										';
	}
	$__compilerTemp8 .= '

										';
	if ($__templater->method($__vars['articlePage'], 'canCreatePoll', array())) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('ams/page/poll-create', $__vars['articlePage'], ), true) . '"
												class="actionBar-action actionBar-action--poll-create actionBar-action--menuItem" 
												data-xf-click="overlay">' . 'Create poll' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
										';
	}
	$__compilerTemp8 .= '

										';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewIps', array()) AND $__vars['articlePage']['ip_id']) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('ams/page/ip', $__vars['articlePage'], ), true) . '"
												class="actionBar-action actionBar-action--ip actionBar-action--menuItem"
												data-xf-click="overlay">' . 'IP' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
										';
	}
	$__compilerTemp8 .= '

										';
	if ($__templater->method($__vars['articlePage'], 'canWarn', array())) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('ams/page/warn', $__vars['articlePage'], ), true) . '"
												class="actionBar-action actionBar-action--warn actionBar-action--menuItem">' . 'Warn' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
										';
	} else if ($__vars['articlePage']['warning_id'] AND $__templater->method($__vars['xf']['visitor'], 'canViewWarnings', array())) {
		$__compilerTemp8 .= '
											<a href="' . $__templater->func('link', array('warnings', array('warning_id' => $__vars['articlePage']['warning_id'], ), ), true) . '"
												class="actionBar-action actionBar-action--warn actionBar-action--menuItem"
												data-xf-click="overlay">' . 'View warning' . '</a>
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
												title="' . 'More options' . '"
												role="button"
												tabindex="0"
												aria-expanded="false"
												aria-haspopup="true">&#8226;&#8226;&#8226;</a>

											<div class="menu" data-menu="menu" aria-hidden="true" data-menu-builder="actionBar">
												<div class="menu-content">
													<h4 class="menu-header">' . 'More options' . '</h4>
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

					<div class="reactionsBar js-reactionsList ' . ($__vars['articlePage']['reactions'] ? 'is-active' : '') . '">
						' . $__templater->func('reactions', array($__vars['articlePage'], 'ams/page/reactions', array())) . '
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
	if ($__vars['xf']['options']['xaAmsDisplayShareBelowArticle']) {
		$__compilerTemp9 .= '
					' . $__templater->callMacro('share_page_macros', 'buttons', array(
			'iconic' => true,
			'label' => 'Share' . ':',
		), $__vars) . '
				';
	}
	$__compilerTemp9 .= '
			';
	if (strlen(trim($__compilerTemp9)) > 0) {
		$__finalCompiled .= '
	<div class="block">
		<div class="blockMessage blockMessage--none">
			' . $__compilerTemp9 . '
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

	<div class="block"
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
		$__compilerTemp10 = '';
		if ($__vars['article']['overview_page_title']) {
			$__compilerTemp10 .= '
							' . $__templater->escape($__vars['article']['overview_page_title']) . '
						';
		} else {
			$__compilerTemp10 .= '
							' . 'Overview' . '
						';
		}
		$__compilerTemp11 = '';
		if ($__templater->isTraversable($__vars['articlePages'])) {
			foreach ($__vars['articlePages'] AS $__vars['article_page']) {
				$__compilerTemp11 .= '
						<a href="' . $__templater->func('link', array('ams/page', $__vars['article_page'], ), true) . '" class="blockLink ' . (($__vars['articlePage']['page_id'] == $__vars['article_page']['page_id']) ? 'is-selected' : '') . '">
							' . $__templater->filter($__templater->func('repeat', array('&nbsp;&nbsp;', $__vars['article_page']['depth'], ), false), array(array('raw', array()),), true) . ' ' . $__templater->escape($__vars['article_page']['title']) . '</a>
					';
			}
		}
		$__compilerTemp12 = '';
		if ($__vars['xf']['options']['xaAmsViewFullArticle']) {
			$__compilerTemp12 .= '
						<a href="' . $__templater->func('link', array('ams', $__vars['article'], array('full' => 1, ), ), true) . '" class="blockLink ' . ($__vars['isFullView'] ? 'is-selected' : '') . '">' . ($__vars['article']['Category']['content_term'] ? 'View full ' . $__templater->filter($__vars['article']['Category']['content_term'], array(array('to_lower', array()),), true) . '' : 'View full article') . '</a>
					';
		}
		$__templater->modifySidebarHtml('articleTocSidebar', '
		<div class="block">
			<div class="block-container">
				<h3 class="block-header">' . 'Table of contents' . '</h3>
				<div class="block-body">
					<a class="blockLink ' . ((((!$__vars['articlePage']) AND (!$__vars['isFullView']))) ? 'is-selected' : '') . '" href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">
						' . $__compilerTemp10 . '
					</a>

					' . $__compilerTemp11 . '

					' . $__compilerTemp12 . '
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
		$__compilerTemp13 = '';
		if ($__templater->method($__vars['xf']['visitor'], 'canViewAmsSeries', array())) {
			$__compilerTemp13 .= '
						<a href="' . $__templater->func('link', array('ams/series', $__vars['article']['SeriesPart']['Series'], ), true) . '">' . 'Series table of contents' . '</a>
					';
		} else {
			$__compilerTemp13 .= '
						' . 'Series table of contents' . '
					';
		}
		$__compilerTemp14 = '';
		if ($__templater->isTraversable($__vars['seriesToc'])) {
			foreach ($__vars['seriesToc'] AS $__vars['seriesToc_part']) {
				$__compilerTemp14 .= '
						<a href="' . $__templater->func('link', array('ams', $__vars['seriesToc_part']['Article'], ), true) . '" class="blockLink ' . (($__vars['seriesToc_part']['series_part_id'] == $__vars['article']['series_part_id']) ? 'is-selected' : '') . '">' . $__templater->escape($__vars['seriesToc_part']['Article']['title']) . '</a>
					';
			}
		}
		$__templater->modifySidebarHtml('seriesTocSidebar', '
		<div class="block">
			<div class="block-container">
				<h3 class="block-header">
					' . $__compilerTemp13 . '
				</h3>
				<div class="block-body">
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
	$__compilerTemp15 = '';
	if ($__vars['article']['User']['Profile']['xa_ams_author_name']) {
		$__compilerTemp15 .= '
						<dd>' . $__templater->func('username_link', array(array('user_id' => $__vars['article']['User']['user_id'], 'username' => $__vars['article']['User']['Profile']['xa_ams_author_name'], ), false, array(
			'defaultname' => $__vars['article']['User']['Profile']['xa_ams_author_name'],
		))) . '</dd>
					';
	} else {
		$__compilerTemp15 .= '
						<dd>' . $__templater->func('username_link', array($__vars['article']['User'], false, array(
			'defaultname' => $__vars['article']['username'],
		))) . '</dd>
					';
	}
	$__compilerTemp16 = '';
	if ($__vars['article']['view_count']) {
		$__compilerTemp16 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Views' . '</dt>
						<dd>' . $__templater->filter($__vars['article']['view_count'], array(array('number', array()),), true) . '</dd>
					</dl>
				';
	}
	$__compilerTemp17 = '';
	if ($__vars['article']['comment_count']) {
		$__compilerTemp17 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Comments' . '</dt>
						<dd>' . $__templater->filter($__vars['article']['comment_count'], array(array('number', array()),), true) . '</dd>
					</dl>
				';
	}
	$__compilerTemp18 = '';
	if ($__vars['article']['review_count']) {
		$__compilerTemp18 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Reviews' . '</dt>
						<dd>' . $__templater->filter($__vars['article']['review_count'], array(array('number', array()),), true) . '</dd>
					</dl>
				';
	}
	$__compilerTemp19 = '';
	if ($__vars['article']['last_update']) {
		$__compilerTemp19 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Last update' . '</dt>
						<dd>' . $__templater->func('date_dynamic', array($__vars['article']['last_update'], array(
		))) . '</dd>
					</dl>
				';
	}
	$__compilerTemp20 = '';
	if ($__vars['article']['author_rating'] AND $__vars['category']['allow_author_rating']) {
		$__compilerTemp20 .= '
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
	$__compilerTemp21 = '';
	if ($__vars['article']['rating_count'] AND $__vars['article']['rating_avg']) {
		$__compilerTemp21 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Rating' . '</dt>
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
	$__compilerTemp22 = '';
	if ($__vars['category']['allow_location'] AND (($__vars['xf']['options']['xaAmsLocationDisplayType'] == 'link') AND $__vars['article']['location'])) {
		$__compilerTemp22 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Location' . '</dt>
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
					<dt>' . 'Author' . '</dt>
					' . $__compilerTemp15 . '
				</dl>
				' . $__compilerTemp16 . '
				' . $__compilerTemp17 . '
				' . $__compilerTemp18 . '
				' . $__compilerTemp19 . '
				' . $__compilerTemp20 . '
				' . $__compilerTemp21 . '

				' . $__compilerTemp22 . '
			</div>
		</div>
	</div>
', 'replace');
	$__finalCompiled .= '

';
	$__compilerTemp23 = '';
	$__compilerTemp24 = '';
	$__compilerTemp24 .= '
						' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
		'type' => 'ams_articles',
		'group' => 'sidebar',
		'onlyInclude' => $__vars['category']['field_cache'],
		'set' => $__vars['article']['custom_fields'],
		'wrapperClass' => '',
		'valueClass' => 'pairs pairs--justified',
	), $__vars) . '
					';
	if (strlen(trim($__compilerTemp24)) > 0) {
		$__compilerTemp23 .= '
		<div class="block">
			<div class="block-container">
				<h3 class="block-minorHeader">' . 'Additional information' . '</h3>
				<div class="block-body block-row block-row--minor">
					' . $__compilerTemp24 . '
				</div>	
			</div>
		</div>
	';
	}
	$__templater->modifySidebarHtml('additionalInfoSidebar', '
	' . $__compilerTemp23 . '
', 'replace');
	$__finalCompiled .= '

';
	$__compilerTemp25 = '';
	$__compilerTemp26 = '';
	$__compilerTemp26 .= '
					';
	if ($__templater->method($__vars['article'], 'hasViewableDiscussion', array())) {
		$__compilerTemp26 .= '
						' . $__templater->button('Join the discussion', array(
			'href' => $__templater->func('link', array('threads', $__vars['article']['Discussion'], ), false),
			'class' => 'button--fullWidth',
		), '', array(
		)) . '
					';
	}
	$__compilerTemp26 .= '
				';
	if (strlen(trim($__compilerTemp26)) > 0) {
		$__compilerTemp25 .= '
		<div class="block">
			<div class="block-container">
				' . $__compilerTemp26 . '
			</div>
		</div>
	';
	}
	$__templater->modifySidebarHtml('discussionButtonSidebar', '
	' . $__compilerTemp25 . '	
', 'replace');
	$__finalCompiled .= '

';
	if (($__vars['xf']['options']['xaAmsMoreInCategoryLocation'] == 'sidebar') AND !$__templater->test($__vars['categoryOthers'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp27 = '';
		if ($__templater->isTraversable($__vars['categoryOthers'])) {
			foreach ($__vars['categoryOthers'] AS $__vars['categoryOther']) {
				$__compilerTemp27 .= '
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
					' . $__compilerTemp27 . '
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
		$__compilerTemp28 = '';
		if ($__vars['articlePage']['User']['Profile']['xa_ams_author_name']) {
			$__compilerTemp28 .= '
					<h3 class="block-minorHeader"><a href="' . $__templater->func('link', array('ams/authors', $__vars['articlePage']['User'], ), true) . '">' . 'More from ' . $__templater->escape($__vars['articlePage']['User']['Profile']['xa_ams_author_name']) . '' . '</a></h3>
				';
		} else {
			$__compilerTemp28 .= '
					<h3 class="block-minorHeader"><a href="' . $__templater->func('link', array('ams/authors', $__vars['articlePage']['User'], ), true) . '">' . 'More from ' . $__templater->escape($__vars['articlePage']['User']['username']) . '' . '</a></h3>
				';
		}
		$__compilerTemp29 = '';
		if ($__templater->isTraversable($__vars['authorOthers'])) {
			foreach ($__vars['authorOthers'] AS $__vars['authorOther']) {
				$__compilerTemp29 .= '
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
				' . $__compilerTemp28 . '

				<div class="block-body block-row">
					<ul class="articleSidebarList">
					' . $__compilerTemp29 . '
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
		$__compilerTemp30 = '';
		$__compilerTemp31 = '';
		$__compilerTemp31 .= '
						<h3 class="block-minorHeader">' . ($__vars['article']['Category']['content_term'] ? 'Share this ' . $__templater->filter($__vars['article']['Category']['content_term'], array(array('to_lower', array()),), true) . '' : 'Share this article page') . '</h3>
						';
		$__compilerTemp32 = '';
		$__compilerTemp32 .= '
									' . $__templater->callMacro('share_page_macros', 'buttons', array(
			'iconic' => true,
		), $__vars) . '
								';
		if (strlen(trim($__compilerTemp32)) > 0) {
			$__compilerTemp31 .= '
							<div class="block-body block-row block-row--separated">
								' . $__compilerTemp32 . '
							</div>
						';
		}
		$__compilerTemp31 .= '
						';
		$__compilerTemp33 = '';
		$__compilerTemp33 .= '
									';
		if ($__vars['extras']['url_bb_code']) {
			$__compilerTemp33 .= '									
										' . $__templater->callMacro('share_page_macros', 'share_clipboard_input', array(
				'label' => 'Copy URL BB code',
				'text' => '[URL="' . $__templater->func('link', array('canonical:ams/page', $__vars['articlePage'], ), false) . '"]' . $__vars['articlePage']['title'] . '[/URL]',
			), $__vars) . '
									';
		}
		$__compilerTemp33 .= '
									';
		if ($__vars['extras']['ams_bb_code']) {
			$__compilerTemp33 .= '
										' . $__templater->callMacro('share_page_macros', 'share_clipboard_input', array(
				'label' => 'Copy AMS BB code',
				'text' => '[AMS=page, ' . $__vars['articlePage']['page_id'] . '][/AMS]',
			), $__vars) . '
									';
		}
		$__compilerTemp33 .= '									
								';
		if (strlen(trim($__compilerTemp33)) > 0) {
			$__compilerTemp31 .= '
							<div class="block-body block-row block-row--separated">
								' . $__compilerTemp33 . '
							</div>
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
		$__templater->modifySidebarHtml('shareSidebar', '
		' . $__compilerTemp30 . '
	', 'replace');
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
}
);