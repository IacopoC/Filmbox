<?php

namespace App\Http\moviedb;

use GuzzleHttp\Client;

class ThemovieDatabase
{
    protected $client;
    protected $baseUrl;

    public function __construct() {

        $this->baseUrl = 'https://api.themoviedb.org';
        $this->SetUpClient();

    }

    private function SetUpClient() {
        $this->client = new Client(['base_uri' => $this->baseUrl]);
    }

    public function callMovie($method, $url)
    {
        $results_pages = $this->client->request($method, $url);
        $body_results_pages = $results_pages->getBody();
        return json_decode($body_results_pages);
    }

    public function callSearchMovie($method, $url, $search_res)
    {
        $results = $this->client->request($method, $url,['query' => ['search' => $search_res ]]);
        $body_results = $results->getBody();
        return json_decode($body_results);
    }
}
