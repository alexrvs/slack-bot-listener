<?php
namespace alexandervas\slackbotlistener;

use alexandervas\slackbotlistener\Exceptions\SlackBotListenerException;
use alexandervas\slackbotlistener\Exceptions\SlackRequestException;
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
    public function __construct($webhook,array $options = array())
    {
        $this->webhook = $webhook;
        $this->options = $options;
        $this->handler = new CurlRequest();

    }

    /**
     *
     */
    public function send(){

        $message = new Message($this->text);
        $request = new SlackBotRequest($this->webhook, $message);
        $this->callRequest($request);
        $this->reset();
    }

    /**
     * @param $text
     * @return $this
     */

    public function text($text){
        $this->text = $text;
        return $this;
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

    public function callRequest(SlackBotRequest $request){
        $result = $this->handler->call($request);
        if($result != 'ok'){
            throw new SlackRequestException($result);
        }else{
            return $result;
        }

    }


    private function reset(){
        $this->text = '';
        $this->options = [];
        $this->attachments = [];
    }


}