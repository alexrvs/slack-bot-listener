<?php
namespace alexandervas\slackbotlistener;

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