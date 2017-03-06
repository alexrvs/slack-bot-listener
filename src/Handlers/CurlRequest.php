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
        $ch = curl_init();
            $options = curl_setopt_array(
                CURLOPT_POST,true
            );

        curl_exec($ch);
        curl_close();

    }


}