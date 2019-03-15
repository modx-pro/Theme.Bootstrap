<?php

$chunks = [];

$tmp = [
    'Head' => [
        'file' => 'head',
        'description' => 'Scripts and styles',
    ],
    'Navbar' => [
        'file' => 'navbar',
        'description' => 'Navbar chunk',
    ],
    'Footer' => [
        'file' => 'footer',
        'description' => 'Footer chunk',
    ],
    'Content' => [
        'file' => 'content',
        'description' => 'Content chunk',
    ],
    'Crumbs' => [
        'file' => 'crumbs',
        'description' => 'Breadcrumb chunk',
    ],
];

foreach ($tmp as $k => $v) {
    /** @var modChunk $chunk */
    $chunk = $modx->newObject('modChunk');
    $chunk->fromArray([
        'id' => 0,
        'name' => $k,
        'description' => @$v['description'],
        'snippet' => file_get_contents($sources['source_assets'] . '/elements/chunks/' . $v['file'] . '.tpl'),
        'static' => BUILD_CHUNK_STATIC,
        'source' => 1,
        'static_file' => 'assets/components/' . PKG_NAME_LOWER . '/elements/chunks/' . $v['file'] . '.tpl',
    ], '', true, true);
    $chunks[] = $chunk;
}
unset($tmp);

return $chunks;