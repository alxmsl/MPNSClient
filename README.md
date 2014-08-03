MPNSClient
==========

Client for Microsoft Push Notification Service (MPNS) on PHP

Toast notification example
-------

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

Tile notification example
-------

    use alxmsl\MPNS\Client;
    use alxmsl\MPNS\Message\TileMessage;

    $Message = new TileMessage();
    //@todo: here you can initialize tile fileds use TileMessage setters

    $channelUrl = 'http://sn1.notify.live.net/throttledthirdparty/01.00/ASDWEWRWEDFDFDfdfdfdfFE3feeD444343';
    $Client = new Client();
    $Client->send($channelUrl, $Message);

Raw tile notification example
-------

    use alxmsl\MPNS\Client;
    use alxmsl\MPNS\Message\RawTileMessage;

    $Message = new RawTileMessage();
    // Here is raw fields initialization
    $Message->aaa = 'bbb';

    $channelUrl = 'http://sn1.notify.live.net/throttledthirdparty/01.00/ASDWEWRWEDFDFDfdfdfdfFE3feeD444343';
    $Client = new Client();
    $Client->send($channelUrl, $Message);
