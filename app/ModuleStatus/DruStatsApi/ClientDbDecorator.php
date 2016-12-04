<?php

namespace App\ModuleStatus\DruStatsApi;

use App\ModuleStatus\Models\Entities\Project;
use GuzzleHttp\Exception\RequestException;

class ClientDbDecorator implements ClientInterface
{

    /**
     * Cache for 7 days.
     */
    const DB_CACHE_DURATION = 86400 * 7;

    /**
     * @var Client
     */
    protected $client;

    public function getProjectInfo(string $project_name)
    {
        $project = Project::find($project_name);
        if ($project
            && time() - strtotime($project->last_retrieved_on) < static::DB_CACHE_DURATION
            && $project->http_status_code != 429) {
            return $project;
        }

        if (!$project) {
            $project = new Project();
            $project->project_name = $project_name;
            $project->last_retrieved_on = date('Y-m-d H:i:s');
        }

        try {
            $client = new Client();
            $project_data = $client->getProjectInfo($project_name);

            $project->drupalorg_data = $project_data;
            // Since we're here, assume a nice 200 status code.
            $project->http_status_code = 200;
            $project->save();
        }
        catch (RequestException $rex) {
            $project->http_status_code = $rex->getResponse()->getStatusCode();
            $project->save();
        }

        return $project;
    }
}
