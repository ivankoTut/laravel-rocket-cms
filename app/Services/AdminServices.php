<?php

namespace App\Services;

use SleepingOwl\Admin\Navigation\Page;
use Symfony\Component\Finder\Finder;

class AdminServices
{

    private $models = [];

    /**
     * Получаем все модели с папочки app\Models
     * @return null|boolean
     */
    private function loadModels()
    {
        if (count($this->models)) {
            return true;
        }

        $finder = new Finder();
        $finder->files()->in(app_path() . '/Models/');

        foreach ($finder as $file) {
            $mFile = explode('app' . DIRECTORY_SEPARATOR , $file->getRealPath())[1];
            $mFile = str_replace('/', '\\', $mFile);
            $mFile = str_replace('.php', '', $mFile);
            $mFile = 'App\\' . $mFile;
            $this->models[] = [
                'namespace' => $mFile,
                'model' => app($mFile),
            ];

        }
    }


    /**
     * Пытается построить меню в админке на основании опций в моделях
     * @param $section string - раздел меню
     * @return array
     */
    public function initAdminMenu($section)
    {
        $this->loadModels();
        $menu = [];

        foreach ($this->models as $model) {

            if (!property_exists($model['model'], 'admin')) {
                continue;
            }

            if ($model['model']->admin['section'] != $section) {
                continue;
            }

            $page = new Page($model['namespace']);
            $page->setIcon($model['model']->admin['icon']);
            $page->setPriority($model['model']->admin['priority']);

            $menu[] = $page;
        }

        return $menu;
    }

}