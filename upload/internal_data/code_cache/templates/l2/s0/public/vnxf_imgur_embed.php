<?php
// FROM HASH: fcfb4b827d78ec90987f3703eddc48f5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<input type="file" style="display:none;" name="imgur[]" multiple id="fileembed" />
<a href="javascript:;" onClick="$(\'#fileembed\').trigger(\'click\');" class="button--link button button--icon button--icon--attach"><span class="button-text">Imgur</span></a>
';
	$__templater->inlineJs('
$("#fileembed").change(function() {
	//File data
	var data = new FormData();
	var file_data = $(\'input#fileembed\')[0].files;
	for (var i = 0; i < file_data.length; i++) {
		data.append(\'attachment[]\', file_data[i]);
	}
	var url = "' . $__templater->func('link', array('full:attachments/imgur', '', ), false) . '";
	XF.ajax("post", url, data, function(data) {
		$.each(data.results, function (key, item){
			$(\'textarea\')[0]["data-froala.editor"].html.insert(\'<img src="\'+item+\'">\\n\');
		});
		$(\'input#fileembed\').val(\'\');
	});
});
');
	return $__finalCompiled;
}
);