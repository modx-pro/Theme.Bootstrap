<?php
/**
 * Add templates to build
 * 
 * @package themebootstrap
 * @subpackage build
 */
$templates = array();

$templates[0]= $modx->newObject('modTemplate');
$templates[0]->fromArray(array(
    'id' => 0,
    'templatename' => 'Bootstrap',
    'description' => '',
    'content' => file_get_contents($sources['source_assets'].'/elements/templates/bootstrap.tpl'),
),'',true,true);

return $templates;
