<?php
namespace alexandervas\slackbotlistener;

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
     * @var string $fallback
     */
    private $fallback;

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
     * @var Message $message
     * @var SlackBotRequest $request
     * @return void
     */
    public function send(){

        $message = new Message($this->text,$this->options);
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
     * Merge attachment array to global
     */
    public function attach(){
        array_push($this->options, $this->attachments);
    }

    /**
     * @param $username
     * @return $this
     */

    public function toPerson($username){
        $this->options['username'] = $username;
        return $this;
    }

    /**
     * @param Attachment $attachment
     * @return $this
     */
    public function attachment(Attachment $attachment){

        $this->attachments[] = $attachment->serialize();
        return $this;
    }

    /**
     * @param $fallback
     * @return Attachment
     */

    public function createAttachment($fallback){

        return new Attachment($fallback);
    }

    /**
     * @return mixed
     * @throws SlackRequestException
     */

    public function callRequest(SlackBotRequest $request){
        $result = $this->handler->call($request);
        if($result != 'ok'){
            throw new SlackRequestException($result);
        }else{
            return $result;
        }

    }

    /**
     * Reset all options
     */
    private function reset(){
        $this->text = '';
        $this->options = [];
        $this->attachments = [];
    }


}