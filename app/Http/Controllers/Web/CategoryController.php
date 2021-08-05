<?php

namespace App\Http\Controllers\Web;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Models\Api\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // Page - Categories
    public function index(Request $request)
    {
        $categories = Category::query()->where(['is_active' => 1, 'parent_id' => 0])->get();

        $seo = Seo::metaTags('categories');

        return view('categories.index', [
            'seo' => $seo,
            'categories' => $categories,
        ]);
    }

    // Page - Category
    public function show(Request $request, $slug)
    {
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

        $seo = Seo::metaTags('one_category', $category->title);

        // Busco children de category
        $category_children = [];
        if ($cat_id != 0) {
            $category_children = Category::query()->where(['is_active' => 1, 'parent_id' => $cat_id])->get();
            foreach($category_children as $child) {
                $child->full_path .= implode('/', $full_path_arr) .'/'. $child->slug;
            }
        }

        // Products con el Category
        $products = Product::query()->where(['is_active' => '1', 'category_id' => $category->id])->paginate(12);

        //dd($products);

        return view('categories.show', [
            'seo' => $seo,
            'cats' => $cats,
            'category' => $category,
            'category_children' => $category_children,
            'products' => $products,
        ]);
    }
}
