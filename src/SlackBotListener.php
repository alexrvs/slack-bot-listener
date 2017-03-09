<?php
namespace alexandervas\slackbotlistener;

use alexandervas\slackbotlistener\Exceptions\SlackRequestExceptions;
use alexandervas\slackbotlistener\Handlers\CurlRequest;

/**
 * Class SlackBotListener
 * @package alexandervas\slackbotlistener
 */
class SlackBotListener{

    /**
     * @var string $webhook;
     */
    private $webhook;

    /**
     * @var array $options
     */
    private $options = [];

    /**
     * @var object $handler
     */
    private $handler;

    /**
     * @var SlackBotRequest $listener
     */

    private $listener;

    /**
     * @var string $text
     */
    private $text;

    /**
     * @var array $attachments
     */
    private $attachments = [];

    /**
     * SlackBotListener constructor.
     * @param string $webhook
     * @param array $options
     */
    public function __construct($webhook, $options)
    {
        $this->webhook = $webhook;
        $this->options = $options;
        $this->handler = new CurlRequest();
        $this->listener = new SlackBotRequest();
    }

    /**
     *
     */
    public function send(){


    }

    /**
     * @param $text
     */

    public function text($text){
        $this->text = $text;
    }

    /**
     * @param Attachment $attachment
     */

    public function attachment(Attachment $attachment){

        $this->attachments[] = $attachment->serialize();
    }

    /**
     * @return mixed
     * @throws SlackRequestExceptions
     */

    public function callRequest(){
        $result = $this->handler->call($this->listener);
        if($result != 'ok'){
            throw new SlackRequestExceptions('');
        }
        return $result;
    }



}