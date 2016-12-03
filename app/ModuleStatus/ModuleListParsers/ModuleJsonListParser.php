<?php

namespace App\ModuleStatus\ModuleListParsers;

class ModuleJsonListParser implements ParserInterface
{

    public function parse(string $list): array
    {
        $data = json_decode($list, true);
        if (is_null($data)) {
            throw new \InvalidArgumentException('Cannot decode as JSON');
        }
        return $data;
    }
}
