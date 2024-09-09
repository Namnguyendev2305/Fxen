<?php
// FROM HASH: 11905741eb8ceced5bd5bc9ec033d1b4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Change article dates');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['article'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['hours'])) {
		foreach ($__vars['hours'] AS $__vars['hour']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['hour'],
				'label' => $__templater->escape($__vars['hour']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp2 = array();
	if ($__templater->isTraversable($__vars['minutes'])) {
		foreach ($__vars['minutes'] AS $__vars['minute']) {
			$__compilerTemp2[] = array(
				'value' => $__vars['minute'],
				'label' => $__templater->escape($__vars['minute']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp3 = array();
	if ($__templater->isTraversable($__vars['hours'])) {
		foreach ($__vars['hours'] AS $__vars['hour']) {
			$__compilerTemp3[] = array(
				'value' => $__vars['hour'],
				'label' => $__templater->escape($__vars['hour']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp4 = array();
	if ($__templater->isTraversable($__vars['minutes'])) {
		foreach ($__vars['minutes'] AS $__vars['minute']) {
			$__compilerTemp4[] = array(
				'value' => $__vars['minute'],
				'label' => $__templater->escape($__vars['minute']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp5 = $__templater->mergeChoiceOptions(array(), $__vars['timeZones']);
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('
				<div class="inputGroup">
					' . $__templater->formDateInput(array(
		'name' => 'article_publish_date',
		'value' => ($__vars['articlePublishDate'] ? $__templater->func('date', array($__vars['articlePublishDate'], 'picker', ), false) : ''),
	)) . '
					<span class="inputGroup-text">
						' . 'Time' . $__vars['xf']['language']['label_separator'] . '
					</span>
					<span class="inputGroup" dir="ltr">
						' . $__templater->formSelect(array(
		'name' => 'article_publish_hour',
		'value' => $__vars['articlePublishHour'],
		'class' => 'input--inline input--autoSize',
	), $__compilerTemp1) . '
						<span class="inputGroup-text">:</span>
						' . $__templater->formSelect(array(
		'name' => 'article_publish_minute',
		'value' => $__vars['articlePublishMinute'],
		'class' => 'input--inline input--autoSize',
	), $__compilerTemp2) . '
					</span>
				</div>
			', array(
		'label' => 'Publish date',
	)) . '

			' . $__templater->formRow('
				<div class="inputGroup">
					' . $__templater->formDateInput(array(
		'name' => 'article_last_update_date',
		'value' => ($__vars['articleLastUpdateDate'] ? $__templater->func('date', array($__vars['articleLastUpdateDate'], 'picker', ), false) : ''),
	)) . '
					<span class="inputGroup-text">
						' . 'Time' . $__vars['xf']['language']['label_separator'] . '
					</span>
					<span class="inputGroup" dir="ltr">
						' . $__templater->formSelect(array(
		'name' => 'article_last_update_hour',
		'value' => $__vars['articleLastUpdateHour'],
		'class' => 'input--inline input--autoSize',
	), $__compilerTemp3) . '
						<span class="inputGroup-text">:</span>
						' . $__templater->formSelect(array(
		'name' => 'article_last_update_minute',
		'value' => $__vars['articleLastUpdateMinute'],
		'class' => 'input--inline input--autoSize',
	), $__compilerTemp4) . '
					</span>
				</div>
			', array(
		'label' => 'Last update',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'article_timezone',
		'value' => ($__vars['article']['publish_date_timezone'] ? $__vars['article']['publish_date_timezone'] : $__vars['xf']['visitor']['timezone']),
	), $__compilerTemp5, array(
	)) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('ams/change-dates', $__vars['article'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);