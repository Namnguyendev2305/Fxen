<?php
// FROM HASH: d1d0a1a9f1526a98d5405888975363ab
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['contentLink'] = $__templater->preEscaped($__templater->func('link_type', array('public', 'ams', $__vars['content'], ), true));
	$__compilerTemp1['contentTitle'] = $__templater->preEscaped($__templater->escape($__vars['content']['title']));
	$__finalCompiled .= $__templater->includeTemplate('widget_def_options_poll_base', $__compilerTemp1);
	return $__finalCompiled;
}
);