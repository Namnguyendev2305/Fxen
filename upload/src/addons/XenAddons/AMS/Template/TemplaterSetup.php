<?php

namespace XenAddons\AMS\Template;

class TemplaterSetup
{
	public function fnAmsArticleThumbnail($templater, &$escape, \XenAddons\AMS\Entity\ArticleItem $article, $additionalClasses = '', $inline = false)
	{
		$escape = false;
		
		$class = 'amsThumbnail amsThumbnail--article';
		if ($additionalClasses)
		{
			$class .= " $additionalClasses";
		}
	
		if (!$article->isVisible())
		{
			$class .= ' amsThumbnail--notVisible amsThumbnail--notVisible--';
			$class .= $article->article_state;
		}
			
		$thumbnailUrl = null;
		$width = 300;
		$height = 300;
		
		if ($article->cover_image_id && $article->CoverImage && $article->CoverImage->thumbnail_url)
		{
			$thumbnailUrl = $article->CoverImage->thumbnail_url;
				
			$width = $article->CoverImage->thumbnail_width ?? 300;
			$height = $article->CoverImage->thumbnail_height ?? 300;
		}
		elseif ($article->Category->content_image_url)
		{
			$baseUrl = \XF::app()->request()->getFullBasePath();
			$imagePath = "/" . $article->Category->content_image_url;
			$thumbnailUrl = $baseUrl . $imagePath;
		}
	
		$outputUrl = null;
		$hasThumbnail = false;
	
		if ($thumbnailUrl)
		{
			$outputUrl = $thumbnailUrl;
			$hasThumbnail = true;
		}
			
		if (!$hasThumbnail)
		{
			$class .= ' amsThumbnail--noThumb';
			$outputUrl = $templater->func('transparent_img');
		}
	
		$title = $templater->filterForAttr($templater, $article->title, $null);
	
		if ($inline)
		{
			$tag = 'span';
		}
		else
		{
			$tag = 'div';
		}
	
		return "<$tag class='$class'>
			<img class='amsThumbnail-image' src='$outputUrl' loading='lazy' width='$width' height='$height' alt='$title' />
			<span class='amsThumbnail-icon'></span>
			</$tag>";
	}
	
	public function fnAmsArticlePageThumbnail($templater, &$escape, \XenAddons\AMS\Entity\ArticlePage $page, \XenAddons\AMS\Entity\ArticleItem $article, $additionalClasses = '', $inline = false)
	{
		$escape = false;
	
		$class = 'amsThumbnail amsThumbnail--article';
		if ($additionalClasses)
		{
			$class .= " $additionalClasses";
		}
	
		if (!$article->isVisible())
		{
			$class .= ' amsThumbnail--notVisible amsThumbnail--notVisible--';
			$class .= $article->article_state;
		}
			
		$thumbnailUrl = null;
		$width = 300;
		$height = 300;
		
		if ($page->cover_image_id && $page->CoverImage && $page->CoverImage->thumbnail_url)
		{
			$thumbnailUrl = $page->CoverImage->thumbnail_url;
			
			$width = $page->CoverImage->thumbnail_width ?? 300;
			$height = $page->CoverImage->thumbnail_height ?? 300;
		}
		elseif ($article->cover_image_id && $article->CoverImage && $article->CoverImage->thumbnail_url)
		{
			$thumbnailUrl = $article->CoverImage->thumbnail_url;
			
			$width = $article->CoverImage->thumbnail_width ?? 300;
			$height = $article->CoverImage->thumbnail_height ?? 300;
		}
		elseif ($article->Category->content_image_url)
		{
			$baseUrl = \XF::app()->request()->getFullBasePath();
			$imagePath = "/" . $article->Category->content_image_url;
			$thumbnailUrl = $baseUrl . $imagePath;
		}
	
		$outputUrl = null;
		$hasThumbnail = false;
	
		if ($thumbnailUrl)
		{
			$outputUrl = $thumbnailUrl;
			$hasThumbnail = true;
		}
			
		if (!$hasThumbnail)
		{
			$class .= ' amsThumbnail--noThumb';
			$outputUrl = $templater->func('transparent_img');
		}
	
		$title = $templater->filterForAttr($templater, $page->title, $null);
	
		if ($inline)
		{
			$tag = 'span';
		}
		else
		{
			$tag = 'div';
		}
	
		return "<$tag class='$class'>
			<img class='amsThumbnail-image' src='$outputUrl' loading='lazy' width='$width' height='$height' alt='$title' />
			<span class='amsThumbnail-icon'></span>
			</$tag>";
	}	
		
	public function fnAmsCategoryIcon($templater, &$escape, \XenAddons\AMS\Entity\ArticleItem $article, $additionalClasses = '', $inline = false)
	{		
		$escape = false;
	
		$class = 'amsThumbnail amsThumbnail--article';
		if ($additionalClasses)
		{
			$class .= " $additionalClasses";
		}
	
		if (!$article->isVisible())
		{
			$class .= ' amsThumbnail--notVisible amsThumbnail--notVisible--';
			$class .= $article->article_state;
		}
	
		$thumbnailUrl = null;
	
		if ($article->Category->content_image_url)
		{
			$baseUrl = \XF::app()->request()->getFullBasePath();
			$imagePath = "/" . $article->Category->content_image_url;
			$thumbnailUrl = $baseUrl . $imagePath;
		}
	
		$outputUrl = null;
		$hasThumbnail = false;
	
		if ($thumbnailUrl)
		{
			$outputUrl = $thumbnailUrl;
			$hasThumbnail = true;
		}
	
		if (!$hasThumbnail)
		{
			$class .= ' amsThumbnail--noThumb';
			$outputUrl = $templater->func('transparent_img');
		}
	
		$title = $templater->filterForAttr($templater, $article->title, $null);
	
		if ($inline)
		{
			$tag = 'span';
		}
		else
		{
			$tag = 'div';
		}
	
		$width = 300;
		$height = 300;
		
		return "<$tag class='$class'>
			<img class='amsThumbnail-image' src='$outputUrl' loading='lazy' width='$width' height='$height' alt='$title' />
			<span class='amsThumbnail-icon'></span>
			</$tag>";
	}

	public function fnAmsSeriesIcon($templater, &$escape, \XenAddons\AMS\Entity\SeriesItem $series, $size = 'm', $href = '')
	{
		$escape = false;
	
		$class = 'amsThumbnail amsThumbnail--series';
	
		if ($href)
		{
			$tag = 'a';
			$hrefAttr = 'href="' . htmlspecialchars($href) . '"';
		}
		else
		{
			$tag = 'span';
			$hrefAttr = '';
		}
	
		$width = 150;
		$height = 150;
		
		if (!$series->icon_date)
		{
			return "<$tag $hrefAttr class=\"avatar avatar--$size avatar--seriesIconDefault\"><span></span></$tag>";
		}
		else
		{
			$src = $series->getIconUrl($size, true);
		
			return "<$tag $hrefAttr class=\"$class\">"
				. '<img class="amsThumbnail-image" src="' . htmlspecialchars($src) . '" loading="lazy" width="150" height="150" alt="' . htmlspecialchars($series->title) . '" />'
				. '<span class="amsThumbnail-icon"></span>'
				. "</$tag>";
		}
	}	
}