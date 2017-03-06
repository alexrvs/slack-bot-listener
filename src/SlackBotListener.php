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
     * @var
     */

    private $listener;

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

    public function send(){

    }






}