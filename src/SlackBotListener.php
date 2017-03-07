<?php
namespace alexandervas\slackbotlistener;

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

        $this->handler->call($this->listener);
    }

    /**
     * @param $text
     */

    public function text($text){
        $this->text = $text;
    }

    public function attachment(){


    }





}