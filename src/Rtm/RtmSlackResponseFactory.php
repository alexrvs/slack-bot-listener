<?php
namespace alexrvs\slackbotlistener\Rtm;


use alexrvs\slackbotlistener\Handlers\RtmResponseFactory;

class RtmSlackResponseFactory implements RtmResponseFactory{


    public function build($body, array $headers, $statusCode)
    {
        return new RtmSlackResponse($body, $headers, $statusCode);
    }

}