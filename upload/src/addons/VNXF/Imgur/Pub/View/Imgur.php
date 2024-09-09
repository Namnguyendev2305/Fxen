<?php

namespace VNXF\Imgur\Pub\View;

use XF\Mvc\View;

class Imgur extends View
{
	public function renderJson()
	{
		$results = [];
		foreach ($this->params['attachment'] AS $thread)
		{
			$results[] = $thread;
		}
		return [
			'results' => $results
		];
	}
}