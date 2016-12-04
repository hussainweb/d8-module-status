<?php

namespace App\ModuleStatus\ModuleListParsers;

use Illuminate\Support\Collection;

interface ParserInterface
{

    public function parse(string $list): Collection;
}
