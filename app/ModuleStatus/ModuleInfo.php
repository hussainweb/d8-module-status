<?php

namespace App\ModuleStatus;

class ModuleInfo
{

    protected $machineName;

    protected $title;

    protected $data;

    public function __construct($machine_name, $title = '', $data = [])
    {
        $this->machineName = $machine_name;
        $this->title = $title;
        $this->data = $data;
    }

    public function getMachineName(): string
    {
        return $this->machineName;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
