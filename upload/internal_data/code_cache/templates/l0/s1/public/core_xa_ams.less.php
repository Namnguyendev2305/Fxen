<?php
// FROM HASH: 0fa9453eb027bcd432feeffeb36ea17b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// ############################ MISC AMS CSS ######################

.structItem-status
{
	&--amsArticle::before { .m-faContent(@fa-var-newspaper, 1.2em); color: @xf-textColorDimmed; }
	&--poll::before { .m-faContent(@fa-var-chart-bar); }
}

.contentRow-amsLocation
{
	font-size: @xf-fontSizeSmaller;
	color: @xf-textColorDimmed;
	padding-bottom: @xf-paddingMedium;

	.contentRow-amsLocationIcon
	{
		font-size: @xf-fontSizeSmall;
		padding-left: @xf-paddingSmall;
	}
}

.message-title .amsOsUrlCheckFailure
{
	font-size: @xf-fontSizeLarger;
	font-weight: @xf-fontWeightHeavy;
	color: @xf-errorColor;
}

.amsArticleSearchResultRow .contentRow-figure,
.amsSeriesSearchResultRow .contentRow-figure
{
	max-width: 100px;
}

.avatar.avatar--articleIconDefault
{
	color: @xf-textColorMuted !important;
	background: mix(@xf-textColorMuted, @xf-avatarBg, 25%) !important;
	text-align: center;
	line-height: 1.5;

	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;

	> span:before
	{
		.m-faBase();
		.m-faContent(@fa-var-cog, .86em);
		vertical-align: -0.03em;
	}
}';
	return $__finalCompiled;
}
);