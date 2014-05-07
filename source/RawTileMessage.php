<?php

namespace MPNS;

use DOMDocument;
use ReflectionClass;
use ReflectionProperty;

/**
 * Raw tile message class
 * @author alxmsl
 * @date 5/7/14
 */ 
class RawTileMessage extends AbstractMessage {
    /**
     * @var string notification type
     */
    protected $type = self::TYPE_RAW;

    /**
     * @var array raw properties array
     */
    private $properties = array();

    /**
     * Raw properties setter
     * @param string $name property name
     * @param string $value property value
     */
    public function __set($name, $value) {
        $this->properties[$name] = htmlspecialchars($value);
    }

    /**
     * Raw properties getter
     * @param string $name property name
     * @return string property value
     */
    public function __get($name) {
        return $this->properties[$name];
    }

    /**
     * Raw tile notification payload generator
     * @return \DOMDocument notification payload
     */
    public function getPayload() {
        $Notification = new DOMDocument('1.0', 'utf-8');
        $Root = $Notification->createElement('wp:Notification');
        $Root->setAttribute('xmlns:wp', 'WPNotification');
        $Notification->appendChild($Root);

        $RawRoot = $Notification->createElement('root');
        $Root->appendChild($RawRoot);

        foreach ($this->properties as $name => $value) {
            $Element = $Notification->createElement($name, $value);
            $RawRoot->appendChild($Element);
        }

        return $Notification;
    }
}
 