<?php

namespace Admin\Providers;

use Admin\Widgets\NavigationUserBlock;
use App\Models\CmsModels\ContactMessage;
use App\Models\CmsModels\Page;
use App\Models\CmsModels\TypePage;
use App\Models\CmsModels\User;
use Illuminate\Routing\Router;
use SleepingOwl\Admin\Contracts\Template\MetaInterface;
use SleepingOwl\Admin\Contracts\Navigation\NavigationInterface;
use SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    static $r = 0;

    protected $widgets = [
        NavigationUserBlock::class,
    ];

    /**
     * @var array
     */
    protected $sections = [
        TypePage::class => \Admin\CmsModels\TypePage::class,
        Page::class => \Admin\CmsModels\Page::class,
        User::class => \Admin\CmsModels\User::class,
        ContactMessage::class => \Admin\CmsModels\ContactMessage::class
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
        $this->loadViewsFrom(base_path("resources/views/admin"), 'admin_cms');
        $this->app->call([$this, 'registerNavigation']);
        parent::boot($admin);

        $this->app->call([$this, 'registerViews']);
    }



    public function registerViews(WidgetsRegistryInterface $widgetsRegistry)
    {
        foreach ($this->widgets as $widget) {
            $widgetsRegistry->registerWidget($widget);
        }
    }

    /**
     * @param NavigationInterface $navigation
     */
    public function registerNavigation(NavigationInterface $navigation)
    {
        require base_path('admin/navigation.php');
    }


}
