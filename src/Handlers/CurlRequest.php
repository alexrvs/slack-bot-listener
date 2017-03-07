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
     * @return mixed
     */

    public function call(SlackBotRequest $request)
    {
        $ch = curl_init();
            $options = curl_setopt_array(
                $ch,
                array(
                    CURLOPT_URL => $request->url(),
                    CURLOPT_POSTFIELDS => $request->body(),
                    CURLOPT_SSL_VERIFYPEER => FALSE,
                    CURLOPT_SSL_VERIFYHOST => FALSE,
                    CURLOPT_POST => TRUE,
                    CURLOPT_RETURNTRANSFER => TRUE,
                )

            );

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }


}