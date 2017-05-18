<?php
use SleepingOwl\Admin\Navigation\Page;

$navigation->setFromArray([
    [
        'title' => trans('cms.admin.nav.navigation'),
        'icon' => 'fa fa-sitemap',
        'section' => 'navigate',
        'pages' => app('App\Services\AdminServices')->initAdminMenu('navigate')
    ],
    [
        'title' => trans('cms.admin.nav.account'),
        'icon' => 'fa fa-vcard',
        'pages' => app('App\Services\AdminServices')->initAdminMenu('users')
    ],
    [
        'title' => 'Permissions',
        'icon' => 'fa fa-group',
        'pages' => [
            (new Page(\App\Models\CmsModels\User::class))
                ->setIcon('fa fa-user')
                ->setPriority(0),
            /*(new Page(\App\Role::class))
                ->setIcon('fa fa-group')
                ->setPriority(100)*/
        ]
    ]
]);