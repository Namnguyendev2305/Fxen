<?php
// FROM HASH: 87819ce92c2b9ffaaa2d840e8afb4756
return array(
'macros' => array('article_page_options' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'category' => '!',
		'article' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__templater->setPageParam('amsCategory', $__vars['category']);
	$__finalCompiled .= '

	';
	$__templater->setPageParam('searchConstraints', array('Articles' => array('search_type' => 'ams_article', ), 'This category' => array('search_type' => 'ams_article', 'c' => array('categories' => array($__vars['category']['category_id'], ), 'child_categories' => 1, ), ), ));
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';

	return $__finalCompiled;
}
);