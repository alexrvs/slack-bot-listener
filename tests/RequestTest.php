<?php

namespace alexandervas\slackbotlistener\tests;

use alexandervas\slackbotlistener\Attachment;
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

    /**
     * @var array $options
     */
    public $options;

    public function setUp()
    {
        $this->message = new Message('sad');
        $this->request = new SlackBotRequest('asd',$this->message);
        $this->options = ['fallback' => 'fallback test'];
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


    public function testCanCreateStdClassWithMockObject(){

        $stdMockClass = $this->getMockBuilder(\stdClass::class)
            ->allowMockingUnknownTypes()
            ->enableArgumentCloning()
            ->enableAutoload()
            ->enableOriginalClone()
            ->setMethods(['serialize','deserialize'])
            ->getMock();


        $serializeStr = serialize($this->options);
        $stdMockClass->method('serialize')->willReturn($serializeStr);
        $this->assertEquals('a:1:{s:8:"fallback";s:13:"fallback test";}',$stdMockClass->serialize());
        $unserializeStr = unserialize($serializeStr);
        $stdMockClass->method('deserialize')->willReturn($unserializeStr);
        $this->assertEquals(array('fallback' => 'fallback test'), $stdMockClass->deserialize());
    }


    public function testCanCreatePayloadDataForMessageWithAttachment(){

        $message = new Message('test Message');
        $message->attach(new Attachment('test Fallback'));

        $request = new SlackBotRequest('webhook.df',$message);
        $payload =  $request->body();

        $this->assertEquals('payload={"text":"test Message","attachments":[{"fallback":"test Fallback"}]}',urldecode($payload));
    }

}