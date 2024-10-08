<?php
// FROM HASH: 6bbd943b575b398ef742742a6fdfe764
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Bài mới trên hồ sơ');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['pageSelected'] = $__templater->preEscaped('new_profile_post');
	$__templater->wrapTemplate('whats_new_wrapper', $__compilerTemp1);
	$__finalCompiled .= '

';
	if ($__vars['canInlineMod']) {
		$__finalCompiled .= '
	';
		$__templater->includeJs(array(
			'src' => 'xf/inline_mod.js',
			'min' => '1',
		));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

' . $__templater->callMacro('lightbox_macros', 'setup', array(
		'canViewAttachments' => $__vars['canViewAttachments'],
	), $__vars) . '

<div class="block" data-xf-init="lightbox ' . ($__vars['canInlineMod'] ? 'inline-mod' : '') . '" data-type="profile_post" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
	';
	if ($__vars['findNew']['result_count']) {
		$__finalCompiled .= '
		<div class="block-outer">
			' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['findNew']['result_count'],
			'link' => 'whats-new/profile-posts',
			'data' => $__vars['findNew'],
			'wrapperclass' => 'block-outer-main',
			'perPage' => $__vars['perPage'],
		))) . '

			';
		$__compilerTemp2 = '';
		$__compilerTemp2 .= '
						';
		if ($__vars['canInlineMod']) {
			$__compilerTemp2 .= '
							' . $__templater->callMacro('inline_mod_macros', 'button', array(), $__vars) . '
						';
		}
		$__compilerTemp2 .= '
					';
		if (strlen(trim($__compilerTemp2)) > 0) {
			$__finalCompiled .= '
				<div class="block-outer-opposite">
					<div class="buttonGroup">
					' . $__compilerTemp2 . '
					</div>
				</div>
			';
		}
		$__finalCompiled .= '
		</div>
	';
	}
	$__finalCompiled .= '

	<div class="block-container">
		';
	if ($__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
			<div class="block-filterBar">
				<div class="filterBar">
					';
		$__compilerTemp3 = '';
		$__compilerTemp3 .= '
								' . '
								';
		if ($__vars['findNew']['filters']['followed']) {
			$__compilerTemp3 .= '
									<li><a href="' . $__templater->func('link', array('whats-new/profile-posts', $__vars['findNew'], array('remove' => 'followed', ), ), true) . '"
										class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Xóa bộ lọc này', array(array('for_attr', array()),), true) . '">
										<span class="filterBar-filterToggle-label">' . 'Chỉ hiển thị' . '</span>
										' . 'Followed members' . '</a></li>
								';
		}
		$__compilerTemp3 .= '
								' . '
							';
		if (strlen(trim($__compilerTemp3)) > 0) {
			$__finalCompiled .= '
						<ul class="filterBar-filters">
							' . $__compilerTemp3 . '
						</ul>
					';
		}
		$__finalCompiled .= '

					<a class="filterBar-menuTrigger" data-xf-click="menu" role="button" tabindex="0" aria-expanded="false" aria-haspopup="true">' . 'Bộ lọc' . '</a>
					<div class="menu" data-menu="menu" aria-hidden="true">
						<div class="menu-content">
							<h4 class="menu-header">' . 'Chỉ hiển thị' . $__vars['xf']['language']['label_separator'] . '</h4>
							' . $__templater->form('
								<div class="menu-row">
									' . $__templater->formCheckBox(array(
		), array(array(
			'name' => 'followed',
			'selected' => $__vars['findNew']['filters']['followed'],
			'label' => 'Thành viên bạn theo dõi',
			'_type' => 'option',
		))) . '
								</div>

								' . $__templater->callMacro('filter_macros', 'find_new_filter_footer', array(), $__vars) . '
							', array(
			'action' => $__templater->func('link', array('whats-new/profile-posts', ), false),
		)) . '
						</div>
					</div>
				</div>
			</div>
		';
	}
	$__finalCompiled .= '

		';
	if ($__vars['findNew']['result_count']) {
		$__finalCompiled .= '
			';
		if ($__templater->isTraversable($__vars['profilePosts'])) {
			foreach ($__vars['profilePosts'] AS $__vars['profilePost']) {
				$__finalCompiled .= '
				' . $__templater->callMacro('profile_post_macros', 'profile_post', array(
					'profilePost' => $__vars['profilePost'],
					'attachmentData' => $__vars['profilePostAttachData'][$__vars['profilePost']['profile_post_id']],
					'showTargetUser' => true,
				), $__vars) . '
			';
			}
		}
		$__finalCompiled .= '
		';
	} else {
		$__finalCompiled .= '
			<div class="block-row">' . 'Không tìm thấy.' . '</div>
		';
	}
	$__finalCompiled .= '
	</div>

	';
	if ($__vars['findNew']['result_count']) {
		$__finalCompiled .= '
		<div class="block-outer block-outer--after">
			' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['findNew']['result_count'],
			'link' => 'whats-new/profile-posts',
			'data' => $__vars['findNew'],
			'wrapperclass' => 'block-outer-main',
			'perPage' => $__vars['perPage'],
		))) . '
			' . $__templater->func('show_ignored', array(array(
			'wrapperclass' => 'block-outer-opposite',
		))) . '
		</div>
	';
	}
	$__finalCompiled .= '
</div>';
	return $__finalCompiled;
}
);