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
                'query' => [
                    'application[uid]' => $this->apiUserId,
                    'application[apikey]' => $this->apiKey
                ]
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

    private function get($path)
    {
        $body = $this->httpClient->get($path)->getBody();
        return json_decode($body->read($body->getSize()), true);
    }

    private function post($path, $params = [])
    {
        $options = [];
        if (is_array($params) && count($params) > 0) {
            $options['query'] = $this->httpClient->getConfig()['query'] + $params;
        }

        $body = $this->httpClient->post($path, $options)->getBody();
        return json_decode($body->read($body->getSize()), true);
    }

    public function createUser()
    {
        return $this->post('users.json');
    }

    public function getUserProfile($glomeId)
    {
        return $this->get('users/' . $glomeId . '.json');
    }

    public function getSyncCode($glomeId, $kind = 'b')
    {
        return $this->post('users/' . $glomeId . '/sync.json',
            ['synchronization[kind]' => $kind]);
    }

    public function pairSyncCode($glomeId, $syncCode)
    {
        $syncSplits = str_split($syncCode, 4);

        return $this->post('users/' . $glomeId . '/sync/pair.json',
            [
                'pairing[code_1]' => $syncSplits[0],
                'pairing[code_2]' => $syncSplits[1],
                'pairing[code_3]' => $syncSplits[2]
            ]);
    }

    public function pairGlomeIds($firstGlomeId, $secondGlomeId)
    {
        $syncCode = $this->getSyncCode($firstGlomeId)['code'];
        return $this->pairSyncCode($secondGlomeId, $syncCode);
    }
}
