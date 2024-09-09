<?php
// FROM HASH: 899871211d82d7de29c3fd7d6f8d160f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['category']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Featured articles' . ' - ' . $__templater->escape($__vars['category']['title']));
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageH1'] = $__templater->preEscaped('Featured articles');
		$__finalCompiled .= '
	';
		$__templater->breadcrumbs($__templater->method($__vars['category'], 'getBreadcrumbs', array()));
		$__finalCompiled .= '
	
	' . $__templater->callMacro('xa_ams_article_page_macros', 'article_page_options', array(
			'category' => $__vars['category'],
		), $__vars) . '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Featured articles');
		$__finalCompiled .= '
	
	';
		$__templater->setPageParam('searchConstraints', array('Articles' => array('search_type' => 'ams_article', ), ));
		$__finalCompiled .= '
';
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

<div class="block" data-xf-init="' . ($__vars['canInlineMod'] ? 'inline-mod' : '') . '" data-type="ams_article" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
	<div class="block-outer">';
	$__compilerTemp1 = '';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
						';
	if ($__vars['canInlineMod']) {
		$__compilerTemp2 .= '
							' . $__templater->callMacro('inline_mod_macros', 'button', array(), $__vars) . '
						';
	}
	$__compilerTemp2 .= '
					';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__compilerTemp1 .= '
			<div class="block-outer-opposite">
				<div class="buttonGroup">
					' . $__compilerTemp2 . '
				</div>
			</div>
		';
	}
	$__finalCompiled .= $__templater->func('trim', array('

		' . $__compilerTemp1 . '

	'), false) . '</div>

	<div class="block-container">
		<div class="block-body">
			';
	if (!$__templater->test($__vars['articles'], 'empty', array())) {
		$__finalCompiled .= '
				<div class="structItemContainer structItemContainerAmsListView">
					';
		if ($__templater->isTraversable($__vars['articles'])) {
			foreach ($__vars['articles'] AS $__vars['article']) {
				$__finalCompiled .= '
						' . $__templater->callMacro('xa_ams_article_list_macros', 'list_view_layout', array(
					'article' => $__vars['article'],
				), $__vars) . '
					';
			}
		}
		$__finalCompiled .= '
				</div>
			';
	} else {
		$__finalCompiled .= '
				<div class="block-row">' . 'No articles have been featured yet' . '</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
	<div class="block-outer block-outer--after">
		' . $__templater->func('show_ignored', array(array(
		'wrapperclass' => 'block-outer-opposite',
	))) . '
	</div>
</div>';
	return $__finalCompiled;
}
);