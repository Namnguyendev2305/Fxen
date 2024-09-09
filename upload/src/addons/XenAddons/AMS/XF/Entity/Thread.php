<?php

namespace XenAddons\AMS\XF\Entity;

use XF\Mvc\Entity\Structure;

class Thread extends XFCP_Thread
{
	public function canConvertThreadToAmsArticle(&$error = null)
	{
		// only visible threads can be converted to an article
		if ($this->discussion_state != 'visible')
		{
			return false; 
		}
		
		// Check for valid ThreadType
		if ($this->discussion_type == 'discussion' || $this->discussion_type == 'article')
		{
			return \XF::visitor()->hasNodePermission($this->node_id, 'convertTheadToAmsArticle');
		}
		
		return false;
	}
}