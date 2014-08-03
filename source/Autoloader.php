<?php
/*
 * This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://www.wtfpl.net/ for more details.
 */

namespace alxmsl\MPNS;

// append autoloader
spl_autoload_register(array('\alxmsl\MPNS\Autoloader', 'autoload'));

/**
 * MPNS autoloader class
 * @author alxmsl
 * @date 3/31/14
 */ 
final class Autoloader {
    /**
     * @var array array of available classes
     */
    private static $classes = array(
        'alxmsl\\MPNS\\Autoloader' => 'Autoloader.php',
        'alxmsl\\MPNS\\Client'     => 'Client.php',

        'alxmsl\\MPNS\\Message\\AbstractMessage' => 'AbstractMessage.php',
        'alxmsl\\MPNS\\Message\\ToastMessage'    => 'ToastMessage.php',
        'alxmsl\\MPNS\\Message\\TileMessage'     => 'TileMessage.php',
        'alxmsl\\MPNS\\Message\\RawTileMessage'  => 'RawTileMessage.php',
    );

    /**
     * Component autoloader
     * @param string $className claass name
     */
    public static function autoload($className) {
        if (array_key_exists($className, self::$classes)) {
            $fileName = realpath(dirname(__FILE__)) . '/' . self::$classes[$className];
            if (file_exists($fileName)) {
                include $fileName;
            }
        }
    }
}
 