<?php
/**
 * This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://www.wtfpl.net/ for more details.
 *
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