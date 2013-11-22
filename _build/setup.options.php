<?php
/**
 * Build the setup options form.
 */
$exists = false;
$output = null;
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
	case xPDOTransport::ACTION_INSTALL:

	case xPDOTransport::ACTION_UPGRADE:
		$exists = $modx->getCount('transport.modTransportPackage', array('package_name:IN' => array('pdoTools', 'MinifyX')));
		break;

	case xPDOTransport::ACTION_UNINSTALL: break;
}

if ($exists <= 2) {
	switch ($modx->getOption('manager_language')) {
		case 'ru':
			$output = 'Этот компонент требует <b>pdoTools</b> и <b>MinifyX</b> для быстрой и удобной работы.<br/><br/>Могу я автоматически скачать и установить их?';
			break;
		default:
			$output = 'This component requires <b>pdoTools</b> and <b>MinifyX</b> for fast and easy work.<br/><br/>Can i automaticly download and install them?';
	}

}

return $output;
