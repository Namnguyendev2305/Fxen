<?php
// FROM HASH: 98ad55af5b942880ce39d789edf37301
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Article queue');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '

' . $__templater->callMacro('metadata_macros', 'canonical_url', array(
		'canonicalUrl' => $__templater->func('link', array('canonical:ams/article-queue', null, array('page' => (($__vars['page'] > 1) ? $__vars['page'] : null), ), ), false),
	), $__vars) . '

';
	if (!$__templater->test($__vars['upcomingArticles'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['upcomingArticles'])) {
			foreach ($__vars['upcomingArticles'] AS $__vars['upcomingArticle']) {
				$__compilerTemp1 .= '
						' . $__templater->dataRow(array(
					'rowclass' => 'dataList-row--parentCustom',
				), array(array(
					'style' => 'white-space: nowrap;',
					'_type' => 'cell',
					'html' => '
								<time class="publish-date">' . $__templater->func('date_dynamic', array($__vars['upcomingArticle']['publish_date'], array(
					'data-full-date' => 'true',
				))) . '</time>
							',
				),
				array(
					'_type' => 'cell',
					'html' => '
								' . $__templater->func('prefix', array('ams_article', $__vars['upcomingArticle'], 'html', '', ), true) . ' <a href="' . $__templater->func('link', array('ams', $__vars['upcomingArticle'], ), true) . '" class="" data-tp-primary="on">' . $__templater->escape($__vars['upcomingArticle']['title']) . '</a>
							',
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'width' => '25%',
			'style' => 'white-space: nowrap;',
			'_type' => 'cell',
			'html' => 'Upcoming publish date',
		),
		array(
			'_type' => 'cell',
			'html' => 'Article',
		))) . '

					' . $__compilerTemp1 . '
				', array(
		)) . '
			</div>
		</div>

		<div style="float: right; font-size: 13px; line-height: 20px; padding-top:5px;">
			<a href="' . $__templater->func('link', array('ams/article-queue-upcoming', ), true) . '">
				' . 'View all upcoming articles' . '
			</a>
		</div>
		<div style="clear:both;"></div>
	</div>
';
	}
	$__finalCompiled .= '

<div class="block">
	<div class="block-outer">';
	$__compilerTemp2 = '';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '

				';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__compilerTemp2 .= '
			<div class="block-outer-opposite">
				<div class="buttonGroup">
				' . $__compilerTemp3 . '
				</div>
			</div>
		';
	}
	$__finalCompiled .= $__templater->func('trim', array('
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'ams/article-queue',
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '

		' . $__compilerTemp2 . '

	'), false) . '</div>

	<div class="block-container">
		' . $__templater->callMacro('xa_ams_article_queue_macros', 'list_filter_bar', array(
		'filters' => $__vars['filters'],
		'baseLinkPath' => 'ams/article-queue',
		'creatorFilter' => $__vars['creatorFilter'],
	), $__vars) . '

		<div class="block-body">
			';
	if (!$__templater->test($__vars['articles'], 'empty', array())) {
		$__finalCompiled .= '
				<div class="structItemContainer">
					';
		if ($__templater->isTraversable($__vars['articles'])) {
			foreach ($__vars['articles'] AS $__vars['article']) {
				$__finalCompiled .= '
						' . $__templater->callMacro('xa_ams_article_queue_macros', 'article_queue_item', array(
					'article' => $__vars['article'],
					'category' => $__vars['article']['Category'],
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
				<div class="block-row">' . 'There are no pending (Draft/Awaiting) articles. ' . '</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>

	<div class="block-outer block-outer--after">
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'ams/article-queue',
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '
		' . $__templater->func('show_ignored', array(array(
		'wrapperclass' => 'block-outer-opposite',
	))) . '
	</div>
</div>';
	return $__finalCompiled;
}
);