<?php
// FROM HASH: 476eae026c6f458b35f059e4cb3038cc
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Hoạt động mới nhất của ' . $__templater->escape($__vars['user']['username']) . '');
	$__finalCompiled .= '

';
	$__templater->setPageParam('head.' . 'metaNoindex', $__templater->preEscaped('<meta name="robots" content="noindex" />'));
	$__finalCompiled .= '

';
	if ($__vars['restricted']) {
		$__finalCompiled .= '
	<div class="blockMessage">
		' . '' . $__templater->escape($__vars['user']['username']) . ' hạn chế người có thể xem hoạt động mới nhất của họ.' . '
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			';
		if (!$__templater->test($__vars['newsFeedItems'], 'empty', array())) {
			$__finalCompiled .= '
				<ul class="block-body js-newsFeedTarget">
					';
			if ($__templater->isTraversable($__vars['newsFeedItems'])) {
				foreach ($__vars['newsFeedItems'] AS $__vars['item']) {
					$__finalCompiled .= '
						' . $__templater->callMacro('news_feed_macros', 'feed_row', array(
						'item' => $__vars['item'],
					), $__vars) . '
					';
				}
			}
			$__finalCompiled .= '
				</ul>
				<div class="block-footer js-newsFeedLoadMore">
					<span class="block-footer-controls">' . $__templater->button('
						' . 'Hiển thị mục cũ hơn' . '
					', array(
				'href' => $__templater->func('link', array('members/latest-activity', $__vars['user'], array('before_id' => $__vars['oldestItemId'], ), ), false),
				'data-xf-click' => 'inserter',
				'data-append' => '.js-newsFeedTarget',
				'data-replace' => '.js-newsFeedLoadMore',
			), '', array(
			)) . '</span>
				</div>
			';
		} else if ($__vars['beforeId']) {
			$__finalCompiled .= '
				<div class="block-body js-newsFeedTarget">
					<div class="block-row block-row--separated">' . 'There are no more items to show.' . '</div>
				</div>
			';
		} else {
			$__finalCompiled .= '
				<div class="block-body js-newsFeedTarget">
					<div class="block-row">' . 'Luồng tin hiện tại đang trống.' . '</div>
				</div>
			';
		}
		$__finalCompiled .= '
		</div>

		<div class="block-outer block-outer--after">
			<div class="block-outer-opposite">
				' . $__templater->func('show_ignored', array(array(
		))) . '
			</div>
		</div>
	</div>
';
	}
	return $__finalCompiled;
}
);