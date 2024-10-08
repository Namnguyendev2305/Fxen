<?php
// FROM HASH: 86db6280ad03906067d54362e5eaf414
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Chủ đề đã theo dõi');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['threads'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['threads'])) {
			foreach ($__vars['threads'] AS $__vars['thread']) {
				$__compilerTemp1 .= '
						';
				$__vars['extra'] = ($__vars['thread']['Watch'][$__vars['xf']['visitor']['user_id']]['email_subscribe'] ? 'Email' : '');
				$__compilerTemp1 .= '
						' . $__templater->callMacro('thread_list_macros', 'item', array(
					'thread' => $__vars['thread'],
					'chooseName' => 'thread_ids',
					'showWatched' => false,
					'extraInfo' => $__vars['extra'],
					'allowEdit' => false,
				), $__vars) . '
					';
			}
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-outer">
			' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'watched/threads',
			'wrapperclass' => 'block-outer-main',
			'perPage' => $__vars['perPage'],
		))) . '
			<div class="block-outer-opposite">
				' . $__templater->button('Quản lý các chủ đề theo dõi', array(
			'class' => 'button--link menuTrigger',
			'data-xf-click' => 'menu',
			'aria-expanded' => 'false',
			'aria-haspopup' => 'true',
		), '', array(
		)) . '
				<div class="menu" data-menu="menu" aria-hidden="true">
					<div class="menu-content">
						<h3 class="menu-header">' . 'Quản lý các chủ đề theo dõi' . '</h3>
						' . '
						<a href="' . $__templater->func('link', array('watched/threads/manage', null, array('state' => 'watch_no_email', ), ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Tắt thông báo email' . '</a>
						<a href="' . $__templater->func('link', array('watched/threads/manage', null, array('state' => 'delete', ), ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Ngừng theo dõi chủ đề' . '</a>
						' . '
					</div>
				</div>
			</div>
		</div>

		<div class="block-container">
			<div class="block-body">
				<div class="structItemContainer">
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
			'name' => 'state',
			'class' => 'input--inline',
		), array(array(
			'label' => 'Với lựa chọn' . $__vars['xf']['language']['ellipsis'],
			'_type' => 'option',
		),
		array(
			'value' => 'watch_email',
			'label' => 'Bật thông báo email',
			'_type' => 'option',
		),
		array(
			'value' => 'watch_no_email',
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

		' . $__templater->func('page_nav', array(array(
			'link' => 'watched/threads',
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'wrapperclass' => 'block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '

		' . $__templater->func('show_ignored', array(array(
			'wrapperclass' => 'block-outer block-outer-opposite block-outer--after',
		))) . '
	', array(
			'action' => $__templater->func('link', array('watched/threads/update', ), false),
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
			' . 'Không có chủ đề nào được hiển thị.' . '
		';
		} else {
			$__finalCompiled .= '
			<p>' . 'Bạn không theo dõi bất kỳ một chủ đề nào.' . '</p>
			<div>' . 'Hiển thị tất cả' . $__vars['xf']['language']['label_separator'] . '</div>
			<ul>
				<li><a href="' . $__templater->func('link', array('find-threads/started', ), true) . '">' . 'Chủ đề bạn đã bắt đầu' . '</a></li>
				<li><a href="' . $__templater->func('link', array('find-threads/contributed', ), true) . '">' . 'Các chủ đề mà bạn đã tham gia' . '</a></li>
			</ul>
		';
		}
		$__finalCompiled .= '
	</div>
';
	}
	return $__finalCompiled;
}
);