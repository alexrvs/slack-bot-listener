<?php
namespace alexrvs\slackbotlistener\Handlers;
use alexrvs\slackbotlistener\Handlers\RtmRequestInterface;

/**
 * Interface RtmRequestHandler
 * @package alexrvs\slackbotlistener\Handlers
 */
interface RtmRequestHandler{

    /**
     * @param $url
     * @param array $params
     * @param array $headers
     * @return RtmRequestInterface
     */
    public function get($url, array $params = [], array $headers = []);

    /**
     * @param $url
     * @param array $getParams
     * @param array $postParams
     * @param array $headers
     * @return RtmResponseInterface
     */
    public function post($url, array $getParams = [], array $postParams = [], array $headers = []);



}