<?php
// FROM HASH: 351a9f8801f0ff6866e162b06e36eda9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->func('prefix', array('ams_article', $__vars['article'], 'escaped', ), true) . ($__vars['article']['meta_title'] ? $__templater->escape($__vars['article']['meta_title']) : $__templater->escape($__vars['article']['title'])) . ' - ' . 'Gallery');
	$__finalCompiled .= '

';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['pageSelected'] = 'gallery';
	$__templater->wrapTemplate('xa_ams_article_wrapper', $__compilerTemp1);
	$__finalCompiled .= '

' . $__templater->callMacro('lightbox_macros', 'setup', array(
		'canViewAttachments' => $__templater->method($__vars['article'], 'canViewAttachments', array()),
	), $__vars) . '

<div class="block">
	';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
				' . $__templater->callMacro('xa_ams_article_wrapper_macros', 'action_buttons', array(
		'article' => $__vars['article'],
		'showRateButton' => 'true',
	), $__vars) . '
			';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__finalCompiled .= '
		<div class="block-outer">
			<div class="block-outer-opposite">
			' . $__compilerTemp2 . '
			</div>
		</div>
	';
	}
	$__finalCompiled .= '

	<div class="block-container">
		<div class="block-body lbContainer js-articleBody"
			data-xf-init="lightbox"
			data-lb-id="article-' . $__templater->escape($__vars['article']['article_id']) . '"
			data-lb-caption-desc="' . ($__vars['article']['User'] ? $__templater->escape($__vars['article']['User']['username']) : $__templater->escape($__vars['article']['username'])) . ' &middot; ' . $__templater->func('date_time', array($__vars['article']['publish_date'], ), true) . '">
			
			<div class="articleBody">
				<article class="articleBody-main js-lbContainer">
					';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
								';
	if ($__templater->isTraversable($__vars['article']['Attachments'])) {
		foreach ($__vars['article']['Attachments'] AS $__vars['attachment']) {
			if ($__vars['attachment']['has_thumbnail']) {
				$__compilerTemp3 .= '
									' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
					'attachment' => $__vars['attachment'],
					'canView' => $__templater->method($__vars['article'], 'canViewAttachments', array()),
				), $__vars) . '
								';
			}
		}
	}
	$__compilerTemp3 .= '
								
								';
	if ($__templater->isTraversable($__vars['pagesImages'])) {
		foreach ($__vars['pagesImages'] AS $__vars['attachment']) {
			if ($__vars['attachment']['has_thumbnail']) {
				$__compilerTemp3 .= '
									' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
					'attachment' => $__vars['attachment'],
					'canView' => $__templater->method($__vars['article'], 'canViewAttachments', array()),
				), $__vars) . '
								';
			}
		}
	}
	$__compilerTemp3 .= '	

								';
	if ($__vars['xf']['options']['xaAmsGalleryDisplayType'] == 'single_block') {
		$__compilerTemp3 .= '
									';
		if ($__templater->isTraversable($__vars['reviewsImages'])) {
			foreach ($__vars['reviewsImages'] AS $__vars['attachment']) {
				if ($__vars['attachment']['has_thumbnail']) {
					$__compilerTemp3 .= '
										' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
						'attachment' => $__vars['attachment'],
						'canView' => $__templater->method($__vars['article'], 'canViewReviewAttachments', array()),
					), $__vars) . '
									';
				}
			}
		}
		$__compilerTemp3 .= '

									';
		if ($__templater->isTraversable($__vars['commentsImages'])) {
			foreach ($__vars['commentsImages'] AS $__vars['attachment']) {
				if ($__vars['attachment']['has_thumbnail']) {
					$__compilerTemp3 .= '
										' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
						'attachment' => $__vars['attachment'],
						'canView' => $__templater->method($__vars['article'], 'canViewCommentAttachments', array()),
					), $__vars) . '
									';
				}
			}
		}
		$__compilerTemp3 .= '

									';
		if ($__templater->isTraversable($__vars['postsImages'])) {
			foreach ($__vars['postsImages'] AS $__vars['attachment']) {
				if ($__vars['attachment']['has_thumbnail']) {
					$__compilerTemp3 .= '
										' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
						'attachment' => $__vars['attachment'],
						'canView' => $__templater->method($__vars['article']['Discussion'], 'canViewAttachments', array()),
					), $__vars) . '
									';
				}
			}
		}
		$__compilerTemp3 .= '
								';
	}
	$__compilerTemp3 .= '								
							';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__finalCompiled .= '
						';
		$__templater->includeCss('attachments.less');
		$__finalCompiled .= '
						<ul class="attachmentList articleBody-attachments">
							' . $__compilerTemp3 . '
						</ul>
					';
	}
	$__finalCompiled .= '
				</article>
			</div>
		</div>
	</div>
</div>


';
	if ($__vars['xf']['options']['xaAmsGalleryDisplayType'] == 'multiple_blocks') {
		$__finalCompiled .= '
	';
		$__compilerTemp4 = '';
		$__compilerTemp4 .= '
									';
		if ($__templater->isTraversable($__vars['reviewsImages'])) {
			foreach ($__vars['reviewsImages'] AS $__vars['attachment']) {
				if ($__vars['attachment']['has_thumbnail']) {
					$__compilerTemp4 .= '
										' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
						'attachment' => $__vars['attachment'],
						'canView' => $__templater->method($__vars['article'], 'canViewReviewAttachments', array()),
					), $__vars) . '
									';
				}
			}
		}
		$__compilerTemp4 .= '
								';
		if (strlen(trim($__compilerTemp4)) > 0) {
			$__finalCompiled .= '
		<div class="block block--messages">
			<div class="block-container">
				<h3 class="block-header">' . 'Member submitted images via reviews' . '</h3>
				<div class="block-body lbContainer js-articleBody"
					data-xf-init="lightbox"
					data-lb-id="article-' . $__templater->escape($__vars['article']['article_id']) . '"
					data-lb-caption-desc="' . ($__vars['article']['User'] ? $__templater->escape($__vars['article']['User']['username']) : $__templater->escape($__vars['article']['username'])) . ' &middot; ' . $__templater->func('date_time', array($__vars['article']['publish_date'], ), true) . '">

					<div class="articleBody">
						<article class="articleBody-main js-lbContainer">
							';
			$__templater->includeCss('attachments.less');
			$__finalCompiled .= '
							<ul class="attachmentList articleBody-attachments">
								' . $__compilerTemp4 . '
							</ul>
						</article>
					</div>
				</div>
			</div>
		</div>
	';
		}
		$__finalCompiled .= '

	';
		$__compilerTemp5 = '';
		$__compilerTemp5 .= '
									';
		if ($__templater->isTraversable($__vars['commentsImages'])) {
			foreach ($__vars['commentsImages'] AS $__vars['attachment']) {
				if ($__vars['attachment']['has_thumbnail']) {
					$__compilerTemp5 .= '
										' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
						'attachment' => $__vars['attachment'],
						'canView' => $__templater->method($__vars['article'], 'canViewCommentAttachments', array()),
					), $__vars) . '
									';
				}
			}
		}
		$__compilerTemp5 .= '
								';
		if (strlen(trim($__compilerTemp5)) > 0) {
			$__finalCompiled .= '
		<div class="block block--messages">
			<div class="block-container">
				<h3 class="block-header">' . 'Member submitted images via comments' . '</h3>
				<div class="block-body lbContainer js-articleBody"
					data-xf-init="lightbox"
					data-lb-id="article-' . $__templater->escape($__vars['article']['article_id']) . '"
					data-lb-caption-desc="' . ($__vars['article']['User'] ? $__templater->escape($__vars['article']['User']['username']) : $__templater->escape($__vars['article']['username'])) . ' &middot; ' . $__templater->func('date_time', array($__vars['article']['publish_date'], ), true) . '">

					<div class="articleBody">
						<article class="articleBody-main js-lbContainer">
							';
			$__templater->includeCss('attachments.less');
			$__finalCompiled .= '
							<ul class="attachmentList articleBody-attachments">
								' . $__compilerTemp5 . '
							</ul>
						</article>
					</div>
				</div>
			</div>
		</div>
	';
		}
		$__finalCompiled .= '

	';
		$__compilerTemp6 = '';
		$__compilerTemp6 .= '
									';
		if ($__templater->isTraversable($__vars['postsImages'])) {
			foreach ($__vars['postsImages'] AS $__vars['attachment']) {
				if ($__vars['attachment']['has_thumbnail']) {
					$__compilerTemp6 .= '
										' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
						'attachment' => $__vars['attachment'],
						'canView' => $__templater->method($__vars['article']['Discussion'], 'canViewAttachments', array()),
					), $__vars) . '
									';
				}
			}
		}
		$__compilerTemp6 .= '
								';
		if (strlen(trim($__compilerTemp6)) > 0) {
			$__finalCompiled .= '
		<div class="block block--messages">
			<div class="block-container">
				<h3 class="block-header">' . 'Member submitted images via discussion thread posts' . '</h3>
				<div class="block-body lbContainer js-articleBody"
					data-xf-init="lightbox"
					data-lb-id="article-' . $__templater->escape($__vars['article']['article_id']) . '"
					data-lb-caption-desc="' . ($__vars['article']['User'] ? $__templater->escape($__vars['article']['User']['username']) : $__templater->escape($__vars['article']['username'])) . ' &middot; ' . $__templater->func('date_time', array($__vars['article']['publish_date'], ), true) . '">

					<div class="articleBody">
						<article class="articleBody-main js-lbContainer">
							';
			$__templater->includeCss('attachments.less');
			$__finalCompiled .= '
							<ul class="attachmentList articleBody-attachments">
								' . $__compilerTemp6 . '
							</ul>
						</article>
					</div>
				</div>
			</div>
		</div>
	';
		}
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
}
);