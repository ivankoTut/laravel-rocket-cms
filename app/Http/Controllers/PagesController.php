<?php

namespace App\Http\Controllers;

use App\Services\PageServices;

class PagesController extends Controller
{
    /**
     * @param PageServices $pageServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(PageServices $pageServices)
    {
        $pages = $pageServices->getAllPagesPaginate(3);

        return render_view(compact('pages'));
    }

    /**
     * @param $slug
     * @param PageServices $pageServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug, PageServices $pageServices)
    {
        $page = $pageServices->getPageBySlug($slug);

        return render_view(compact('page'));
    }


}
