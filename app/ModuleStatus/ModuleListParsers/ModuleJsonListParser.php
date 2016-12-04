<?php

namespace App\ModuleStatus\ModuleListParsers;

use App\ModuleStatus\ModuleInfo;
use Illuminate\Support\Collection;

class ModuleJsonListParser implements ParserInterface
{

    public function parse(string $list): Collection
    {
        $data = json_decode($list, true);
        if (is_null($data)) {
            throw new \InvalidArgumentException('Cannot decode as JSON');
        }

        // Attempt to parse it to ModuleInfo objects.
        $module_infos = collect($data)->map(function ($item, $key) {
            return new ModuleInfo($key, $item['name'], $item);
        });

        return $module_infos;
    }
}
