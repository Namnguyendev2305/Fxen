<?php
// FROM HASH: a66e91bb1cfa0e71f09563352aa99082
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Xác nhận hành động');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['hasChildren']) {
		$__compilerTemp1 .= '
				' . $__templater->formInfoRow('
					<p class="block-rowMessage block-rowMessage--warning block-rowMessage--iconic">
						<strong>' . 'Chú ý' . $__vars['xf']['language']['label_separator'] . '</strong>
						' . 'Deleting this item will also delete any and all of its child items. If you do not want this to happen, assign any child items a new parent item before continuing with this deletion.' . '
					</p>
				', array(
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Vui lòng xác nhận rằng bạn muốn xóa những điều sau' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('admin-navigation/edit', $__vars['navigation'], ), true) . '">' . $__templater->escape($__vars['navigation']['title']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__compilerTemp1 . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>

	' . $__templater->func('redirect_input', array(null, null, true)) . '

', array(
		'action' => $__templater->func('link', array('admin-navigation/delete', $__vars['navigation'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);