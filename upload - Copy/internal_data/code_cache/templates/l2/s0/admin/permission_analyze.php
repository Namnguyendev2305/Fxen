<?php
// FROM HASH: 444830560171ef835f8e1305a455615d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Phân tích quyền');
	$__finalCompiled .= '
';
	$__templater->pageParams['pageDescription'] = $__templater->preEscaped('Công cụ này cho phép bạn phân tích các thành phần cá nhân tạo nên sự cho phép thiết lập cho người dùng. Nó đặc biệt hữu ích cho việc xác định lý do tại sao sự cho phép không được áp dụng như bạn mong đợi.');
	$__templater->pageParams['pageDescriptionMeta'] = true;
	$__finalCompiled .= '

';
	if ($__vars['analysis']) {
		$__finalCompiled .= '
	';
		$__vars['interfaceGroups'] = $__vars['permissionData']['interfaceGroups'];
		$__finalCompiled .= '
	';
		$__vars['permissionsGrouped'] = $__vars['permissionData']['permissionsGrouped'];
		$__finalCompiled .= '
	';
		$__vars['permissionsGroupedType'] = $__vars['permissionData']['permissionsGroupedType'];
		$__finalCompiled .= '

	';
		if ($__templater->isTraversable($__vars['interfaceGroups'])) {
			foreach ($__vars['interfaceGroups'] AS $__vars['interfaceGroupId'] => $__vars['interfaceGroup']) {
				$__finalCompiled .= '
		';
				$__compilerTemp1 = '';
				$__compilerTemp1 .= '
			';
				if ($__templater->isTraversable($__vars['permissionsGrouped'][$__vars['interfaceGroupId']])) {
					foreach ($__vars['permissionsGrouped'][$__vars['interfaceGroupId']] AS $__vars['permission']) {
						$__compilerTemp1 .= '
				';
						if ($__vars['analysis'][$__vars['permission']['permission_group_id']][$__vars['permission']['permission_id']]) {
							$__compilerTemp1 .= '
					';
							$__vars['permAnalysis'] = $__vars['analysis'][$__vars['permission']['permission_group_id']][$__vars['permission']['permission_id']];
							$__compilerTemp1 .= '
					';
							$__compilerTemp2 = '';
							if ($__vars['permission']['permission_type'] == 'flag') {
								$__compilerTemp2 .= '
							';
								if ($__vars['permAnalysis']['final']) {
									$__compilerTemp2 .= '
								' . 'Có' . '
							';
								} else {
									$__compilerTemp2 .= '
								' . 'Không' . '
							';
								}
								$__compilerTemp2 .= '
						';
							} else {
								$__compilerTemp2 .= '
							';
								if ($__vars['permAnalysis']['final'] == -1) {
									$__compilerTemp2 .= '
								' . 'Không giới hạn' . '
							';
								} else {
									$__compilerTemp2 .= '
								' . $__templater->escape($__vars['permAnalysis']['final']) . '
							';
								}
								$__compilerTemp2 .= '
						';
							}
							$__compilerTemp3 = '';
							if ($__templater->isTraversable($__vars['permAnalysis']['intermediates'])) {
								foreach ($__vars['permAnalysis']['intermediates'] AS $__vars['intermediate']) {
									$__compilerTemp3 .= '
								<dl class="pairs pairs--columns">
									<dt>';
									$__compilerTemp4 = '';
									if ($__vars['intermediate']['type'] == 'system') {
										$__compilerTemp4 .= '
											';
										if ($__vars['intermediate']['contentId']) {
											$__compilerTemp4 .= '
												' . $__templater->escape($__vars['intermediate']['contentTitle']) . ' - ' . 'Content-wide' . '
											';
										} else {
											$__compilerTemp4 .= '
												' . 'Global value' . '
											';
										}
										$__compilerTemp4 .= '
										';
									} else if ($__vars['intermediate']['type'] == 'group') {
										$__compilerTemp4 .= '
											';
										if ($__vars['intermediate']['contentId']) {
											$__compilerTemp4 .= '
												' . $__templater->escape($__vars['intermediate']['contentTitle']) . ' - ' . $__templater->escape($__vars['userGroupTitles'][$__vars['intermediate']['typeId']]) . '
											';
										} else {
											$__compilerTemp4 .= '
												' . $__templater->escape($__vars['userGroupTitles'][$__vars['intermediate']['typeId']]) . '
											';
										}
										$__compilerTemp4 .= '
										';
									} else if ($__vars['intermediate']['type'] == 'user') {
										$__compilerTemp4 .= '
											';
										if ($__vars['intermediate']['contentId']) {
											$__compilerTemp4 .= '
												' . $__templater->escape($__vars['intermediate']['contentTitle']) . ' - ' . 'User value' . '
											';
										} else {
											$__compilerTemp4 .= '
												' . 'User value' . '
											';
										}
										$__compilerTemp4 .= '
										';
									}
									$__compilerTemp3 .= $__templater->func('trim', array('
										' . $__compilerTemp4 . '
									'), false) . '</dt>
									<dd>
										';
									if ($__vars['permission']['permission_type'] == 'flag') {
										$__compilerTemp3 .= '
											';
										if ($__vars['intermediate']['value'] == 'deny') {
											$__compilerTemp3 .= 'Không bao giờ' . '
											';
										} else if ($__vars['intermediate']['value'] == 'content_allow') {
											$__compilerTemp3 .= 'Có' . '
											';
										} else if ($__vars['intermediate']['value'] == 'reset') {
											$__compilerTemp3 .= 'Không' . '
											';
										} else if ($__vars['intermediate']['value'] == 'allow') {
											$__compilerTemp3 .= 'Có' . '
											';
										} else if ($__vars['intermediate']['value'] == 'unset') {
											$__compilerTemp3 .= 'Không' . '
											';
										}
										$__compilerTemp3 .= '
										';
									} else {
										$__compilerTemp3 .= '
											';
										if ($__vars['intermediate']['value'] == -1) {
											$__compilerTemp3 .= '
												' . 'Không giới hạn' . '
											';
										} else {
											$__compilerTemp3 .= '
												' . $__templater->escape($__vars['intermediate']['value']) . '
											';
										}
										$__compilerTemp3 .= '
										';
									}
									$__compilerTemp3 .= '
									</dd>
								</dl>
							';
								}
							}
							$__compilerTemp5 = '';
							if ($__vars['permAnalysis']['dependChange']) {
								$__compilerTemp5 .= '
								';
								$__vars['parentPermission'] = $__vars['permissionsGroupedType'][$__vars['permission']['permission_group_id']][$__vars['permAnalysis']['dependChange']['by']];
								$__compilerTemp5 .= '
								<div>
									' . $__templater->fontAwesome('fa-exclamation-triangle', array(
									'class' => 'u-accentText',
								)) . '
									' . 'Requires \'' . $__templater->escape($__vars['parentPermission']['title']) . '\' permission' . '
								</div>
							';
							}
							$__compilerTemp1 .= $__templater->formRow('
						' . $__compilerTemp2 . '
						<a data-xf-click="toggle" role="button" tabindex="0">' . $__vars['xf']['language']['parenthesis_open'] . 'Chi tiết' . $__vars['xf']['language']['parenthesis_close'] . '</a>

						<div class="toggleTarget">
							' . $__compilerTemp3 . '
							' . $__compilerTemp5 . '
						</div>
					', array(
								'label' => $__templater->escape($__vars['permission']['title']),
							)) . '
				';
						}
						$__compilerTemp1 .= '
			';
					}
				}
				$__compilerTemp1 .= '
			';
				if (strlen(trim($__compilerTemp1)) > 0) {
					$__finalCompiled .= '
			<div class="block">
				<div class="block-container">
					<h3 class="block-header">' . $__templater->escape($__vars['interfaceGroup']['title']) . '</h3>
					<div class="block-body">
			' . $__compilerTemp1 . '
					</div>
				</div>
			</div>
		';
				}
				$__finalCompiled .= '
	';
			}
		}
		$__finalCompiled .= '

';
	}
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<h2 class="block-tabHeader tabs hScroller" data-xf-init="tabs h-scroller" role="tablist">
			<span class="hScroller-scroll">
				<a class="tabs-tab ' . (($__vars['contentType'] == '') ? 'is-active' : '') . '"
					role="tab" tabindex="0" aria-controls="analyze-global-permissions">' . 'Quyền tổng quát' . '</a>

				';
	if ($__templater->isTraversable($__vars['contentOptions'])) {
		foreach ($__vars['contentOptions'] AS $__vars['_contentType'] => $__vars['_contentPermission']) {
			if ($__vars['_contentPermission']['content']) {
				$__finalCompiled .= '
					<a class="tabs-tab ' . (($__vars['contentType'] == $__vars['_contentType']) ? 'is-active' : '') . '"
						role="tab" tabindex="0" aria-controls="analyze-' . $__templater->escape($__vars['contentType']) . '">' . $__templater->escape($__vars['_contentPermission']['title']) . '</a>
				';
			}
		}
	}
	$__finalCompiled .= '
			</span>
		</h2>

		<ul class="tabPanes">
			<li class="' . (($__vars['contentType'] == '') ? 'is-active' : '') . '" role="tabpanel" id="analyze-global-permissions">
				' . $__templater->form('
					<div class="block-body">
						' . $__templater->formTextBoxRow(array(
		'name' => 'username',
		'value' => $__vars['username'],
		'ac' => 'single',
	), array(
		'label' => 'Tên thành viên',
	)) . '
					</div>
					' . $__templater->formSubmitRow(array(
		'submit' => 'Phân tích',
	), array(
	)) . '
				', array(
		'action' => $__templater->func('link', array('permissions/analyze', ), false),
	)) . '
			</li>
			';
	if ($__templater->isTraversable($__vars['contentOptions'])) {
		foreach ($__vars['contentOptions'] AS $__vars['_contentType'] => $__vars['_contentPermission']) {
			if ($__vars['_contentPermission']['content']) {
				$__finalCompiled .= '
				<li class="' . (($__vars['contentType'] == $__vars['_contentType']) ? 'is-active' : '') . '" role="tabpanel" id="analyze-' . $__templater->escape($__vars['_contentType']) . '">
					';
				$__compilerTemp6 = array(array(
					'value' => '0',
					'label' => '&nbsp;',
					'_type' => 'option',
				));
				$__compilerTemp6 = $__templater->mergeChoiceOptions($__compilerTemp6, $__vars['_contentPermission']['content']);
				$__finalCompiled .= $__templater->form('
						<div class="block-body">
							' . $__templater->formTextBoxRow(array(
					'name' => 'username',
					'value' => $__vars['username'],
					'ac' => 'single',
				), array(
					'label' => 'Tên thành viên',
				)) . '

							' . $__templater->formSelectRow(array(
					'name' => 'content_id',
					'value' => (($__vars['contentType'] == $__vars['_contentType']) ? $__vars['contentId'] : 0),
				), $__compilerTemp6, array(
					'label' => 'Nội dung',
				)) . '
						</div>

						' . $__templater->formSubmitRow(array(
					'submit' => 'Phân tích',
				), array(
				)) . '
						' . $__templater->formHiddenVal('content_type', $__vars['_contentType'], array(
				)) . '
					', array(
					'action' => $__templater->func('link', array('permissions/analyze', ), false),
				)) . '
				</li>
			';
			}
		}
	}
	$__finalCompiled .= '
		</ul>
	</div>
</div>';
	return $__finalCompiled;
}
);