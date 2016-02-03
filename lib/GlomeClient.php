<?php

namespace ChainRevolution\Demo;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;

class GlomeClient
{
    protected $apiUserId;
    protected $apiKey;

    protected $httpClient;

    public function __construct($configs, $debugMode = false)
    {
        $this->apiUserId    = $configs['glome']['api-uid'];
        $this->apiKey       = $configs['glome']['api-key'];

        $this->httpClient = new HttpClient(
            array(
                'base_uri' => $configs['glome']['api-uri'],
            )
        );

        if ($debugMode) {
            try {
                // Guzzle should throw exceptions by default for non 2xx responses
                $this->get('applications/check/' . base64_encode($this->apiUserId) . '.json');
            } catch (ClientException $ex) {
                throw new GlomeException('Invalid Api Credentials');
            }
        }
    }

    private function get($url)
    {
        return $this->httpClient->get(
            $url .
            '?application[uid]=' . urlencode($this->apiUserId) .
            '&application[apikey]=' . $this->apiKey
        );
    }
}
