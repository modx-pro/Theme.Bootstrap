<?php

$templates = [];

$tmp = [
    'Bootstrap' => [
        'file' => 'bootstrap',
        'description' => 'Bootstrap template',
    ],
];

foreach ($tmp as $k => $v) {
    /** @var modTemplate $template */
    $template = $modx->newObject('modTemplate');
    $template->fromArray([
        'id' => 0,
        'templatename' => $k,
        'description' => @$v['description'],
        'content' => file_get_contents($sources['source_assets'] . '/elements/templates/' . $v['file'] . '.tpl'),
        'static' => BUILD_TEMPLATE_STATIC,
        'source' => 1,
        'static_file' => 'assets/components/' . PKG_NAME_LOWER . '/elements/templates/' . $v['file'] . '.tpl',
    ], '', true, true);
    $templates[] = $template;
}
unset($tmp);

return $templates;