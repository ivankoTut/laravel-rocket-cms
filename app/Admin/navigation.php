<?php
use SleepingOwl\Admin\Navigation\Page;

return [
    [
        'title' => trans('cms.admin.nav.navigation'),
        'icon' => 'fa fa-sitemap',
        'section' => 'navigate',
        'pages' => app('App\Services\AdminServices')->initAdminMenu('navigate')
    ],
    [
        'title' => "Content",
        'icon' => 'fa fa-newspaper-o',
        'pages' => [
           /* (new Page(\App\Model\News::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(0),
            (new Page(\App\Model\News2::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(10),
            (new Page(\App\Model\News3::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(20),
            (new Page(\App\Model\News4::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(30),
            (new Page(\App\Model\News5::class))
                ->setIcon('fa fa-newspaper-o')
                ->setPriority(40)*/
        ]
    ],
    [
        'title' => 'Permissions',
        'icon' => 'fa fa-group',
        'pages' => [
            /*(new Page(\App\User::class))
                ->setIcon('fa fa-user')
                ->setPriority(0),
            (new Page(\App\Role::class))
                ->setIcon('fa fa-group')
                ->setPriority(100)*/
        ]
    ]
];