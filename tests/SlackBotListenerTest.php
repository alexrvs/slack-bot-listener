<?php
namespace alexrvs\slackbotlistener\tests;

use alexrvs\slackbotlistener\Message;
use alexrvs\slackbotlistener\SlackBotListener;
use alexrvs\slackbotlistener\SlackBotRequest;
use PHPUnit\Framework\TestCase;

/**
 * Class SlackBotListenerTest
 * @package alexrvs\slackbotlistener\tests
 */

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

    public function testCanSendSimpleAttachment(){
        $this->slackbot->attach($this->slackbot->createAttachment('fallbackTest'))->text('test')->send();
        $testRequest =  urldecode($this->slackbot->getRequest()->body());
        $this->assertEquals('payload={"text":"test","attachments":[{"fallback":"fallbackTest"}]}',$testRequest);
    }


    public function testCanSendManyOptionsForAttachment(){
        $this->slackbot->attach($this->slackbot->createAttachment('flallbackTest')
            ->setAuthor('alex','http://test.r','http://test.r/icon.gif')
            ->setThumbUrl('https://test.c/thumb.gif'))->text('Text Test')->send();
        $testRequest = urldecode($this->slackbot->getRequest()->body());

        $this->assertEquals('payload={"text":"Text Test","attachments":[{"fallback":"flallbackTest","author_name":"alex","author_link":"http:\/\/test.r","author_icon":"http:\/\/test.r\/icon.gif","thumb_url":"fdkgjfkfdjgfd"}]}',$testRequest);
    }
}