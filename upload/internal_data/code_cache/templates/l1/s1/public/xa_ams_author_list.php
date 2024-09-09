<?php
// FROM HASH: 433cd062795106aba7b5daefe968ba87
return array(
'macros' => array('author' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'author' => '!',
		'extraInfo' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__templater->includeCss('structured_list.less');
	$__finalCompiled .= '

	<div class="structItem structItem--author js-authorListItem-' . $__templater->escape($__vars['author']['user_id']) . '" data-author="' . $__templater->escape($__vars['author']['username']) . '">
		<div class="structItem-cell structItem-cell--icon structItem-cell--iconExpanded">
			<div class="structItem-iconContainer">
				' . $__templater->func('avatar', array($__vars['author'], 'm', false, array(
		'defaultname' => $__vars['author']['username'],
	))) . '
			</div>
		</div>
		<div class="structItem-cell structItem-cell--main structItem-cell--listViewLayout" data-xf-init="touch-proxy">
			<div class="structItem-title">
				<a href="' . $__templater->func('link', array('ams/authors', $__vars['author'], ), true) . '" class="" data-tp-primary="on">
					';
	if ($__vars['author']['Profile']['xa_ams_author_name']) {
		$__finalCompiled .= '
						' . $__templater->escape($__vars['author']['Profile']['xa_ams_author_name']) . '
					';
	} else {
		$__finalCompiled .= '
						' . $__templater->escape($__vars['author']['username']) . '
					';
	}
	$__finalCompiled .= '
				</a>
			</div>

			<div class="structItem-minor">
				';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
					';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
					<ul class="structItem-extraInfo">
					' . $__compilerTemp1 . '
					</ul>
				';
	}
	$__finalCompiled .= '
			</div>

			<div class="structItem-authorDetails">
				' . $__templater->func('snippet', array($__vars['author']['Profile']['xa_ams_about_author'], 300, array('stripQuote' => true, ), ), true) . '
			</div>

			<div class="structItem-listViewMeta">
				';
	if ($__vars['author']['xa_ams_article_count']) {
		$__finalCompiled .= '
					<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--articles">
						<dt><a href="' . $__templater->func('link', array('ams/authors', $__vars['author'], ), true) . '" class="u-concealed">' . 'Articles' . '</a></dt>
						<dd><a href="' . $__templater->func('link', array('ams/authors', $__vars['author'], ), true) . '" class="u-concealed">' . $__templater->filter($__vars['author']['xa_ams_article_count'], array(array('number', array()),), true) . '</a></dd>
					</dl>
				';
	}
	$__finalCompiled .= '
				';
	if ($__vars['author']['xa_ams_series_count']) {
		$__finalCompiled .= '
					<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--series">
						<dt><a href="' . $__templater->func('link', array('ams/series', null, array('creator_id' => $__vars['author']['user_id'], ), ), true) . '" class="u-concealed">' . 'Series' . '</a></dt>
						<dd><a href="' . $__templater->func('link', array('ams/series', null, array('creator_id' => $__vars['author']['user_id'], ), ), true) . '" class="u-concealed">' . $__templater->filter($__vars['author']['xa_ams_series_count'], array(array('number', array()),), true) . '</a></dd>
					</dl>
				';
	}
	$__finalCompiled .= '
				';
	if ($__vars['author']['xa_ams_comment_count']) {
		$__finalCompiled .= '
					<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--comments">
						<dt>' . 'Comments' . '</dt>
						<dd>' . $__templater->filter($__vars['author']['xa_ams_comment_count'], array(array('number', array()),), true) . '</dd>
					</dl>
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
	</div>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Author list');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped('Author list'), $__templater->func('link', array('ams/authors', ), false), array(
	));
	$__finalCompiled .= '

';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '

';
	$__templater->setPageParam('searchConstraints', array('Articles' => array('search_type' => 'ams_article', ), ));
	$__finalCompiled .= '

';
	$__templater->setPageParam('head.' . 'metaNoindex', $__templater->preEscaped('<meta name="robots" content="noindex" />'));
	$__finalCompiled .= '

' . $__templater->callMacro('metadata_macros', 'canonical_url', array(
		'canonicalUrl' => $__templater->func('link', array('canonical:ams/authors', null, array('page' => (($__vars['page'] > 1) ? $__vars['page'] : null), ), ), false),
	), $__vars) . '

';
	if ($__templater->method($__vars['xf']['visitor'], 'canAddAmsArticle', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Post article' . $__vars['xf']['language']['ellipsis'], array(
			'href' => $__templater->func('link', array('ams/add', ), false),
			'class' => 'button--cta',
			'icon' => 'write',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

<div class="block">
	<div class="block-outer">' . $__templater->func('trim', array('
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'ams/authors',
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '
	'), false) . '</div>

	<div class="block-container">
		<div class="block-body">
			';
	if (!$__templater->test($__vars['authors'], 'empty', array())) {
		$__finalCompiled .= '
				<div class="structItemContainer">
					<div class="structItemContainer-group js-authorList">
						';
		if ($__templater->isTraversable($__vars['authors'])) {
			foreach ($__vars['authors'] AS $__vars['author']) {
				$__finalCompiled .= '
							' . $__templater->callMacro(null, 'author', array(
					'author' => $__vars['author'],
				), $__vars) . '
						';
			}
		}
		$__finalCompiled .= '
					</div>
				</div>
			';
	} else {
		$__finalCompiled .= '
				<div class="block-row">' . 'There are no authors to display.' . '</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>

	<div class="block-outer block-outer--after">
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'ams/authors',
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '
		' . $__templater->func('show_ignored', array(array(
		'wrapperclass' => 'block-outer-opposite',
	))) . '
	</div>
</div>

';
	return $__finalCompiled;
}
);