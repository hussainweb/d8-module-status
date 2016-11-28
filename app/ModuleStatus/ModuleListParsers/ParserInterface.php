<?php

namespace App\ModuleStatus\ModuleListParsers;

interface ParserInterface
{

    public function parse(string $list): array;
}
