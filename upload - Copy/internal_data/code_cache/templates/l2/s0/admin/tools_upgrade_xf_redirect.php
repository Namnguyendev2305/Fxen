<?php
// FROM HASH: bb435256e738516b78ba6ef7ee06573f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Upgrade XenForo');
	$__finalCompiled .= '

<form action="' . $__templater->escape($__vars['upgraderUrl']) . '" method="post" class="blockMessage" data-xf-init="auto-submit">

	<div>' . 'Starting upgrade' . $__vars['xf']['language']['ellipsis'] . '</div>

	<div class="u-noJsOnly">
		' . $__templater->button('Tiến hành' . $__vars['xf']['language']['ellipsis'], array(
		'type' => 'submit',
	), '', array(
	)) . '
	</div>

	' . $__templater->func('csrf_input') . '
	' . $__templater->formHiddenVal('key', $__vars['upgradeKey'], array(
	)) . '
</form>';
	return $__finalCompiled;
}
);