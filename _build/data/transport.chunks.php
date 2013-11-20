<?php

$chunks = array();

$tmp = array(
	'Head' => array(
		'file' => 'head',
		'description' => 'Head of site with scripts and styles',
	),
	'Navbar' => array(
		'file' => 'navbar',
		'description' => 'Navbar with main navigation',
	),
	'Footer' => array(
		'file' => 'footer',
		'description' => 'Chunk with footer',
	),
	'Content.main' => array(
		'file' => 'content.main',
		'description' => 'Content of main page',
	),
	'Content.inner' => array(
		'file' => 'content.inner',
		'description' => 'Content of inner pages',
	),
	'Crumbs' => array(
		'file' => 'crumbs',
		'description' => 'Breadcrumbs navigation',
	),

);

foreach ($tmp as $k => $v) {
	/* @avr modChunk $chunk */
	$chunk = $modx->newObject('modChunk');
	$chunk->fromArray(array(
		'id' => 0,
		'name' => $k,
		'description' => @$v['description'],
		'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/chunk.'.$v['file'].'.tpl'),
		'static' => BUILD_CHUNK_STATIC,
		'source' => 1,
		'static_file' => 'assets/components/'.PKG_NAME_LOWER.'/elements/chunks/chunk.'.$v['file'].'.tpl',
	),'',true,true);

	$chunks[] = $chunk;
}

unset($tmp);
return $chunks;