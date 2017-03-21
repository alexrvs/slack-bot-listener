<?php
namespace  alexrvs\slackbotlistener\Listeners;

use alexrvs\slackbotlistener\Handlers\CurlRequest;
use GuzzleHttp\Client;

/**
 * Class GitHub
 * @package alexrvs\slackbotlistener\Listeners
 */
class GitHub implements RequestListener {

    /**
     * @var CurlRequest $curlRequest
     */
    private $curlRequest;

    /**
     * @var Client $request
     */
    private $request;

    /**
     * @var string $method
     */
    private  $method;

    /**
     * @param Client $client
     */

    public function call(Client $client)
    {
        $this->request = $client;
    }

    public function request()
    {
        // TODO: Implement request() method.
    }

    public function response()
    {
        return $this->request->getBody();
    }

    public function get()
    {
        $this->request->get($this->method);
        return $this;
    }

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @param string $username
     * @param mixed $password
     */
    public function setAuth($username, $password)
    {
        $this->request = $this->request->get($this->method)->setAuth($username, $password);
    }

    public function send()
    {
        $this->request->send();
    }
}