<?php
// FROM HASH: f0fee82b08928845129f1203ddfec041
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->func('prefix', array('ams_article', $__vars['article'], 'escaped', ), true) . $__templater->escape($__vars['article']['title']));
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['article'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	if ($__vars['article']['location'] AND ($__vars['category']['allow_location'] AND $__vars['xf']['options']['xaAmsGoogleMapsEmbedApiKey'])) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
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