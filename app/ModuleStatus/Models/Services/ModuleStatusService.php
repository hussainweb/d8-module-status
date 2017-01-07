<?php

namespace App\ModuleStatus\Models\Services;

use App\ModuleStatus\DruStatsApi\ClientInterface;
use App\ModuleStatus\Models\Entities\ProjectModule;
use App\ModuleStatus\ModuleInfo;
use Illuminate\Support\Collection;

class ModuleStatusService
{

    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getProjectData(Collection $modules)
    {
        $all_projects = $this->resolveModulesToProjects($modules);

        $projects = $all_projects
            ->map([$this->client, 'getProjectInfo'])
            ->map(function ($project) {
                return $this->convertProjectOutput($project);
            });

        return $projects;
    }

    public function getModuleMappings(Collection $modules)
    {
        $module_names = $modules->map(function (ModuleInfo $item) {
            return $item->getMachineName();
        });
        return ProjectModule
            ::whereIn('name', $module_names)
            ->get()
            ->flatMap(function ($item) {
                return [$item->name => $item];
            });
    }

    public function resolveModulesToProjects(Collection $modules)
    {
        // We need a list of mappings from module to project.
        $project_modules = $this->getModuleMappings($modules);

        // List all known projects for the modules.
        $projects = $project_modules->map(function (ProjectModule $module) {
            return $module->project_name;
        });

        // Get all the modules for which we don't know the project.
        $unknown_modules = $modules->diffKeys($project_modules)->keys();

        // Merge Unknown modules and list of projects.
        // Array flip() and keys() should be faster than unique().
        return $projects->merge($unknown_modules)->flip()->keys();
    }

    protected function getModulesInProject($project_name)
    {
        static $cache = [];
        if (empty($cache[$project_name])) {
            $cache[$project_name] = ProjectModule
                ::where('project_name', $project_name)
                ->get()
                ->map(function ($item) {
                    return $item->name;
                });
        }

        return $cache[$project_name];
    }

    protected function convertProjectOutput($project)
    {
        $item = [
            'name' => $project->project_name,
            'title' => $project->project_name,
            'type' => '',
            'migration_status' => $project->migration_status,
            'modules' => [],
            'development_status' => '',
            'maintenance_status' => '',
            'project_type' => '',
            'downloads' => '',
            'release' => [],
            'release_level' => '',
            'release_level_version' => '',
        ];

        $item['modules'] = $this->getModulesInProject($project->project_name);

        if ($project->http_status_code == 200 && !empty($project->drupalorg_data)) {
            $do_data = $project->drupalorg_data['data'];

            $item['title'] = $do_data['title'];
            $item['type'] = $do_data['type'];
            $item['project_type'] = $do_data['project_type'];
            $item['downloads'] = $do_data['downloads'];

            if (!empty($do_data['developmentStatus'])) {
                $item['development_status'] = $do_data['developmentStatus']['data']['name'];
            }
            if (!empty($do_data['maintenanceStatus'])) {
                $item['maintenance_status'] = $do_data['maintenanceStatus']['data']['name'];
            }

            if ($item['type'] == 'project_core') {
                $filter_d8_func = function ($item) {
                    return $item['version']['major'] == 8;
                };
            }
            else {
                $filter_d8_func = function ($item) {
                    return preg_match("/^8\.x/", $item['version']['full']);
                };
            }

            $releases = collect($do_data['releases']['data']);
            $releasesD8 = $releases
                ->filter($filter_d8_func)
                ->sortByDesc('created');

            $releaseLevel = $releasesD8->reduce(function ($carry, $item) {
                $level = $this->getVersionLevel($item['version']['extra']);
                $carryLevel = $this->getVersionLevel($carry);

                return ($level > $carryLevel) ? $item['version']['extra'] : $carry;
            }, 'dev');

            // Handle when version extra is null (which means a stable release).
            if (!$releaseLevel) {
                $releaseLevel = 'stable';
            }

            $item['release'] = $releasesD8->values();
            // Release level makes sense only if there are releases.
            $item['release_level_version'] = $releasesD8->count() ? $releaseLevel : '';
            $item['release_level'] = preg_replace('/\d+/', '', $item['release_level_version']);
        }

        return $item;
    }

    private function getVersionLevel($version_extra)
    {
        static $levels = [
          'dev' => 1,
          'alpha' => 2,
          'beta' => 3,
          'rc' => 4,
          'stable' => 5,
        ];

        // Fast return when version extra is null (which means 'stable').
        if (is_null($version_extra)) {
            return 5;
        }

        // Try to match each type of version from our list of levels.
        foreach ($levels as $prefix => $weight) {
            if ($version_extra == $prefix || preg_match("/$prefix\d+/", $version_extra)) {
                return $weight;
            }
        }

        // If we can't find anything, assume 'dev'.
        return 1;
    }
}
