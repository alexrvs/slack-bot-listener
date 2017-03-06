<?php
namespace alexandervas\slackbotlistener\Handlers;
use alexandervas\slackbotlistener\SlackBotRequest;

/**
 * Class CurlRequest
 * @package alexandervas\slackbotlistener\Handlers
 */

class CurlRequest implements RequestHandler{

    /**
     * @var SlackBotRequest $request
     */
    private $request;

    /**
     * @param SlackBotRequest $request
     */
    public function call(SlackBotRequest $request)
    {
        $curl = curl_init();
        curl_setopt(),

    }


}