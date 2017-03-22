<?php
namespace alexrvs\slackbotlistener\Rtm;


interface RtmRequestInterface{

    public static function execute($command, $params = []);

}