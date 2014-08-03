<?php
/**
 * This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://www.wtfpl.net/ for more details.
 *
 * Toast notification example
 * @author alxmsl
 * @date 4/3/14
 */

include '../source/Autoloader.php';
include '../vendor/alxmsl/network/source/Autoloader.php';

use alxmsl\MPNS\Client;
use alxmsl\MPNS\Message\ToastMessage;

$Message = new ToastMessage();
$Message->setTitle('text1')
    ->setContent('text2')
    ->setParam('aaa')
    ->setSound('sound')
    ->setIsSilent(true);

$channelUrl = 'http://sn1.notify.live.net/throttledthirdparty/01.00/ASDWEWRWEDFDFDfdfdfdfFE3feeD444343';
$Client = new Client();
$Client->send($channelUrl, $Message);
