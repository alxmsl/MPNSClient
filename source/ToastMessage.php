<?php

namespace alxmsl\MPNS;
use DOMDocument;

/**
 * Toast notification class
 * @author alxmsl
 * @date 4/3/14
 */ 
final class ToastMessage extends AbstractMessage {
    /**
     * @var string notification type
     */
    protected $type = self::TYPE_TOAST;

    /**
     * @var string notification title text
     */
    private $title = '';

    /**
     * @var string notification content text
     */
    private $content = '';

    /**
     * @var string notification parameter
     */
    private $param = '';

    /**
     * @var string notification sound filename
     */
    private $sound = '';

    /**
     * @var bool need silent notification
     */
    private $isSilent = false;

    /**
     * Notification parameter setter
     * @param string $param notification parameter
     * @return ToastMessage self instance
     */
    public function setParam($param) {
        $this->param = htmlspecialchars($param);
        return $this;
    }

    /**
     * Getter for notification parameter
     * @return string notification parameter value
     */
    public function getParam() {
        return $this->param;
    }

    /**
     * Notification sound filename setter
     * @param string $sound notification sound filename
     * @return ToastMessage self instance
     */
    public function setSound($sound) {
        $this->sound = htmlspecialchars($sound);
        return $this;
    }

    /**
     * Getter for notification sound filename
     * @return string notification sound filename
     */
    public function getSound() {
        return $this->sound;
    }

    /**
     * Setter for notification title text
     * @param string $title notification title text value
     * @return ToastMessage self instance
     */
    public function setTitle($title) {
        $this->title = htmlspecialchars($title);
        return $this;
    }

    /**
     * Notification title getter
     * @return string notification title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Setter for notification content
     * @param string $content notification content text value
     * @return ToastMessage self instance
     */
    public function setContent($content) {
        $this->content = htmlspecialchars($content);
        return $this;
    }

    /**
     * Getter for notification content
     * @return string notification content text value
     */
    public function getContent() {
        return $this->content;
    }


    /**
     * Setter for silent notification mode
     * @param boolean $isSilent need silent notification
     * @return ToastMessage self instance
     */
    public function setIsSilent($isSilent) {
        $this->isSilent = (bool) $isSilent;
        return $this;
    }

    /**
     * Getter silent mode value
     * @return boolean need silent notification
     */
    public function isSilent() {
        return $this->isSilent;
    }

    /**
     * Toast notification payload generator
     * @return \DOMDocument notification payload
     */
    public function getPayload() {
        $Notification = new DOMDocument('1.0', 'utf-8');
        $Root = $Notification->createElement('wp:Notification');
        $Root->setAttribute('xmlns:wp', 'WPNotification');
        $Notification->appendChild($Root);
        $Toast = $Notification->createElement('wp:Toast');
        $Root->appendChild($Toast);

        $text1 = $this->getTitle();
        if (!empty($text1)) {
            $Text1 = $Notification->createElement('wp:Text1', $text1);
            $Toast->appendChild($Text1);
        }

        $text2 = $this->getContent();
        if (!empty($text2)) {
            $Text2 = $Notification->createElement('wp:Text2', $text2);
            $Toast->appendChild($Text2);
        }

        $param = $this->getParam();
        if (!empty($param)) {
            $Param = $Notification->createElement('wp:Param', $param);
            $Toast->appendChild($Param);
        }

        $sound = $this->getSound();
        $isSilent = $this->isSilent();
        if (!empty($sound) || $isSilent) {
            $Sound = $Notification->createElement('wp:Sound');
            if ($isSilent) {
                $Sound->setAttribute('Silent', 'true');
            } else {
                $Sound->nodeValue = $sound;
            }
            $Toast->appendChild($Sound);
        }
        return $Notification;
    }
}
 