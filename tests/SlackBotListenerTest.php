<?php
namespace alexandervas\slackbotlistener\tests;

use alexandervas\slackbotlistener\Message;
use alexandervas\slackbotlistener\SlackBotListener;
use alexandervas\slackbotlistener\SlackBotRequest;
use PHPUnit\Framework\TestCase;

class SlackBotListenerTest extends TestCase{

    /**
     * @var SlackBotListener $slackbot
     */
    public $slackbot;

    /**
     * @var SlackBotRequest $request
     */
    public $request;

    /**
     * @var string $webhook
     */
    public $webhook = "https://hooks.slack.com/services/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";

    /**
     * @var array $options
     */
    public $options = array();

    /**
     * @var string $message
     */
    public $message;

    public function setUp()
    {
        $this->slackbot = new SlackBotListener($this->webhook);
        $this->message = 'test message';
    }

    public function testCanSendMessage(){

        $this->slackbot->text($this->message)->send();
        $this->assertEquals('test message',$this->message);
    }

}