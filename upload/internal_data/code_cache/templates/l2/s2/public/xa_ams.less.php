<?php
// FROM HASH: d3e776a1bba39def7e956370893c99d7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '// ############################ MISC CSS ######################

.ams-muted
{
	color: @xf-textColorMuted;
}

.amsNextArticle,
.amsPreviousArticle,
.amsNextPage,
.amsPreviousPage
{
	font-size: @xf-fontSizeNormal;
	font-weight: @xf-fontWeightHeavy;
}

.amsSetCoverImage-attachments .attachment-icon.attachment-icon--img img 
{
	max-height: 100px;
	max-width: 100%;
}

.amsSetCoverImage-attachments .avatar
{
	border-radius: 0;
}

.structItem--article.awaiting
{
	background-color: @xf-inlineModHighlightColor;
}


// ############################ CAROUSEL Full/Simple CSS ######################

.carousel--amsFeaturedArticles .contentRow-figure
{
	width: 175px;
	margin-left:10px;
	float:right;	
}

.carousel--amsFeaturedSeries .contentRow-figure
{
	width: 150px;
	margin-left:10px;
	float:right;	
}

.carousel--amsFeaturedArticles .carousel-item
{
	&.is-unread
	{
		.contentRow-title
		{
			font-weight: @xf-fontWeightHeavy;
		}
	}
}

.carousel--amsFeaturedArticles,
.carousel--amsFeaturedSeries
{
	.contentRow-title
	{
		font-size: @xf-fontSizeLarger;
	}	
}

.carousel--amsCarousleSimple,
.carousel--amsFeaturedArticlesSimple
{
	.contentRow-figure
	{
		width: 100%;
		float: none;
		margin: 0 auto;
	}
	
	.contentRow-title
	{
		font-size: @xf-fontSizeNormal;
	}

	.carousel-body
	{
		height: 100% !important;
	}
}

.carousel--amsFeaturedArticles .contentRow-amsCategory,
.carousel--amsFeaturedSeries .contentRow-amsSeries
{
	font-size: @xf-fontSizeSmaller;
	font-style: italic;
	color: @xf-textColorMuted;
	padding-bottom: 2px;
}

.carousel--amsFeaturedArticles .contentRow-lesser,
.carousel--amsFeaturedSeries .contentRow-lesser
{
	padding: 5px 0;
}

.carousel--amsFeaturedSeries .contentRow-amsLatestArticle
{
	font-size: @xf-fontSizeSmaller;
	font-style: italic;
	color: @xf-textColorMuted;
	padding-top: 5px;
}

.carousel--amsFeaturedArticles .contentRow-articleLocation
{
	font-size: @xf-fontSizeSmaller;
	color: @xf-textColorDimmed;
	margin-top: @xf-paddingSmall;
}

.carousel--amsFeaturedArticles .contentRow-articleLocationIcon
{
	font-size: @xf-fontSizeSmaller;
	padding-left: @xf-paddingSmall;
}

.carousel--amsFeaturedArticles .contentRow-articleCustomFields
{
	font-size: @xf-fontSizeSmaller;
	margin-top: @xf-paddingSmall;
	margin-bottom: @xf-paddingSmall;
}

.carousel--amsFeaturedArticles .contentRow-articleMeta
{
	padding-top: @xf-paddingSmall
}

@media (max-width: @xf-responsiveMedium)
{
	.carousel--amsFeaturedArticles .contentRow-figure,
	.carousel--amsFeaturedSeries .contentRow-figure	
	{
		width: 150px;
	}
	
	.carousel--amsFeaturedArticles,
	.carousel--amsFeaturedSeries
	{
		.contentRow-title
		{
			font-size: @xf-fontSizeLarge;
		}	
	}
}

@media (max-width: @xf-responsiveNarrow)
{
	.carousel--amsFeaturedArticles .contentRow-figure,
	.carousel--amsFeaturedSeries .contentRow-figure	
	{
		width: 125px;
	}
}

@media (max-width: 374px)
{
	.carousel--amsFeaturedArticles .contentRow-figure,
	.carousel--amsFeaturedSeries .contentRow-figure
	{
		width: 100px;
	}
}

// ############################ ARTICLE LIST (non layout specific) CSS ######################

.ratingStars--amsAuthorRating .ratingStars-star.ratingStars-star--full::before,
.ratingStars--amsAuthorRating .ratingStars-star.ratingStars-star--half::after
{
	color: #176093;
}

.structItem-cell.structItem-cell--icon.structItem-cell--iconExpanded.structItem-cell--iconAmsCoverImage,
.structItem-cell.structItem-cell--icon.structItem-cell--iconExpanded.structItem-cell--iconAmsSeriesCoverImage  
{
    width: 175px;
}

.structItem-cell--iconAmsCoverImage .structItem-iconContainer .avatar,
.structItem-cell--iconAmsSeriesCoverImage .structItem-iconContainer .avatar
{
	width: 96px;
	height: 96px;
	font-size: 57.6px;
}

@media (max-width: @xf-responsiveMedium)
{
	.structItem-cell.structItem-cell--icon.structItem-cell--iconExpanded.structItem-cell--iconAmsCoverImage,
	.structItem-cell.structItem-cell--icon.structItem-cell--iconExpanded.structItem-cell--iconAmsSeriesCoverImage 
	{
    		width: 150px;		
	}
}

@media (max-width: @xf-responsiveNarrow)
{
	.structItem-cell.structItem-cell--icon.structItem-cell--iconExpanded.structItem-cell--iconAmsCoverImage,
	.structItem-cell.structItem-cell--icon.structItem-cell--iconExpanded.structItem-cell--iconAmsSeriesCoverImage  
	{
    		width: 125px;		
	}
}

@media (max-width: 374px)
{
	.structItem-cell.structItem-cell--icon.structItem-cell--iconExpanded.structItem-cell--iconAmsCoverImage,
	.structItem-cell.structItem-cell--icon.structItem-cell--iconExpanded.structItem-cell--iconAmsSeriesCoverImage 
	{
		width: 100px;
	}

	.structItem-cell--iconAmsCoverImage .structItem-iconContainer .avatar,
	.structItem-cell--iconAmsSeriesCoverImage .structItem-iconContainer .avatar
	{
		width: 48px;
		height: 48px;
		font-size: 28.8px;
	}
}

// #################################### LIST VIEW LAYOUT SPECIFIC CSS ########################

.structItem-cell.structItem-cell--listViewLayout
{
	display: block;
	padding-bottom: .2em;
}

.structItem-cell.structItem-cell--listViewLayout .structItem-minor 
{
	float: none !important;
}

.structItem-cell.structItem-cell--listViewLayout
{
	.structItem-title
	{
		font-size: @xf-fontSizeLarger;
		padding-bottom: @xf-paddingSmall;
	}	
}

.structItem-articleCategoryTitleHeader
{
	font-size: @xf-fontSizeSmaller;
	font-style: italic;
	color: @xf-textColorMuted;
}

.structItem-LatestArticleTitleFooter
{
	padding-top: @xf-paddingSmall;
	font-size: @xf-fontSizeSmaller;
	font-style: italic;
	color: @xf-textColorMuted;
}

.structItem-articleLocation
{
	font-size: @xf-fontSizeSmaller;
	color: @xf-textColorDimmed;
	padding-bottom: @xf-paddingSmall;

	.structItem-articleLocationIcon
	{
		font-size: @xf-fontSizeSmaller;
		padding-left: @xf-paddingSmall;
	}
}

.structItem-articleDescription
{
	font-size: @xf-fontSizeSmaller;
	padding-top: @xf-paddingSmall;
	padding-bottom: @xf-paddingSmall;
}

.structItem-articleCustomFields
{
	font-size: @xf-fontSizeSmaller;
	padding-bottom: @xf-paddingSmall;
}

.structItem-listViewMeta
{
	padding-bottom: @xf-paddingSmall;
	color: @xf-textColorMuted;

	.pairs
	{
		display: inline;

		&:before,
		&:after
		{
			display: none;
		}

		> dt,
		> dd
		{
			display: inline;
			float: none;
			margin: 0;
		}
	}

	.structItem-metaItem
	{
		display: inline;
	}

	.ratingStarsRow
	{
		display: inline;

		.ratingStarsRow-text
		{
			display: none;
		}
	}

	.structItem-metaItem--author > dt,
	.structItem-metaItem--publishdate > dt,
	.structItem-metaItem--articleReadTime > dt
	{
		display: none;
	}

	.structItem-metaItem + .structItem-metaItem:before
	{
		display: inline;
		content: "\\20\\00B7\\20";
		color: @xf-textColorMuted;
	}
}

@media (max-width: @xf-responsiveMedium)
{
	.structItem-cell.structItem-cell--listViewLayout
	{
		.structItem-title
		{
			font-size: @xf-fontSizeLarge;
		}	
	}
}


// #################################### ARTICLE VIEW LAYOUT SPECIFIC CSS ########################

.message--articleView
{
	&.is-unread
	{
		.message-attribution-amsArticleTitle .contentRow-title
		{
			font-weight: @xf-fontWeightHeavy;
		}
	}
	&.is-moderated
	{
		background: @xf-contentHighlightBg;
	}

	&.is-deleted
	{
		opacity: .7;

		.message-attribution-amsArticleTitle .contentRow-title
		{
			text-decoration: line-through;
		}
	}
}

.message--articleView .message-cell.message-cell--main
{
	padding-left: @xf-messagePadding;
}

.message--articleView .message-attribution-amsCategoryTitle
{
	font-style: italic;
}

.message--articleView .message-attribution-amsArticleTitle
{
	border-bottom: none;

	.contentRow-title
	{
		font-size: @xf-fontSizeLarger;

		.label 
		{
    			font-weight: @xf-fontWeightNormal;
		}
	}
}

.message--articleView .message-attribution-amsArticleLocation
{
	border-bottom: none;
	font-size: @xf-fontSizeSmall;
	color: @xf-textColorDimmed;

	.message-attribution-amsArticleLocationIcon
	{
		padding-left: @xf-paddingSmall;
		font-size: @xf-fontSizeSmall;
	}
}

.message--articleView .message-attribution-amsArticleMeta
{
	border-bottom: none;
}

@media (max-width: @xf-responsiveMedium)
{
	.message--articleView .message-attribution-amsArticleTitle .contentRow-title
	{
		font-size: @xf-fontSizeLarge;
	}
}


// #################################### ARTICLE BODY / VIEW SPECIFIC CSS ########################

.articleBody
{
	display: flex;
}

.articleBody .message-attribution-amsPageMeta
{
	margin-top: -10px;
	margin-bottom: 10px;
}

.articleBody-main
{
	flex: 1;
	min-width: 0;
	padding: @xf-blockPaddingV @xf-blockPaddingH;
	
	';
	if ($__templater->func('property', array('xbMessageLink', ), false)) {
		$__finalCompiled .= '
		.bbWrapper a { .xf-xbMessageLink(); &:hover { .xf-xbMessageLinkHover(); } }
	';
	}
	$__finalCompiled .= '
}

.articleBody-aboutAuthor
{
	flex: 1;
	min-width: 0;
	padding-top: 5px;
}

.articleBody-sidebar
{
	flex: 0 0 auto;
	width: 250px;
	.xf-contentAltBase();
	border-left: @xf-borderSize solid @xf-borderColor;
	padding: @xf-blockPaddingV @xf-blockPaddingH;
	font-size: @xf-fontSizeSmall;

	> :first-child
	{
		margin-top: 0;
	}

	> :last-child
	{
		margin-bottom: 0;
	}
}

.articleBody-fields
{
	&.articleBody-fields--header
	{
		margin-top: @xf-paddingLarge;
		padding-top: @xf-paddingMedium;
	}

	&.articleBody-fields--before
	{
		margin-bottom: @xf-paddingLarge;
		padding-bottom: @xf-paddingMedium;
		border-bottom: @xf-borderSize solid @xf-borderColorLight;
	}

	&.articleBody-fields--after
	{
		margin-top: @xf-paddingLarge;
		padding-top: @xf-paddingMedium;
		border-top: @xf-borderSize solid @xf-borderColorLight;
	}
}

.articleBody-attachments
{
	margin: .5em 0;
}

.articleBody .actionBar-set
{
	margin-top: @xf-messagePadding;
	font-size: @xf-fontSizeSmall;
}

.articleSidebarGroup
{
	margin-bottom: @xf-elementSpacer;

	&.articleSidebarGroup--buttons
	{
		> .button
		{
			display: block;
			margin: 5px 0;

			&:first-child
			{
				margin-top: 0;
			}

			&:last-child
			{
				margin-bottom: 0;
			}
		}
	}
}

.articleSidebarGroup-title
{
	margin: 0;
	padding: 0;

	font-size: @xf-fontSizeLarge;
	font-weight: @xf-fontWeightNormal;
	color: @xf-textColorFeature;
	padding-bottom: @xf-paddingMedium;

	.m-hiddenLinks();
}

.articleSidebarList
{
	.m-listPlain();

	> li
	{
		padding: @xf-paddingSmall 0;

		&:first-child
		{
			padding-top: 0;
		}

		&:last-child
		{
			padding-bottom: 0;
		}
	}
}

@media (max-width: @xf-responsiveWide)
{
	.articleBody
	{
		display: block;
	}

	.articleBody-sidebar
	{
		width: auto;
		border-left: none;
		border-top: @xf-borderSize solid @xf-borderColor;
	}

	.articleSidebarGroup
	{
		max-width: 600px;
		margin-left: auto;
		margin-right: auto;
	}
}

// #################################### ARTICLE PAGE LIST SPECIFIC CSS ########################

.message-attribution-amsPageTitle
{
	border-bottom: none !important;
}

.message-attribution-amsPageTitle .contentRow-title
{
	font-size: @xf-fontSizeLarge;
	font-weight: @xf-fontWeightHeavy;
}

.message-attribution-amsPageMeta
{
	border-bottom: none !important;
}

.message-attribution-amsPageStats
{
	padding-top: 5px;
	border-bottom: none !important;
}


@media (max-width: @xf-responsiveNarrow)
{
	.message-attribution-amsPageTitle .contentRow-title
	{
		font-size: @xf-fontSizeNormal;
	}
}


// #################################### SERIES LIST SPECIFIC CSS ########################

.structItem-status
{
	&--community::before { .m-faContent(@fa-var-users, 1.04em); color: @xf-textColorFeature; }	
}

.structItem-seriesTitleHeader
{
	font-size: @xf-fontSizeSmall;
}

.actionBarSeries
{
	font-size: @xf-fontSizeSmall;	
}


// #################################### SERIES BODY / VIEW SPECIFIC CSS ########################

.seriesBody
{
	display: flex;
}

.seriesBody-main
{
	flex: 1;
	min-width: 0;
	padding: @xf-blockPaddingV @xf-blockPaddingH;
	
	';
	if ($__templater->func('property', array('xbMessageLink', ), false)) {
		$__finalCompiled .= '
		.bbWrapper a { .xf-xbMessageLink(); &:hover { .xf-xbMessageLinkHover(); } }
	';
	}
	$__finalCompiled .= '	
}

.seriesBody-sidebar
{
	flex: 0 0 auto;
	width: 250px;
	.xf-contentAltBase();
	border-left: @xf-borderSize solid @xf-borderColor;
	padding: @xf-blockPaddingV @xf-blockPaddingH;
	font-size: @xf-fontSizeSmall;

	> :first-child
	{
		margin-top: 0;
	}

	> :last-child
	{
		margin-bottom: 0;
	}
}

.seriesBody-attachments
{
	margin: .5em 0;
}

.seriesBody .actionBar-set
{
	margin-top: @xf-messagePadding;
	font-size: @xf-fontSizeSmall;
}

.blogSidebarGroup,
.blogEntrySidebarGroup
{
	margin-bottom: @xf-elementSpacer;

	&.blogEntrySidebarGroup--buttons
	{
		> .button
		{
			display: block;
			margin: 5px 0;

			&:first-child
			{
				margin-top: 0;
			}

			&:last-child
			{
				margin-bottom: 0;
			}
		}
	}
}

.seriesSidebarGroup-title
{
	margin: 0;
	padding: 0;

	font-size: @xf-fontSizeLarge;
	font-weight: @xf-fontWeightNormal;
	color: @xf-textColorFeature;
	padding-bottom: @xf-paddingMedium;

	.m-hiddenLinks();
}

.seriesSidebarList
{
	.m-listPlain();

	> li
	{
		padding: @xf-paddingSmall 0;

		&:first-child
		{
			padding-top: 0;
		}

		&:last-child
		{
			padding-bottom: 0;
		}
	}
}

@media (max-width: @xf-responsiveWide)
{
	.seriesBody
	{
		display: block;
	}

	.seriesBody-sidebar
	{
		width: auto;
		border-left: none;
		border-top: @xf-borderSize solid @xf-borderColor;
	}

	.seriesSidebarGroup
	{
		max-width: 600px;
		margin-left: auto;
		margin-right: auto;
	}
}


// #################################### COVER IMAGE CONTAINER FOR ARTICLE VIEW LAYOUT AND ARTICLE VIEW ####################################

.amsCoverImage
{
	position: relative;
	margin-bottom: @xf-elementSpacer;

	&.has-caption
	{
		margin-bottom: 0px;
	}
}

.message--articleView .amsCoverImage
{
	margin-top: @xf-paddingLarge;
}

.amsCoverImage-container
{
	display: flex;
	justify-content: center;
	align-items: center;

	border: 1px solid transparent;

	min-height: 50px;

	img
	{
		max-width: 100%;
		max-height: 80vh;
	}

	.amsCoverImage-container-image
	{
		position: relative;
	}
}

.amsCoverImage-caption
{
	font-style: italic;
	color: @xf-textColorDimmed;
	margin-bottom: @xf-elementSpacer;
}


// #################################### CATEGORY MAP SPECIFIC CSS ########################

.amsMapContainer {}

	.amsMapContainer.top 
	{
		padding-bottom: @xf-paddingLarge;
	}
	
	.amsMapContainer.bottom {}

.amsMapInfoWindow 
{
	width: 400px;
}
	
.amsMapInfoWindowItem
{
	font-size: @xf-fontSizeSmall;
	font-weight: @xf-fontWeightNormal;  
	word-wrap: normal;
}

	.amsMapInfoWindowItem .listBlock
	{
		vertical-align: top;
	}

	.amsMapInfoWindowItem .listBlockInner
	{
		padding-right: 5px;		
	}

	.amsMapInfoWindowItem .listBlockInnerImage 
	{
		padding: 0px;
	}

	.amsMapInfoWindowItem .articleCoverImage
	{
		width: 20%;
		min-width: 100px;
		max-width: 100px;
	}

		.amsMapInfoWindowItem .articleCoverImage.left
		{
			float: left;
			margin-right: 10px;
		}

		.amsMapInfoWindowItem .articleCoverImage .thumbImage
		{
			width: 100%;
			vertical-align: middle;
		}

		.amsMapInfoWindowItem .articleCoverImage .listBlockInner
		{
			padding-right: 0px;
		}

	.amsMapInfoWindowItem .title 
	{
		font-size: @xf-fontSizeLarge;
		font-weight:  @xf-fontWeightHeavy;
		padding: 5px 0;	 
	}
	
	.amsMapInfoWindowItem .address, 
	.amsMapInfoWindowItem .authorRating, 
	.amsMapInfoWindowItem .userRating
	{
		padding: 2px 0;
	}

	.amsMapInfoWindowItem .ams-muted
	{
		color: @xf-textColorMuted;
	}		

@media (max-width: @xf-responsiveMedium)
{
	.amsMapInfoWindow 
	{
		width: 100%;
	}

	.amsMapInfoWindowItem
	{
		font-size: @xf-fontSizeSmaller;
	}

	.amsMapInfoWindow .amsMapInfoWindowItem .articleCoverImage
	{
		width: 10%;
		min-width: 75px;
		max-width: 75px;
	}	

	.amsMapInfoWindow .amsMapInfoWindowItem .title
	{
		font-size: @xf-fontSizeNormal;
	}			
}

@media (max-width: @xf-responsiveNarrow)
{
	.amsMapInfoWindow 
	{
		width: 100%;
	}

	.amsMapInfoWindowItem
	{
		font-size: @xf-fontSizeSmallest;
	}

	.amsMapInfoWindow .amsMapInfoWindowItem .articleCoverImage
	{
		width: 10%;
		min-width: 50px;
		max-width: 50px;
	}	

	.amsMapInfoWindow .amsMapInfoWindowItem .title
	{
		font-size: @xf-fontSizeSmall;
	}				
}';
	return $__finalCompiled;
}
);