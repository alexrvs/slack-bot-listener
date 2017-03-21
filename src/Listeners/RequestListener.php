<?php
 namespace alexrvs\slackbotlistener\Listeners;
 use alexrvs\slackbotlistener\Handlers\CurlRequest;

 /**
  * Interface RequestListener
  * @package alexrvs\slackbotlistener
  */

 interface RequestListener{

     public function call(CurlRequest $curlRequest);

     public function request();

     public function response();

 }