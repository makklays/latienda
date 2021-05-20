<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Models\Api\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    // Page - Blog
    public function index(Request $request)
    {
        $new_url = $this->new_url();

        $lang = app()->getLocale();
        $seo = new \stdClass();
        $seo->server_name = $request->server('SERVER_NAME');
        $seo->request_scheme = $request->server('REQUEST_SCHEME');
        $seo->short_url = $new_url;
        $seo->show_urls = 1;
        if ($lang == 'ru') {
            $seo->title = 'latienda';
            $seo->description = 'latienda';
            $seo->keywords = 'latienda';
        } else if ($lang == 'es') {
            $seo->title = 'latienda';
            $seo->description = 'latienda';
            $seo->keywords = 'latienda';
        } else {
            $seo->title = 'latienda';
            $seo->description = 'latienda';
            $seo->keywords = 'latienda';
        }

        return view('blog.index', [
            'seo' => $seo,
        ]);
    }

    // Page - Blog - Full text
    public function show(Request $request)
    {
        $new_url = $this->new_url();

        $lang = app()->getLocale();
        $seo = new \stdClass();
        $seo->server_name = $request->server('SERVER_NAME');
        $seo->request_scheme = $request->server('REQUEST_SCHEME');
        $seo->short_url = $new_url;
        $seo->show_urls = 1;
        if ($lang == 'ru') {
            $seo->title = 'latienda';
            $seo->description = 'latienda';
            $seo->keywords = 'latienda';
        } else if ($lang == 'es') {
            $seo->title = 'latienda';
            $seo->description = 'latienda';
            $seo->keywords = 'latienda';
        } else {
            $seo->title = 'latienda';
            $seo->description = 'latienda';
            $seo->keywords = 'latienda';
        }

        return view('blog.show', [
            'seo' => $seo,
        ]);
    }

    /**
     * Делает новый url с указанием языка сайта
     * @param $lang
     * @return string
     */
    function new_url()
    {
        $parts = explode('/', $_SERVER['REQUEST_URI'],5);

        $new_url = (!empty($parts[2]) ? $parts[2].'/' : '').
            (!empty($parts[3]) ? $parts[3].'/' : '').(!empty($parts[4]) ? $parts[4].'/' : '').
            (!empty($parts[5]) ? $parts[5].'/' : '').(!empty($parts[6]) ? $parts[6].'/' : '').
            (!empty($parts[7]) ? $parts[7].'/' : '').(!empty($parts[8]) ? $parts[8].'/' : '');

        return $new_url;
    }
}
