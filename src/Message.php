<?php
namespace alexandervas\slackbotlistener;

class Message implements Transferable{

    /**
     * @var string $message
     */
    private $message;

    /**
     * Message constructor.
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function serialize()
    {
        return serialize($this->message);
    }
}