<?php

namespace Cristyanhenrich\AsaasSdk\Http;

use GuzzleHttp\Client;

class HttpClient
{
    private $client;
    private $headers;

    public function __construct()
    {
        $sandbox = config('asaas.api_url_sandbox');
        $production = config('asaas.api_url_production');
        $url = config('asaas.production') ? $production : $sandbox;
        $apiKey = config('asaas.api_key');

        $this->headers = [
            'access_token' => $apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];

        $this->client = new Client([
            'base_uri' => $url,
            'headers' => $this->headers
        ]);
    }

    public function get(string $endpoint, array $query = []): array
    {
        $response = $this->client->get($endpoint, ['query' => $query]);
        return json_decode($response->getBody(), true);
    }

    public function post(string $endpoint, array $data): array
    {
        $response = $this->client->post($endpoint, ['json' => $data]);
        return json_decode($response->getBody(), true);
    }

    public function put(string $endpoint, array $data): array
    {
        $response = $this->client->put($endpoint, ['json' => $data]);
        return json_decode($response->getBody(), true);
    }

    public function delete(string $endpoint): array
    {
        $response = $this->client->delete($endpoint);
        return json_decode($response->getBody(), true);
    }
}
