<?php
namespace alexrvs\slackbotlistener;

use alexrvs\slackbotlistener\Exceptions\SlackRequestException;
use alexrvs\slackbotlistener\Handlers\CurlRequest;


/**
 * Class SlackBotListener
 * @package alexrvs\slackbotlistener
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
     * @var SlackBotRequest $request
     */
    private $request;

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
        if(!empty($this->attachments)){
            array_map(array($message, 'attach'),$this->attachments);
        }
        $this->request = new SlackBotRequest($this->webhook, $message);
        $this->callRequest($this->request);
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
     * @return $this
     */

    public function attach(Attachment $attachment)
    {
        array_push($this->attachments, $attachment);
        return $this;
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

    /**
     * @return SlackBotRequest
     */

    public function getRequest(){
        return $this->request;
    }

}