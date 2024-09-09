<?php
// FROM HASH: 6a95eaa5f703031ee3c8bc1d0f268e5e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="contentRow-title">
	' . '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['newsFeed']['username'], ), ), true) . ' added a new page ' . (((('<a href="' . $__templater->func('link', array('ams/page', $__vars['content'], ), true)) . '">') . $__templater->escape($__vars['content']['title'])) . '</a>') . ' to the article ' . ((((('<a href="' . $__templater->func('link', array('ams/page', $__vars['content'], ), true)) . '">') . $__templater->func('prefix', array('ams_article', $__vars['content']['Article'], ), true)) . $__templater->escape($__vars['content']['Article']['title'])) . '</a>') . '.' . '
</div>

<div class="contentRow-snippet">
	' . $__templater->func('snippet', array($__vars['content']['message'], $__vars['xf']['options']['newsFeedMessageSnippetLength'], array('stripQuote' => true, ), ), true) . '
</div>
';
	if ($__vars['content']['attach_count']) {
		$__finalCompiled .= '
	' . $__templater->callMacro('news_feed_attached_images', 'attached_images', array(
			'attachments' => $__vars['content']['Attachments'],
			'link' => $__templater->func('link', array('ams/page', $__vars['content'], ), false),
		), $__vars) . '
';
	}
	$__finalCompiled .= '

<div class="contentRow-minor">' . $__templater->func('date_dynamic', array($__vars['newsFeed']['event_date'], array(
	))) . '</div>';
	return $__finalCompiled;
}
);