<?php

namespace MPNS;

// append autoloader
spl_autoload_register(array('\MPNS\Autoloader', 'Autoloader'));

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
        'MPNS\\Autoloader'      => 'Autoloader.php',
        'MPNS\\Client'          => 'Client.php',
        'MPNS\\AbstractMessage' => 'AbstractMessage.php',
        'MPNS\\ToastMessage'    => 'ToastMessage.php',
        'MPNS\\TileMessage'     => 'TileMessage.php',
        'MPNS\\RawTileMessage'  => 'RawTileMessage.php',
    );

    /**
     * Component autoloader
     * @param string $className claass name
     */
    public static function Autoloader($className) {
        if (array_key_exists($className, self::$classes)) {
            $fileName = realpath(dirname(__FILE__)) . '/' . self::$classes[$className];
            if (file_exists($fileName)) {
                include $fileName;
            }
        }
    }
}
 