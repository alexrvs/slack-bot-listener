<?php
namespace alexrvs\slackbotlistener\Handlers;

/**
 * Interface RtmResponseFactory
 * @package alexrvs\slackbotlistener\Handlers
 */

interface RtmResponseFactory{
    /**
     * @param $body
     * @param array $headers
     * @param $statusCode
     * @return RtmResponseInterface
     */
    public function build($body, array $headers,$statusCode);
}
