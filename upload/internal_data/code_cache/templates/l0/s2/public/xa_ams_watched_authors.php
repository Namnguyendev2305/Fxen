<?php
// FROM HASH: c0d6eb03ac9635b75c6fdeac4fe33298
return array(
'macros' => array('ams_author_watch_item' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'author' => '!',
		'chooseName' => '',
		'bonusInfo' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	
	<div class="node node--depth2 node--amsAuthor node--amsAuthor' . $__templater->escape($__vars['author']['author_id']) . '">
		<div class="node-body">
			<div class="node-main js-nodeMain">
				';
	if ($__vars['chooseName']) {
		$__finalCompiled .= '
					' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'labelclass' => 'u-pullRight',
			'class' => 'js-chooseItem',
			'name' => $__vars['chooseName'] . '[]',
			'value' => $__vars['author']['author_id'],
			'_type' => 'option',
		))) . '
				';
	}
	$__finalCompiled .= '

				';
	$__vars['descriptionDisplay'] = $__templater->func('property', array('nodeListDescriptionDisplay', ), false);
	$__finalCompiled .= '

				<h3 class="node-title">
					<a href="' . $__templater->func('link', array('ams/authors', $__vars['author']['Author'], ), true) . '" data-xf-init="' . (($__vars['descriptionDisplay'] == 'tooltip') ? 'element-tooltip' : '') . '" data-shortcut="node-description">' . $__templater->escape($__vars['author']['Author']['username']) . '</a>
				</h3>

				<div class="node-meta">
					<div class="node-statsMeta">
						<dl class="pairs pairs--inline">
							<dt>' . 'Published articles' . '</dt>
							<dd>' . $__templater->filter($__vars['author']['Author']['xa_ams_article_count'], array(array('number', array()),), true) . '</dd>
						</dl>
					</div>
				</div>

				';
	if (!$__templater->test($__vars['bonusInfo'], 'empty', array())) {
		$__finalCompiled .= '
					<div class="node-bonus">' . $__templater->escape($__vars['bonusInfo']) . '</div>
				';
	}
	$__finalCompiled .= '
			</div>

			<div class="node-stats node-stats--single">
				<dl class="pairs pairs--rows">
					<dt>' . 'Published articles' . '</dt>
					<dd>' . $__templater->filter($__vars['author']['Author']['xa_ams_article_count'], array(array('number', array()),), true) . '</dd>
				</dl>
			</div>

			<div class="node-extra">
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
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Watched authors');
	$__finalCompiled .= '

';
	$__templater->includeCss('node_list.less');
	$__finalCompiled .= '

';
	$__templater->setPageParam('searchConstraints', array('Articles' => array('search_type' => 'ams_article', ), ));
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['watchedAuthors'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['watchedAuthors'])) {
			foreach ($__vars['watchedAuthors'] AS $__vars['id'] => $__vars['author']) {
				$__compilerTemp1 .= '
					';
				$__vars['authorWatch'] = $__vars['watchedAuthors'][$__vars['author']['author_id']];
				$__compilerTemp1 .= '

					';
				if ($__vars['authorWatch']) {
					$__compilerTemp1 .= '
						';
					$__compilerTemp2 = '';
					if ($__vars['authorWatch']['notify_on'] == 'article') {
						$__compilerTemp2 .= '<li>' . 'New articles' . '</li>';
					}
					$__compilerTemp3 = '';
					if ($__vars['authorWatch']['send_email']) {
						$__compilerTemp3 .= '<li>' . 'Emails' . '</li>';
					}
					$__compilerTemp4 = '';
					if ($__vars['authorWatch']['send_alert']) {
						$__compilerTemp4 .= '<li>' . 'Alerts' . '</li>';
					}
					$__vars['bonusInfo'] = $__templater->preEscaped('
							<ul class="listInline listInline--bullet">
								' . $__compilerTemp2 . '
								' . $__compilerTemp3 . '
								' . $__compilerTemp4 . '
							</ul>
						');
					$__compilerTemp1 .= '

						' . $__templater->callMacro(null, 'ams_author_watch_item', array(
						'author' => $__vars['author'],
						'chooseName' => 'ids',
						'bonusInfo' => $__vars['bonusInfo'],
					), $__vars) . '
					';
				}
				$__compilerTemp1 .= '
				';
			}
		}
		$__finalCompiled .= $__templater->form('

		<div class="block-outer">' . $__templater->func('trim', array('
			' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'watched/ams-authors',
			'wrapperclass' => 'block-outer-main',
			'perPage' => $__vars['perPage'],
		))) . '
		'), false) . '</div>

		<div class="block-container">
			<div class="block-body">
				' . $__compilerTemp1 . '
			</div>
			<div class="block-footer block-footer--split">
				<span class="block-footer-counter"></span>
				<span class="block-footer-select">' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'check-all' => '< .block-container',
			'label' => 'Select all',
			'_type' => 'option',
		))) . '</span>
				<span class="block-footer-controls">
					' . $__templater->formSelect(array(
			'name' => 'watch_action',
			'class' => 'input--inline',
		), array(array(
			'label' => 'With selected' . $__vars['xf']['language']['ellipsis'],
			'_type' => 'option',
		),
		array(
			'value' => 'send_email:on',
			'label' => 'Enable email notification',
			'_type' => 'option',
		),
		array(
			'value' => 'send_email:off',
			'label' => 'Disable email notification',
			'_type' => 'option',
		),
		array(
			'value' => 'send_alert:on',
			'label' => 'Enable alerts',
			'_type' => 'option',
		),
		array(
			'value' => 'send_alert:off',
			'label' => 'Disable alerts',
			'_type' => 'option',
		),
		array(
			'value' => 'delete',
			'label' => 'Stop watching',
			'_type' => 'option',
		))) . '
					' . $__templater->button('Go', array(
			'type' => 'submit',
		), '', array(
		)) . '
				</span>
			</div>
		</div>

		<div class="block-outer block-outer--after">
			' . $__templater->func('page_nav', array(array(
			'link' => 'watched/ams-authors',
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'perPage' => $__vars['perPage'],
		))) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('watched/ams-authors/update', ), false),
			'ajax' => 'true',
			'class' => 'block',
			'autocomplete' => 'off',
		)) . '
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'You are not watching any authors.' . '</div>
';
	}
	$__finalCompiled .= '


';
	return $__finalCompiled;
}
);