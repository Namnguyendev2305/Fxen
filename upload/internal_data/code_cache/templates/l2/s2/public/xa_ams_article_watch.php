<?php
// FROM HASH: 67d3a711e03d1f0a40039c3576e72191
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['isWatched']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Unwatch article');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Watch article');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['article'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['isWatched']) {
		$__compilerTemp1 .= '
				' . $__templater->formInfoRow('
					' . 'Are you sure you want to unwatch this article?' . '
				', array(
			'rowtype' => 'confirm',
		)) . '

				' . $__templater->formHiddenVal('stop', '1', array(
		)) . '
			';
	} else {
		$__compilerTemp1 .= '
				' . $__templater->formRadioRow(array(
			'name' => 'email_subscribe',
			'value' => (($__vars['xf']['visitor']['Option']['interaction_watch_state'] == 'watch_email') ? 1 : 0),
		), array(array(
			'value' => '1',
			'label' => 'và nhận email thông báo',
			'_type' => 'option',
		),
		array(
			'value' => '0',
			'label' => 'không nhận email thông báo',
			'_type' => 'option',
		)), array(
			'rowtype' => 'noColon',
			'label' => 'Watch this article' . $__vars['xf']['language']['ellipsis'],
		)) . '
			';
	}
	$__compilerTemp2 = '';
	if ($__vars['isWatched']) {
		$__compilerTemp2 .= '
			' . $__templater->formSubmitRow(array(
			'submit' => 'Bỏ theo dõi',
			'icon' => 'notificationsOff',
		), array(
			'rowtype' => 'simple',
		)) . '
		';
	} else {
		$__compilerTemp2 .= '
			' . $__templater->formSubmitRow(array(
			'submit' => 'Theo dõi',
			'icon' => 'notificationsOn',
		), array(
		)) . '
		';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '
		</div>
		' . $__compilerTemp2 . '
	</div>
', array(
		'action' => $__templater->func('link', array('ams/watch', $__vars['article'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);