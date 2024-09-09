<?php
// FROM HASH: da44cc542e9f2dedceea972bbd80fe88
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block-row block-row--separated">
	' . $__templater->func('bb_code', array($__vars['report']['content_info']['message'], 'ams_article', ($__vars['content'] ?: $__vars['report']['User']), ), true) . '
</div>
<div class="block-row block-row--separated block-row--minor">
	<div>
		<dl class="pairs pairs--inline">
			<dt>' . 'Article' . '</dt>
			<dd><a href="' . $__templater->func('link', array('ams', $__vars['report']['content_info'], ), true) . '">' . $__templater->escape($__vars['report']['content_info']['title']) . '</a></dd>
		</dl>
	</div>
	<div>
		<dl class="pairs pairs--inline">
			<dt>' . 'Chuyên mục' . '</dt>
			<dd><a href="' . $__templater->func('link', array('ams/categories', $__vars['report']['content_info'], ), true) . '">' . $__templater->escape($__vars['report']['content_info']['category_title']) . '</a></dd>
		</dl>
	</div>
</div>';
	return $__finalCompiled;
}
);