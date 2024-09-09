<?php

namespace XenAddons\AMS\Job;

use \XF\Mvc\Entity\Entity;
use XF\Job\AbstractJob;

class OsUrlCheck extends AbstractJob
{
    protected $defaultData = [
        'articles_with_fail_count_only' => false,
    ];

    public function run($maxRunTime)
	{
		$startTime = microtime(true);

		$articleFinder = $this->app->finder('XenAddons\AMS:ArticleItem');

		$articleFinder
			->where('article_state', 'visible')
			->where('disable_os_url_check', false)
            ->order('os_url_check_date', 'ASC');

		if ($this->data['articles_with_fail_count_only'])
        {
            $articleFinder->where('os_url_check_fail_count', '>', 0);
        }
        else 
        {
        	$articleFinder->where('os_url_check_fail_count', '=', 0);
        }

        $articles = $articleFinder->fetch(100); 

		foreach ($articles AS $article)
		{
			if (isset($article->original_source['os_source_url']) && $article->original_source['os_source_url'])
			{
			    /** @var \XenAddons\AMS\Service\ArticleItem\OsUrlChecker $osUrlChecker */
	            $osUrlChecker = $this->app->service('XenAddons\AMS:ArticleItem\OsUrlChecker', $article);
	
	            $httpResponseStatusCode = $osUrlChecker->httpResponseStatusCode();
	            
	            // REF: https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
				// REF: https://en.wikipedia.org/wiki/List_of_HTTP_status_codes
				// REF: https://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
	            $httpResponseStatusCodeWhiteList = [200,201,202,204,205,206,300,301,302,303,304,307,308]; // TODO make this an configurable option? 
	            
	            if (in_array($httpResponseStatusCode, $httpResponseStatusCodeWhiteList))
	            {
	                $article->set('os_url_check_date', \XF::$time + (86400 * 7));
	                $article->set('os_url_check_fail_count', 0);
	            }
	            else
	            {
	            	$article->set('os_url_check_date', \XF::$time + (86400 * 2));
	            	$article->set('os_url_check_fail_count', $article->os_url_check_fail_count + 1);
	            }
	            
	            $article->set('last_os_url_check_code', $httpResponseStatusCode);
	
	            if ($article->os_url_check_fail_count == 5) // TODO make this configurable option? 
	            {
	                $article->set('article_state', 'moderated');  // TODO instead of moderated, maybe another state with its own queue (like I do for Claims). 
	            }
	
	            $article->save(false);
			}
			else 
			{
				// for articles that do not have an original source, lets simply set the os_url_check_date
				$article->set('os_url_check_date', \XF::$time + (86400 * 7));
				$article->save(false);
			}

			if (microtime(true) - $startTime >= $maxRunTime)
			{
				break;
			}
		}

		return $this->complete();
	}
	
    public function getStatusMessage()
	{
		return \XF::phrase('xa_ams_os_url_check');
	}

	public function canCancel()
	{
		return;
	}

	public function canTriggerByChoice()
	{
		return;
	}
}