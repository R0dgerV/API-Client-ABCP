<?php

namespace R0dgerV\ApiClientABCP;

use GuzzleHttp\Client;

/**
 * Class ApiClientABCP
 * @package R0dgerV\ApiClient
 */
class ApiClient
{

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var
     */
    protected $baseUrl;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @param string $username
     * @param string $password
     * @param string $baseUrl
     */
    public function __construct($username, $password, $baseUrl)
    {
        $this->username = $username;
        $this->password = $password;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @param string $url
     * @param array $data
     * @return array
     */
    protected function getQuery($url, array $data)
    {
        $response = $this->getClient()->request('GET', $url, [
            'headers' => [
                'User-Agent' => 'rodger-api-client/1.0',
                'Accept'     => 'application/json',
            ],
            'query' => $data
        ]);

        return \GuzzleHttp\json_decode($response->getBody());
    }

    /**
     * @return Client
     */
    protected function getClient()
    {
        if (!$this->client) {
            $this->client = new Client(['base_uri' => $this->baseUrl]);
        }

        return $this->client;
    }

    /**
     * @param array $data
     * @return array
     */
    public function searchArticles(array $data)
    {
        $data = array_merge($data,
            [
                'userlogin' => $this->username,
                'userpsw' => $this->password,
            ]
        );

        return $this->getQuery('search/articles', $data);
    }

}