<?php

return function($__templater, array $__vars, array $__options = [])
{
	$__widget = \XF::app()->widget()->widget('xa_ams_latest_reviews', $__options)->render();

	return $__widget;
};