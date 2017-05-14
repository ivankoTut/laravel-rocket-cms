<?php

namespace App\Models\CmsModels;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use SleepingOwl\Admin\Model\ModelConfiguration;
use AdminSection;

class Page extends Model
{
    use NodeTrait;

    protected $fillable = [
        'title' , 'slug' , 'text'
    ];

    /**
     * admin settings
     * */
    public $admin = [
        'section' => 'navigate',
        'icon' => 'fa fa-file-text-o',
        'priority' => 1 ,
    ];
}
