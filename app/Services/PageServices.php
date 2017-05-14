<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 10.05.17
 * Time: 8:10
 */

namespace App\Services;

use App\Models\CmsModels\Page;

class PageServices
{
    public function printMenu($type = 'main')
    {
        $nodes = Page::whereType($type)->defaultOrder()->get()->toTree();
        $menu = '<ul class="nav navbar-nav">';

        $traverse = function ($categories, $main = true, $child = false ) use (&$traverse , &$menu ) {

            foreach ($categories as $category) {

                if($category->children->count()){
                    $menu .= "<li class='dropdown'>";
                    $menu .= '<a href="#" 
                        class="dropdown-toggle" data-toggle="dropdown" 
                        role="button" aria-haspopup="true" 
                        aria-expanded="false">' . $category->title . '</a>';
                }
                else{
                    $menu .= "<li>";
                    $menu .= '<a href="#">' . $category->title . '</a>';
                }

                if($category->children->count()){
                    $menu .= '<ul class="dropdown-menu">';
                    $menu .= $traverse($category->children,false , true);
                    $menu .= "</ul>";
                }

                $menu .= "</li>";
            }

        };
        $traverse($nodes);

        $menu .= '</ul>';

        return $menu;
    }
}