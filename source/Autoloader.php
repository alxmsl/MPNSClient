<?php

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
        'alxmsl\\MPNS\\Autoloader'      => 'Autoloader.php',
        'alxmsl\\MPNS\\Client'          => 'Client.php',

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
 