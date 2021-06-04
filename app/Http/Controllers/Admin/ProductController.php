<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $seo = Seo::metaTags('qweqwe');

        $products = Product::query()->get();

        return view('admin.product.index', [
            'seo' => $seo,
            'products' => $products,
        ]);
    }

    //
    public function add(Request $request)
    {
        $seo = Seo::metaTags('adm_product_add');

        if ($request->getMethod() == 'POST') {
            //

            return redirect( route('adm_product_add', app()->getLocale()), 302);
        }

        return view('admin.product.add', [
            'seo' => $seo,
        ]);
    }

    //
    public function edit(Request $request, $locale, $id)
    {
        $seo = Seo::metaTags('adm_product_add');

        $product = Product::query()->where(['id' => $id])->first();

        if ($request->getMethod() == 'POST') {
            //
            $product->sku = $request->get('sku');
            $product->title = $request->get('title');
            $product->save();

            return redirect( route('adm_product_add', app()->getLocale()), 302);
        }

        return view('admin.product.edit', [
            'seo' => $seo,
            'product' => $product,
        ]);
    }

    //
    public function show(Request $request, $locale, $id)
    {
        $seo = Seo::metaTags('adm_product_show');

        $product = Product::query()->where(['id' => $id])->first();

        return view('admin.product.show', [
            'seo' => $seo,
            'product' => $product,
        ]);
    }
}
