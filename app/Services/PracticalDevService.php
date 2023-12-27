<?php

namespace App\Services;

use GuzzleHttp\Client;

class PracticalDevService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://dev.to/api',
        ]);
    }

    public function fetchPostsByUsername(string $username): array
    {
        $uri = sprintf('/api/articles?username=%s', $username);
        $result = $this->client->get($uri);

        return json_decode($result->getBody(), true);
    }
}
