<?php
namespace  alexrvs\slackbotlistener\Listeners;

use alexrvs\slackbotlistener\Handlers\CurlRequest;
use alexrvs\slackbotlistener\SlackBotRequest;

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
     * @var SlackBotRequest $request
     */
    private $request;
    /**
     * GitHub constructor.
     * @param CurlRequest $curlRequest
     */
    public function __construct(CurlRequest $curlRequest, SlackBotRequest $request)
    {
        $this->curlRequest = $curlRequest;
        $this->request = $request;
    }

    /**
     * @param CurlRequest $curlRequest
     * @return mixed
     */

    public function call(CurlRequest $curlRequest)
    {

        $request = $curlRequest->call($this->request);

        return $request;
    }

    public function request()
    {
        // TODO: Implement request() method.
    }

    public function response()
    {
        // TODO: Implement response() method.
    }
}