<?php
// FROM HASH: cb3e093afa763e9560e2142ad9893135
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Bỏ qua');
	$__finalCompiled .= '

';
	$__templater->wrapTemplate('account_wrapper', $__vars);
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<ol class="block-body">
			';
	$__compilerTemp1 = true;
	if ($__templater->isTraversable($__vars['ignoring'])) {
		foreach ($__vars['ignoring'] AS $__vars['user']) {
			$__compilerTemp1 = false;
			$__finalCompiled .= '
				<li class="block-row block-row--separated">
					';
			$__compilerTemp2 = '';
			if ($__templater->method($__vars['xf']['visitor'], 'isIgnoring', array($__vars['user'], )) OR $__templater->method($__vars['xf']['visitor'], 'canIgnoreUser', array($__vars['user'], ))) {
				$__compilerTemp2 .= '
							' . $__templater->button('
								' . ($__templater->method($__vars['xf']['visitor'], 'isIgnoring', array($__vars['user'], )) ? 'Bỏ ra khỏi danh sách đen' : 'Lờ đi') . '
							', array(
					'href' => $__templater->func('link', array('members/ignore', $__vars['user'], ), false),
					'class' => 'button--link',
					'data-xf-click' => 'switch',
					'data-sk-ignore' => 'Lờ đi',
					'data-sk-unignore' => 'Bỏ ra khỏi danh sách đen',
				), '', array(
				)) . '
						';
			}
			$__vars['switchLink'] = $__templater->preEscaped('
						' . $__compilerTemp2 . '
					');
			$__finalCompiled .= '
					' . $__templater->callMacro('member_list_macros', 'item', array(
				'user' => $__vars['user'],
				'extraData' => $__vars['switchLink'],
			), $__vars) . '
				</li>
			';
		}
	}
	if ($__compilerTemp1) {
		$__finalCompiled .= '
				<div class="block-row">' . 'Bạn hiện không bỏ qua bất kỳ thành viên nào.' . '</div>
			';
	}
	$__finalCompiled .= '
		</ol>
	</div>
</div>';
	return $__finalCompiled;
}
);