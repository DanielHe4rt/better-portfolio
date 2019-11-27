<?php
/**
 * Created by PhpStorm.
 * User: Daniel Reis
 * Date: 24-Aug-19
 * Time: 19:08
 */

namespace App\Services;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GithubService
{

    public $api;

    public $clientId;

    public $clientSecret;

    public function __construct()
    {

        $this->api = $client = new Client([
            'base_uri' => env('GITHUB_BASE_URL'),
            'timeout' => 10.0,
            'headers' => [
                'Authorization' => 'token ' . env('GITHUB_TOKEN')
            ]
        ]);
    }

    public function getUser($username, $type = false)
    {
        $uri = "/users/" . $username . "?" . ($type ? "type=" . $type : null) ;

        try {
            $response = $this->api->request('GET', $uri);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            echo $e->getMessage();
        }

    }

    public function getUserRepositories($username)
    {
        $uri = "/users/" . $username . "/repos";

        try {
            $response = $this->api->request('GET', $uri);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            dd(1);
        }

    }
}
