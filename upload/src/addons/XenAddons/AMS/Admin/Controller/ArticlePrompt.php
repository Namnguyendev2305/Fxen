<?php

namespace XenAddons\AMS\Admin\Controller;

use XF\Admin\Controller\AbstractPrompt;
use XF\Mvc\Entity\ArrayCollection;
use XF\Mvc\ParameterBag;
use XF\Mvc\FormAction;

class ArticlePrompt extends AbstractPrompt
{
	protected function preDispatchController($action, ParameterBag $params)
	{
		$this->assertAdminPermission('articleManagementSystem');
	}

	protected function getClassIdentifier()
	{
		return 'XenAddons\AMS:ArticlePrompt';
	}

	protected function getLinkPrefix()
	{
		return 'xa-ams/prompts';
	}

	protected function getTemplatePrefix()
	{
		return 'xa_ams_article_prompt';
	}

	protected function getCategoryParams(\XenAddons\AMS\Entity\ArticlePrompt $prompt)
	{
		/** @var \XenAddons\AMS\Repository\Category $categoryRepo */
		$categoryRepo = \XF::repository('XenAddons\AMS:Category');
		$categoryTree = $categoryRepo->createCategoryTree($categoryRepo->findCategoryList()->fetch());
		
		/** @var \XF\Mvc\Entity\ArrayCollection $categoryPromptAssociations */
		$categoryPromptAssociations = $prompt->getRelationOrDefault('CategoryPrompts', false);		

		return [
			'categoryTree' => $categoryTree,
			'categoryIds' => $categoryPromptAssociations->pluckNamed('category_id')
		];
	}

	protected function promptAddEditResponse(\XF\Entity\AbstractPrompt $prompt)
	{
		$reply = parent::promptAddEditResponse($prompt);

		if ($reply instanceof \XF\Mvc\Reply\View)
		{
			$reply->setParams($this->getCategoryParams($prompt));
		}

		return $reply;
	}

	protected function quickSetAdditionalData(FormAction $form, ArrayCollection $prompts)
	{
		$input = $this->filter([
			'apply_category_ids' => 'bool',
			'category_ids' => 'array-uint'
		]);

		if ($input['apply_category_ids'])
		{
			$form->complete(function() use($prompts, $input)
			{
				$mapRepo = $this->getCategoryPromptRepo();

				foreach ($prompts AS $prompt)
				{
					$mapRepo->updatePromptAssociations($prompt, $input['category_ids']);
				}
			});
		}

		return $form;
	}

	public function actionQuickSet()
	{
		$reply = parent::actionQuickSet();

		if ($reply instanceof \XF\Mvc\Reply\View)
		{
			if ($reply->getTemplateName() == $this->getTemplatePrefix() . '_quickset_editor')
			{
				$categoryParams = $this->getCategoryParams($reply->getParam('prompt'));
				$reply->setParams($categoryParams);
			}
		}

		return $reply;
	}

	protected function saveAdditionalData(FormAction $form, \XF\Entity\AbstractPrompt $prompt)
	{
		$categoryIds = $this->filter('category_ids', 'array-uint');

		$form->complete(function() use($prompt, $categoryIds)
		{
			$this->getCategoryPromptRepo()->updatePromptAssociations($prompt, $categoryIds);
		});

		return $form;
	}

	/**
	 * @return \XenAddons\AMS\Repository\CategoryPrompt
	 */
	protected function getCategoryPromptRepo()
	{
		return $this->repository('XenAddons\AMS:CategoryPrompt');
	}
}