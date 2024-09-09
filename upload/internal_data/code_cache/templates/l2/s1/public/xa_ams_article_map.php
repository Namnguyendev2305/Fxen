<?php
// FROM HASH: 27aa14f73386780b9d5b0047cc2e22ad
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->func('prefix', array('ams_article', $__vars['article'], 'escaped', ), true) . ($__vars['article']['meta_title'] ? $__templater->escape($__vars['article']['meta_title']) : $__templater->escape($__vars['article']['title'])) . ' - ' . 'Map');
	$__finalCompiled .= '

';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['pageSelected'] = 'map';
	$__templater->wrapTemplate('xa_ams_article_wrapper', $__compilerTemp1);
	$__finalCompiled .= '

';
	if ($__vars['article']['location'] AND ($__vars['category']['allow_location'] AND (($__vars['xf']['options']['xaAmsLocationDisplayType'] == 'map_own_tab') AND $__vars['xf']['options']['xaAmsGoogleMapsEmbedApiKey']))) {
		$__finalCompiled .= '
	<div class="block">
		';
		$__compilerTemp2 = '';
		$__compilerTemp2 .= '
					' . $__templater->callMacro('xa_ams_article_wrapper_macros', 'action_buttons', array(
			'article' => $__vars['article'],
		), $__vars) . '
				';
		if (strlen(trim($__compilerTemp2)) > 0) {
			$__finalCompiled .= '
			<div class="block-outer">
				<div class="block-outer-opposite">
				' . $__compilerTemp2 . '
				</div>
			</div>
		';
		}
		$__finalCompiled .= '

		<div class="block-container">
			<h3 class="block-header">' . 'Nơi ở' . '</h3>
			<div class="block-body block-row contentRow-lesser">
				<p class="mapLocationName"><a href="' . $__templater->func('link', array('misc/location-info', '', array('location' => $__vars['article']['location'], ), ), true) . '" rel="nofollow" target="_blank" class="">' . $__templater->escape($__vars['article']['location']) . '</a></p>
			</div>	
			<div class="block-body block-row">
				<div class="mapContainer">
					<iframe
						width="100%" height="600" frameborder="0" style="border: 0"
						src="https://www.google.com/maps/embed/v1/place?key=' . $__templater->escape($__vars['xf']['options']['xaAmsGoogleMapsEmbedApiKey']) . '&q=' . $__templater->filter($__vars['article']['location'], array(array('censor', array()),), true) . ($__vars['xf']['options']['xaAmsLocalizeGoogleMaps'] ? ('&language=' . $__templater->filter($__vars['xf']['language']['language_code'], array(array('substr', array()),), true)) : '') . '">
					</iframe>
				</div>
			</div>	
		</div>
	</div>
';
	}
	return $__finalCompiled;
}
);