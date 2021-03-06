<?php
/*
 * This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://www.wtfpl.net/ for more details.
 */

namespace alxmsl\MPNS;
use alxmsl\MPNS\Message\AbstractMessage;
use alxmsl\Network\Http\Request;

/**
 * MPNS client class
 * @author alxmsl
 * @date 4/3/14
 */ 
final class Client {

    /**
     * Notification content type constant
     */
    const CONTENT_TYPE = 'text/xml';

    /**
     * @var Request|null HTTP request instance
     */
    private $Request = null;

    /**
     * Request instance getter
     * @return Request|null HTTP request instance
     */
    public function getRequest() {
        if (is_null($this->Request)) {
            $this->Request = new Request();
            $this->Request->setTransport(Request::TRANSPORT_CURL);
            $this->Request->setContentTypeCode(Request::CONTENT_TYPE_XML);
            $this->Request->addHeader('Content-Type', self::CONTENT_TYPE);
        }
        return $this->Request;
    }

    /**
     * Send notification method
     * @param string $channelUri notification channel uri
     * @param AbstractMessage $Message notification message
     */
    public function send($channelUri, AbstractMessage $Message) {
        $Request = $this->getRequest();
        $Request->addHeader('X-MessageID', $Message->getId())
            ->addHeader('X-NotificationClass', $Message->getNotificationClass())
            ->setUrl($channelUri)
            ->setPostData($Message);
        if ($Message->getType() != AbstractMessage::TYPE_RAW) {
            $Request->addHeader('X-WindowsPhone-Target', $Message->getType());
        }
        $Request->send();
    }
}
 