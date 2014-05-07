<?php
/**
 * Tile notification example
 * @author alxmsl
 * @date 5/7/14
 */

include '../source/Autoloader.php';
include '../lib/Network/source/Autoloader.php';

$Message = new \MPNS\TileMessage();

$channelUrl = 'http://sn1.notify.live.net/throttledthirdparty/01.00/ASDWEWRWEDFDFDfdfdfdfFE3feeD444343';
$Client = new \MPNS\Client();
$Client->send($channelUrl, $Message);