<?php

/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */

$exists = false;
$output = '';
$lang = $modx->getOption('manager_language');
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        $exists = $modx->getCount('transport.modTransportPackage', ['package_name:IN' => ['pdoTools']]);
        if (!empty($options['attributes']['chunks'])) {
            $chunks = '<ul id="formCheckboxes" style="height:200px;overflow:auto;">';
            foreach ($options['attributes']['chunks'] as $chunk) {
                $chunks .= '<li><label><input type="checkbox" name="update_chunks[]" value="' . $chunk . '"> ' . $chunk . '</label></li>';
            }
            $chunks .= '</ul>';
        }
        break;

    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

if (!$exists) {
    switch ($lang) {
        case 'ru':
            $output = 'Этот компонент требует <b>pdoTools</b> для быстрой и удобной работы.<br/><br/>Могу я автоматически скачать и установить его?';
            break;
        default:
            $output = 'This component requires <b>pdoTools</b> for fast and smooth work.<br/><br/>Can I automatically download and install it?';
    }
}

if (!$exists) {
    $output .= '<br/><br/>';
}

$output .= '<ul>';
switch ($lang) {
    case 'ru':
        $output .= '<li><label><input type="checkbox" name="use_jquery" value="1"> Использовать jQuery</label></li>';
        $output .= '<li><label><input type="checkbox" name="set_default_template" value="1"> Установить шаблон "Bootstrap" шаблоном по умолчанию</label></li>';
        break;
    default:
        $output .= '<li><label><input type="checkbox" name="use_jquery" value="1"> Use jQuery</label></li>';
        $output .= '<li><label><input type="checkbox" name="set_default_template" value="1"> Set "Bootstrap" template as default template</label></li>';
}
$output .= '</ul>';

if ($chunks) {
    $output .= '<br/>';

    switch ($lang) {
        case 'ru':
            $output .= 'Выберите чанки, которые нужно <b>перезаписать</b>:<br/>
				<small>
					<a href="#" onclick="Ext.get(\'formCheckboxes\').select(\'input\').each(function(v) {v.dom.checked = true;});">отметить все</a> |
					<a href="#" onclick="Ext.get(\'formCheckboxes\').select(\'input\').each(function(v) {v.dom.checked = false;});">cнять отметки</a>
				</small>';
            break;
        default:
            $output .= 'Select chunks, which need to <b>overwrite</b>:<br/>
				<small>
					<a href="#" onclick="Ext.get(\'formCheckboxes\').select(\'input\').each(function(v) {v.dom.checked = true;});">select all</a> |
					<a href="#" onclick="Ext.get(\'formCheckboxes\').select(\'input\').each(function(v) {v.dom.checked = false;});">deselect all</a>
				</small>';
    }

    $output .= $chunks;
}

return $output;
