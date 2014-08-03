<?php

namespace alxmsl\MPNS;

/**
 * Abstract MPNS notification class
 * @author alxmsl
 * @date 4/3/14
 */ 
abstract class AbstractMessage {
    /**
     * Notification delivery options
     */
    const DELIVERY_OPTION_IMMEDIATE = 0,    // intermediate delivery
          DELIVERY_OPTION_450       = 10,   // delivery within 450 seconds
          DELIVERY_OPTION_900       = 20;   // delivery within 900 seconds

    /**
     * Notification types
     */
    const TYPE_TILE  = 'token', // tile notification type
          TYPE_TOAST = 'toast', // toast notification type
          TYPE_RAW   = 'raw';   // raw notification type

    /**
     * @var array types code constants
     */
    private static $typeCodes = array(
        self::TYPE_TILE  => 1,
        self::TYPE_TOAST => 2,
        self::TYPE_RAW   => 3,
    );

    /**
     * @var string notification identifier
     */
    private $id = '';

    /**
     * @var int notification delivery option value
     */
    private $delivery = self::DELIVERY_OPTION_IMMEDIATE;

    /**
     * @var string notification type
     */
    protected $type = self::TYPE_TILE;

    /**
     * Setter for notification identifier
     * @param string $id notification identifier
     * @return AbstractMessage self instance
     */
    public function setId($id) {
        $this->id = (string) $id;
        return $this;
    }

    /**
     * Notification identifier getter
     * @return string notification identifier
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Setter for notification delivery option
     * @param int $delivery notification delivery option code
     * @return AbstractMessage self instance
     */
    public function setDelivery($delivery) {
        switch (true) {
            case $delivery == self::DELIVERY_OPTION_IMMEDIATE:
            case $delivery == self::DELIVERY_OPTION_450:
            case $delivery == self::DELIVERY_OPTION_900:
                $this->delivery = (int) $delivery;
                break;
        }
        return $this;
    }

    /**
     * Notification delivery option getter
     * @return int notification delivery option code
     */
    public function getDelivery() {
        return $this->delivery;
    }

    /**
     * Notification type getter
     * @return string notification type
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Getter for notification type code
     * @return int notification type code
     */
    public function getTypeCode() {
        return self::$typeCodes[$this->getType()];
    }

    /**
     * Getter for notification class
     * @return int notification class
     */
    public function getNotificationClass() {
        return $this->getTypeCode() + $this->getDelivery();
    }

    /**
     * Class constructor
     */
    public function __construct() {
        $this->setId(uniqid());
    }

    /**
     * Payload generator
     * @return \DOMDocument notification payload
     */
    abstract public function getPayload();

    /**
     * Stringify method
     * @return string stringify value for the instance
     */
    public function __toString() {
        return $this->getPayload()->saveXML();
    }
}
 