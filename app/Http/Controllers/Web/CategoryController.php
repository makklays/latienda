<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Models\Api\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // Page - Categories
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

        $categories = Category::query()->where(['is_active' => 1, 'parent_id' => 0])->get();

        return view('categories.index', [
            'seo' => $seo,
            'categories' => $categories,
        ]);
    }

    // Page - Category
    public function show(Request $request, $slug)
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

        // parsing path
        $path_arr = explode('/', $request->path);
        $cats = []; $cat_id = ''; $full_path_arr = [];

        // Busco parents de categories
        foreach($path_arr as $slug) {
            $category = Category::query()->where(['is_active' => 1, 'slug' => $slug])->firstOrFail();
            if (!empty($category)) {
                $full_path_arr[] = $slug;
                $category->full_path .= implode('/', $full_path_arr);
                $cats[$category->id] = $category;
                $cat_id = $category->id;
            }
        }

        // delete last category
        array_pop($cats);

        // Busco category
        $category = Category::query()->where(['is_active' => 1, 'id' => $cat_id])->firstOrFail();

        // Busco children de category
        $category_children = [];
        if ($cat_id != 0) {
            $category_children = Category::query()->where(['is_active' => 1, 'parent_id' => $cat_id])->get();
            foreach($category_children as $child) {
                $child->full_path .= implode('/', $full_path_arr) .'/'. $child->slug;
            }
        }

        return view('categories.show', [
            'seo' => $seo,
            'cats' => $cats,
            'category' => $category,
            'category_children' => $category_children,
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
