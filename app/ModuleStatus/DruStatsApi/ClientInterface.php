<?php

namespace App\ModuleStatus\DruStatsApi;

interface ClientInterface
{

    public function getProjectInfo(string $project_name);
}
