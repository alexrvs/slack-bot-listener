<?php
namespace alexrvs\slackbotlistener\Rtm;


interface RtmRequestInterface{

    public function execute($command, $params = []);

}