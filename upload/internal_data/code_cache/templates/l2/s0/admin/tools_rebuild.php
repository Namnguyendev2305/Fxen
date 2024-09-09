<?php
// FROM HASH: 703be919b41802e7a837d9ad85d9ea87
return array(
'macros' => array('rebuild_job' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'header' => '!',
		'body' => '',
		'submit' => 'Cập nhật ngay',
		'job' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<span class="u-anchorTarget" id="job-' . $__templater->filter($__vars['job'], array(array('replace', array(':', '-', )),array('to_lower', array()),), true) . '"></span>
	';
	$__compilerTemp1 = '';
	if ($__vars['body']) {
		$__compilerTemp1 .= '<div class="block-body">' . $__templater->filter($__vars['body'], array(array('raw', array()),), true) . '</div>';
	}
	$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<h2 class="block-header">' . $__templater->filter($__vars['header'], array(array('raw', array()),), true) . '</h2>
			' . $__compilerTemp1 . '
			' . $__templater->formSubmitRow(array(
		'submit' => $__templater->escape($__vars['submit']),
	), array(
	)) . '
		</div>
		' . $__templater->formHiddenVal('job', $__vars['job'], array(
	)) . '
	', array(
		'action' => $__templater->func('link', array('tools/rebuild', ), false),
		'class' => 'block',
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Cập nhật bộ nhớ đệm');
	$__finalCompiled .= '

';
	if ($__vars['success']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success blockMessage--iconic">' . 'Bộ nhớ đệm được xây dựng lại thành công.' . '</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['hasStoppedManualJobs']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important blockMessage--iconic">
		' . 'Việc xây dựng lại đang chờ hoàn thành. <a href="' . $__templater->func('link', array('tools/run-job', ), true) . '">Tiếp tục chạy chúng.</a>' . '
	</div>
';
	}
	$__finalCompiled .= '

' . '

';
	$__compilerTemp1 = array(array(
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Tất cả' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp1 = $__templater->mergeChoiceOptions($__compilerTemp1, $__templater->method($__vars['xf']['app'], 'getContentTypePhrases', array(true, 'search_handler_class', )));
	$__vars['searchBody'] = $__templater->preEscaped('
	' . $__templater->formSelectRow(array(
		'name' => 'options[type]',
	), $__compilerTemp1, array(
		'label' => 'Loại nội dung',
	)) . '

	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[truncate]',
		'label' => 'Xóa chỉ mục trước khi cập nhật',
		'_type' => 'option',
	)), array(
	)) . '

	' . $__templater->formNumberBoxRow(array(
		'name' => 'options[batch]',
		'value' => '500',
		'min' => '1',
	), array(
		'label' => 'Các mục cần xử lý trên mỗi trang',
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Cập nhật chỉ mục tìm kiếm',
		'body' => $__vars['searchBody'],
		'job' => 'XF:SearchRebuild',
	), $__vars) . '
' . '

';
	$__vars['threadBody'] = $__templater->preEscaped('
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[position_rebuild]',
		'value' => '1',
		'label' => 'Xây dựng lại vị trí và bộ đếm bài viết',
		'hint' => 'Điều này sẽ làm chậm quá trình và chỉ cần thiết nếu bài đăng được hiển thị theo thứ tự không chính xác hoặc để hiển thị cho thành viên khi họ đã đăng trong một chủ đề.',
		'_type' => 'option',
	)), array(
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Cập nhật chủ đề',
		'body' => $__vars['threadBody'],
		'job' => 'XF:Thread',
	), $__vars) . '
' . '

' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Cập nhật diễn đàn',
		'job' => 'XF:Forum',
	), $__vars) . '
' . '

' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Cập nhật bộ nhớ đệm thành viên',
		'job' => 'XF:User',
	), $__vars) . '
' . '

' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Cập nhật khuyến mãi nhóm thành viên',
		'job' => 'XF:UserGroupPromotion',
	), $__vars) . '
' . '

' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Cập nhật lại danh hiệu',
		'job' => 'XF:Trophy',
	), $__vars) . '
' . '

' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Rebuild reaction score',
		'job' => 'XF:ReactionScore',
	), $__vars) . '
' . '

';
	$__vars['likesContentTypes'] = $__templater->method($__vars['xf']['app'], 'getContentTypePhrases', array(true, 'like_handler_class', ));
	$__finalCompiled .= '
';
	if ($__vars['likesContentTypes']) {
		$__finalCompiled .= '
	';
		$__compilerTemp2 = $__templater->mergeChoiceOptions(array(), $__vars['likesContentTypes']);
		$__vars['likesCountedBody'] = $__templater->preEscaped('
		' . $__templater->formSelectRow(array(
			'name' => 'options[type]',
		), $__compilerTemp2, array(
			'label' => 'Loại nội dung',
		)) . '
	');
		$__finalCompiled .= '
	' . $__templater->callMacro(null, 'rebuild_job', array(
			'header' => 'Xây dựng lại bộ đếm thích trạng thái',
			'body' => $__vars['likesCountedBody'],
			'job' => 'XF:LikeIsCounted',
		), $__vars) . '
';
	}
	$__finalCompiled .= '
' . '

';
	$__compilerTemp3 = $__templater->mergeChoiceOptions(array(), $__templater->method($__vars['xf']['app'], 'getContentTypePhrases', array(true, 'reaction_handler_class', )));
	$__vars['reactionsCountedBody'] = $__templater->preEscaped('
	' . $__templater->formSelectRow(array(
		'name' => 'options[type]',
	), $__compilerTemp3, array(
		'label' => 'Loại nội dung',
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Rebuild reactions counted status',
		'body' => $__vars['reactionsCountedBody'],
		'job' => 'XF:ReactionIsCounted',
	), $__vars) . '
' . '

' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Cập nhật ảnh thu nhỏ đính kèm',
		'job' => 'XF:AttachmentThumb',
	), $__vars) . '
' . '

' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Cập nhật cuộc trò chuyện',
		'job' => 'XF:Conversation',
	), $__vars) . '
' . '

' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Cập nhật bài viết trên hồ sơ',
		'job' => 'XF:ProfilePost',
	), $__vars) . '
' . '

' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Xây dựng lại thông tin bình chọn',
		'job' => 'XF:Poll',
	), $__vars) . '
' . '

';
	$__vars['statsBody'] = $__templater->preEscaped('
	' . $__templater->formNumberBoxRow(array(
		'name' => 'options[batch]',
		'value' => '28',
		'min' => '1',
	), array(
		'label' => 'Ngày xử lý mỗi trang',
	)) . '

	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[delete]',
		'value' => '1',
		'label' => 'Xóa dữ liệu bộ nhớ cache hiện có',
		'hint' => 'Một số dữ liệu có thể không được xây dựng lại từ trước. Chỉ sử dụng tùy chọn này nếu bạn có một lý do cụ thể để làm như vậy. Xóa dữ liệu không thể hoàn tác.',
		'_type' => 'option',
	)), array(
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Cập nhật thống kê hàng ngày',
		'body' => $__vars['statsBody'],
		'job' => 'XF:Stats',
	), $__vars) . '
' . '

' . $__templater->form('
	<div class="block-container">
		<h2 class="block-header">' . 'Làm sạch quyền' . '</h2>
		<div class="block-body">
			' . $__templater->formInfoRow('Thao tác này sẽ xóa bất kỳ kết hợp quyền hạn nào không còn sử dụng nữa. Điều này có thể tăng tốc độ cho phép cập nhật và xây dựng lại các hoạt động và loại bỏ dữ liệu không sử dụng từ cơ sở dữ liệu.', array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Chạy',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('tools/clean-up-permissions', ), false),
		'class' => 'block',
	)) . '
' . '

';
	$__vars['postMdBody'] = $__templater->preEscaped('
	' . $__templater->formCheckBoxRow(array(
		'name' => 'options[types]',
		'listclass' => 'listColumns',
	), array(array(
		'value' => 'attachments',
		'label' => 'Đính kèm',
		'selected' => true,
		'_type' => 'option',
	)), array(
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Rebuild post embed metadata',
		'body' => $__vars['postMdBody'],
		'job' => 'XF:PostEmbedMetadata',
	), $__vars) . '

';
	$__vars['conversationMdBody'] = $__templater->preEscaped('
	' . $__templater->formCheckBoxRow(array(
		'name' => 'options[types]',
		'listclass' => 'listColumns',
	), array(array(
		'value' => 'attachments',
		'label' => 'Đính kèm',
		'selected' => true,
		'_type' => 'option',
	)), array(
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Rebuild conversation embed metadata',
		'body' => $__vars['conversationMdBody'],
		'job' => 'XF:ConversationEmbedMetadata',
	), $__vars) . '

';
	$__vars['profilePostMdBody'] = $__templater->preEscaped('
	' . $__templater->formCheckBoxRow(array(
		'name' => 'options[types]',
		'listclass' => 'listColumns',
	), array(array(
		'value' => 'attachments',
		'label' => 'Đính kèm',
		'selected' => true,
		'_type' => 'option',
	)), array(
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Rebuild profile post embed metadata',
		'body' => $__vars['profilePostMdBody'],
		'job' => 'XF:ProfilePostEmbedMetadata',
	), $__vars) . '

';
	$__vars['profilePostCommentMdBody'] = $__templater->preEscaped('
	' . $__templater->formCheckBoxRow(array(
		'name' => 'options[types]',
		'listclass' => 'listColumns',
	), array(array(
		'value' => 'attachments',
		'label' => 'Đính kèm',
		'selected' => true,
		'_type' => 'option',
	)), array(
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Rebuild profile post comment embed metadata',
		'body' => $__vars['profilePostCommentMdBody'],
		'job' => 'XF:ProfilePostCommentEmbedMetadata',
	), $__vars) . '
' . '

';
	$__vars['sitemapBody'] = $__templater->preEscaped('
	' . $__templater->formInfoRow('Nội dung sơ đồ trang web có thể được kiểm soát thông qua các tùy chọn <a href="admin.php?options/groups/sitemap/">tạo XML sitemap</a>.', array(
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Cập nhật sitemap',
		'body' => $__vars['sitemapBody'],
		'job' => 'XF:Sitemap',
	), $__vars) . '
' . '

';
	$__vars['gravatarBody'] = $__templater->preEscaped('
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[posters_only]',
		'selected' => 1,
		'label' => 'Limit to users who have posted',
		'_type' => 'option',
	),
	array(
		'name' => 'options[import_table]',
		'label' => 'Limit to imported users logged in this table' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'options[import_table_name]',
	))),
		'_type' => 'option',
	)), array(
		'explain' => 'Any users with no avatar matching the above conditions will have a <a href="https://gravatar.com" target="_blank">Gravatar</a> applied if one exists for their email address.',
	)) . '
');
	$__finalCompiled .= '
' . $__templater->callMacro(null, 'rebuild_job', array(
		'header' => 'Fetch Gravatars for users with no avatar',
		'body' => $__vars['gravatarBody'],
		'job' => 'XF:Gravatar',
	), $__vars) . '

' . '

';
	return $__finalCompiled;
}
);