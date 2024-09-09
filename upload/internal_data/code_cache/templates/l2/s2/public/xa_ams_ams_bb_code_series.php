<?php
// FROM HASH: b7a479f39400938fd73d3ff43c7d2b81
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '
';
	$__templater->includeCss('message.less');
	$__finalCompiled .= '
<div class="embeddedAmsSeries  block--messages">
	<div class="block-row block-row--separated" data-author="' . ($__templater->escape($__vars['series']['User']['username']) ?: $__templater->escape($__vars['series']['username'])) . '">
		<div class="contentRow amsSeriesSearchResultRow">
			';
	if ($__vars['series']['icon_date']) {
		$__finalCompiled .= '
				<span class="contentRow-figure">
					<a href="' . $__templater->func('link', array('ams/series', $__vars['series'], ), true) . '">
						' . $__templater->func('ams_series_icon', array($__vars['series'], 's', $__templater->func('link', array('ams/series', $__vars['series'], ), false), ), true) . '
					</a>				
				</span>
			';
	}
	$__finalCompiled .= '
			<div class="contentRow-main">
				<h3 class="contentRow-title">
					<a href="' . $__templater->func('link', array('ams/series', $__vars['series'], ), true) . '">' . $__templater->func('highlight', array($__vars['series']['title'], $__vars['options']['term'], ), true) . '</a>
				</h3>

				<div class="contentRow-snippet">
					';
	if ($__vars['series']['description'] != '') {
		$__finalCompiled .= '
						' . $__templater->func('snippet', array($__vars['series']['description'], 300, array('term' => $__vars['options']['term'], 'stripQuote' => true, ), ), true) . '
					';
	} else {
		$__finalCompiled .= '
						' . $__templater->func('snippet', array($__vars['series']['message'], 300, array('term' => $__vars['options']['term'], 'stripQuote' => true, ), ), true) . '
					';
	}
	$__finalCompiled .= '
				</div>

				<div class="contentRow-minor contentRow-minor--hideLinks">
					<ul class="listInline listInline--bullet">
						<li>' . $__templater->func('username_link', array($__vars['series']['User'], false, array(
		'defaultname' => $__vars['series']['User']['username'],
	))) . '</li>
						<li>' . $__templater->func('date_dynamic', array($__vars['series']['create_date'], array(
	))) . '</li>
						';
	if ($__vars['series']['last_part_date'] AND ($__vars['series']['last_part_date'] > $__vars['series']['create_date'])) {
		$__finalCompiled .= '
							<li>' . 'Cập nhật' . ' ' . $__templater->func('date_dynamic', array($__vars['series']['last_part_date'], array(
		))) . '</li>
						';
	}
	$__finalCompiled .= '
						';
	if ($__vars['series']['article_count']) {
		$__finalCompiled .= '<li>' . 'Articles' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->filter($__vars['series']['article_count'], array(array('number', array()),), true) . '</li>';
	}
	$__finalCompiled .= '
						';
	if ($__vars['series']['LastArticle']) {
		$__finalCompiled .= '
							<li>
								' . 'Latest article' . ': <a href="' . $__templater->func('link', array('ams', $__vars['series']['LastArticle'], ), true) . '" class="">' . $__templater->escape($__vars['series']['LastArticle']['title']) . '</a>
							</li>
						';
	}
	$__finalCompiled .= '
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);