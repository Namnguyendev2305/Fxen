<?php
// FROM HASH: 5e2b94a983f1038fde733961c5e6c459
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Xóa bài viết');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['thread'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['post'], 'isFirstPost', array())) {
		$__compilerTemp1 .= '
				' . $__templater->formInfoRow('
					<div class="blockMessage blockMessage--important"><strong>' . 'Chú ý' . $__vars['xf']['language']['label_separator'] . '</strong> ' . 'Đây là bài viết đầu tiên trong chủ đề. Xóa nó là sẽ xóa toàn bộ chủ đề.' . '</div>
				', array(
		)) . '
			';
	}
	$__compilerTemp2 = '';
	if ($__templater->method($__vars['post'], 'canSendModeratorActionAlert', array())) {
		$__compilerTemp2 .= '
				' . $__templater->callMacro('helper_action', 'author_alert', array(), $__vars) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '
			' . $__templater->callMacro('helper_action', 'delete_type', array(
		'canHardDelete' => $__templater->method($__vars['post'], 'canDelete', array('hard', )),
	), $__vars) . '

			' . $__compilerTemp2 . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
	' . $__templater->func('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->func('link', array('posts/delete', $__vars['post'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);