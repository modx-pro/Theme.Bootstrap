<?php

$chunks = [];

$tmp = [
    'Head' => [
        'file' => 'head',
        'description' => 'Title, meta and styles',
    ],
    'Meta' => [
        'file' => 'meta',
        'description' => 'Open Graph and canonical',
    ],
    'Navbar' => [
        'file' => 'navbar',
        'description' => 'Navbar chunk',
    ],
    'Menu.Outer' => [
        'file' => 'menu.outer',
        'description' => 'pdoMenu outer wrapper',
    ],
    'Menu.Item' => [
        'file' => 'menu.item',
        'description' => 'pdoMenu item',
    ],
    'Menu.Parent' => [
        'file' => 'menu.parent',
        'description' => 'pdoMenu dropdown parent',
    ],
    'Menu.Inner' => [
        'file' => 'menu.inner',
        'description' => 'pdoMenu dropdown item',
    ],
    'Footer' => [
        'file' => 'footer',
        'description' => 'Footer chunk',
    ],
    'Scripts' => [
        'file' => 'scripts',
        'description' => 'Footer scripts',
    ],
    'Content' => [
        'file' => 'content',
        'description' => 'Content chunk',
    ],
    'Content.List' => [
        'file' => 'content.list',
        'description' => 'Children list with pdoPage',
    ],
    'Tpl.Card' => [
        'file' => 'tpl.card',
        'description' => 'Card item for listings',
    ],
    'Crumbs' => [
        'file' => 'crumbs',
        'description' => 'Breadcrumb chunk',
    ],
    'Crumbs.Wrapper' => [
        'file' => 'crumbs.wrapper',
        'description' => 'pdoCrumbs wrapper',
    ],
    'Crumbs.Item' => [
        'file' => 'crumbs.item',
        'description' => 'pdoCrumbs item',
    ],
    'Crumbs.Current' => [
        'file' => 'crumbs.current',
        'description' => 'pdoCrumbs current item',
    ],
    'Page.Wrapper' => [
        'file' => 'page.wrapper',
        'description' => 'pdoPage pagination wrapper',
    ],
    'Page.Item' => [
        'file' => 'page.item',
        'description' => 'pdoPage page link',
    ],
    'Page.Active' => [
        'file' => 'page.active',
        'description' => 'pdoPage active page',
    ],
    'Page.Prev' => [
        'file' => 'page.prev',
        'description' => 'pdoPage previous link',
    ],
    'Page.Next' => [
        'file' => 'page.next',
        'description' => 'pdoPage next link',
    ],
];

foreach ($tmp as $k => $v) {
    /** @var modChunk $chunk */
    $chunk = $modx->newObject('modChunk');
    $chunk->fromArray([
        'id' => 0,
        'name' => $k,
        'description' => @$v['description'],
        'snippet' => file_get_contents($sources['source_core'] . '/elements/chunks/' . $v['file'] . '.tpl'),
        'static' => BUILD_CHUNK_STATIC,
        'source' => 1,
        'static_file' => 'core/components/' . PKG_NAME_LOWER . '/elements/chunks/' . $v['file'] . '.tpl',
    ], '', true, true);
    $chunks[] = $chunk;
}
unset($tmp);

return $chunks;
