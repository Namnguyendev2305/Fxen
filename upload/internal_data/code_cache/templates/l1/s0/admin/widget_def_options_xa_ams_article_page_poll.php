<?php
// FROM HASH: ca6cc246bd3120634adf0f0b07c1cb6f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['contentLink'] = $__templater->preEscaped($__templater->func('link_type', array('public', 'ams/page', $__vars['content'], ), true));
	$__compilerTemp1['contentTitle'] = $__templater->preEscaped($__templater->escape($__vars['content']['title']));
	$__finalCompiled .= $__templater->includeTemplate('widget_def_options_poll_base', $__compilerTemp1);
	return $__finalCompiled;
}
);