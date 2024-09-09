<?php
// FROM HASH: 7e834f1e3b8d66ec61eb5251318f5c28
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Watched articles');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	$__templater->setPageParam('searchConstraints', array('Articles' => array('search_type' => 'ams_article', ), ));
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['articles'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['articles'])) {
			foreach ($__vars['articles'] AS $__vars['article']) {
				$__compilerTemp1 .= '
						';
				$__vars['extra'] = ($__vars['article']['Watch'][$__vars['xf']['visitor']['user_id']]['email_subscribe'] ? 'Email' : '');
				$__compilerTemp1 .= '
						' . $__templater->callMacro('xa_ams_article_list_macros', 'list_view_layout', array(
					'article' => $__vars['article'],
					'chooseName' => 'ids',
					'showWatched' => false,
					'extraInfo' => $__vars['extra'],
				), $__vars) . '
					';
			}
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-outer">
			' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'watched/ams-articles',
			'wrapperclass' => 'block-outer-main',
			'perPage' => $__vars['perPage'],
		))) . '

			<div class="block-outer-opposite">
				' . $__templater->button('Manage watched articles', array(
			'class' => 'button--link menuTrigger',
			'data-xf-click' => 'menu',
			'aria-expanded' => 'false',
			'aria-haspopup' => 'true',
		), '', array(
		)) . '
				<div class="menu" data-menu="menu" aria-hidden="true">
					<div class="menu-content">
						<h3 class="menu-header">' . 'Manage watched articles' . '</h3>
						' . '
						<a href="' . $__templater->func('link', array('watched/ams-articles/manage', null, array('state' => 'email_subscribe:off', ), ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Tắt thông báo email' . '</a>
						<a href="' . $__templater->func('link', array('watched/ams-articles/manage', null, array('state' => 'delete', ), ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Stop watching articles' . '</a>
						' . '
					</div>
				</div>
			</div>
		</div>

		<div class="block-container">
			<div class="block-body">
				<div class="structItemContainer structItemContainerAmsListView">
					' . $__compilerTemp1 . '
				</div>
			</div>
			<div class="block-footer block-footer--split">
				<span class="block-footer-counter"></span>
				<span class="block-footer-select">' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'check-all' => '< .block-container',
			'label' => 'Chọn tất cả',
			'_type' => 'option',
		))) . '</span>
				<span class="block-footer-controls">
					' . $__templater->formSelect(array(
			'name' => 'watch_action',
			'class' => 'input--inline',
		), array(array(
			'label' => 'Với lựa chọn' . $__vars['xf']['language']['ellipsis'],
			'_type' => 'option',
		),
		array(
			'value' => 'email_subscribe:on',
			'label' => 'Bật thông báo email',
			'_type' => 'option',
		),
		array(
			'value' => 'email_subscribe:off',
			'label' => 'Tắt thông báo email',
			'_type' => 'option',
		),
		array(
			'value' => 'delete',
			'label' => 'Ngừng theo dõi',
			'_type' => 'option',
		))) . '
					' . $__templater->button('Tới', array(
			'type' => 'submit',
		), '', array(
		)) . '
				</span>
			</div>
		</div>

		<div class="block-outer block-outer--after">
			' . $__templater->func('page_nav', array(array(
			'link' => 'watched/ams-articles',
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'perPage' => $__vars['perPage'],
		))) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('watched/ams-articles/update', ), false),
			'ajax' => 'true',
			'class' => 'block',
			'autocomplete' => 'off',
		)) . '
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">
		';
		if ($__vars['page'] > 1) {
			$__finalCompiled .= '
			' . 'xa_ams_no_articles_to_display' . '
		';
		} else {
			$__finalCompiled .= '
			' . 'You are not watching any articles.' . '
		';
		}
		$__finalCompiled .= '
	</div>
';
	}
	return $__finalCompiled;
}
);