<?php
namespace alexrvs\slackbotlistener\tests;

use alexrvs\slackbotlistener\Attachment;
use PHPUnit\Framework\TestCase;

/**
 * Class AttachmentTest
 * @package alexrvs\slackbotlistener\tests
 */
class AttachmentTest extends TestCase{

    /**
     * @var string $attach
     */
    public $attach;

    /**
     * @var array $attachment_options
     */
    public $attachment_options = array();

    public function setUp()
    {
        $this->attachment_options = array(
            'fallback' => 'fallback test',
            'author_name' => 'bobby',
            'author_link' => 'http://flickr.com/bobby/',
            'author_icon' => 'http://flickr.com/icons/bobby.jpg',
            'title' => 'Optional title',
            'text'  => 'optional text',
            'pretext' => 'optional pretext',
            'image_url' => 'http://my-website.com/path/to/image.jpg',
            'thumb_url' => 'http://example.com/path/to/thumb.png'
        );
    }

    public function testCanSerializeAttachmentOptionsFallback(){

        $attachment = new Attachment('test_fallback');
        $this->assertEquals(array('fallback'=>'test_fallback'),$attachment->serialize());
    }

    public function testCanSerializeAttachmentOptions(){
        $attachment = new Attachment('fallback test');

        foreach ($this->attachment_options as $key => $value){
            $attachment->applyOptions($key,$value);
        }
        $this->assertEquals($this->attachment_options, $attachment->serialize());
    }
}