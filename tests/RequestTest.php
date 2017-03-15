<?php

namespace alexandervas\slackbotlistener\tests;

use alexandervas\slackbotlistener\Handlers\RequestHandler;
use alexandervas\slackbotlistener\Message;
use alexandervas\slackbotlistener\SlackBotRequest;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase{

    /**
     * @var RequestHandler $handler
     */
    public $handler;

    /**
     * @var SlackBotRequest $request
     */
    public $request;

    /**
     * @var Message $message
     */
    public $message;

    public function setUp()
    {
        $this->message = new Message('sad');
        $this->request = new SlackBotRequest('asd',$this->message);

    }

    public function testCreateMessageWithMockObject(){

        $mock = $this->getMockBuilder(Message::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $mock->method('serialize')->willReturn(array('text'=>'test text'));

        $this->assertEquals(['text' => 'test text'], $mock->serialize());
    }

}