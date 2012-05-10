<?php
/**
 * Theme.Bootstrap
 *
 * Copyright 2010 by Shaun McCormick <shaun+themebootstrap@modx.com>
 *
 * Theme.Bootstrap is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * Theme.Bootstrap is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Theme.Bootstrap; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package themebootstrap
 */
/**
 * Properties for the Theme.Bootstrap snippet.
 *
 * @package themebootstrap
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'tpl',
        'desc' => 'prop_themebootstrap.tpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'Item',
        'lexicon' => 'themebootstrap:properties',
    ),
    array(
        'name' => 'sortBy',
        'desc' => 'prop_themebootstrap.sortby_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'name',
        'lexicon' => 'themebootstrap:properties',
    ),
    array(
        'name' => 'sortDir',
        'desc' => 'prop_themebootstrap.sortdir_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'ASC',
        'lexicon' => 'themebootstrap:properties',
    ),
    array(
        'name' => 'limit',
        'desc' => 'prop_themebootstrap.limit_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 5,
        'lexicon' => 'themebootstrap:properties',
    ),
    array(
        'name' => 'outputSeparator',
        'desc' => 'prop_themebootstrap.outputseparator_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'themebootstrap:properties',
    ),
    array(
        'name' => 'toPlaceholder',
        'desc' => 'prop_themebootstrap.toplaceholder_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => true,
        'lexicon' => 'themebootstrap:properties',
    ),
/*
    array(
        'name' => '',
        'desc' => 'prop_themebootstrap.',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'themebootstrap:properties',
    ),
    */
);

return $properties;