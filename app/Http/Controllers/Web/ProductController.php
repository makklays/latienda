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

class ProductController extends Controller
{
    // Page - All products
    public function index(Request $request)
    {
        $seo = Seo::metaTags('products');

        $product = Product::query()->where(['is_active' => 1, 'parent_id' => 0])->get();

        return view('products.index', [
            'products' => $product,
            'seo' => $seo
        ]);
    }

    // Page - One product
    public function show(Request $request, $locale, $slug)
    {
        $seo = Seo::metaTags('one_product');

        $product = Product::query()->where(['is_active' => '1', 'slug' => $slug])->firstOrFail();

        if (empty($product->title)) {
            return redirect('404');
        }

        // re-hacera (!!!) tarde
        $cat_parent = '';
        $cat = Category::query()->where(['is_active' => '1', 'id' => $product->category_id])->first();
        if (!empty($cat)) {
            $cat->full_path = $cat->slug;
            $cat_parent = Category::query()->where(['is_active' => '1', 'id' => $cat->parent_id])->first();
            if (!empty($cat_parent)) {
                $cat->full_path = $cat_parent->slug . '/' . $cat->slug;
                $cat_parent->full_path = $cat_parent->slug;
            }
        }

        //
        $products_relacionados = Product::query()
            ->where(['is_active' => '1', 'category_id' => $cat->id])
            ->orWhere(['is_active' => '1', 'category_id' => $cat->parent_id])
            ->limit(3)->get();

        return view('products.show', [
            'product' => $product,
            'seo' => $seo,
            'cat' => $cat,
            'cat_parent' => $cat_parent,
            'products_relacionados' => $products_relacionados,
        ]);
    }
}
