<?php
// FROM HASH: f1221fbaeae2eafbca70bfafec90a64f
return array(
'macros' => array('go_article_bar' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
		'watchType' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<table cellpadding="10" cellspacing="0" border="0" width="100%" class="linkBar">
	<tr>
		<td>
			<a href="' . $__templater->func('link', array('canonical:ams', $__vars['article'], ), true) . '" class="button">' . 'View this article' . '</a>
		</td>
		<td align="' . ($__vars['xf']['isRtl'] ? 'left' : 'right') . '">
			';
	if ($__vars['watchType'] == 'author') {
		$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('canonical:watched/ams-authors', ), true) . '" class="buttonFake">' . 'Watched authors' . '</a>			
			';
	} else if ($__vars['watchType'] == 'category') {
		$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('canonical:watched/ams-categories', ), true) . '" class="buttonFake">' . 'Watched categories' . '</a>
			';
	} else if ($__vars['watchType'] == 'series') {
		$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('canonical:watched/ams-series', ), true) . '" class="buttonFake">' . 'Watched series' . '</a>
			';
	} else if ($__vars['watchType'] == 'article') {
		$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('canonical:watched/ams-articles', ), true) . '" class="buttonFake">' . 'Watched articles' . '</a>
			';
	}
	$__finalCompiled .= '
		</td>
	</tr>
	</table>
';
	return $__finalCompiled;
}
),
'watched_category_footer' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'category' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . '<p class="minorText">Please do not reply to this message. You must visit the forum to reply.</p>

<p class="minorText">This message was sent to you because you opted to watch the category "' . $__templater->escape($__vars['category']['title']) . '" at ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' with email notification of new articles.</p>

<p class="minorText">If you no longer wish to receive these emails, you may <a href="' . $__templater->func('link', array('canonical:email-stop/content', $__vars['xf']['toUser'], array('t' => 'ams_category', 'id' => $__vars['category']['category_id'], ), ), true) . '">disable emails from this category</a> or <a href="' . $__templater->func('link', array('canonical:email-stop/all', $__vars['xf']['toUser'], ), true) . '">disable all emails</a>.</p>' . '
';
	return $__finalCompiled;
}
),
'watched_series_footer' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'series' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . '<p class="minorText">Please do not reply to this message. You must visit the forum to reply.</p>

<p class="minorText">This message was sent to you because you opted to watch the series "' . $__templater->escape($__vars['series']['title']) . '" at ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' with email notification of new articles.</p>

<p class="minorText">If you no longer wish to receive these emails, you may <a href="' . $__templater->func('link', array('canonical:email-stop/content', $__vars['xf']['toUser'], array('t' => 'ams_series', 'id' => $__vars['series']['series_id'], ), ), true) . '">disable emails from this series</a> or <a href="' . $__templater->func('link', array('canonical:email-stop/all', $__vars['xf']['toUser'], ), true) . '">disable all emails</a>.</p>' . '
';
	return $__finalCompiled;
}
),
'watched_article_footer' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'article' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . '<p class="minorText">Please do not reply to this message. You must visit the forum to reply.</p>

<p class="minorText">This message was sent to you because you opted to watch the article "' . $__templater->escape($__vars['article']['title']) . '" at ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' with email notification of article updates, new comments and new reviews.</p>

<p class="minorText">If you no longer wish to receive these emails, you may <a href="' . $__templater->func('link', array('canonical:email-stop/content', $__vars['xf']['toUser'], array('t' => 'ams_article', 'id' => $__vars['article']['article_id'], ), ), true) . '">disable emails from this article</a> or <a href="' . $__templater->func('link', array('canonical:email-stop/all', $__vars['xf']['toUser'], ), true) . '">disable all emails</a>.</p>' . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

';
	return $__finalCompiled;
}
);