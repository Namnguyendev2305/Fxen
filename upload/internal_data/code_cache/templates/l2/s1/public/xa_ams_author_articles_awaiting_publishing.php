<?php
// FROM HASH: e15e628bd9b512797d485a19cc88503e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['user']['user_id'] == $__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Your articles awaiting publishing');
		$__templater->pageParams['pageNumber'] = $__vars['page'];
		$__finalCompiled .= '
';
	} else if ($__vars['user']['Profile']['xa_ams_author_name']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Articles awaiting publishing by ' . $__templater->escape($__vars['user']['Profile']['xa_ams_author_name']) . '');
		$__templater->pageParams['pageNumber'] = $__vars['page'];
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Articles awaiting publishing by ' . $__templater->escape($__vars['user']['username']) . '');
		$__templater->pageParams['pageNumber'] = $__vars['page'];
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['xf']['options']['xaAmsEnableAuthorList']) {
		$__finalCompiled .= '
	';
		$__templater->breadcrumb($__templater->preEscaped('Author list'), $__templater->func('link', array('ams/authors', ), false), array(
		));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '
	
';
	$__templater->setPageParam('searchConstraints', array('Articles' => array('search_type' => 'ams_article', ), ));
	$__finalCompiled .= '

';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '

';
	if (($__vars['user']['user_id'] == $__vars['xf']['visitor']['user_id']) AND $__templater->method($__vars['xf']['visitor'], 'canAddAmsArticle', array())) {
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

';
	if ($__vars['canInlineMod']) {
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

<div class="block" data-type="ams_article">
	<div class="block-outer">' . $__templater->func('trim', array('
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'ams/authors/awaiting-publishing',
		'data' => $__vars['user'],
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '
	'), false) . '</div>

	<div class="block-container">
		<div class="block-body">
			';
	if (!$__templater->test($__vars['awaitingPublishing'], 'empty', array())) {
		$__finalCompiled .= '
					<div class="structItemContainer structItemContainerAmsListView">
						';
		if ($__templater->isTraversable($__vars['awaitingPublishing'])) {
			foreach ($__vars['awaitingPublishing'] AS $__vars['article']) {
				$__finalCompiled .= '
							' . $__templater->callMacro('xa_ams_article_list_macros', 'list_view_layout', array(
					'article' => $__vars['article'],
					'allowInlineMod' => false,
					'showWatched' => false,
				), $__vars) . '
						';
			}
		}
		$__finalCompiled .= '
					</div>
			';
	} else {
		$__finalCompiled .= '
				<div class="blockMessage">
					' . 'You do not have any articles awaiting publishing.' . '
				</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>

	<div class="block-outer block-outer--after">
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'ams/authors/awaiting-publishing',
		'data' => $__vars['user'],
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