<?php

namespace App\Providers;

use App\Admin\Widgets\NavigationUserBlock;
use App\Models\CmsModels\Page;
use App\Models\CmsModels\TypePage;
use Illuminate\Routing\Router;
use SleepingOwl\Admin\Contracts\Navigation\NavigationInterface;
use SleepingOwl\Admin\Contracts\Template\MetaInterface;
use SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    protected $widgets = [
        NavigationUserBlock::class,
    ];

    /**
     * @var array
     */
    protected $sections = [
        TypePage::class => \App\Admin\CmsModels\TypePage::class,
        Page::class => \App\Admin\CmsModels\Page::class,
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
        $this->loadViewsFrom(base_path("resources/views/admin"), 'admin_cms');

        parent::boot($admin);

        $this->app->call([$this, 'registerViews']);
    }



    public function registerViews(WidgetsRegistryInterface $widgetsRegistry)
    {
        foreach ($this->widgets as $widget) {
            $widgetsRegistry->registerWidget($widget);
        }
    }


}
