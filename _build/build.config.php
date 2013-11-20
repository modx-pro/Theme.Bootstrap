<?php

/* define package */
define('PKG_NAME','Theme.Bootstrap');
define('PKG_NAME_LOWER','themebootstrap');

define('PKG_VERSION','2.0.0');
define('PKG_RELEASE','pl');
define('PKG_AUTO_INSTALL', true);

/* define paths */
if (isset($_SERVER['MODX_BASE_PATH'])) {
	define('MODX_BASE_PATH', $_SERVER['MODX_BASE_PATH']);
}
elseif (is_file(dirname(dirname(dirname(__FILE__))) . '/index.php' )) {
	define('MODX_BASE_PATH', dirname(dirname(dirname(__FILE__))) . '/');
}
else {
	define('MODX_BASE_PATH', dirname(dirname(dirname(dirname(__FILE__)))) . '/');
}
define('MODX_CORE_PATH', MODX_BASE_PATH . 'core/');
define('MODX_MANAGER_PATH', MODX_BASE_PATH . 'manager/');
define('MODX_CONNECTORS_PATH', MODX_BASE_PATH . 'connectors/');
define('MODX_ASSETS_PATH', MODX_BASE_PATH . 'assets/');

define('MODX_BASE_URL','/modx/');
define('MODX_CORE_URL', MODX_BASE_URL . 'core/');
define('MODX_MANAGER_URL', MODX_BASE_URL . 'manager/');
define('MODX_CONNECTORS_URL', MODX_BASE_URL . 'connectors/');
define('MODX_ASSETS_URL', MODX_BASE_URL . 'assets/');

/* define build options */
define('BUILD_CHUNK_UPDATE', false);
define('BUILD_TEMPLATE_UPDATE', false);

define('BUILD_CHUNK_STATIC', false);
define('BUILD_TEMPLATE_STATIC', false);

$BUILD_RESOLVERS= array(
	'demo',
	'setup'
);