<?php

namespace App\ModuleStatus\Models\Services;

use App\ModuleStatus\ModuleListParsers\ModuleJsonListParser;
use App\ModuleStatus\ModuleListParsers\ParserInterface;

class ModuleListParser
{

    protected $parsers = [
        ModuleJsonListParser::class,
    ];

    public function parse(string $list)
    {
        foreach ($this->parsers as $parser_class) {
            try {
                /** @var ParserInterface $parser */
                $parser = new $parser_class();
                $data = $parser->parse($list);
                return $data;
            }
            catch (\InvalidArgumentException $ex) {
                // Try with the next parser.
            }
        }
        return false;
    }
}
