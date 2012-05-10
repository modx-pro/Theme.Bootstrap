<?php
/**
 * Theme.Bootstrap
 *
 * Copyright 2010 by Shaun McCormick <shaun+themebootstrap@modx.com>
 *
 * Theme.Bootstrap is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * Theme.Bootstrap is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Theme.Bootstrap; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package themebootstrap
 */
/**
 * Theme.Bootstrap Connector
 *
 * @package themebootstrap
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$corePath = $modx->getOption('themebootstrap.core_path',null,$modx->getOption('core_path').'components/themebootstrap/');
require_once $corePath.'model/themebootstrap/themebootstrap.class.php';
$modx->themebootstrap = new Theme.Bootstrap($modx);

$modx->lexicon->load('themebootstrap:default');

/* handle request */
$path = $modx->getOption('processorsPath',$modx->themebootstrap->config,$corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));