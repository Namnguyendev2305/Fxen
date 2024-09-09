<?php
// FROM HASH: 98a3ab9161daf2060f01e36f26efae13
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Upcoming articles');
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped('Article queue'), $__templater->func('link', array('ams/article-queue', ), false), array(
	));
	$__finalCompiled .= '

';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '

' . $__templater->callMacro('metadata_macros', 'canonical_url', array(
		'canonicalUrl' => $__templater->func('link', array('canonical:ams/article-queue-upcoming', null, array('page' => (($__vars['page'] > 1) ? $__vars['page'] : null), ), ), false),
	), $__vars) . '

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
</div>';
	return $__finalCompiled;
}
);