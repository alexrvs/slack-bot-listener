<?php
namespace alexrvs\slackbotlistener\Handlers;
use alexrvs\slackbotlistener\SlackBotRequest;

/**
 * Class CurlRequest
 * @package alexrvs\slackbotlistener\Handlers
 */

class CurlRequest implements RequestHandler, RtmRequestHandler {

    /**
     * @var SlackBotRequest $request
     */
    private $request;

    /**
     * @var RtmResponseFactory $factory
     */
    protected $factory;

    /**
     * @param SlackBotRequest $request
     * @return mixed
     */
    public function call(SlackBotRequest $request)
    {
        $ch = curl_init();
            $options = curl_setopt_array(
                $ch,
                array(
                    CURLOPT_URL => $request->url(),
                    CURLOPT_POSTFIELDS => $request->body(),
                    CURLOPT_SSL_VERIFYPEER => FALSE,
                    CURLOPT_SSL_VERIFYHOST => FALSE,
                    CURLOPT_POST => TRUE,
                    CURLOPT_RETURNTRANSFER => TRUE,
                )

            );

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }


    /**
     * @param $url
     * @param array $params
     * @param array $headers
     * @return RtmResponseInterface
     */

    public function get($url, array $params = [], array $headers = [])
    {
        $request =  $this->prepareRequest($url, $headers, $params);

        return $this->executeRequest($request);
    }

    /**
     * @param $url
     * @param array $getParams
     * @param array $postParams
     * @param array $headers
     * @return RtmResponseInterface
     */

    public function post($url, array $getParams = [], array $postParams = [], array $headers = [])
    {
        $request = $this->prepareRequest($url, $headers, $postParams);

        curl_setopt($request, CURLOPT_POST, count($postParams));
        curl_setopt($request, CURLOPT_POSTFIELDS, http_build_query($postParams));

        return $this->executeRequest($request);
    }

    /**
     * @param $url
     * @param array $headers
     * @param array $params
     * @return resource
     */
    public function prepareRequest($url,array $headers,array $params){
        $request = curl_init();

        if ($query = http_build_query($params))
            $url .= '?' . $query;

        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($request, CURLINFO_HEADER_OUT, true);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);

        return $request;
    }


    public function setResponseFactory(RtmResponseFactory $factory){

        $this->factory = $factory;
    }

    public function executeRequest($request)
    {
        $body = curl_exec($request);
        $info = curl_getinfo($request);

        curl_close($request);

        $statusCode = $info['http_code'];
        $headers = $info['request_header'];

        if (function_exists('http_parse_headers'))
            $headers = http_parse_headers($headers);
        else
        {
            $header_text = substr($headers, 0, strpos($headers, "\r\n\r\n"));
            $headers = [];

            foreach (explode("\r\n", $header_text) as $i => $line)
                if ($i === 0)
                    continue;
                else
                {
                    list ($key, $value) = explode(': ', $line);

                    $headers[$key] = $value;
                }
        }

        return $this->factory->build($body, $headers, $statusCode);
    }



}