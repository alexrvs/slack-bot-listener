<?php
namespace alexandervas\slackbotlistener;

use alexandervas\slackbotlistener\Exceptions\SlackBotListenerExceptions;

/**
 * Class SlackBotRequest
 * @package alexandervas\slackbotlistener
 */
class SlackBotRequest{

    /**
     * @var string $webhook
     */
    private $webhook;

    /**
     * @var string $listener
     */
    private $listener;

    /**
     * @var array $options
     */
    private $options = [];

    /**
     * @var string $body
     */
    private $body;

    /**
     * SlackBotRequest constructor.
     */
    public function __construct($webhook, $options = null)
    {
        $this->webhook = $webhook;
    }

    /**
     * @param string $key
     * @param string $value
     *
     */
    public function setRequestOptions($key, $value){

        if(!isset($this->options[$key])){
            $this->options[$key] = $value;
        }
    }

    /**
     * @return array
     *
     */
    public function getRequestOptions(){

        return $this->options;
    }

    /**
     * @return string $webhook
     */

    public function url(){
        return $this->webhook;
    }

    /**
     * @param array $body
     * @throws SlackBotListenerExceptions
     */

    public function setBody(array $body){
        $empty_body = ['text'=>''];

        if($this->body === $empty_body){
            throw new SlackBotListenerExceptions('text attribute required, please add message!');
        }

        $this->body = $body;
    }

    /**
     * @param $body
     * @return string
     */

    public function setPayload($body){

        $payload= http_build_query(
            array("payload" => json_encode($body))
         );
        return $payload;
    }

    /**
     * @return string
     */
    public function body(){

        return $this->setPayload($this->body);
    }
}