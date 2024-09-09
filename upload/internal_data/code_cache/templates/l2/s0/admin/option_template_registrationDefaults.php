<?php
// FROM HASH: 73a0135af9f0bab433e68001299013bb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRow('

	' . $__templater->formCheckBox(array(
	), array(array(
		'name' => $__vars['inputName'] . '[visible]',
		'selected' => $__vars['option']['option_value']['visible'],
		'label' => 'Trạng thái online',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[activity_visible]',
		'selected' => $__vars['option']['option_value']['activity_visible'],
		'label' => 'Hiển thị hoạt động hiện tại',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[content_show_signature]',
		'selected' => $__vars['option']['option_value']['content_show_signature'],
		'label' => 'Hiển thị chữ ký với tin nhắn',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[show_dob_date]',
		'selected' => $__vars['option']['option_value']['show_dob_date'],
		'label' => 'Hiển thị ngày và tháng sinh',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[show_dob_year]',
		'selected' => $__vars['option']['option_value']['show_dob_year'],
		'label' => 'Hiển thị năm sinh',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[receive_admin_email]',
		'selected' => $__vars['option']['option_value']['receive_admin_email'],
		'label' => 'Nhận tin tức và cập nhật email',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[email_on_conversation]',
		'selected' => $__vars['option']['option_value']['email_on_conversation'],
		'label' => 'Nhận email khi có tin nhắn đối thoại mới',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[push_on_conversation]',
		'selected' => $__vars['option']['option_value']['push_on_conversation'],
		'label' => 'Receive push notification when a new conversation message is received',
		'_type' => 'option',
	))) . '
	<div class="u-inputSpacer">
		<dl class="inputLabelPair">
			<dt><label for="' . $__templater->escape($__vars['inputName']) . '_cws">' . 'Theo dõi chủ đề đã tạo' . '</label></dt>
			<dd>' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[creation_watch_state]',
		'value' => $__vars['option']['option_value']['creation_watch_state'],
		'id' => $__vars['inputName'] . '_cws',
	), array(array(
		'value' => 'watch_no_email',
		'label' => 'Có',
		'_type' => 'option',
	),
	array(
		'value' => 'watch_email',
		'label' => 'Có, với email',
		'_type' => 'option',
	),
	array(
		'label' => 'Không',
		'_type' => 'option',
	))) . '</dd>
		</dl>
		<dl class="inputLabelPair">
			<dt><label for="' . $__templater->escape($__vars['inputName']) . '_iws">' . 'Theo dõi chủ đề đã tương tác' . '</label></dt>
			<dd>' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[interaction_watch_state]',
		'value' => $__vars['option']['option_value']['interaction_watch_state'],
		'id' => $__vars['inputName'] . '_iws',
	), array(array(
		'value' => 'watch_no_email',
		'label' => 'Có',
		'_type' => 'option',
	),
	array(
		'value' => 'watch_email',
		'label' => 'Có, với email',
		'_type' => 'option',
	),
	array(
		'label' => 'Không',
		'_type' => 'option',
	))) . '</dd>
		</dl>
		<dl class="inputLabelPair">
			<dt><label for="' . $__templater->escape($__vars['inputName']) . '_avp">' . 'Xem chi tiết trang tiểu sử của thành viên này' . '</label></dt>
			<dd>' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[allow_view_profile]',
		'value' => $__vars['option']['option_value']['allow_view_profile'],
		'id' => $__vars['inputName'] . '_avp',
	), array(array(
		'value' => 'everyone',
		'label' => 'Tất cả khách',
		'_type' => 'option',
	),
	array(
		'value' => 'members',
		'label' => 'Chỉ dành cho thành viên',
		'_type' => 'option',
	),
	array(
		'value' => 'followed',
		'label' => 'Followed members only',
		'_type' => 'option',
	),
	array(
		'value' => 'none',
		'label' => 'Không một ai',
		'_type' => 'option',
	))) . '</dd>
		</dl>
		<dl class="inputLabelPair">
			<dt><label for="' . $__templater->escape($__vars['inputName']) . '_app">' . 'Đăng nội dung trên trang hồ sơ của thành viên này' . '</label></dt>
			<dd>' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[allow_post_profile]',
		'value' => $__vars['option']['option_value']['allow_post_profile'],
		'id' => $__vars['inputName'] . '_app',
	), array(array(
		'value' => 'members',
		'label' => 'Chỉ dành cho thành viên',
		'_type' => 'option',
	),
	array(
		'value' => 'followed',
		'label' => 'Followed members only',
		'_type' => 'option',
	),
	array(
		'value' => 'none',
		'label' => 'Không một ai',
		'_type' => 'option',
	))) . '</dd>
		</dl>
		<dl class="inputLabelPair">
			<dt><label for="' . $__templater->escape($__vars['inputName']) . '_arnf">' . 'Nhận luồng tin của thành viên này' . '</label></dt>
			<dd>' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[allow_receive_news_feed]',
		'value' => $__vars['option']['option_value']['allow_receive_news_feed'],
		'id' => $__vars['inputName'] . '_arnf',
	), array(array(
		'value' => 'everyone',
		'label' => 'Tất cả khách',
		'_type' => 'option',
	),
	array(
		'value' => 'members',
		'label' => 'Chỉ dành cho thành viên',
		'_type' => 'option',
	),
	array(
		'value' => 'followed',
		'label' => 'Followed members only',
		'_type' => 'option',
	),
	array(
		'value' => 'none',
		'label' => 'Không một ai',
		'_type' => 'option',
	))) . '</dd>
		</dl>
		<dl class="inputLabelPair">
			<dt><label for="' . $__templater->escape($__vars['inputName']) . '_aspc">' . 'Tạo các cuộc trò chuyện với thành viên này' . '</label></dt>
			<dd>' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[allow_send_personal_conversation]',
		'value' => $__vars['option']['option_value']['allow_send_personal_conversation'],
		'id' => $__vars['inputName'] . '_aspc',
	), array(array(
		'value' => 'members',
		'label' => 'Chỉ dành cho thành viên',
		'_type' => 'option',
	),
	array(
		'value' => 'followed',
		'label' => 'Followed members only',
		'_type' => 'option',
	),
	array(
		'value' => 'none',
		'label' => 'Không một ai',
		'_type' => 'option',
	))) . '</dd>
		</dl>
		<dl class="inputLabelPair">
			<dt><label for="' . $__templater->escape($__vars['inputName']) . '_avi">' . 'Xem thông tin nhận dạng của thành viên này' . '</label></dt>
			<dd>' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[allow_view_identities]',
		'id' => $__vars['inputName'] . '_avi',
		'value' => $__vars['option']['option_value']['allow_view_identities'],
	), array(array(
		'value' => 'everyone',
		'label' => 'Tất cả khách',
		'_type' => 'option',
	),
	array(
		'value' => 'members',
		'label' => 'Chỉ dành cho thành viên',
		'_type' => 'option',
	),
	array(
		'value' => 'followed',
		'label' => 'Followed members only',
		'_type' => 'option',
	),
	array(
		'value' => 'none',
		'label' => 'Không một ai',
		'_type' => 'option',
	))) . '</dd>
		</dl>
	</div>
', array(
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
		'rowclass' => $__vars['rowClass'],
	));
	return $__finalCompiled;
}
);