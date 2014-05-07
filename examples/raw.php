<?php
/**
 * Raw tile notification example
 * @author alxmsl
 * @date 5/7/14
 */

include '../source/Autoloader.php';
include '../lib/Network/source/Autoloader.php';

$Message = new \MPNS\RawTileMessage();
$Message->aaa = 'bbb';

$channelUrl = 'http://sn1.notify.live.net/throttledthirdparty/01.00/ASDWEWRWEDFDFDfdfdfdfFE3feeD444343';
$Client = new \MPNS\Client();
$Client->send($channelUrl, $Message);