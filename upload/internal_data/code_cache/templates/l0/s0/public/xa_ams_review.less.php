<?php
// FROM HASH: 7c6f6c4b529e2e6793a24ecdd539271d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.ams-review .ams-review-fields
{
	&.ams-review-fields--top
	{
		padding-top: @xf-paddingMedium;
		padding-bottom: @xf-paddingMedium;
	}

	&.ams-review-fields--middle
	{
		margin-bottom: @xf-paddingLarge;
		padding-bottom: @xf-paddingMedium;
	}

	&.ams-review-fields--bottom
	{
		margin-top: @xf-paddingLarge;
		padding-top: @xf-paddingMedium;
	}
}

.ams-review .message-body.ams-pros-container,
.ams-review .message-body.ams-cons-container
{
	margin-bottom: 10px;
}

.ams-review .ams-pros-container
{
    color: green;
}

.ams-review .ams-cons-container
{
    color: #B40000;	
}

.ams-review .pros-header,
.ams-review .cons-header
{
	font-weight: bold;
}

' . $__templater->includeTemplate('message.less', $__vars);
	return $__finalCompiled;
}
);