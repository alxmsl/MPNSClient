<?php
/*
 * This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://www.wtfpl.net/ for more details.
 */

namespace alxmsl\MPNS\Message;
use DOMDocument;

/**
 * Tile notification class
 * @author alxmsl
 * @date 5/7/14
 */ 
final class TileMessage extends AbstractMessage {
    /**
     * @var string notification type
     */
    protected $type = self::TYPE_TILE;

    /**
     * @var string secondary tile identifier, or empty for default tile
     */
    private $tileId = '';

    /**
     * @var string background image
     */
    private $backgroundImage = '';

    /**
     * @var int counter value
     */
    private $count = 0;

    /**
     * @var string tile title
     */
    private $title = '';

    /**
     * @var string back background image
     */
    private $backBackgroundImage = '';

    /**
     * @var string back tile title
     */
    private $backTitle = '';

    /**
     * @var string back content value
     */
    private $backContent = '';

    /**
     * Setter for secondary tile identifier
     * @param string $tileId secondary tile identifier
     * @return TileMessage self instance
     */
    public function setTileId($tileId) {
        $this->tileId = htmlspecialchars($tileId);
        return $this;
    }

    /**
     * Getter for secondary tile identifier
     * @return string secondary tile identifier
     */
    public function getTileId() {
        return $this->tileId;
    }

    /**
     * Setter for back background image
     * @param string $backBackgroundImage back background image
     * @return TileMessage self instance
     */
    public function setBackBackgroundImage($backBackgroundImage) {
        $this->backBackgroundImage = htmlspecialchars($backBackgroundImage);
        return $this;
    }

    /**
     * Getter for back background image
     * @return string back background image
     */
    public function getBackBackgroundImage() {
        return $this->backBackgroundImage;
    }

    /**
     * Setter for back content
     * @param string $backContent back content
     * @return TileMessage self instance
     */
    public function setBackContent($backContent) {
        $this->backContent = htmlspecialchars($backContent);
        return $this;
    }

    /**
     * Getter for back content
     * @return string back content
     */
    public function getBackContent() {
        return $this->backContent;
    }

    /**
     * Setter for back title
     * @param string $backTitle back title value
     * @return TileMessage self instance
     */
    public function setBackTitle($backTitle) {
        $this->backTitle = (string) $backTitle;
        return $this;
    }

    /**
     * Getter for back title
     * @return string back title value
     */
    public function getBackTitle() {
        return $this->backTitle;
    }

    /**
     * Setter for background image
     * @param string $backgroundImage background image
     * @return TileMessage self instance
     */
    public function setBackgroundImage($backgroundImage) {
        $this->backgroundImage = htmlspecialchars($backgroundImage);
        return $this;
    }

    /**
     * Getter for background image
     * @return string background image
     */
    public function getBackgroundImage() {
        return $this->backgroundImage;
    }

    /**
     * Counter value setter
     * @param int $count counter value
     * @return TileMessage self instance
     */
    public function setCount($count) {
        if ($count > 0) {
            $this->count = min($count, 99);
        }
        return $this;
    }

    /**
     * Counter value getter
     * @return int counter value
     */
    public function getCount() {
        return $this->count;
    }

    /**
     * Title setter
     * @param string $title title value
     * @return TileMessage self instance
     */
    public function setTitle($title) {
        $this->title = htmlspecialchars($title);
        return $this;
    }

    /**
     * Title getter
     * @return string title value
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Tile notification payload generator
     * @return DOMDocument notification payload
     */
    public function getPayload() {
        $Notification = new DOMDocument('1.0', 'utf-8');
        $Root = $Notification->createElement('wp:Notification');
        $Root->setAttribute('xmlns:wp', 'WPNotification');
        $Notification->appendChild($Root);

        $Tile = $Notification->createElement('wp:Tile');
        $tileId = $this->getTileId();
        // For secondary tiles use Id attribute
        if (!empty($tileId)) {
            $Tile->setAttribute('Id', $tileId);
        }
        $Root->appendChild($Tile);

        $backgroundImage = $this->getBackgroundImage();
        if (!empty($backgroundImage)) {
            $BackgroundImage = $Notification->createElement('wp:BackgroundImage', $backgroundImage);
            $Tile->appendChild($BackgroundImage);
        }

        $Count = $Notification->createElement('wp:Count', $this->getCount());
        $Tile->appendChild($Count);

        $title = $this->getTitle();
        if (!empty($title)) {
            $Title = $Notification->createElement('wp:Title', $title);
            $Tile->appendChild($Title);
        }

        $backBackgroundImage = $this->getBackBackgroundImage();
        if (!empty($backBackgroundImage)) {
            $BackBackgroundImage = $Notification->createElement('wp:BackBackgroundImage', $backBackgroundImage);
            $Tile->appendChild($BackBackgroundImage);
        }

        $backTitle = $this->getBackTitle();
        if (!empty($backTitle)) {
            $BackTitle = $Notification->createElement('wp:BackTitle', $backTitle);
            $Tile->appendChild($BackTitle);
        }

        $backContent = $this->getBackContent();
        if (!empty($backContent)) {
            $BackContent = $Notification->createElement('wp:BackContent', $backContent);
            $Tile->appendChild($BackContent);
        }

        return $Notification;
    }
}
 