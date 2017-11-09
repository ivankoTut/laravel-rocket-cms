<?php

namespace App\Models\CmsModels;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    /**
     * admin settings
     * */
    public $admin = [
        'section' => 'service',
        'icon' => 'fa fa-drivers-license-o',
        'priority' => 1 ,
    ];
}
