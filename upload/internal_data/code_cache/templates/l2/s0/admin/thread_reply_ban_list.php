<?php
// FROM HASH: 4b884d9cb9f13d202b3798349756f93c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Chủ đề trả lời cấm túc');
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['bans'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['bans'])) {
			foreach ($__vars['bans'] AS $__vars['ban']) {
				$__compilerTemp1 .= '
						';
				$__compilerTemp2 = '';
				if ($__vars['ban']['reason']) {
					$__compilerTemp2 .= '
									' . $__templater->escape($__vars['ban']['reason']) . '
								';
				} else {
					$__compilerTemp2 .= '
									' . 'N/A' . '
								';
				}
				$__compilerTemp3 = '';
				if ($__vars['ban']['expiry_date']) {
					$__compilerTemp3 .= '
									' . $__templater->func('date_dynamic', array($__vars['ban']['expiry_date'], array(
					))) . '
								';
				} else {
					$__compilerTemp3 .= '
									' . 'Vĩnh viễn' . '
								';
				}
				$__compilerTemp1 .= $__templater->dataRow(array(
					'rowclass' => 'dataList-row--noHover',
				), array(array(
					'_type' => 'cell',
					'html' => '
								' . $__templater->func('username_link', array($__vars['ban']['User'], false, array(
					'href' => $__templater->func('link', array('users/edit', $__vars['ban']['User'], ), false),
				))) . '
							',
				),
				array(
					'_type' => 'cell',
					'html' => '
								<a href="' . $__templater->func('link_type', array('public', 'threads', $__vars['ban']['Thread'], ), true) . '">' . $__templater->escape($__vars['ban']['Thread']['title']) . '</a>
							',
				),
				array(
					'_type' => 'cell',
					'html' => '
								' . $__compilerTemp2 . '
							',
				),
				array(
					'_type' => 'cell',
					'html' => '
								' . $__compilerTemp3 . '
							',
				),
				array(
					'href' => $__templater->func('link', array('threads/reply-bans/delete', $__vars['ban'], ), false),
					'overlay' => 'true',
					'_type' => 'delete',
					'html' => '',
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-outer">
			<span class="filterBlock">
				' . $__templater->formTextBox(array(
			'name' => 'username',
			'value' => $__vars['user']['username'],
			'class' => 'input filterBlock-input',
			'ac' => 'single',
			'placeholder' => 'Tên thành viên' . $__vars['xf']['language']['ellipsis'],
		)) . '

				' . $__templater->button('Lọc', array(
			'type' => 'submit',
			'class' => 'button--small',
		), '', array(
		)) . '
			</span>
		</div>
		<div class="block-container">
			<div class="block-body">
				' . $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => 'Thành viên',
		),
		array(
			'_type' => 'cell',
			'html' => 'Chủ đề',
		),
		array(
			'_type' => 'cell',
			'html' => 'Lý do',
		),
		array(
			'_type' => 'cell',
			'html' => 'Ngày kết thúc',
		),
		array(
			'_type' => 'cell',
			'html' => '',
		))) . '
					' . $__compilerTemp1 . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			</div>
			<div class="block-footer">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['bans'], $__vars['total'], ), true) . '</span>
			</div>
		</div>

		' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'threads/reply-bans',
			'params' => $__vars['linkParams'],
			'wrapperclass' => 'block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
	', array(
			'action' => $__templater->func('link', array('threads/reply-bans', ), false),
			'class' => 'block',
		)) . '
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'Không tìm thấy.' . '</div>
';
	}
	return $__finalCompiled;
}
);