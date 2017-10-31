<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 10.05.17
 * Time: 8:10
 */

namespace App\Services;

use App\Models\CmsModels\Page;
use App\Models\CmsModels\TypePage;
use Illuminate\Support\Collection;

class PageServices
{
    public function printMenu($type = 'main')
    {
        $typePage = TypePage::whereName($type)->first();
        $nodes = Page::whereTypePageId($typePage->id)->whereShow(1)->defaultOrder()->get()->toTree();
        $menu = '<ul class="nav navbar-nav">';

        $traverse = function ($categories, $main = true, $child = false) use (&$traverse, &$menu) {

            foreach ($categories as $category) {

                if ($category->children->count()) {
                    $menu .= "<li class='dropdown'>";
                    $menu .= '<a href="' . route('pages.show', ['slug' => $category->slug]) . '" 
                        class="dropdown-toggle" data-toggle="dropdown" 
                        role="button" aria-haspopup="true" 
                        aria-expanded="false">' . $category->title . '</a>';
                } else {
                    $menu .= "<li>";
                    $menu .= '<a href="' . route('pages.show', ['slug' => $category->slug]) . '">' . $category->title . '</a>';
                }

                if ($category->children->count()) {
                    $menu .= '<ul class="dropdown-menu">';
                    $menu .= $traverse($category->children, false, true);
                    $menu .= "</ul>";
                }

                $menu .= "</li>";
            }

        };
        $traverse($nodes);

        $menu .= '</ul>';

        return $menu;
    }

    /**
     * @param int $count
     * @return Collection
     */
    public function getAllPagesPaginate($count = 10)
    {
        return Page::whereShow(1)->paginate($count);
    }

    /**
     * @param string $slug
     * @return Collection
     */
    public function getPageBySlug(string $slug)
    {
        return Page::whereSlug($slug)->first();
    }
}