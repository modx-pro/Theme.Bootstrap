<?php
/**
 * @var modX $modx
 * @var modTemplate $template
 * @var modResource $resource
 */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
	case xPDOTransport::ACTION_INSTALL:
	case xPDOTransport::ACTION_UPGRADE:
		$modx = & $object->xpdo;

		if ($template = $modx->getObject('modTemplate', array('templatename' => 'Bootstrap.main'))) {
			if (!$resource = $modx->getObject('modResource', array('pagetitle' => 'Bootstrap.main'))) {
				$resource = $modx->newObject('modResource');
				$resource->set('pagetitle', 'Bootstrap.main');
			}
			$resource->fromArray(array(
				'published' => 0,
				'parent' => 0,
				'richtext' => 0,
				'template' => $template->id
			));
			$resource->save();
		}

		if ($template = $modx->getObject('modTemplate', array('templatename' => 'Bootstrap.inner'))) {
			if (!$resource = $modx->getObject('modResource', array('pagetitle' => 'Bootstrap.inner'))) {
				$resource = $modx->newObject('modResource');
				$resource->set('pagetitle', 'Bootstrap.inner');
			}
			$resource->fromArray(array(
				'published' => 0,
				'parent' => 0,
				'richtext' => 0,
				'template' => $template->id,
				'content' => file_get_contents(MODX_ASSETS_PATH . 'components/themebootstrap/elements/demo/inner.html')
			));
			$resource->save();
		}

		break;

	case xPDOTransport::ACTION_UNINSTALL:
		break;
}
return true;