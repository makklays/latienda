<?php

namespace App\Services;

class Seo
{
    //
    public function metaTags($page = null, $showUrls = 1)
    {
        $seo = new \stdClass();
        $seo->server_name = request()->server('SERVER_NAME');
        $seo->request_scheme = request()->server('REQUEST_SCHEME');

        $newUrl = $this->getNewUrl();

        $seo->short_url = $newUrl;
        $seo->show_urls = $showUrls;

        $seo->title = trans('main.' . $page . '_title');
        $seo->description = trans('main.' . $page . '_description');
        $seo->keywords = trans('main.'. $page . '_keywords');

        return $seo;
    }

    //
    protected function getNewUrl()
    {
        $parts = explode('/', request()->server('REQUEST_URI'),5);

        $newUrl = (!empty($parts[2]) ? $parts[2].'/' : '').
            (!empty($parts[3]) ? $parts[3].'/' : '').(!empty($parts[4]) ? $parts[4].'/' : '').
            (!empty($parts[5]) ? $parts[5].'/' : '').(!empty($parts[6]) ? $parts[6].'/' : '').
            (!empty($parts[7]) ? $parts[7].'/' : '').(!empty($parts[8]) ? $parts[8].'/' : '');

        return $newUrl;
    }
}
