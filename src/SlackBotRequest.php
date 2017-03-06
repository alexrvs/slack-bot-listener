<?php
namespace alexandervas\slackbotlistener;
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

}