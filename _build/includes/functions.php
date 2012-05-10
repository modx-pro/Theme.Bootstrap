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
 * Helper method for grabbing files
 *
 * @package themebootstrap
 * @subpackage build
 */

/**
 * @param string $filename
 * @return mixed|string
 */
function getSnippetContent($filename) {
    $o = file_get_contents($filename);
    $o = str_replace('<?php','',$o);
    $o = str_replace('?>','',$o);
    $o = trim($o);
    return $o;
}