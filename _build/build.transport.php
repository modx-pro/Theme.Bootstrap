<?php
/**
 * Theme.Bootstrap build script
 *
 * @package themebootstrap
 * @subpackage build
 */
$mtime = microtime();
$mtime = explode(' ', $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;
set_time_limit(0);

require_once 'build.config.php';

/* define sources */
$root = dirname(dirname(__FILE__)).'/';
$sources = array(
	'root' => $root,
	'build' => $root . '_build/',
	'data' => $root . '_build/data/',
	'chunks' => $root.'assets/components/'.PKG_NAME_LOWER.'/elements/chunks/',
	'templates' => $root.'assets/components/'.PKG_NAME_LOWER.'/elements/templates/',
	'docs' => $root.'assets/components/'.PKG_NAME_LOWER.'/docs/',
	'source_assets' => $root.'assets/components/'.PKG_NAME_LOWER,
);
unset($root);

/* override with your own defines here (see build.config.sample.php) */
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
require_once $sources['build'] . '/includes/functions.php';

$modx= new modX();
$modx->initialize('mgr');
echo '<pre>'; /* used for nice formatting of log messages */
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget('ECHO');
$modx->getService('error','error.modError');

$modx->loadClass('transport.modPackageBuilder','',false, true);
$builder = new modPackageBuilder($modx);
$builder->createPackage(PKG_NAME_LOWER,PKG_VERSION,PKG_RELEASE);
$builder->registerNamespace(PKG_NAME_LOWER,false,true,'{core_path}components/'.PKG_NAME_LOWER.'/');
$modx->log(modX::LOG_LEVEL_INFO,'Created Transport Package and Namespace.');

/* create category */
$modx->log(xPDO::LOG_LEVEL_INFO,'Created category.');
/* @var modCategory $category */
$category= $modx->newObject('modCategory');
$category->set('id',1);
$category->set('category',PKG_NAME);
/* create category vehicle */
$attr = array(
	xPDOTransport::UNIQUE_KEY => 'category',
	xPDOTransport::PRESERVE_KEYS => false,
	xPDOTransport::UPDATE_OBJECT => true,
	xPDOTransport::RELATED_OBJECTS => true,
);

/* add templates */
if (defined('BUILD_TEMPLATE_UPDATE')) {
	$attr[xPDOTransport::RELATED_OBJECT_ATTRIBUTES]['Templates'] = array (
		xPDOTransport::PRESERVE_KEYS => false,
		xPDOTransport::UPDATE_OBJECT => BUILD_TEMPLATE_UPDATE,
		xPDOTransport::UNIQUE_KEY => 'templatename',
	);
	$templates = include $sources['data'].'transport.templates.php';
	if (!is_array($templates)) {
		$modx->log(modX::LOG_LEVEL_ERROR,'Could not package in templates.');
	} else {
		$category->addMany($templates);
		$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($templates).' templates.');
	}
}
/* add chunks */
if (defined('BUILD_CHUNK_UPDATE')) {
	$attr[xPDOTransport::RELATED_OBJECT_ATTRIBUTES]['Chunks'] = array (
		xPDOTransport::PRESERVE_KEYS => false,
		xPDOTransport::UPDATE_OBJECT => BUILD_CHUNK_UPDATE,
		xPDOTransport::UNIQUE_KEY => 'name',
	);
	$chunks = include $sources['data'].'transport.chunks.php';
	if (!is_array($chunks)) {
		$modx->log(modX::LOG_LEVEL_ERROR,'Could not package in chunks.');
	} else {
		$category->addMany($chunks);
		$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($chunks).' chunks.');
	}
}

$vehicle = $builder->createVehicle($category,$attr);

$modx->log(modX::LOG_LEVEL_INFO,'Adding file resolvers to category...');
$vehicle->resolve('file',array(
	'source' => $sources['source_assets'],
	'target' => "return MODX_ASSETS_PATH . 'components/';",
));

$builder->putVehicle($vehicle);

$builder->setPackageAttributes(array(
	'changelog' => file_get_contents($sources['docs'] . 'changelog.txt'),
	'license' => file_get_contents($sources['docs'] . 'license.txt'),
	'readme' => file_get_contents($sources['docs'] . 'readme.txt'),
	'setup-options' => array(
		'source' => $sources['build'].'setup.options.php',
	),
));
$modx->log(modX::LOG_LEVEL_INFO,'Added package attributes and setup options.');

/* zip up package */
$modx->log(modX::LOG_LEVEL_INFO,'Packing up transport package zip...');
$builder->pack();

$mtime= microtime();
$mtime= explode(" ", $mtime);
$mtime= $mtime[1] + $mtime[0];
$tend= $mtime;
$totalTime= ($tend - $tstart);
$totalTime= sprintf("%2.4f s", $totalTime);

if (defined('PKG_AUTO_INSTALL') && PKG_AUTO_INSTALL) {
	$signature = $builder->getSignature();
	$sig = explode('-',$signature);
	$versionSignature = explode('.',$sig[1]);

	/* @var modTransportPackage $package */
	if (!$package = $modx->getObject('transport.modTransportPackage', array('signature' => $signature))) {
		$package = $modx->newObject('transport.modTransportPackage');
		$package->set('signature', $signature);
		$package->fromArray(array(
			'created' => date('Y-m-d h:i:s'),
			'updated' => null,
			'state' => 1,
			'workspace' => 1,
			'provider' => 0,
			'source' => $signature.'.transport.zip',
			'package_name' => $sig[0],
			'version_major' => $versionSignature[0],
			'version_minor' => !empty($versionSignature[1]) ? $versionSignature[1] : 0,
			'version_patch' => !empty($versionSignature[2]) ? $versionSignature[2] : 0,
		));
		if (!empty($sig[2])) {
			$r = preg_split('/([0-9]+)/',$sig[2],-1,PREG_SPLIT_DELIM_CAPTURE);
			if (is_array($r) && !empty($r)) {
				$package->set('release',$r[0]);
				$package->set('release_index',(isset($r[1]) ? $r[1] : '0'));
			} else {
				$package->set('release',$sig[2]);
			}
		}
		$package->save();
	}

	if ($package->install()) {
		$modx->runProcessor('system/clearcache');
	}
}

$modx->log(modX::LOG_LEVEL_INFO,"\n<br />Execution time: {$totalTime}\n");
echo '</pre>';