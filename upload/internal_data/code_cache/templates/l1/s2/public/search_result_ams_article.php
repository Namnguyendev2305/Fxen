<?php
// FROM HASH: 8e110541889d78d966024f82a55430d6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<li class="block-row block-row--separated ' . ($__templater->method($__vars['article'], 'isIgnored', array()) ? 'is-ignored' : '') . ' js-inlineModContainer" data-author="' . ($__templater->escape($__vars['article']['User']['username']) ?: $__templater->escape($__vars['article']['username'])) . '">
	<div class="contentRow ' . ((!$__templater->method($__vars['article'], 'isVisible', array())) ? 'is-deleted' : '') . ' amsArticleSearchResultRow">
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
	} else {
		$__finalCompiled .= '
				' . $__templater->func('avatar', array($__vars['article']['User'], 's', false, array(
			'defaultname' => ($__vars['article']['username'] ?: 'Deleted member'),
		))) . '
			';
	}
	$__finalCompiled .= '
		</span>
		<div class="contentRow-main">
			<h3 class="contentRow-title">
				<a href="' . $__templater->func('link', array('ams', $__vars['article'], ), true) . '">' . $__templater->func('prefix', array('ams_article', $__vars['article'], ), true) . $__templater->func('highlight', array($__vars['article']['title'], $__vars['options']['term'], ), true) . '</a>
			</h3>

			<div class="contentRow-snippet">
				' . $__templater->func('snippet', array($__vars['article']['message'], 300, array('term' => $__vars['options']['term'], 'stripQuote' => true, ), ), true) . '
			</div>

			<div class="contentRow-minor contentRow-minor--hideLinks">
				<ul class="listInline listInline--bullet">
					';
	if (($__vars['options']['mod'] == 'ams_article') AND $__templater->method($__vars['article'], 'canUseInlineModeration', array())) {
		$__finalCompiled .= '
						<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['article']['article_id'],
			'class' => 'js-inlineModToggle',
			'_type' => 'option',
		))) . '</li>
					';
	}
	$__finalCompiled .= '
					';
	if ($__vars['article']['User']['Profile']['xa_ams_author_name']) {
		$__finalCompiled .= '
						<li>' . $__templater->func('username_link', array(array('user_id' => $__vars['article']['User']['user_id'], 'username' => $__vars['article']['User']['Profile']['xa_ams_author_name'], ), false, array(
			'defaultname' => $__vars['article']['User']['Profile']['xa_ams_author_name'],
		))) . '</li>
					';
	} else {
		$__finalCompiled .= '
						<li>' . $__templater->func('username_link', array($__vars['article']['User'], false, array(
			'defaultname' => $__vars['article']['username'],
		))) . '</li>
					';
	}
	$__finalCompiled .= '
					<li>' . 'Article' . '</li>
					<li>' . $__templater->func('date_dynamic', array($__vars['article']['publish_date'], array(
	))) . '</li>
					';
	if ($__vars['article']['article_read_time']) {
		$__finalCompiled .= '
						<li>' . '' . $__templater->escape($__vars['article']['article_read_time']) . ' min read' . '</li>
					';
	}
	$__finalCompiled .= '					
					';
	if ($__vars['xf']['options']['enableTagging'] AND $__vars['article']['tags']) {
		$__finalCompiled .= '
						<li>
							' . $__templater->callMacro('tag_macros', 'simple_list', array(
			'tags' => $__vars['article']['tags'],
			'containerClass' => 'contentRow-minor',
			'highlightTerm' => ($__vars['options']['tag'] ?: $__vars['options']['term']),
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
					<li>' . 'Category' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->func('link', array('ams/categories', $__vars['article']['Category'], ), true) . '">' . $__templater->escape($__vars['article']['Category']['title']) . '</a></li>
				</ul>
			</div>
		</div>
	</div>
</li>';
	return $__finalCompiled;
}
);