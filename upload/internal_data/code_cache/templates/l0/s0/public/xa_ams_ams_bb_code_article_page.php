<?php
// FROM HASH: d602e68e43b87c255da26a9aa0236bea
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '
';
	$__templater->includeCss('message.less');
	$__finalCompiled .= '
<div class="embeddedAmsArticle block--messages">
	<div class="block-row block-row--separated" data-author="' . ($__templater->escape($__vars['articlePage']['User']['username']) ?: $__templater->escape($__vars['articlePage']['username'])) . '">
		<div class="contentRow amsArticleSearchResultRow">
			';
	if ((($__vars['articlePage']['CoverImage'] OR $__vars['articlePage']['Article']['CoverImage']) OR $__vars['articlePage']['Article']['Category']['content_image_url']) OR (($__vars['articlePage']['Article']['SeriesPart']['Series'] AND $__vars['articlePage']['Article']['SeriesPart']['Series']['icon_date']))) {
		$__finalCompiled .= '
				<span class="contentRow-figure">
					';
		if ($__vars['articlePage']['CoverImage']) {
			$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('ams/page', $__vars['articlePage'], ), true) . '">
							' . $__templater->func('ams_article_page_thumbnail', array($__vars['articlePage'], $__vars['articlePage']['Article'], ), true) . '
						</a>	
					';
		} else if ($__vars['articlePage']['Article']['CoverImage']) {
			$__finalCompiled .= '					
						<a href="' . $__templater->func('link', array('ams/page', $__vars['articlePage'], ), true) . '">
							' . $__templater->func('ams_article_thumbnail', array($__vars['articlePage']['Article'], ), true) . '
						</a>				
					';
		} else if ($__vars['articlePage']['Article']['SeriesPart']['Series'] AND $__vars['articlePage']['Article']['SeriesPart']['Series']['icon_date']) {
			$__finalCompiled .= '
						' . $__templater->func('ams_series_icon', array($__vars['articlePage']['Article']['SeriesPart']['Series'], 's', $__templater->func('link', array('ams/page', $__vars['articlePage'], ), false), ), true) . '
					';
		} else if ($__vars['articlePage']['Article']['Category']['content_image_url']) {
			$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('ams/page', $__vars['articlePage'], ), true) . '">
							' . $__templater->func('ams_category_icon', array($__vars['articlePage']['Article'], ), true) . '
						</a>				
					';
		}
		$__finalCompiled .= '
				</span>
			';
	}
	$__finalCompiled .= '
			<div class="contentRow-main">
				<h3 class="contentRow-title">
					<a href="' . $__templater->func('link', array('ams/page', $__vars['articlePage'], ), true) . '">' . $__templater->func('prefix', array('ams_article', $__vars['articlePage']['Article'], ), true) . ' ' . $__templater->escape($__vars['articlePage']['Article']['title']) . ' - ' . $__templater->escape($__vars['articlePage']['title']) . '</a>
				</h3>

				<div class="contentRow-snippet">
					' . $__templater->func('snippet', array($__vars['articlePage']['message'], 300, array('stripQuote' => true, ), ), true) . '
				</div>

				<div class="contentRow-minor contentRow-minor--hideLinks">
					<ul class="listInline listInline--bullet">
						<li>' . $__templater->func('username_link', array($__vars['articlePage']['User'], false, array(
		'defaultname' => $__vars['articlePage']['username'],
	))) . '</li>
						<li>' . $__templater->func('date_dynamic', array($__vars['articlePage']['create_date'], array(
	))) . '</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);