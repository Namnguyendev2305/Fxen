<?php

return function($__templater, array $__vars, array $__options = [])
{
	$__widget = \XF::app()->widget()->widget('xa_ams_latest_comments', $__options)->render();

	return $__widget;
};