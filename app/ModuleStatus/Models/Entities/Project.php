<?php

namespace App\ModuleStatus\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    /**
     * The tables do not use an autoincrement column.
     *
     * @var bool
     */
    public $incrementing = false;

    public $primaryKey = 'project_name';

    public function getDrupalorgDataAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setDrupalorgDataAttribute($value)
    {
        $this->attributes['drupalorg_data'] = json_encode($value);
    }
}
