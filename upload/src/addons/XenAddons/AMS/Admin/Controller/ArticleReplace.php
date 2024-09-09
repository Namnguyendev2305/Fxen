<?php

namespace XenAddons\AMS\Admin\Controller;

use XF\Admin\Controller\AbstractController;
use XF\Mvc\ParameterBag;

class ArticleReplace extends AbstractController
{
	protected function preDispatchController($action, ParameterBag $params)
	{
		$this->assertAdminPermission('articleManagementSystem');
	}
	
	public function actionIndex()
	{
		return $this->view('XenAddons\AMS:ArticleReplace\Index', 'xa_ams_articlereplace_index');
	}

	public function actionReplace()
	{
		$this->assertPostOnly();

		$input = $this->filter([
			'quick_find' => 'str',
			'regex' => 'str',
			'replace' => 'str',
			'commit' => 'uint'
		]);
		
		
		// Articles
		
		$articleFinder = $this->finder('XenAddons\AMS:ArticleItem');
		
		/** @var \XenAddons\AMS\Entity\ArticleItem[] $articles */
		$articles = $articleFinder
			->where(
				'message', 'like',
				$articleFinder->escapeLike(
					$input['quick_find'], '%?%'
				)
			)
			->order('article_id')
			->fetch();		
		
		$outputArticles = [];
		foreach ($articles AS $articleId => $article)
		{
			if (preg_match_all($input['regex'], $article->message, $matches))
			{
				$outputArticles[$articleId] = $article->toArray();
				$outputArticles[$articleId]['found'] = $matches[0];
				$outputArticles[$articleId]['replaced'] = preg_replace($input['regex'], $input['replace'], $outputArticles[$articleId]['found']);

				$message = preg_replace($input['regex'], $input['replace'], $article->message);

				if ($input['commit'])
				{
					/** @var \XenAddons\AMS\Service\ArticleItem\Edit $editor */
					$editor = $this->service('XenAddons\AMS:ArticleItem\Edit', $article);

					$editor->setIsAutomated();
					$editor->logEdit(false);
					$editor->logHistory(false);
					$editor->setMessage($message, false);

					$editor->save();
				}
			}
		}
		if ($input['commit'])
		{
			$outputArticles = []; // this will clear the results from the form after processing.
		}
		
		
		// Article Pages		
		
		$articlePageFinder = $this->finder('XenAddons\AMS:ArticlePage');
		
		/** @var \XenAddons\AMS\Entity\ArticlePage[] $articlePages */
		$articlePages = $articlePageFinder
			->where(
				'message', 'like',
				$articlePageFinder->escapeLike(
					$input['quick_find'], '%?%'
				)
			)
			->order('page_id')
			->fetch();
		
		$outputArticlePages = [];
		foreach ($articlePages AS $articlePageId => $articlePage)
		{
			if (preg_match_all($input['regex'], $articlePage->message, $matches))
			{
				$outputArticlePages[$articlePageId] = $articlePage->toArray();
				$outputArticlePages[$articlePageId]['found'] = $matches[0];
				$outputArticlePages[$articlePageId]['replaced'] = preg_replace($input['regex'], $input['replace'], $outputArticlePages[$articlePageId]['found']);
		
				$message = preg_replace($input['regex'], $input['replace'], $articlePage->message);
		
				if ($input['commit'])
				{
					/** @var \XenAddons\AMS\Service\Page\Edit $editor */
					$editor = $this->service('XenAddons\AMS:Page\Edit', $articlePage);
		
					$editor->setIsAutomated();
					$editor->logEdit(false);
					$editor->logHistory(false);
					$editor->setMessage($message, false);
		
					$editor->save();
				}
			}
		}
		if ($input['commit'])
		{
			$outputArticlePages = []; // this will clear the results from the form after processing.
		}	
			
		
		// Article Comments
		
		$commentFinder = $this->finder('XenAddons\AMS:Comment');
		
		/** @var \XenAddons\AMS\Entity\Comment[] $comments */
		$comments = $commentFinder
			->where(
				'message', 'like',
				$commentFinder->escapeLike(
					$input['quick_find'], '%?%'
				)
			)
			->order('comment_id')
			->fetch();
		
		$outputComments = [];
		foreach ($comments AS $commentId => $comment)
		{
			if (preg_match_all($input['regex'], $comment->message, $matches))
			{
				$outputComments[$commentId] = $comment->toArray();
				$outputComments[$commentId]['found'] = $matches[0];
				$outputComments[$commentId]['replaced'] = preg_replace($input['regex'], $input['replace'], $outputComments[$commentId]['found']);
		
				$message = preg_replace($input['regex'], $input['replace'], $comment->message);
		
				if ($input['commit'])
				{
					/** @var \XenAddons\AMS\Service\Comment\Editor $editor */
					$editor = $this->service('XenAddons\AMS:Comment\Editor', $comment);
		
					$editor->setIsAutomated();
					$editor->logEdit(false);
					$editor->logHistory(false);
					$editor->setMessage($message, false);
		
					$editor->save();
				}
			}
		}
		if ($input['commit'])
		{
			$outputComments = []; // this will clear the results from the form after processing.
		}		
		
		
		// Article Reviews
		
		$reviewFinder = $this->finder('XenAddons\AMS:ArticleRating');
		
		/** @var \XenAddons\AMS\Entity\ArticleRating[] $reviews */
		$reviews = $reviewFinder
			->where(
				'message', 'like',
				$reviewFinder->escapeLike(
					$input['quick_find'], '%?%'
				)
			)
			->where('is_review', 1)
			->order('rating_id')
			->fetch();
		
		$outputReviews = [];
		foreach ($reviews AS $ratingId => $review)
		{
			if (preg_match_all($input['regex'], $review->message, $matches))
			{
				$outputReviews[$ratingId] = $review->toArray();
				$outputReviews[$ratingId]['found'] = $matches[0];
				$outputReviews[$ratingId]['replaced'] = preg_replace($input['regex'], $input['replace'], $outputReviews[$ratingId]['found']);
		
				$message = preg_replace($input['regex'], $input['replace'], $review->message);
		
				if ($input['commit'])
				{
					/** @var \XenAddons\AMS\Service\Review\Edit $editor */
					$editor = $this->service('XenAddons\AMS:Review\Edit', $review);
		
					$editor->setIsAutomated();
					$editor->logEdit(false);
					$editor->logHistory(false);
					$editor->setMessage($message, false);
		
					$editor->save();
				}
			}
		}		
		if ($input['commit'])
		{
			$outputReviews = []; // this will clear the results from the form after processing.
		}
		
		
		$viewParams = [
			'input' => $input,
			'articles' => $outputArticles,
			'articlePages' => $outputArticlePages,
			'articleComments' => $outputComments,
			'articleReviews' => $outputReviews
		];
		return $this->view('XenAddons\AMS:ArticleReplace\Index', 'xa_ams_articlereplace_index', $viewParams);
	}
}