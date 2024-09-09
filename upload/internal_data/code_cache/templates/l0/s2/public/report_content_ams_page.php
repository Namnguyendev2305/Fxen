<?php
// FROM HASH: 6a5d7231b9d27d5ebd8ff6e02eab4742
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block-row block-row--separated">
	' . $__templater->func('bb_code', array($__vars['report']['content_info']['page']['message'], 'ams_page', ($__vars['content'] ?: $__vars['report']['User']), ), true) . '
</div>
<div class="block-row block-row--separated block-row--minor">
	<div>
		<dl class="pairs pairs--inline">
			<dt>' . 'Article' . '</dt>
			<dd><a href="' . $__templater->func('link', array('ams', $__vars['report']['content_info']['article'], ), true) . '">' . $__templater->escape($__vars['report']['content_info']['article']['title']) . '</a></dd>
		</dl>
	</div>
	<div>
		<dl class="pairs pairs--inline">
			<dt>' . 'Category' . '</dt>
			<dd><a href="' . $__templater->func('link', array('ams/categories', $__vars['report']['content_info']['category'], ), true) . '">' . $__templater->escape($__vars['report']['content_info']['category']['title']) . '</a></dd>
		</dl>
	</div>
</div>';
	return $__finalCompiled;
}
);