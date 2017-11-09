<?php

if (!function_exists('print_menu')) {

    function print_menu($type = 'main')
    {
        return app(App\Services\PageServices::class)->printMenu($type);
    }
}

if (!function_exists('glob_recursive')) {
    // Does not support flag GLOB_BRACE

    function glob_recursive($pattern, $flags = 0)
    {
        $files = glob($pattern, $flags);

        foreach (glob(dirname($pattern) . '/*', GLOB_ONLYDIR | GLOB_NOSORT) as $dir) {
            $files = array_merge($files, glob_recursive($dir . '/' . basename($pattern), $flags));
        }

        return $files;
    }
}

if (!function_exists('render_view')) {
    /**
     * @param array $params
     * @return \Illuminate\View\View
     */
    function render_view(array $params)
    {
        return view(request()->route()->action['as'], $params);
    }
}