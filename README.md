MPNSClient
==========

Client for Microsoft Push Notification Service (MPNS)

Toast notification
-------

    // Initialize toast notification instance 
    $Message = new \MPNS\ToastMessage();
    $Message->setTitle('text1')
        ->setContent('text2')
        ->setParam('aaa')
        ->setSound('sound')
        ->setIsSilent(true);

    // Create client and send notification for channel 
    $channelUrl = 'http://sn1.notify.live.net/throttledthirdparty/01.00/ASDWEWRWEDFDFDfdfdfdfFE3feeD444343';
    $Client = new \MPNS\Client();
    $Client->send($channelUrl, $Message);
