<?php

namespace App\ModuleStatus\DruStatsApi;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request;

class Client extends GuzzleClient implements ClientInterface
{

    const DEFAULT_BASE_URI = 'https://www.drustats.com/api/';

    protected $client;

    public function getProjectInfo(string $project_name)
    {
        $url = static::DEFAULT_BASE_URI . 'project/' . $project_name;
        $request = $this->getRequest($url);
        $response = $this->send($request);

        return json_decode((string) $response->getBody(), true);
    }

    protected function getRequest(string $url, string $method = 'GET')
    {
        return new Request($method, $url, [
            'User-Agent' => 'Drupal 8 Upgrade Checker',
            'Accept' => 'application/json',
        ]);
    }
}
