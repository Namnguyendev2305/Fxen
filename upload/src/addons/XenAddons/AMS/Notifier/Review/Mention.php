<?php

namespace XenAddons\AMS\Notifier\Review;

use XF\Notifier\AbstractNotifier;
use XenAddons\AMS\Entity\ArticleRating;

class Mention extends AbstractNotifier
{
	/**
	 * @var ArticleRating
	 */
	protected $rating;

	public function __construct(\XF\App $app, ArticleRating $rating)
	{
		parent::__construct($app);

		$this->rating = $rating;
	}

	public function canNotify(\XF\Entity\User $user)
	{
		return ($this->rating->isVisible() && $user->user_id != $this->rating->user_id);
	}

	public function sendAlert(\XF\Entity\User $user)
	{
		$review = $this->rating;
		
		// need to check to see if the review is ANONYMOUS and not include USER information for the alert!
		
		if ($review->is_anonymous)
		{
			return $this->basicAlert(
				$user, 0, 'Anonymous', 'ams_rating', $review->rating_id, 'mention'
			);
		}
		else
		{
			return $this->basicAlert(
				$user, $review->user_id, $review->username, 'ams_rating', $review->rating_id, 'mention'
			);
		}
	}
}