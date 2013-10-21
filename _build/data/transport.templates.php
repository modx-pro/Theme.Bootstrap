<?php

$templates = array();

$tmp = array(
	'Bootstrap.main' => array(
		'file' => 'main',
		'description' => 'Template for main page with documents list',
	),
	'Bootstrap.inner' => array(
		'file' => 'inner',
		'description' => 'Template for inner pages with display of content',
	),
);

foreach ($tmp as $k => $v) {
	/* @avr modTemplate $template */
	$template = $modx->newObject('modTemplate');
	$template->fromArray(array(
		'id' => 0,
		'templatename' => $k,
		'description' => @$v['description'],
		'content' => file_get_contents($sources['source_assets'].'/elements/templates/template.'.$v['file'].'.tpl'),
		'static' => BUILD_TEMPLATE_STATIC,
		'source' => 1,
		'static_file' => 'assets/components/'.PKG_NAME_LOWER.'/elements/templates/template.'.$v['file'].'.tpl',
	),'',true,true);

	$templates[] = $template;
}

unset($tmp);
return $templates;