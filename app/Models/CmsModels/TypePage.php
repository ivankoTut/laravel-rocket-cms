<?php

namespace App\Models\CmsModels;

use Illuminate\Database\Eloquent\Model;

class TypePage extends Model
{
    protected $fillable = [ 'name' ];

    /**
     * admin settings
     * */
    public $admin = [
        'section' => 'navigate',
        'icon' => 'fa fa-cog',
        'priority' => 0
    ];
}
