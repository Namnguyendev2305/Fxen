<?php

namespace XenAddons\AMS\Notifier\Article;

class AuthorWatch extends AbstractWatch
{
	protected function getApplicableActionTypes()
	{
		return ['article'];
	}

	public function getDefaultWatchNotifyData()
	{
		$article = $this->article;
		
		// if the article was created via RSS Feed with no author, then lets return an empty array here!
		if (!$article->User)
		{
			return [];
		}
		
		$author = $article->User;
		$category = $article->Category;

		$checkAuthors[] = $author->user_id;

		// Look at any records watching this author. 
		
		$finder = $this->app()->finder('XenAddons\AMS:AuthorWatch');
		$finder->where('author_id', $checkAuthors)
			->where('User.user_state', '=', 'valid')
			->where('User.is_banned', '=', 0)
			->where('author_id', $author->user_id)
			->whereOr(
				['send_alert', '>', 0],
				['send_email', '>', 0]
			);

		if ($this->actionType == 'update')
		{
			$finder->where('notify_on', 'update');
		}
		else
		{
			$finder->where('notify_on', ['article', 'update']);
		}

		$activeLimit = $this->app()->options()->watchAlertActiveOnly;
		if (!empty($activeLimit['enabled']))
		{
			$finder->where('User.last_activity', '>=', \XF::$time - 86400 * $activeLimit['days']);
		}

		$notifyData = [];
		foreach ($finder->fetchColumns(['user_id', 'send_alert', 'send_email']) AS $watch)
		{
			$notifyData[$watch['user_id']] = [
				'alert' => (bool)$watch['send_alert'],
				'email' => (bool)$watch['send_email']
			];
		}

		return $notifyData;
	}

	protected function getWatchEmailTemplateName()
	{
		return 'xa_ams_watched_author_' . ($this->actionType == 'article' ? 'article' : 'update');
	}
}