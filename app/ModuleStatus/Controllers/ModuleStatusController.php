<?php

namespace App\ModuleStatus\Controllers;

use App\Http\Controllers\Controller;
use App\ModuleStatus\Models\Services\ModuleListParser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModuleStatusController extends Controller
{

    /**
     * @var ModuleListParser
     */
    protected $parser;

    public function __construct(ModuleListParser $parser)
    {
        $this->parser = $parser;
    }

    public function getStatus(Request $request)
    {
        $module_list = $request->request->get('list');
        $modules = $this->parser->parse($module_list);

        if (!$modules) {
            return new Response(['error' => 'Cannot parse the module list.'], 400);
        }

        return $modules;
    }
}
