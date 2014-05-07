<?php
/**
 * Toast notification example
 * @author alxmsl
 * @date 4/3/14
 */

include '../source/Autoloader.php';
include '../lib/Network/source/Autoloader.php';

$Message = new \MPNS\ToastMessage();
$Message->setTitle('text1')
    ->setContent('text2')
    ->setParam('aaa')
    ->setSound('sound')
    ->setIsSilent(true);

$channelUrl = 'http://sn1.notify.live.net/throttledthirdparty/01.00/ASDWEWRWEDFDFDfdfdfdfFE3feeD444343';
$Client = new \MPNS\Client();
$Client->send($channelUrl, $Message);