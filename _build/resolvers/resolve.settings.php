<?php
/**
 * @var array $options
 */

if (!function_exists('setOption')) {
    function setOption($key, $value)
    {
        global $modx;
        $setting = $modx->getObject('modSystemSetting', $key);
        if (!$setting) {
            return;
        }
        $setting->set('value', $value);
        $setting->save();
        $modx->cacheManager->refresh(array('system_settings' => array()));
    }

    function getBootstrapTemplateId()
    {
        global $modx;
        $obj = $modx->getObject('modTemplate', array('templatename' => 'Bootstrap'));
        if ($obj) {
            return $obj->get('id');
        }
        return 0;
    }
}

if ($object->xpdo) {
    /** @var modX $modx */
    $modx =& $object->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            if (!empty($options['use_jquery'])) {
                setOption('themebootstrap_use_jquery', 1);
            }
            if (!empty($options['set_default_template'])) {
                if ($id = getBootstrapTemplateId()) {
                    setOption('default_template', $id);
                }
            }
            break;
    }
}

return true;