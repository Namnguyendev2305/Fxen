<?php
// FROM HASH: 17e0e0c4ecd5118be1b930dd5052a234
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block"' . $__templater->func('widget_data', array($__vars['widget'], ), true) . '>
	<div class="block-container">
		<h3 class="block-minorHeader">
			<a href="' . $__templater->func('link', array('ams', ), true) . '" rel="nofollow">' . 'Articles statistics' . '</a>
		</h3>
		<div class="block-body block-row block-row--minor">
			<dl class="pairs pairs--justified">
				<dt>' . 'Chuyên mục' . '</dt>
				<dd>' . $__templater->filter($__vars['statsCache']['category_count'], array(array('number', array()),), true) . '</dd>
			</dl>
			<dl class="pairs pairs--justified">
				<dt>' . 'Articles' . '</dt>
				<dd>' . $__templater->filter($__vars['statsCache']['article_count'], array(array('number', array()),), true) . '</dd>
			</dl>
			<dl class="pairs pairs--justified">
				<dt>' . 'Series' . '</dt>
				<dd>' . $__templater->filter($__vars['statsCache']['series_count'], array(array('number', array()),), true) . '</dd>
			</dl>
			<dl class="pairs pairs--justified">
				<dt>' . 'Lượt xem' . '</dt>
				<dd>' . $__templater->filter($__vars['statsCache']['view_count'], array(array('number', array()),), true) . '</dd>
			</dl>
			<dl class="pairs pairs--justified">
				<dt>' . 'Bình luận' . '</dt>
				<dd>' . $__templater->filter($__vars['statsCache']['comment_count'], array(array('number', array()),), true) . '</dd>
			</dl>
			<dl class="pairs pairs--justified">
				<dt>' . 'Ratings' . '</dt>
				<dd>' . $__templater->filter($__vars['statsCache']['rating_count'], array(array('number', array()),), true) . '</dd>
			</dl>
			<dl class="pairs pairs--justified">
				<dt>' . 'Reviews' . '</dt>
				<dd>' . $__templater->filter($__vars['statsCache']['review_count'], array(array('number', array()),), true) . '</dd>
			</dl>
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);