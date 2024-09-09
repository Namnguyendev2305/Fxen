<?php
// FROM HASH: 1c728f8f61ff4d5d24f188d6d1c771c1
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block-row block-row--separated">
	' . $__templater->func('structured_text', array($__vars['report']['content_info']['rating']['message'], ), true) . '
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
			<dt>' . 'Chuyên mục' . '</dt>
			<dd><a href="' . $__templater->func('link', array('ams/categories', $__vars['report']['content_info']['category'], ), true) . '">' . $__templater->escape($__vars['report']['content_info']['category']['title']) . '</a></dd>
		</dl>
	</div>
</div>';
	return $__finalCompiled;
}
);