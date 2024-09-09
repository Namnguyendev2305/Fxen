<?php
// FROM HASH: 6d5fb6d2e7efb7b868e60ce347595788
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.amsEmbedTabs
{
	.amsEmbedTabs-tab
	{
		position: relative;

		.badge
		{
			display: none;
		}

		&.has-selected
		{
			.badge
			{
				display: inline;

				&.badge--highlighted
				{
					color: @xf-paletteColor1;
					background: @xf-paletteColor3;
				}
			}
		}
	}
}

.amsArticleList
{
	&.amsArticleList--picker
	{
		.amsArticleList-item
		{
			-webkit-touch-callout: none;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;

			margin: 5px;
			padding: 5px;

			border-top: @xf-borderSize solid @xf-borderColorLight;

			&:first-child
			{
				border-top: none;
			}

			&.is-selected
			{
				border: 4px solid @xf-borderColorFeature;
			}

			label
			{
				cursor: pointer;
				color: @xf-linkColor;
			}

			img
			{
				-webkit-user-drag: none;
				pointer-events: none; // for IE11
			}
		}

		.amsArticleList-checkbox
		{
			display: none;
		}

		.amsArticleList-footer
		{
			flex-basis: 100%;
			margin: @xf-paddingMedium @xf-paddingSmall;

			.button
			{
				float: right;
			}
		}
	}
}

' . $__templater->includeTemplate('xa_ams.less', $__vars);
	return $__finalCompiled;
}
);