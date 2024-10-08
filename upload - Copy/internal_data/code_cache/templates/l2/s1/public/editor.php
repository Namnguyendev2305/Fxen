<?php
// FROM HASH: 850111f06b31765318db94c46824bc1c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->func('is_editor_capable', array(), false)) {
		$__finalCompiled .= '
	';
		$__templater->includeCss('editor.less');
		$__finalCompiled .= '

	';
		if ($__vars['fullEditorJs']) {
			$__finalCompiled .= '
		';
			$__templater->includeJs(array(
				'src' => 'vendor/froala/froala-compiled.full.js, xf/editor.js',
			));
			$__finalCompiled .= '
	';
		} else {
			$__finalCompiled .= '
		';
			$__templater->includeJs(array(
				'prod' => 'xf/editor-compiled.js',
				'dev' => 'vendor/froala/froala-compiled.js, xf/editor.js',
			));
			$__finalCompiled .= '
	';
		}
		$__finalCompiled .= '
	' . '

	<script class="js-editorToolbars" type="application/json">' . $__templater->filter($__vars['editorToolbars'], array(array('json', array()),array('raw', array()),), true) . '</script>
	<script class="js-editorToolbarSizes" type="application/json">' . $__templater->filter($__vars['editorToolbarSizes'], array(array('json', array()),array('raw', array()),), true) . '</script>
	<script class="js-editorDropdowns" type="application/json">' . $__templater->filter($__vars['editorDropdowns'], array(array('json', array()),array('raw', array()),), true) . '</script>
	<script class="js-editorLanguage" type="application/json">
		{
			"Align Center": "' . $__templater->filter('Căn giữa', array(array('escape', array('json', )),), true) . '",
			"Align Left": "' . $__templater->filter('Căn trái', array(array('escape', array('json', )),), true) . '",
			"Align Right": "' . $__templater->filter('Căn phải', array(array('escape', array('json', )),), true) . '",
			"Align Justify": "' . $__templater->filter('Justify text', array(array('escape', array('json', )),), true) . '",
			"Align": "' . $__templater->filter('Căn lề', array(array('escape', array('json', )),), true) . '",
			"Alignment": "' . $__templater->filter('Căn lề', array(array('escape', array('json', )),), true) . '",
			"Back": "' . $__templater->filter('Back', array(array('escape', array('json', )),), true) . '",
			"Bold": "' . $__templater->filter('In đậm', array(array('escape', array('json', )),), true) . '",
			"By URL": "' . $__templater->filter('Theo URL', array(array('escape', array('json', )),), true) . '",
			"Clear Formatting": "' . $__templater->filter('Xóa định dạng', array(array('escape', array('json', )),), true) . '",
			"Code": "' . $__templater->filter('Mã', array(array('escape', array('json', )),), true) . '",
			"Text Color": "' . $__templater->filter('Màu chữ', array(array('escape', array('json', )),), true) . '",
			"Decrease Indent": "' . $__templater->filter('Tăng lề', array(array('escape', array('json', )),), true) . '",
			"Delete Draft": "' . $__templater->filter('Xóa bản nháp', array(array('escape', array('json', )),), true) . '",
			"Drafts": "' . $__templater->filter('Bản thảo', array(array('escape', array('json', )),), true) . '",
			"Drop image": "' . $__templater->filter('Kéo thả hình ảnh', array(array('escape', array('json', )),), true) . '",
			"Drop video": "' . $__templater->filter('Drop video', array(array('escape', array('json', )),), true) . '",
			"Edit Link": "' . $__templater->filter('Sửa liên kết', array(array('escape', array('json', )),), true) . '",
			"Font Family": "' . $__templater->filter('Phông chữ', array(array('escape', array('json', )),), true) . '",
			"Font Size": "' . $__templater->filter('Kích thước', array(array('escape', array('json', )),), true) . '",
			"Normal": "' . $__templater->filter('Normal', array(array('escape', array('json', )),), true) . '",
			"Heading 1": "' . $__templater->filter('Heading 1', array(array('escape', array('json', )),), true) . '",
			"Heading 2": "' . $__templater->filter('Heading 2', array(array('escape', array('json', )),), true) . '",
			"Heading 3": "' . $__templater->filter('Heading 3', array(array('escape', array('json', )),), true) . '",
			"Increase Indent": "' . $__templater->filter('Thụt lề', array(array('escape', array('json', )),), true) . '",
			"Inline Code": "' . $__templater->filter('Inline code', array(array('escape', array('json', )),), true) . '",
			"Insert GIF": "' . 'Insert GIF' . '",
			"Insert Horizontal Line": "' . $__templater->filter('Insert horizontal line', array(array('escape', array('json', )),), true) . '",
			"Inline Spoiler": "' . $__templater->filter('Inline spoiler', array(array('escape', array('json', )),), true) . '",
			"Insert Image": "' . $__templater->filter('Chèn hình ảnh', array(array('escape', array('json', )),), true) . '",
			"Insert Link": "' . $__templater->filter('Chèn liên kết', array(array('escape', array('json', )),), true) . '",
			"Insert": "' . $__templater->filter('Chèn', array(array('escape', array('json', )),), true) . '",
			"Italic": "' . $__templater->filter('In nghiêng', array(array('escape', array('json', )),), true) . '",
			"List": "' . $__templater->filter('Danh sách', array(array('escape', array('json', )),), true) . '",
			"Loading image": "' . $__templater->filter('Loading image', array(array('escape', array('json', )),), true) . '",
			"Media": "' . $__templater->filter('Video', array(array('escape', array('json', )),), true) . '",
			"More Text": "' . $__templater->filter('Thêm tùy chọn' . $__vars['xf']['language']['ellipsis'], array(array('escape', array('json', )),), true) . '",
			"More Paragraph": "' . $__templater->filter('Thêm tùy chọn' . $__vars['xf']['language']['ellipsis'], array(array('escape', array('json', )),), true) . '",
			"More Rich": "' . $__templater->filter('Thêm tùy chọn' . $__vars['xf']['language']['ellipsis'], array(array('escape', array('json', )),), true) . '",
			"More Misc": "' . $__templater->filter('Thêm tùy chọn' . $__vars['xf']['language']['ellipsis'], array(array('escape', array('json', )),), true) . '",
			"Open Link": "' . $__templater->filter('Mở liên kết', array(array('escape', array('json', )),), true) . '",
			"or click": "' . $__templater->filter('Hoặc bấm vào đây', array(array('escape', array('json', )),), true) . '",
			"Ordered List": "' . $__templater->filter('Danh sách có thứ tự', array(array('escape', array('json', )),), true) . '",
			"Paragraph Format": "' . $__templater->filter('Định dạng văn bản', array(array('escape', array('json', )),), true) . '",
			"Preview": "' . $__templater->filter('Xem trước', array(array('escape', array('json', )),), true) . '",
			"Quote": "' . $__templater->filter('Trích dẫn', array(array('escape', array('json', )),), true) . '",
			"Redo": "' . $__templater->filter('Làm lại', array(array('escape', array('json', )),), true) . '",
			"Remove": "' . $__templater->filter('Xóa', array(array('escape', array('json', )),), true) . '",
			"Replace": "' . $__templater->filter('Thay thế', array(array('escape', array('json', )),), true) . '",
			"Save Draft": "' . $__templater->filter('Lưu nháp', array(array('escape', array('json', )),), true) . '",
			"Smilies": "' . $__templater->filter('Smilies', array(array('escape', array('json', )),), true) . '",
			"Something went wrong. Please try again.": "' . $__templater->filter('Something went wrong. Please try again or contact the administrator.', array(array('escape', array('json', )),), true) . '",
			"Spoiler": "' . $__templater->filter('Spoiler', array(array('escape', array('json', )),), true) . '",
			"Strikethrough": "' . $__templater->filter('Gạch ngang', array(array('escape', array('json', )),), true) . '",
			"Text": "' . $__templater->filter('Ký tự', array(array('escape', array('json', )),), true) . '",
			"Toggle BB Code": "' . $__templater->filter('Bật/tắt BB code', array(array('escape', array('json', )),), true) . '",
			"Underline": "' . $__templater->filter('Gạch chân', array(array('escape', array('json', )),), true) . '",
			"Undo": "' . $__templater->filter('Quay lại', array(array('escape', array('json', )),), true) . '",
			"Unlink": "' . $__templater->filter('Bỏ liên kết', array(array('escape', array('json', )),), true) . '",
			"Unordered List": "' . $__templater->filter('Danh sách không có thứ tự', array(array('escape', array('json', )),), true) . '",
			"Update": "' . $__templater->filter('Cập nhật', array(array('escape', array('json', )),), true) . '",
			"Upload Image": "' . $__templater->filter('Tải lên hình ảnh', array(array('escape', array('json', )),), true) . '",
			"Uploading": "' . $__templater->filter('Uploading', array(array('escape', array('json', )),), true) . '",
			"URL": "' . $__templater->filter('URL', array(array('escape', array('json', )),), true) . '",
			"Insert Table": "' . $__templater->filter('Chèn bảng', array(array('escape', array('json', )),), true) . '",
			"Table Header": "' . $__templater->filter('Table header', array(array('escape', array('json', )),), true) . '",
			"Remove Table": "' . $__templater->filter('Remove table', array(array('escape', array('json', )),), true) . '",
			"Row": "' . $__templater->filter('Row', array(array('escape', array('json', )),), true) . '",
			"Column": "' . $__templater->filter('Column', array(array('escape', array('json', )),), true) . '",
			"Insert row above": "' . $__templater->filter('Insert row above', array(array('escape', array('json', )),), true) . '",
			"Insert row below": "' . $__templater->filter('Insert row below', array(array('escape', array('json', )),), true) . '",
			"Delete row": "' . $__templater->filter('Delete row', array(array('escape', array('json', )),), true) . '",
			"Insert column before": "' . $__templater->filter('Insert column before', array(array('escape', array('json', )),), true) . '",
			"Insert column after": "' . $__templater->filter('Insert column after', array(array('escape', array('json', )),), true) . '",
			"Delete column": "' . $__templater->filter('Delete column', array(array('escape', array('json', )),), true) . '",
			"Ctrl": "' . $__templater->filter('Ctrl', array(array('escape', array('json', )),), true) . '",
			"Shift": "' . $__templater->filter('Shift', array(array('escape', array('json', )),), true) . '",
			"Alt": "' . $__templater->filter('Alt', array(array('escape', array('json', )),), true) . '",
			"Insert Video": "' . $__templater->filter('Chèn video', array(array('escape', array('json', )),), true) . '",
			"Upload Video": "' . $__templater->filter('Upload video', array(array('escape', array('json', )),), true) . '",
			"Width": "' . $__templater->filter('Width', array(array('escape', array('json', )),), true) . '",
			"Height": "' . $__templater->filter('Height', array(array('escape', array('json', )),), true) . '",
			"Change Size": "' . $__templater->filter('Change size', array(array('escape', array('json', )),), true) . '",
			"None": "' . $__templater->filter('Không có', array(array('escape', array('json', )),), true) . '",
			"Alternative Text": "' . $__templater->filter('Alt text', array(array('escape', array('json', )),), true) . '",
			"__lang end__": ""
		}
	</script>

	<script class="js-editorCustom" type="application/json">
		' . $__templater->filter($__vars['customIcons'], array(array('json', array()),array('raw', array()),), true) . '
	</script>

	<script class="js-xfEditorMenu" type="text/template">
		<div class="menu" data-menu="menu" aria-hidden="true"
			data-href="' . $__templater->func('mustache', array('href', ), true) . '"
			data-load-target=".js-xfEditorMenuBody">
			<div class="menu-content">
				<div class="js-xfEditorMenuBody">
					<div class="menu-row">' . 'Đang tải' . $__vars['xf']['language']['ellipsis'] . '</div>
				</div>
			</div>
		</div>
	</script>

	<textarea name="' . $__templater->escape($__vars['htmlName']) . '"
		class="input js-editor u-jsOnly"
		data-xf-init="editor"
		data-original-name="' . $__templater->escape($__vars['name']) . '"
		data-buttons-remove="' . $__templater->filter($__vars['removeButtons'], array(array('join', array(',', )),), true) . '"
		style="visibility: hidden; height: ' . ($__vars['height'] + 37) . 'px; ' . $__templater->escape($__vars['styleAttr']) . '"
		aria-label="' . $__templater->filter('Khung soạn thảo trù phú', array(array('for_attr', array()),), true) . '"
		' . $__templater->filter($__vars['attrsHtml'], array(array('raw', array()),), true) . '>' . $__templater->escape($__vars['htmlValue']) . '</textarea>

	' . '

	<input type="hidden" value="' . $__templater->escape($__vars['value']) . '" data-bb-code="' . $__templater->escape($__vars['name']) . '" />

	<noscript>
		<textarea name="' . $__templater->escape($__vars['name']) . '" class="input" aria-label="' . $__templater->filter('Khung soạn thảo trù phú', array(array('for_attr', array()),), true) . '">' . $__templater->escape($__vars['value']) . '</textarea>
	</noscript>

';
	} else {
		$__finalCompiled .= '

	<textarea name="' . $__templater->escape($__vars['name']) . '" class="input input--fitHeight js-editor" style="min-height: ' . $__templater->escape($__vars['height']) . 'px; ' . $__templater->escape($__vars['styleAttr']) . '" data-xf-init="textarea-handler user-mentioner emoji-completer draft-trigger" aria-label="' . $__templater->filter('Khung soạn thảo trù phú', array(array('for_attr', array()),), true) . '" ' . $__templater->filter($__vars['attrsHtml'], array(array('raw', array()),), true) . '>' . $__templater->escape($__vars['value']) . '</textarea>

';
	}
	return $__finalCompiled;
}
);