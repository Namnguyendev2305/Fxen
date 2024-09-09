<?php
// FROM HASH: afc163d79922fe60708df4614dd46022
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' bây giờ bắt đầu theo dõi bạn.' . '
<push:url>' . $__templater->func('link', array('canonical:members', $__vars['user'], ), true) . '</push:url>';
	return $__finalCompiled;
}
);