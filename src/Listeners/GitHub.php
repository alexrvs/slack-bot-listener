<?php
namespace  alexrvs\slackbotlistener\Listeners;

use alexrvs\slackbotlistener\Handlers\CurlRequest;

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
     * GitHub constructor.
     * @param CurlRequest $curlRequest
     */
    public function __construct(CurlRequest $curlRequest)
    {
        $this->curlRequest = $curlRequest;
    }

    /**
     * @param CurlRequest $curlRequest
     * @return mixed
     */

    public function call(CurlRequest $curlRequest)
    {
        $request = $curlRequest->call($curlRequest);

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