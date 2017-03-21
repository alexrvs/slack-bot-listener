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

    /**
     * @return mixed
     */
    public function get();

    /**
     * @return mixed
     */
    public function send();

    /**
     * @param $username
     * @param $password
     * @return mixed
     */
    public function setAuth($username, $password);
}