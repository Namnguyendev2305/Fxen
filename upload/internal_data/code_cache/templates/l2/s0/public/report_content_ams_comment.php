<?php
// FROM HASH: 578e2aa41654a6f8d11fdd40538d609e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block-row block-row--separated">
	' . $__templater->func('bb_code', array($__vars['report']['content_info']['comment']['message'], 'ams_comment', ($__vars['content'] ?: $__vars['report']['User']), ), true) . '
</div>
<div class="block-row block-row--separated block-row--minor">
	<dl class="pairs pairs--inline">
		<dt>' . 'Article' . '</dt>
		<dd>
			<a href="' . $__templater->func('link', array('ams', array('article_id' => $__vars['report']['content_info']['content_id'], 'title' => $__vars['report']['content_info']['content_title'], ), ), true) . '">' . $__templater->escape($__vars['report']['content_info']['content_title']) . '</a>
		</dd>
	</dl>
</div>';
	return $__finalCompiled;
}
);