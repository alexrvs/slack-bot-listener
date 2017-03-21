<?php
namespace alexrvs\slackbotlistener;

/**
 * Class Message
 * @package alexrvs\slackbotlistener
 */

class Message implements Transferable{

    /**
     * @var string $message
     */
    private $text;

    /**
     * @var array $options
     */
    private $options;

    /**
     * @var array $attachments
     */
    private $attachments;
    /**
     * Message constructor.
     * @param string $text
     * @param array $options
     */
    public function __construct($text, array $options = array())
    {
        $this->text = $text;
        $this->options = $options;
    }

    /**
     * @param Attachment $attachment
     */
    public function attach(Attachment $attachment){

        array_push($this->attachments, $attachment->serialize());
    }

    /**
     * @return string
     */
    public function serialize()
    {
        $ret = array_merge(array('text' => $this->text), $this->options);
        if ( ! empty($this->attachments)) {
            $ret['attachments'] = $this->attachments;
        }
        return $ret;
    }
}