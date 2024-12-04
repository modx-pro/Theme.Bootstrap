<?php

define('PKG_NAME', 'Theme.Bootstrap');
define('PKG_NAME_LOWER', 'themebootstrap');

define('PKG_VERSION', '4.0.0');
define('PKG_RELEASE', 'pl');
define('PKG_AUTO_INSTALL', false);

define('BUILD_SETTING_UPDATE', false);
define('BUILD_CHUNK_UPDATE', false);
define('BUILD_TEMPLATE_UPDATE', false);

define('BUILD_CHUNK_STATIC', false);
define('BUILD_TEMPLATE_STATIC', false);

$BUILD_RESOLVERS = [
    'setup',
    'update',
    'settings',
];

$root = dirname(__FILE__,2) . '/';
$sources = [
    'root' => $root,
    'build' => $root . '_build/',
    'data' => $root . '_build/data/',
    'resolvers' => $root . '_build/resolvers/',
    'chunks' => $root . 'core/components/' . PKG_NAME_LOWER . '/elements/chunks/',
    'templates' => $root . 'core/components/' . PKG_NAME_LOWER . '/elements/templates/',
    'lexicon' => $root . 'core/components/' . PKG_NAME_LOWER . '/lexicon/',
    'docs' => $root . 'core/components/' . PKG_NAME_LOWER . '/docs/',
    'source_core' => $root . 'core/components/' . PKG_NAME_LOWER,
    'source_assets' => $root . 'assets/components/' . PKG_NAME_LOWER,
];

unset($root);