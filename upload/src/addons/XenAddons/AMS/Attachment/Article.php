<?php

namespace XenAddons\AMS\Attachment;

use XF\Attachment\AbstractHandler;
use XF\Entity\Attachment;
use XF\Mvc\Entity\Entity;

class Article extends AbstractHandler
{
	public function getContainerWith()
	{
		$visitor = \XF::visitor();
		
		return ['Category', 'Category.Permissions|' . $visitor->permission_combination_id];
	}

	public function canView(Attachment $attachment, Entity $container, &$error = null)
	{
		/** @var \XenAddons\AMS\Entity\ArticleItem $container */
		if (!$container->canView())
		{
			return false;
		}
		
		return $container->canViewAttachments();
	}

	public function canManageAttachments(array $context, &$error = null)
	{
		$category = $this->getCategoryFromContext($context);

		return $category && $category->canUploadAndManageArticleAttachments();
	}

	public function onAttachmentDelete(Attachment $attachment, Entity $container = null)
	{
		if (!$container)
		{
			return;
		}

		/** @var \XenAddons\AMS\Entity\ArticleItem $container */
		$container->attach_count--;
		$container->save();
	}

	public function getConstraints(array $context)
	{
		/** @var \XF\Repository\Attachment $attachRepo */
		$attachRepo = \XF::repository('XF:Attachment');
		
		$constraints = \XF::repository('XenAddons\AMS:Article')->getArticleAttachmentConstraints();
		
		$category = $this->getCategoryFromContext($context);
		
		$maxAllowedAttachmentsPerArticle = -1;
		
		if ($category)
		{
			$maxAllowedAttachmentsPerArticle = $category->getMaxAllowedAttachmentsPerArticle();
		}
		
		if ($maxAllowedAttachmentsPerArticle == 0) // in this case, we want 0 to count as unlimited
		{
			$maxAllowedAttachmentsPerArticle = -1;
		}
		$constraints['count'] = $maxAllowedAttachmentsPerArticle;
		
		if ($category && $category->canUploadArticleVideos())
		{
			$constraints = $attachRepo->applyVideoAttachmentConstraints($constraints);
		}
		
		return $constraints;
	}

	public function getContainerIdFromContext(array $context)
	{
		return isset($context['article_id']) ? intval($context['article_id']) : null;
	}

	public function getContainerLink(Entity $container, array $extraParams = [])
	{
		return \XF::app()->router('public')->buildLink('ams', $container, $extraParams);
	}

	public function getContext(Entity $entity = null, array $extraContext = [])
	{
		if ($entity instanceof \XenAddons\AMS\Entity\ArticleItem)
		{
			$extraContext['article_id'] = $entity->article_id;
		}
		else if ($entity instanceof \XenAddons\AMS\Entity\Category)
		{
			$extraContext['category_id'] = $entity->category_id;
		}
		else
		{
			throw new \InvalidArgumentException("Entity must be article or category");
		}

		return $extraContext;
	}
	
	protected function getCategoryFromContext(array $context)
	{
		$em = \XF::em();
	
		if (!empty($context['article_id']))
		{
			/** @var \XenAddons\AMS\Entity\ArticleItem $article */
			$article = $em->find('XenAddons\AMS:ArticleItem', intval($context['article_id']), ['Category']);
			if (!$article || !$article->canView())
			{
				return null;
			}

			$category = $article->Category;
		}
		else if (!empty($context['category_id']))
		{
			/** @var \XenAddons\AMS\Entity\Category $category */
			$category = $em->find('XenAddons\AMS:Category', intval($context['category_id']));
			if (!$category || !$category->canView() || !$category->canAddArticle())
			{
				return null;
			}
		}
		else
		{
			return null;
		}
	
		return $category;
	}	
}