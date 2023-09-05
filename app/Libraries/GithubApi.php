<?php

namespace App\Libraries;
use GuzzleHttp\Client;

class GithubApi
{
    private $client_id;
    private $client_secret;
    private Client $client; 

    public function __construct() 
    {
        $this->client_id = $_ENV['GITHUB_API_ID'];
        $this->client_secret = $_ENV['GITHUB_API_SECRET'];
        $this->client = new Client();
    }
    public function getAuthorizationUrl() : string
    {
        return 'https://github.com/login/oauth/authorize' .
        '?client_id=' . $this->client_id .
        '&scope=user';
    }
    public function getUserData($code)
    {
        $token = $this->getAccessToken($code);

        if ($token !== null) {
            $userData = $this->getUserDataWithToken($token);

            return $userData;
        }

        return null;
    }

    private function getAccessToken($code)
    {
        $url = "https://github.com/login/oauth/access_token";
        $headers = [
            'Accept' => 'application/json',
        ];

        $queryParams = [
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'code' => $code,
        ];

        try {
            $response = $this->client->request('POST', $url, [
                'headers' => $headers,
                'query' => $queryParams,
            ]);

            if ($response->getStatusCode() === 200) {
                $data = json_decode($response->getBody()->getContents(), true);
                return $data['access_token'];
            }
        } catch (\Exception $e) {
            return false;
        }

        return null;
    }

    private function getUserDataWithToken($token)
    {
        $url = "https://api.github.com/user";
        $headers = [
            'Authorization' => "Bearer $token",
            'Accept' => 'application/json',
        ];

        try {
            $response = $this->client->request('GET', $url, [
                'headers' => $headers,
            ]);

            if ($response->getStatusCode() === 200) {
                $userData = json_decode($response->getBody()->getContents(), true);
                return $userData;
            }
        } catch (\Exception $e) {
            return false;
        }

        return null;
    }
}