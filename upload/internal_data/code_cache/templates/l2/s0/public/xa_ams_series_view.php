<?php
// FROM HASH: cc2e7ea108bcc927a998a4ed6f6fcbb4
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
	$__vars['ldJson'] = $__templater->method($__vars['series'], 'getLdStructuredData', array($__vars['page'], $__templater->renderExtension('structured_data_extra_params', $__vars, $__extensions), ));
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
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped(($__vars['series']['meta_title'] ? $__templater->escape($__vars['series']['meta_title']) : $__templater->escape($__vars['series']['title'])));
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	if (!$__templater->method($__vars['series'], 'isSearchEngineIndexable', array())) {
		$__finalCompiled .= '
	';
		$__templater->setPageParam('head.' . 'metaNoindex', $__templater->preEscaped('<meta name="robots" content="noindex" />'));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['series']['meta_description']) {
		$__finalCompiled .= '
	';
		$__vars['descSnippet'] = $__templater->func('snippet', array($__vars['series']['meta_description'], 320, array('stripBbCode' => true, ), ), false);
		$__finalCompiled .= '
';
	} else if ($__vars['series']['description']) {
		$__finalCompiled .= '
	';
		$__vars['descSnippet'] = $__templater->func('snippet', array($__vars['series']['description'], 250, array('stripBbCode' => true, ), ), false);
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__vars['descSnippet'] = $__templater->func('snippet', array($__vars['series']['message'], 250, array('stripBbCode' => true, ), ), false);
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

' . $__templater->callMacro('metadata_macros', 'metadata', array(
		'title' => ($__vars['series']['og_title'] ? $__vars['series']['og_title'] : ($__vars['series']['meta_title'] ? $__vars['series']['meta_title'] : $__vars['series']['title'])),
		'description' => $__vars['descSnippet'],
		'shareUrl' => $__templater->func('link', array('canonical:ams/series', $__vars['series'], ), false),
		'canonicalUrl' => $__templater->func('link', array('canonical:ams/series', $__vars['series'], array('page' => (($__vars['page'] > 1) ? $__vars['page'] : null), ), ), false),
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
	$__templater->wrapTemplate('xa_ams_series_wrapper', $__compilerTemp1);
	$__finalCompiled .= '

<div class="block">
	<div class="block-outer">';
	$__compilerTemp2 = '';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
				' . $__templater->callMacro('xa_ams_series_wrapper_macros', 'action_buttons', array(
		'series' => $__vars['series'],
		'canInlineMod' => $__vars['canInlineMod'],
		'showAddArticleButton' => 'true',
	), $__vars) . '
			';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__compilerTemp2 .= '
			<div class="block-outer-opposite">
			' . $__compilerTemp3 . '
			</div>
		';
	}
	$__finalCompiled .= $__templater->func('trim', array('
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'ams/series',
		'data' => $__vars['series'],
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '

		' . $__compilerTemp2 . '
	'), false) . '</div>
	
	';
	if ($__vars['poll']) {
		$__finalCompiled .= '
		' . $__templater->callMacro('poll_macros', 'poll_block', array(
			'poll' => $__vars['poll'],
		), $__vars) . '
	';
	}
	$__finalCompiled .= '

	' . $__templater->widgetPosition('xa_ams_series_view_above_article_list', array(
		'series' => $__vars['series'],
	)) . '	
	
	' . $__templater->callAdsMacro('ams_series_view_above_article_list', array(
		'series' => $__vars['series'],
	), $__vars) . '
	
	<div class="block-container">
		<div class="block-body">
			';
	if (!$__templater->test($__vars['seriesParts'], 'empty', array())) {
		$__finalCompiled .= '
				<div class="structItemContainer">
					';
		if ($__templater->isTraversable($__vars['seriesParts'])) {
			foreach ($__vars['seriesParts'] AS $__vars['seriesPart']) {
				$__finalCompiled .= '
						' . $__templater->callMacro('xa_ams_series_part_list_macros', 'series_part_list', array(
					'seriesPart' => $__vars['seriesPart'],
					'series' => $__vars['seriesPart']['Series'],
					'article' => $__vars['seriesPart']['Article'],
					'category' => $__vars['seriesPart']['Article']['Category'],
				), $__vars) . '
					';
			}
		}
		$__finalCompiled .= '
				</div>
			';
	} else if ($__vars['filters']) {
		$__finalCompiled .= '
				<div class="block-row">' . 'There are no articles matching your filters.' . '</div>
			';
	} else {
		$__finalCompiled .= '
				<div class="block-row">' . 'No articles have been added to this series yet.' . '</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>

	<div class="block-outer block-outer--after">
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'ams/series',
		'data' => $__vars['series'],
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '

		' . $__templater->func('show_ignored', array(array(
		'wrapperclass' => 'block-outer-opposite',
	))) . '
	</div>
	
	' . $__templater->widgetPosition('xa_ams_series_view_below_article_list', array(
		'series' => $__vars['series'],
	)) . '	
	
	' . $__templater->callAdsMacro('ams_series_view_below_article_list', array(
		'series' => $__vars['series'],
	), $__vars) . '	
</div>

';
	$__compilerTemp4 = '';
	if ($__vars['series']['community_series']) {
		$__compilerTemp4 .= '
				<h3 class="block-minorHeader">' . 'Community series information' . '</h3>
			';
	} else {
		$__compilerTemp4 .= '
				<h3 class="block-minorHeader">' . 'Series information' . '</h3>
			';
	}
	$__compilerTemp5 = '';
	if ($__vars['series']['community_series']) {
		$__compilerTemp5 .= '
						<dt>' . 'Manager' . '</dt>
					';
	} else {
		$__compilerTemp5 .= '
						<dt>' . 'Tác giả' . '</dt>
					';
	}
	$__compilerTemp6 = '';
	if ($__vars['series']['User']['Profile']['xa_ams_author_name']) {
		$__compilerTemp6 .= '
						<dd>' . $__templater->func('username_link', array(array('user_id' => $__vars['series']['User']['user_id'], 'username' => $__vars['series']['User']['Profile']['xa_ams_author_name'], ), false, array(
			'defaultname' => $__vars['series']['User']['Profile']['xa_ams_author_name'],
		))) . '</dd>
					';
	} else {
		$__compilerTemp6 .= '
						<dd>' . $__templater->func('username_link', array($__vars['series']['User'], false, array(
			'defaultname' => $__vars['series']['User']['username'],
		))) . '</dd>
					';
	}
	$__compilerTemp7 = '';
	if ($__vars['series']['community_series']) {
		$__compilerTemp7 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Contributors' . '</dt>
						<dd>' . $__templater->filter($__vars['totalContributors'], array(array('number', array()),), true) . '</dd>
					</dl>
				';
	}
	$__compilerTemp8 = '';
	if ($__vars['series']['article_count']) {
		$__compilerTemp8 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Articles' . '</dt>
						<dd>' . $__templater->filter($__vars['series']['article_count'], array(array('number', array()),), true) . '</dd>
					</dl>
				';
	}
	$__compilerTemp9 = '';
	if ($__vars['series']['last_part_date']) {
		$__compilerTemp9 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Last update' . '</dt>
						<dd>' . $__templater->func('date_dynamic', array($__vars['series']['last_part_date'], array(
		))) . '</dd>
					</dl>
				';
	}
	$__templater->modifySidebarHtml('infoSidebar', '
	<div class="block">
		<div class="block-container">
			' . $__compilerTemp4 . '
			<div class="block-body block-row block-row--minor">
				<dl class="pairs pairs--justified">
					' . $__compilerTemp5 . '

					' . $__compilerTemp6 . '
				</dl>
				' . $__compilerTemp7 . '
				' . $__compilerTemp8 . '
				' . $__compilerTemp9 . '
			</div>
		</div>
	</div>
', 'replace');
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['communityContributors'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp10 = '';
		if ($__templater->isTraversable($__vars['communityContributors'])) {
			foreach ($__vars['communityContributors'] AS $__vars['communityContributor']) {
				$__compilerTemp10 .= '
						<li class="block-row">
							<div class="contentRow">
								<div class="contentRow-figure">
									' . $__templater->func('avatar', array($__vars['communityContributor'], 'xs', false, array(
				))) . '
								</div>
								<div class="contentRow-main contentRow-main--close">
									';
				if ($__vars['communityContributor']['Profile']['xa_ams_author_name']) {
					$__compilerTemp10 .= '
										' . $__templater->func('username_link', array(array('user_id' => $__vars['communityContributor']['user_id'], 'username' => $__vars['communityContributor']['Profile']['xa_ams_author_name'], ), false, array(
						'defaultname' => $__vars['communityContributor']['Profile']['xa_ams_author_name'],
					))) . '
									';
				} else {
					$__compilerTemp10 .= '
										' . $__templater->func('username_link', array($__vars['communityContributor'], true, array(
					))) . '
									';
				}
				$__compilerTemp10 .= '
									<div class="contentRow-minor">
										' . $__templater->func('user_title', array($__vars['communityContributor'], false, array(
				))) . '
									</div>
								</div>
							</div>
						</li>
					';
			}
		}
		$__templater->modifySidebarHtml('communityBloggersSidebar', '
		<div class="block">
			<div class="block-container">
				<h3 class="block-minorHeader">' . 'Contributors' . '</h3>
				<ul class="block-body">
					' . $__compilerTemp10 . '
				</ul>
			</div>
		</div>
	', 'replace');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp11 = '';
	$__compilerTemp12 = '';
	$__compilerTemp12 .= '
					<h3 class="block-minorHeader">' . 'Share this series' . '</h3>
					';
	$__compilerTemp13 = '';
	$__compilerTemp13 .= '
								' . $__templater->callMacro('share_page_macros', 'buttons', array(
		'iconic' => true,
	), $__vars) . '
							';
	if (strlen(trim($__compilerTemp13)) > 0) {
		$__compilerTemp12 .= '
						<div class="block-body block-row block-row--separated">
							' . $__compilerTemp13 . '
						</div>
					';
	}
	$__compilerTemp12 .= '
					';
	$__compilerTemp14 = '';
	$__compilerTemp14 .= '
								' . $__templater->callMacro('share_page_macros', 'share_clipboard_input', array(
		'label' => 'Copy URL BB code',
		'text' => '[URL="' . $__templater->func('link', array('canonical:ams/series', $__vars['series'], ), false) . '"]' . $__vars['series']['title'] . '[/URL]',
	), $__vars) . '

								' . $__templater->callMacro('share_page_macros', 'share_clipboard_input', array(
		'label' => 'Copy AMS BB code',
		'text' => '[AMS=series, ' . $__vars['series']['series_id'] . '][/AMS]',
	), $__vars) . '
							';
	if (strlen(trim($__compilerTemp14)) > 0) {
		$__compilerTemp12 .= '
						<div class="block-body block-row block-row--separated">
							' . $__compilerTemp14 . '
						</div>
					';
	}
	$__compilerTemp12 .= '
				';
	if (strlen(trim($__compilerTemp12)) > 0) {
		$__compilerTemp11 .= '
		<div class="block">
			<div class="block-container">
				' . $__compilerTemp12 . '
			</div>
		</div>
	';
	}
	$__templater->modifySidebarHtml('shareSidebar', '
	' . $__compilerTemp11 . '
', 'replace');
	return $__finalCompiled;
}
);