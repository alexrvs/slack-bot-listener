<?php
namespace alexrvs\slackbotlistener\Rtm;

use alexrvs\slackbotlistener\Handlers\RtmResponseInterface;

class RtmSlackResponse implements RtmResponseInterface, \JsonSerializable{

    /**
     * @var array $header
     */
    protected $header;

    /**
     * @var string $body
     */
    public $body;

    /**
     * @var string $responseCode
     */
    protected $responseCode;

    /**
     * RtmSlackResponse constructor.
     * @param $header
     * @param $body
     * @param $responseCode
     */
    public function __construct( $body, array $header, $responseCode)
    {
        $this->header = $header;
        $this->body = json_decode($body,true);
        $this->responseCode = $responseCode;
    }

    /**
     * @return string
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @return array
     */
    public function toArray(){
        return [
            'statusCode' => $this->responseCode,
            'headers' => $this->header,
            'body' => $this->body
        ];
    }

    /**
     * @return array
     */
    public function jsonSerialize(){
        return $this->toArray();
    }

}