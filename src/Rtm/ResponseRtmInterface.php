<?php
namespace alexrvs\slackbotlistener\Rtm;

/**
 * Interface ResponseRtmInterface
 * @package alexrvs\slackbotlistener\Rtm
 */

interface ResponseRtmInterface{

    /**
     * @return mixed
     */
    public function getHeader();

    /**
     * @return mixed
     */
    public function getBody();

    /**
     * @return mixed
     */
    public function getResponseCode();

}