<?php
namespace alexandervas\slackbotlistener\tests;

use PHPUnit\Framework\TestCase;
use alexandervas\slackbotlistener\Message;

class MessageTest extends TestCase{

    public $message;
    public $handler;
    public $testText;
    public $emptyText;
    public $options = array();

    public function setUp()
    {
        $this->testText = 'test message';
        $this->emptyText = '';
        $this->message = new Message($this->testText);
        $this->options = [
            'icon_url' => 'http://someicon.com',
            'thumb_url'=> 'https://a.slack-edge.com/ae57/img/slack_api_logo.png',
            'image_url' => 'https://a.slack-edge.com/ae57/img/slack_api_logo.png'
        ];
    }

    public function testSerializeMessage()
    {
        $text = 'test message';
        $this->assertEquals(array('text'=>$text),$this->message->serialize());
    }


    public function testSerializeWithOptions(){
        $message = new Message($this->testText,$this->options);
        $this->assertEquals(array_merge(array('text' =>$this->testText),$this->options), $message->serialize());
    }

    public function testCanCreateMessageObject(){

        $this->assertInstanceOf('\alexandervas\slackbotlistener\Message',$this->message);
    }

    public function testEmptyMessage(){
        $this->emptyText;
        $emptyMessage = new Message($this->emptyText);
        $this->assertEquals(array('text'=>''),$emptyMessage->serialize());
    }



}