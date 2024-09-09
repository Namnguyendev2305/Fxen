<?php

namespace XenAddons\AMS\Cron;

class OsUrlCheck
{
	// Runs hourly checking batches of 100 visible articles with no fail counts
    public static function runOsUrlChecks()
    {
        \XF::app()->jobManager()->enqueueUnique(
        	'xaAmsOsUrlCheck', 
        	'XenAddons\AMS:OsUrlCheck', 
        	[], 
        	false
		);
    }
    
    // Runs daily checking failed Original Source URLS (with at least 1 fail count)
    public static function runFailedOsUrlChecks()
    {
    	\XF::app()->jobManager()->enqueueUnique(
   			'xaAmsOsUrlCheckFail',
   			'XenAddons\AMS:OsUrlCheck',
   			['articles_with_fail_count_only' => true],
   			false
    	);
    }
}