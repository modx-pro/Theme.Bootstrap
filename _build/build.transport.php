<?php

require_once 'build.config.php';
$root = dirname(dirname(__FILE__)) . '/';
$sources = [
    'root' => $root,
    'build' => $root . '_build/',
    'data' => $root . '_build/data/',
    'resolvers' => $root . '_build/resolvers/',
    'chunks' => $root . 'assets/components/' . PKG_NAME_LOWER . '/elements/chunks/',
    'templates' => $root . 'assets/components/' . PKG_NAME_LOWER . '/elements/templates/',
    'docs' => $root . 'assets/components/' . PKG_NAME_LOWER . '/docs/',
    'source_assets' => $root . 'assets/components/' . PKG_NAME_LOWER,
];
unset($root);
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';

$modx = new modX();
$modx->initialize('mgr');
echo '<pre>'; /* used for nice formatting of log messages */
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget('ECHO');
$modx->getService('error', 'error.modError');

$modx->loadClass('transport.modPackageBuilder', '', false, true);
$builder = new modPackageBuilder($modx);
$builder->createPackage(PKG_NAME_LOWER, PKG_VERSION, PKG_RELEASE);
$builder->registerNamespace(PKG_NAME_LOWER, false, true, '{core_path}components/' . PKG_NAME_LOWER . '/');

$modx->log(modX::LOG_LEVEL_INFO, 'Created Transport Package and Namespace.');
$attributes = [
    'vehicle_class' => 'xPDOFileVehicle',
];
$data = [
    'source' => $sources['source_assets'],
    'target' => "return MODX_ASSETS_PATH . 'components/';",
];
$vehicle = $builder->createVehicle($data, $attributes);

$modx->log(modX::LOG_LEVEL_INFO, 'Adding file resolvers to category...');
foreach ($BUILD_RESOLVERS as $resolver) {
    if ($vehicle->resolve('php', ['source' => $sources['resolvers'] . 'resolve.' . $resolver . '.php'])) {
        $modx->log(modX::LOG_LEVEL_INFO, 'Added resolver "' . $resolver . '" to category.');
    } else {
        $modx->log(modX::LOG_LEVEL_INFO, 'Could not add resolver "' . $resolver . '" to category.');
    }
}
$builder->putVehicle($vehicle);

// add templates
if (defined('BUILD_TEMPLATE_UPDATE')) {
    $attributes = [
        'vehicle_class' => 'xPDOObjectVehicle',
        xPDOTransport::PRESERVE_KEYS => false,
        xPDOTransport::UPDATE_OBJECT => BUILD_TEMPLATE_UPDATE,
        xPDOTransport::UNIQUE_KEY => 'templatename',
    ];
    /** @noinspection PhpIncludeInspection */
    $templates = require $sources['data'] . 'transport.templates.php';
    /** @var modTemplate $template */
    foreach ($templates as $template) {
        $vehicle = $builder->createVehicle($template, $attributes);
        $builder->putVehicle($vehicle);
    }
    $modx->log(modX::LOG_LEVEL_INFO, 'Packaged in ' . count($templates) . ' templates.');
}

// add chunks
$package_chunks = [];
if (defined('BUILD_CHUNK_UPDATE')) {
    $attributes = [
        'vehicle_class' => 'xPDOObjectVehicle',
        xPDOTransport::PRESERVE_KEYS => false,
        xPDOTransport::UPDATE_OBJECT => BUILD_CHUNK_UPDATE,
        xPDOTransport::UNIQUE_KEY => 'name',
    ];
    /** @noinspection PhpIncludeInspection */
    $chunks = require $sources['data'] . 'transport.chunks.php';
    /** @var modChunk $chunk */
    foreach ($chunks as $chunk) {
        $vehicle = $builder->createVehicle($chunk, $attributes);
        $builder->putVehicle($vehicle);
        $package_chunks[] = $chunk->name;
    }
    $modx->log(modX::LOG_LEVEL_INFO, 'Packaged in ' . count($chunks) . ' chunks.');
}

/** @noinspection PhpUndefinedVariableInspection */
$builder->setPackageAttributes([
    'changelog' => file_get_contents($sources['docs'] . 'changelog.txt'),
    'license' => file_get_contents($sources['docs'] . 'license.txt'),
    'readme' => file_get_contents($sources['docs'] . 'readme.txt'),
    'chunks' => $package_chunks,
    'setup-options' => [
        'source' => $sources['build'] . 'setup.options.php',
    ],
]);
$modx->log(modX::LOG_LEVEL_INFO, 'Added package attributes and setup options.');
$modx->log(modX::LOG_LEVEL_INFO, 'Packing up transport package zip...');
$builder->pack();


$totalTime = sprintf("%2.4f s", $totalTime);

$signature = $builder->getSignature();
if (defined('PKG_AUTO_INSTALL') && PKG_AUTO_INSTALL) {
    $sig = explode('-', $signature);
    $versionSignature = explode('.', $sig[1]);

    /** @var modTransportPackage $package */
    if (!$package = $modx->getObject('transport.modTransportPackage', ['signature' => $signature])) {
        $package = $modx->newObject('transport.modTransportPackage');
        $package->set('signature', $signature);
        $package->fromArray([
            'created' => date('Y-m-d h:i:s'),
            'updated' => null,
            'state' => 1,
            'workspace' => 1,
            'provider' => 0,
            'source' => $signature . '.transport.zip',
            'package_name' => PKG_NAME,
            'version_major' => $versionSignature[0],
            'version_minor' => !empty($versionSignature[1]) ? $versionSignature[1] : 0,
            'version_patch' => !empty($versionSignature[2]) ? $versionSignature[2] : 0,
        ]);
        if (!empty($sig[2])) {
            $r = preg_split('/([0-9]+)/', $sig[2], -1, PREG_SPLIT_DELIM_CAPTURE);
            if (is_array($r) && !empty($r)) {
                $package->set('release', $r[0]);
                $package->set('release_index', (isset($r[1]) ? $r[1] : '0'));
            } else {
                $package->set('release', $sig[2]);
            }
        }
        $package->save();
    }

    if ($package->install()) {
        $modx->runProcessor('system/clearcache');
    }
}
if (!empty($_GET['download'])) {
    echo '<script>document.location.href = "/core/packages/' . $signature . '.transport.zip' . '";</script>';
}

$modx->log(modX::LOG_LEVEL_INFO, 'Execution time: ' . round(microtime(true) - $modx->startTime, 5) . 's');
echo '</pre>';