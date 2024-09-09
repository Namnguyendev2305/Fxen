<?php
// FROM HASH: 22f8bb5ed7382c89e362982dd4306825
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Article content find / replace');
	$__finalCompiled .= '

';
	if ($__vars['articles']) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['articles'])) {
			foreach ($__vars['articles'] AS $__vars['article']) {
				$__compilerTemp1 .= '
						';
				$__vars['i'] = 0;
				if ($__templater->isTraversable($__vars['article']['found'])) {
					foreach ($__vars['article']['found'] AS $__vars['key'] => $__vars['found']) {
						$__vars['i']++;
						$__compilerTemp1 .= '
							';
						$__compilerTemp2 = array();
						if ($__vars['i'] == 1) {
							$__compilerTemp2[] = array(
								'class' => 'dataList-cell--min dataList-cell--alt',
								'rowspan' => $__templater->func('count', array($__vars['article']['found'], ), false),
								'style' => ((($__templater->func('count', array($__vars['article']['found'], ), false) > 1)) ? 'border-bottom: none;' : ''),
								'href' => $__templater->func('link_type', array('public', 'ams', $__vars['article'], ), false),
								'target' => '_blank',
								'label' => $__templater->filter($__vars['article']['article_id'], array(array('number', array()),), true),
								'_type' => 'main',
								'html' => '',
							);
						}
						$__compilerTemp2[] = array(
							'class' => 'dataList-cell--separated',
							'_type' => 'cell',
							'html' => '
									' . $__templater->escape($__vars['found']) . '
								',
						);
						$__compilerTemp2[] = array(
							'class' => 'dataList-cell--separated',
							'_type' => 'cell',
							'html' => '
									' . $__templater->escape($__vars['article']['replaced'][$__vars['key']]) . '
								',
						);
						$__compilerTemp1 .= $__templater->dataRow(array(
							'rowclass' => 'dataList-row--noHover',
						), $__compilerTemp2) . '
						';
					}
				}
				$__compilerTemp1 .= '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'class' => 'dataList-cell--min',
			'_type' => 'cell',
			'html' => 'Article Id',
		),
		array(
			'_type' => 'cell',
			'html' => 'Matched text',
		),
		array(
			'_type' => 'cell',
			'html' => 'Replacement text',
		))) . '
					' . $__compilerTemp1 . '
				', array(
			'class' => 'dataList--contained',
			'data-xf-init' => 'responsive-data-list',
		)) . '
				<div class="block-footer">
					<span class="block-footer-counter">' . $__templater->func('display_totals', array($__templater->func('count', array($__vars['articles'], ), false), ), true) . '</span>
				</div>
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['articlePages']) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				';
		$__compilerTemp3 = '';
		if ($__templater->isTraversable($__vars['articlePages'])) {
			foreach ($__vars['articlePages'] AS $__vars['articlePage']) {
				$__compilerTemp3 .= '
						';
				$__vars['i'] = 0;
				if ($__templater->isTraversable($__vars['articlePage']['found'])) {
					foreach ($__vars['articlePage']['found'] AS $__vars['key'] => $__vars['found']) {
						$__vars['i']++;
						$__compilerTemp3 .= '
							';
						$__compilerTemp4 = array();
						if ($__vars['i'] == 1) {
							$__compilerTemp4[] = array(
								'class' => 'dataList-cell--min dataList-cell--alt',
								'rowspan' => $__templater->func('count', array($__vars['articlePage']['found'], ), false),
								'style' => ((($__templater->func('count', array($__vars['articlePage']['found'], ), false) > 1)) ? 'border-bottom: none;' : ''),
								'href' => $__templater->func('link_type', array('public', 'ams/page', $__vars['articlePage'], ), false),
								'target' => '_blank',
								'label' => $__templater->filter($__vars['articlePage']['page_id'], array(array('number', array()),), true),
								'_type' => 'main',
								'html' => '',
							);
						}
						$__compilerTemp4[] = array(
							'class' => 'dataList-cell--separated',
							'_type' => 'cell',
							'html' => '
									' . $__templater->escape($__vars['found']) . '
								',
						);
						$__compilerTemp4[] = array(
							'class' => 'dataList-cell--separated',
							'_type' => 'cell',
							'html' => '
									' . $__templater->escape($__vars['articlePage']['replaced'][$__vars['key']]) . '
								',
						);
						$__compilerTemp3 .= $__templater->dataRow(array(
							'rowclass' => 'dataList-row--noHover',
						), $__compilerTemp4) . '
						';
					}
				}
				$__compilerTemp3 .= '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'class' => 'dataList-cell--min',
			'_type' => 'cell',
			'html' => 'Article Page Id',
		),
		array(
			'_type' => 'cell',
			'html' => 'Matched text',
		),
		array(
			'_type' => 'cell',
			'html' => 'Replacement text',
		))) . '
					' . $__compilerTemp3 . '
				', array(
			'class' => 'dataList--contained',
			'data-xf-init' => 'responsive-data-list',
		)) . '
				<div class="block-footer">
					<span class="block-footer-counter">' . $__templater->func('display_totals', array($__templater->func('count', array($__vars['articlePages'], ), false), ), true) . '</span>
				</div>
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['articleComments']) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				';
		$__compilerTemp5 = '';
		if ($__templater->isTraversable($__vars['articleComments'])) {
			foreach ($__vars['articleComments'] AS $__vars['articleComment']) {
				$__compilerTemp5 .= '
						';
				$__vars['i'] = 0;
				if ($__templater->isTraversable($__vars['articleComment']['found'])) {
					foreach ($__vars['articleComment']['found'] AS $__vars['key'] => $__vars['found']) {
						$__vars['i']++;
						$__compilerTemp5 .= '
							';
						$__compilerTemp6 = array();
						if ($__vars['i'] == 1) {
							$__compilerTemp6[] = array(
								'class' => 'dataList-cell--min dataList-cell--alt',
								'rowspan' => $__templater->func('count', array($__vars['articleComment']['found'], ), false),
								'style' => ((($__templater->func('count', array($__vars['articleComment']['found'], ), false) > 1)) ? 'border-bottom: none;' : ''),
								'href' => $__templater->func('link_type', array('public', 'ams/comments', $__vars['articleComment'], ), false),
								'target' => '_blank',
								'label' => $__templater->filter($__vars['articleComment']['comment_id'], array(array('number', array()),), true),
								'_type' => 'main',
								'html' => '',
							);
						}
						$__compilerTemp6[] = array(
							'class' => 'dataList-cell--separated',
							'_type' => 'cell',
							'html' => '
									' . $__templater->escape($__vars['found']) . '
								',
						);
						$__compilerTemp6[] = array(
							'class' => 'dataList-cell--separated',
							'_type' => 'cell',
							'html' => '
									' . $__templater->escape($__vars['articleComment']['replaced'][$__vars['key']]) . '
								',
						);
						$__compilerTemp5 .= $__templater->dataRow(array(
							'rowclass' => 'dataList-row--noHover',
						), $__compilerTemp6) . '
						';
					}
				}
				$__compilerTemp5 .= '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'class' => 'dataList-cell--min',
			'_type' => 'cell',
			'html' => 'Article Comment Id',
		),
		array(
			'_type' => 'cell',
			'html' => 'Matched text',
		),
		array(
			'_type' => 'cell',
			'html' => 'Replacement text',
		))) . '
					' . $__compilerTemp5 . '
				', array(
			'class' => 'dataList--contained',
			'data-xf-init' => 'responsive-data-list',
		)) . '
				<div class="block-footer">
					<span class="block-footer-counter">' . $__templater->func('display_totals', array($__templater->func('count', array($__vars['articleComments'], ), false), ), true) . '</span>
				</div>
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['articleReviews']) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				';
		$__compilerTemp7 = '';
		if ($__templater->isTraversable($__vars['articleReviews'])) {
			foreach ($__vars['articleReviews'] AS $__vars['articleReview']) {
				$__compilerTemp7 .= '
						';
				$__vars['i'] = 0;
				if ($__templater->isTraversable($__vars['articleReview']['found'])) {
					foreach ($__vars['articleReview']['found'] AS $__vars['key'] => $__vars['found']) {
						$__vars['i']++;
						$__compilerTemp7 .= '
							';
						$__compilerTemp8 = array();
						if ($__vars['i'] == 1) {
							$__compilerTemp8[] = array(
								'class' => 'dataList-cell--min dataList-cell--alt',
								'rowspan' => $__templater->func('count', array($__vars['articleReview']['found'], ), false),
								'style' => ((($__templater->func('count', array($__vars['articleReview']['found'], ), false) > 1)) ? 'border-bottom: none;' : ''),
								'href' => $__templater->func('link_type', array('public', 'ams/review', $__vars['articleReview'], ), false),
								'target' => '_blank',
								'label' => $__templater->filter($__vars['articleReview']['rating_id'], array(array('number', array()),), true),
								'_type' => 'main',
								'html' => '',
							);
						}
						$__compilerTemp8[] = array(
							'class' => 'dataList-cell--separated',
							'_type' => 'cell',
							'html' => '
									' . $__templater->escape($__vars['found']) . '
								',
						);
						$__compilerTemp8[] = array(
							'class' => 'dataList-cell--separated',
							'_type' => 'cell',
							'html' => '
									' . $__templater->escape($__vars['articleReview']['replaced'][$__vars['key']]) . '
								',
						);
						$__compilerTemp7 .= $__templater->dataRow(array(
							'rowclass' => 'dataList-row--noHover',
						), $__compilerTemp8) . '
						';
					}
				}
				$__compilerTemp7 .= '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'class' => 'dataList-cell--min',
			'_type' => 'cell',
			'html' => 'Article Review Id',
		),
		array(
			'_type' => 'cell',
			'html' => 'Matched text',
		),
		array(
			'_type' => 'cell',
			'html' => 'Replacement text',
		))) . '
					' . $__compilerTemp7 . '
				', array(
			'class' => 'dataList--contained',
			'data-xf-init' => 'responsive-data-list',
		)) . '
				<div class="block-footer">
					<span class="block-footer-counter">' . $__templater->func('display_totals', array($__templater->func('count', array($__vars['articleReviews'], ), false), ), true) . '</span>
				</div>
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'quick_find',
		'value' => $__vars['input']['quick_find'],
	), array(
		'label' => 'Quick find',
		'explain' => 'Perform the replacement only in articles, article pages, comments and reviews whose message contains this exact text.',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formTextBoxRow(array(
		'name' => 'regex',
		'value' => $__vars['input']['regex'],
	), array(
		'label' => 'Biểu thức chính quy',
		'explain' => 'Enter a full, valid PCRE regular expression.',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'replace',
		'value' => $__vars['input']['replace'],
	), array(
		'label' => 'Replacement string',
		'explain' => 'Enter the string with which text that matches the regular expression will be replaced.',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'commit',
		'label' => 'Save changes',
		'explain' => 'If unchecked, this tool will just test the replacement.',
		'_type' => 'option',
	)), array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Tiến hành',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('xa-ams-article-replace/replace', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);