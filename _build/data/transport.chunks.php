<?php
/**
 * Add chunks to build
 * 
 * @package themebootstrap
 * @subpackage build
 */

$chunks = array();

$chunks[0]= $modx->newObject('modChunk');
$chunks[0]->fromArray(array(
    'id' => 0,
    'name' => 'tpl.Breadcrumb.container',
    'description' => '',
    'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/breadcrumb.container.tpl'),
),'',true,true);

$chunks[1]= $modx->newObject('modChunk');
$chunks[1]->fromArray(array(
    'id' => 0,
    'name' => 'tpl.Breadcrumb.row',
    'description' => '',
    'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/breadcrumb.row.tpl'),
),'',true,true);

$chunks[2]= $modx->newObject('modChunk');
$chunks[2]->fromArray(array(
    'id' => 0,
    'name' => 'Breadcrumb',
    'description' => '',
    'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/breadcrumb.tpl'),
),'',true,true);

$chunks[3]= $modx->newObject('modChunk');
$chunks[3]->fromArray(array(
    'id' => 0,
    'name' => 'Content',
    'description' => '',
    'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/content.tpl'),
),'',true,true);

$chunks[4]= $modx->newObject('modChunk');
$chunks[4]->fromArray(array(
    'id' => 0,
    'name' => 'Footer',
    'description' => '',
    'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/footer.tpl'),
),'',true,true);


$chunks[5]= $modx->newObject('modChunk');
$chunks[5]->fromArray(array(
    'id' => 0,
    'name' => 'Head',
    'description' => '',
    'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/head.tpl'),
),'',true,true);

$chunks[6]= $modx->newObject('modChunk');
$chunks[6]->fromArray(array(
    'id' => 0,
    'name' => 'Navbar',
    'description' => '',
    'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/navbar.tpl'),
),'',true,true);

$chunks[7]= $modx->newObject('modChunk');
$chunks[7]->fromArray(array(
    'id' => 0,
    'name' => 'Counters',
    'description' => '',
    'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/counters.tpl'),
),'',true,true);

$chunks[8]= $modx->newObject('modChunk');
$chunks[8]->fromArray(array(
    'id' => 0,
    'name' => 'tpl.Wayfinder.row',
    'description' => '',
    'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/wayfinder.row.tpl'),
),'',true,true);

$chunks[9]= $modx->newObject('modChunk');
$chunks[9]->fromArray(array(
    'id' => 0,
    'name' => 'Content.list',
    'description' => '',
    'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/content.list.tpl'),
),'',true,true);

$chunks[10]= $modx->newObject('modChunk');
$chunks[10]->fromArray(array(
    'id' => 0,
    'name' => 'tpl.getResources.row',
    'description' => '',
    'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/getresources.row.tpl'),
),'',true,true);

$chunks[11]= $modx->newObject('modChunk');
$chunks[11]->fromArray(array(
    'id' => 0,
    'name' => 'tpl.Wayfinder.row.inner',
    'description' => '',
    'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/wayfinder.row.inner.tpl'),
),'',true,true);

$chunks[12]= $modx->newObject('modChunk');
$chunks[12]->fromArray(array(
    'id' => 0,
    'name' => 'tpl.Wayfinder.outer',
    'description' => '',
    'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/wayfinder.outer.tpl'),
),'',true,true);

$chunks[13]= $modx->newObject('modChunk');
$chunks[13]->fromArray(array(
    'id' => 0,
    'name' => 'tpl.Wayfinder.row.parent',
    'description' => '',
    'snippet' => file_get_contents($sources['source_assets'].'/elements/chunks/wayfinder.row.parent.tpl'),
),'',true,true);

return $chunks;
