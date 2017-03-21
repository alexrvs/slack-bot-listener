<?php

namespace alexrvs\slackbotlistener\Listeners;

use GuzzleHttp\Client;

/**
 * Interface RequestListener
 * @package alexrvs\slackbotlistener
 */

interface RequestListener{

    /**
     * @param Client $client
     * @return mixed
     */

    public function call(Client $client);

    /**
     * @return mixed
     */
    public function request();

    /**
     * @return mixed
     */
    public function response();

}