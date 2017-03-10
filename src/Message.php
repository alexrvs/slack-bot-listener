<?php
namespace alexandervas\slackbotlistener;

class Message implements Transferable{

    /**
     * @var string $message
     */
    private $text;

    /**
     * Message constructor.
     * @param $message
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function serialize()
    {
        return serialize($this->text);
    }
}