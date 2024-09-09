<?php
// FROM HASH: 2982b1e2f8c113c417eaf7bb65163b9a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped(($__vars['series']['meta_title'] ? $__templater->escape($__vars['series']['meta_title']) : $__templater->escape($__vars['series']['title'])) . ' - ' . 'Series details');
	$__finalCompiled .= '

';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['pageSelected'] = 'details';
	$__templater->wrapTemplate('xa_ams_series_wrapper', $__compilerTemp1);
	$__finalCompiled .= '

<div class="block">
	';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
				' . $__templater->callMacro('xa_ams_series_wrapper_macros', 'action_buttons', array(
		'series' => $__vars['series'],
		'showAddArticleButton' => 'true',
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
	if ($__vars['poll']) {
		$__finalCompiled .= '
		' . $__templater->callMacro('poll_macros', 'poll_block', array(
			'poll' => $__vars['poll'],
		), $__vars) . '
	';
	}
	$__finalCompiled .= '
	
	<div class="block-container">
		<div class="block-body lbContainer js-seriesBody"
			data-xf-init="lightbox"
			data-lb-id="series-' . $__templater->escape($__vars['series']['series_id']) . '"
			data-lb-caption-desc="' . ($__vars['series']['User'] ? $__templater->escape($__vars['series']['User']['username']) : $__templater->escape($__vars['series']['username'])) . ' &middot; ' . $__templater->func('date_time', array($__vars['series']['create_date'], ), true) . '"
			id="js-seriesBody-' . $__templater->escape($__vars['series']['series_id']) . '">

			<div class="seriesBody">
				<article class="seriesBody-main js-lbContainer">
					' . $__templater->func('bb_code', array($__vars['series']['message'], 'ams_series', $__vars['series'], ), true) . '

					';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
								';
	if ($__templater->isTraversable($__vars['series']['Attachments'])) {
		foreach ($__vars['series']['Attachments'] AS $__vars['attachment']) {
			if ($__vars['attachment']['has_thumbnail'] AND (!$__templater->method($__vars['series'], 'isAttachmentEmbedded', array($__vars['attachment'], )))) {
				$__compilerTemp3 .= '
									' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
					'attachment' => $__vars['attachment'],
					'canView' => $__templater->method($__vars['series'], 'canViewSeriesAttachments', array()),
				), $__vars) . '
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
						<ul class="attachmentList seriesBody-attachments">
							' . $__compilerTemp3 . '
						</ul>
					';
	}
	$__finalCompiled .= '

					';
	$__compilerTemp4 = '';
	$__compilerTemp4 .= '
								';
	$__compilerTemp5 = '';
	$__compilerTemp5 .= '
										' . $__templater->func('react', array(array(
		'content' => $__vars['series'],
		'link' => 'ams/series/react',
		'list' => '< .js-seriesBody | .js-reactionsList',
	))) . '
									';
	if (strlen(trim($__compilerTemp5)) > 0) {
		$__compilerTemp4 .= '
									<div class="actionBar-set actionBar-set--external">
									' . $__compilerTemp5 . '
									</div>
								';
	}
	$__compilerTemp4 .= '

								';
	$__compilerTemp6 = '';
	$__compilerTemp6 .= '
										';
	if ($__templater->method($__vars['series'], 'canReport', array())) {
		$__compilerTemp6 .= '
											<a href="' . $__templater->func('link', array('ams/series/report', $__vars['series'], ), true) . '"
												class="actionBar-action actionBar-action--report" data-xf-click="overlay">' . 'Report' . '</a>
										';
	}
	$__compilerTemp6 .= '

										';
	$__vars['hasActionBarMenu'] = false;
	$__compilerTemp6 .= '
										';
	if ($__templater->method($__vars['series'], 'canEdit', array())) {
		$__compilerTemp6 .= '
											<a href="' . $__templater->func('link', array('ams/series/edit', $__vars['series'], ), true) . '"
												class="actionBar-action actionBar-action--edit actionBar-action--menuItem">' . 'Edit' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp6 .= '
										';
	}
	$__compilerTemp6 .= '

										';
	if ($__vars['series']['edit_count'] AND $__templater->method($__vars['series'], 'canViewHistory', array())) {
		$__compilerTemp6 .= '
											<a href="' . $__templater->func('link', array('ams/series/history', $__vars['series'], ), true) . '" 
												class="actionBar-action actionBar-action--history actionBar-action--menuItem"
												data-xf-click="toggle"
												data-target="#js-seriesBody-' . $__templater->escape($__vars['series']['series_id']) . ' .js-historyTarget"
												data-menu-closer="true">' . 'History' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp6 .= '
										';
	}
	$__compilerTemp6 .= '

										';
	if ($__templater->method($__vars['series'], 'canDelete', array('soft', ))) {
		$__compilerTemp6 .= '
											<a href="' . $__templater->func('link', array('ams/series/delete', $__vars['series'], ), true) . '"
												class="actionBar-action actionBar-action--delete actionBar-action--menuItem"
												data-xf-click="overlay">' . 'Delete' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp6 .= '
										';
	}
	$__compilerTemp6 .= '

										';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewIps', array()) AND $__vars['series']['ip_id']) {
		$__compilerTemp6 .= '
											<a href="' . $__templater->func('link', array('ams/series/ip', $__vars['series'], ), true) . '"
												class="actionBar-action actionBar-action--ip actionBar-action--menuItem"
												data-xf-click="overlay">' . 'IP' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp6 .= '
										';
	}
	$__compilerTemp6 .= '

										';
	if ($__templater->method($__vars['series'], 'canWarn', array())) {
		$__compilerTemp6 .= '
											<a href="' . $__templater->func('link', array('ams/series/warn', $__vars['series'], ), true) . '"
												class="actionBar-action actionBar-action--warn actionBar-action--menuItem">' . 'Warn' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp6 .= '
										';
	} else if ($__vars['series']['warning_id'] AND $__templater->method($__vars['xf']['visitor'], 'canViewWarnings', array())) {
		$__compilerTemp6 .= '
											<a href="' . $__templater->func('link', array('warnings', array('warning_id' => $__vars['series']['warning_id'], ), ), true) . '"
												class="actionBar-action actionBar-action--warn actionBar-action--menuItem"
												data-xf-click="overlay">' . 'View warning' . '</a>
											';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp6 .= '
										';
	}
	$__compilerTemp6 .= '

										';
	if ($__templater->method($__vars['series'], 'canApproveUnapprove', array())) {
		$__compilerTemp6 .= '
											';
		if ($__vars['series']['series_state'] == 'moderated') {
			$__compilerTemp6 .= '
												<a href="' . $__templater->func('link', array('ams/series/approve', $__vars['series'], array('t' => $__templater->func('csrf_token', array(), false), ), ), true) . '"
													class="actionBar-action actionBar-action--approve actionBar-action--menuItem">' . 'Approve' . '</a>
												';
			$__vars['hasActionBarMenu'] = true;
			$__compilerTemp6 .= '
											';
		} else if ($__vars['series']['series_state'] == 'visible') {
			$__compilerTemp6 .= '
												<a href="' . $__templater->func('link', array('ams/series/unapprove', $__vars['series'], array('t' => $__templater->func('csrf_token', array(), false), ), ), true) . '"
													class="actionBar-action actionBar-action--unapprove actionBar-action--menuItem">' . 'Unapprove' . '</a>
												';
			$__vars['hasActionBarMenu'] = true;
			$__compilerTemp6 .= '
											';
		}
		$__compilerTemp6 .= '
										';
	}
	$__compilerTemp6 .= '

										';
	if ($__vars['hasActionBarMenu']) {
		$__compilerTemp6 .= '
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
	$__compilerTemp6 .= '
									';
	if (strlen(trim($__compilerTemp6)) > 0) {
		$__compilerTemp4 .= '
									<div class="actionBar-set actionBar-set--internal">
									' . $__compilerTemp6 . '
									</div>
								';
	}
	$__compilerTemp4 .= '
							';
	if (strlen(trim($__compilerTemp4)) > 0) {
		$__finalCompiled .= '
						<div class="actionBar">
							' . $__compilerTemp4 . '
						</div>
					';
	}
	$__finalCompiled .= '

					<div class="reactionsBar js-reactionsList ' . ($__vars['series']['reactions'] ? 'is-active' : '') . '">
						' . $__templater->func('reactions', array($__vars['series'], 'ams/series/reactions', array())) . '
					</div>

					<div class="js-historyTarget toggleTarget" data-href="trigger-href"></div>
				</article>
			</div>
		</div>
	</div>
</div>

';
	if (!$__vars['series']['community_series']) {
		$__finalCompiled .= '
	';
		$__compilerTemp7 = '';
		$__compilerTemp7 .= '
									';
		if ($__vars['series']['User']['Profile']['xa_ams_about_author']) {
			$__compilerTemp7 .= '
										<div class="articleBody">
											<article class="articleBody-aboutAuthor">
												' . $__templater->func('bb_code', array($__vars['series']['User']['Profile']['xa_ams_about_author'], 'user:xa_ams_about_author', $__vars['series']['User'], ), true) . '
											</article>
										</div>
									';
		} else if ($__vars['series']['User']['Profile']['about'] AND $__vars['xf']['options']['xaAmsDisplayUserProfileAboutMe']) {
			$__compilerTemp7 .= '
										<div class="articleBody">
											<article class="articleBody-aboutAuthor">
												' . $__templater->func('bb_code', array($__vars['series']['User']['Profile']['about'], 'user:about', $__vars['series']['User'], ), true) . '
											</article>
										</div>
									';
		}
		$__compilerTemp7 .= '
								';
		if (strlen(trim($__compilerTemp7)) > 0) {
			$__finalCompiled .= '
		<div class="block">
			<div class="block-container">	
				<div class="block-header">' . 'About author' . '</div>

				<div class="block-body ">
					<div class="block-row block-row--separated ">
						<div class="contentRow">
							<span class="contentRow-figure">
								' . $__templater->func('avatar', array($__vars['series']['User'], 's', false, array(
			))) . '
							</span>

							<div class="contentRow-main">
								<div class="contentRow-title">' . $__templater->func('username_link', array($__vars['series']['User'], true, array(
			))) . '</div>

								' . $__compilerTemp7 . '
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
	}
	$__finalCompiled .= '

';
	$__compilerTemp8 = '';
	if ($__vars['series']['community_series']) {
		$__compilerTemp8 .= '
				<h3 class="block-minorHeader">' . 'Community series information' . '</h3>
			';
	} else {
		$__compilerTemp8 .= '
				<h3 class="block-minorHeader">' . 'Series information' . '</h3>
			';
	}
	$__compilerTemp9 = '';
	if ($__vars['series']['community_series']) {
		$__compilerTemp9 .= '
						<dt>' . 'Manager' . '</dt>
					';
	} else {
		$__compilerTemp9 .= '
						<dt>' . 'Author' . '</dt>
					';
	}
	$__compilerTemp10 = '';
	if ($__vars['series']['User']['Profile']['xa_ams_author_name']) {
		$__compilerTemp10 .= '
						<dd>' . $__templater->func('username_link', array(array('user_id' => $__vars['series']['User']['user_id'], 'username' => $__vars['series']['User']['Profile']['xa_ams_author_name'], ), false, array(
			'defaultname' => $__vars['series']['User']['Profile']['xa_ams_author_name'],
		))) . '</dd>
					';
	} else {
		$__compilerTemp10 .= '
						<dd>' . $__templater->func('username_link', array($__vars['series']['User'], false, array(
			'defaultname' => $__vars['series']['User']['username'],
		))) . '</dd>
					';
	}
	$__compilerTemp11 = '';
	if ($__vars['series']['community_series']) {
		$__compilerTemp11 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Contributors' . '</dt>
						<dd>' . $__templater->filter($__vars['totalContributors'], array(array('number', array()),), true) . '</dd>
					</dl>
				';
	}
	$__compilerTemp12 = '';
	if ($__vars['series']['article_count']) {
		$__compilerTemp12 .= '
					<dl class="pairs pairs--justified">
						<dt>' . 'Articles' . '</dt>
						<dd>' . $__templater->filter($__vars['series']['article_count'], array(array('number', array()),), true) . '</dd>
					</dl>
				';
	}
	$__compilerTemp13 = '';
	if ($__vars['series']['last_part_date']) {
		$__compilerTemp13 .= '
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
			' . $__compilerTemp8 . '
			<div class="block-body block-row block-row--minor">
				<dl class="pairs pairs--justified">
					' . $__compilerTemp9 . '

					' . $__compilerTemp10 . '
				</dl>
				' . $__compilerTemp11 . '
				' . $__compilerTemp12 . '
				' . $__compilerTemp13 . '
			</div>
		</div>
	</div>
', 'replace');
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['communityContributors'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp14 = '';
		if ($__templater->isTraversable($__vars['communityContributors'])) {
			foreach ($__vars['communityContributors'] AS $__vars['communityContributor']) {
				$__compilerTemp14 .= '
						<li class="block-row">
							<div class="contentRow">
								<div class="contentRow-figure">
									' . $__templater->func('avatar', array($__vars['communityContributor'], 'xs', false, array(
				))) . '
								</div>
								<div class="contentRow-main contentRow-main--close">
									';
				if ($__vars['communityContributor']['Profile']['xa_ams_author_name']) {
					$__compilerTemp14 .= '
										' . $__templater->func('username_link', array(array('user_id' => $__vars['communityContributor']['user_id'], 'username' => $__vars['communityContributor']['Profile']['xa_ams_author_name'], ), false, array(
						'defaultname' => $__vars['communityContributor']['Profile']['xa_ams_author_name'],
					))) . '
									';
				} else {
					$__compilerTemp14 .= '
										' . $__templater->func('username_link', array($__vars['communityContributor'], true, array(
					))) . '
									';
				}
				$__compilerTemp14 .= '
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
					' . $__compilerTemp14 . '
				</ul>
			</div>
		</div>
	', 'replace');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp15 = '';
	$__compilerTemp16 = '';
	$__compilerTemp16 .= '
					<h3 class="block-minorHeader">' . 'Share this series' . '</h3>
					';
	$__compilerTemp17 = '';
	$__compilerTemp17 .= '
								' . $__templater->callMacro('share_page_macros', 'buttons', array(
		'iconic' => true,
		'pageUrl' => $__templater->func('link', array('canonical:ams/series', $__vars['series'], ), false),
		'pageTitle' => $__vars['series']['title'],
		'pageDesc' => $__templater->func('snippet', array($__vars['series']['description'], 250, array('stripBbCode' => true, ), ), false),
	), $__vars) . '
							';
	if (strlen(trim($__compilerTemp17)) > 0) {
		$__compilerTemp16 .= '
						<div class="block-body block-row block-row--separated">
							' . $__compilerTemp17 . '
						</div>
					';
	}
	$__compilerTemp16 .= '
					';
	$__compilerTemp18 = '';
	$__compilerTemp18 .= '
								' . $__templater->callMacro('share_page_macros', 'share_clipboard_input', array(
		'label' => 'Copy URL BB code',
		'text' => '[URL="' . $__templater->func('link', array('canonical:ams/series', $__vars['series'], ), false) . '"]' . $__vars['series']['title'] . '[/URL]',
	), $__vars) . '

								' . $__templater->callMacro('share_page_macros', 'share_clipboard_input', array(
		'label' => 'Copy AMS BB code',
		'text' => '[AMS=series, ' . $__vars['series']['series_id'] . '][/AMS]',
	), $__vars) . '
							';
	if (strlen(trim($__compilerTemp18)) > 0) {
		$__compilerTemp16 .= '
						<div class="block-body block-row block-row--separated">
							' . $__compilerTemp18 . '
						</div>
					';
	}
	$__compilerTemp16 .= '
				';
	if (strlen(trim($__compilerTemp16)) > 0) {
		$__compilerTemp15 .= '
		<div class="block">
			<div class="block-container">
				' . $__compilerTemp16 . '
			</div>
		</div>
	';
	}
	$__templater->modifySidebarHtml('shareSidebar', '
	' . $__compilerTemp15 . '
', 'replace');
	return $__finalCompiled;
}
);