<?php
// FROM HASH: 238a09ab67f1238370fc4c931910f4fa
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__templater->test($__vars['comments'], 'empty', array())) {
		$__finalCompiled .= '
	' . $__templater->callMacro('activity_summary_macros', 'outer_header', array(
			'title' => $__vars['title'],
		), $__vars) . '

	';
		if ($__templater->isTraversable($__vars['comments'])) {
			foreach ($__vars['comments'] AS $__vars['comment']) {
				$__finalCompiled .= '
		';
				$__vars['header'] = $__templater->preEscaped('
			<a href="' . $__templater->func('link', array('canonical:ams/comment', $__vars['comment'], ), true) . '">
				' . $__templater->escape($__vars['comment']['Content']['title']) . '
			</a>
		');
				$__finalCompiled .= '

		';
				$__compilerTemp1 = '';
				if ($__vars['comment']['reaction_score']) {
					$__compilerTemp1 .= '
				&middot; ' . 'Reaction score' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->filter($__vars['comment']['reaction_score'], array(array('number_short', array()),), true) . '
			';
				}
				$__vars['attribution'] = $__templater->preEscaped('
			' . ($__vars['comment']['User'] ? $__templater->escape($__vars['comment']['User']['username']) : $__templater->escape($__vars['comment']['username'])) . '
			&middot; ' . $__templater->func('date_time', array($__vars['comment']['comment_date'], ), true) . '

			' . $__compilerTemp1 . '
		');
				$__finalCompiled .= '

		';
				$__compilerTemp2 = '';
				if ($__vars['comment']['Content']['cover_image_id']) {
					$__compilerTemp2 .= '
				<div class="quote">
					<span class="articleCoverImage" style="display: inline-block; max-width: 600px; max-height: 400px;">
						<a href="' . $__templater->func('link', array('canonical:ams', $__vars['comment']['Content'], ), true) . '">' . $__templater->func('ams_article_thumbnail', array($__vars['comment']['Content'], ), true) . '</a>
					</span>
				</div>
			';
				}
				$__vars['content'] = $__templater->preEscaped('
			' . $__compilerTemp2 . '

			' . $__templater->func('bb_code_type_snippet', array('emailHtml', $__vars['comment']['message'], 'ams_comment', $__vars['comment'], 300, ), true) . '
		');
				$__finalCompiled .= '

		';
				$__vars['footerOpposite'] = $__templater->preEscaped('
			<a href="' . $__templater->func('link', array('canonical:ams/comments', $__vars['comment'], ), true) . '" class="button button--link">' . 'Read more' . '</a>
		');
				$__finalCompiled .= '

		' . $__templater->callMacro('activity_summary_macros', 'block', array(
					'header' => $__vars['header'],
					'attribution' => $__vars['attribution'],
					'content' => $__vars['content'],
					'footerOpposite' => $__vars['footerOpposite'],
				), $__vars) . '
	';
			}
		}
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
}
);