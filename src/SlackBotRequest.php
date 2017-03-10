<?php
namespace alexandervas\slackbotlistener;

use alexandervas\slackbotlistener\Exceptions\SlackBotListenerException;

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
     * @var string $message
     */
    protected $message;

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
     * @param $webhook
     * @param Message $message
     */
    public function __construct($webhook, Message $message)
    {
        $this->webhook = $webhook;
        $this->message = $message;
        $this->setBody($message);
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
     * @param $body
     * @throws SlackBotListenerException
     */

    public function setBody($body){
        $empty_body = ['text'=>''];

        if($this->body === $empty_body){
            throw new SlackBotListenerException('text attribute required, please add message!');
        }

        $this->body = $body;
    }

    /**
     * @param $body
     * @return string
     */

    public function setPayload($body){
        return http_build_query(
            array("payload" => json_encode($body))
        );
    }

    /**
     * @return string
     */
    public function body(){

        return $this->setPayload($this->body);
    }
}