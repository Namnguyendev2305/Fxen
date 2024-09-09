<?php
// FROM HASH: baea67f23f79efe664660a136ad791af
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Set cover image');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['article'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__templater->includeCss('attachments.less');
	$__finalCompiled .= '
';
	$__templater->includeCss('xa_ams.less');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['article']['Attachments'])) {
		foreach ($__vars['article']['Attachments'] AS $__vars['attachment']) {
			$__compilerTemp1 .= '
						';
			if ($__vars['attachment']['has_thumbnail']) {
				$__compilerTemp1 .= '
							<li class="attachment">
								<div class="attachment-icon attachment-icon--img">
									<a class="avatar NoOverlay"><img width="48" height="48" border="0" src="' . $__templater->escape($__vars['attachment']['thumbnail_url']) . '" alt="' . $__templater->escape($__vars['attachment']['filename']) . '" /></a>
								</div>
								<div class="attachment-name" style="padding-top: 5px;">
									<span class="attachment-select"><input type="radio" name="attachment_id" value="' . $__templater->escape($__vars['attachment']['attachment_id']) . '" ' . (($__vars['article']['cover_image_id'] == $__vars['attachment']['attachment_id']) ? 'checked' : '') . ' /></span>
								</div>
							</li>
						';
			}
			$__compilerTemp1 .= '
					';
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			<div class="block-row">
				<ul class="attachmentList amsSetCoverImage-attachments">
					' . $__compilerTemp1 . '
				</ul>
			</div>

			<div class="block-row">
				' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'cover_image_above_article',
		'data-hide' => 'true',
		'label' => 'Display cover image above article',
		'hint' => 'When enabled, will display the cover image (if set), above the article.  ',
		'checked' => $__vars['article']['cover_image_above_article'],
		'_dependent' => array('
							' . $__templater->formTextAreaRow(array(
		'name' => 'cover_image_caption',
		'value' => $__vars['article']['cover_image_caption_'],
		'maxlength' => $__templater->func('max_length', array($__vars['article'], 'cover_image_caption', ), false),
	), array(
		'label' => 'Cover image caption',
		'rowtype' => 'fullWidth',
		'hint' => 'Tùy chọn (không bắt buộc)',
		'explain' => 'Will display the cover image caption (if set), below the cover image that displays above the article.',
	)) . '
						'),
		'_type' => 'option',
	))) . '
			</div>
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('ams/set-cover-image', $__vars['article'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);