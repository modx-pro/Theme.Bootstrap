<?php
/** @var xPDOTransport $transport */
if (!$transport->xpdo || !($transport instanceof xPDOTransport)) {
    return false;
}
/** @var modX $modx */
$modx =& $transport->xpdo;
/** @var array $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        if (!empty($options['update_chunks'])) {
            foreach ($options['update_chunks'] as $v) {
                if ($chunk = $modx->getObject('modChunk', ['name' => $v])) {
                    foreach ($transport->vehicles as $item) {
                        /** @var xPDOTransportVehicle $vehicle */
                        if ($item['class'] == 'modChunk' && $vehicle = $transport->get($item['filename'])) {
                            if ($data = json_decode($vehicle->payload['object'], true)) {
                                if ($data['name'] == $v) {
                                    $chunk->set('snippet', $data['snippet']);
                                    $chunk->save();
                                    $modx->log(modX::LOG_LEVEL_INFO, 'Updated chunk "<b>' . $v . '</b>"');
                                }
                            }
                        }
                    }
                }
            }
        }
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;