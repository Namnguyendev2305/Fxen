<?php

namespace XenAddons\AMS\Service\ArticleItem;

class OsUrlChecker extends \XF\Service\AbstractService
{
	/**
	 * @var ArticleItem
	 */
	protected $article;

	public function __construct(\XF\App $app, \XenAddons\AMS\Entity\ArticleItem $article)
	{
		parent::__construct($app);
		$this->article = $article;
	}

	public function httpResponseStatusCode()
	{
        return $this->getHttpResponseStatusCode();
    }

    protected function getHttpResponseStatusCode()
    {
        $httpResponseStatusCode = 0;
        
        $article = $this->article;

        if (isset($article->original_source['os_source_url']) && $article->original_source['os_source_url'])
        {
        	$osUrl = $article->original_source['os_source_url'];
        	
	        try
	        {
	            $ch = curl_init($osUrl);
	            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	            curl_setopt($ch, CURLOPT_HEADER, true);
	            curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
	            curl_setopt($ch, CURLOPT_FAILONERROR, true);
	            curl_setopt($ch, CURLOPT_NOBODY, true);
	            curl_setopt($ch, CURLOPT_REFERER, $osUrl);
	            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0');
	            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	            curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
	            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	
	            curl_exec($ch);
	            
	            $httpResponseStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	
	            curl_close($ch);
	        }
	        catch (\Exception $e)
	        {
	        }
        }

        return $httpResponseStatusCode;
    }
}