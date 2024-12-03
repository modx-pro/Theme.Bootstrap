<?php

$settings = [];
$tmp = [
    'themebootstrap_use_jquery' => [
        'value' => false,
        'xtype' => 'combo-boolean',
        'area' => '',
    ],
];

/** @var modX $modx */
foreach ($tmp as $k => $v) {
    /** @var modSystemSetting $setting */
    $setting = $modx->newObject('modSystemSetting');
    $setting->fromArray(
        array_merge(
            [
                'key' => $k,
                'namespace' => 'themebootstrap',
                'editedon' => date('Y-m-d H:i:s'),
            ],
            $v
        ),
        '',
        true,
        true
    );
    $settings[] = $setting;
}

return $settings;
