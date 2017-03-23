<?php
namespace alexrvs\slackbotlistener\Handlers;

/**
 * Interface RtmResponseInterface
 * @package alexrvs\slackbotlistener\Handlers
 */

interface RtmResponseInterface{

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