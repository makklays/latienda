<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    public function index()
    {
        $seo = Seo::metaTags('qweqwe');

        $products = Product::query()->paginate(20);

        return view('admin.product.index', [
            'seo' => $seo,
            'products' => $products,
        ]);
    }

    //
    public function add()
    {
        $seo = Seo::metaTags('adm_product_add');

        $categories = Category::query()->where(['is_active' => '1'])->get();

        return view('admin.product.add', [
            'seo' => $seo,
            'categories' => $categories,
        ]);
    }

    public function add_process(AddProductRequest $request)
    {
        $product = Product::create([
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $request->title,
            'description' => !empty($request->description) ? $request->description : null,
            'full_description' => !empty($request->full_description) ? $request->full_description : null,
            'price' => !empty($request->price) ? $request->price : 0.00,
            'old_price' => !empty($request->old_price) ? $request->old_price : 0.00,
            'quantity' => !empty($request->quantity) ? $request->quantity : 0,
            'note' => !empty($request->note) ? $request->note : null,
            'is_active' => !empty($request->is_active) ? '1' : '0',
        ]);

        if (!empty($request->img)) {
            $arr_imgs = [];
            $i = 1;
            foreach($request->file('img') as $k => $img) {
                $extension = $img->extension();
                $new_name = 'product'.$i.'.' . $extension;
                $path = $img->storeAs('products/' . $product->id, $new_name);

                $arr_imgs[] .= $new_name;
                $i++;
            }
            $product->img = implode('|', $arr_imgs);
            $product->save();
        }

        return redirect( route('adm_product', app()->getLocale()) )
            ->with('flash_message', 'Product was add suceessfully!')
            ->with('flash_type', 'success');
    }

    //
    public function edit(Request $request, $locale, $id)
    {
        $seo = Seo::metaTags('adm_product_add');

        $product = Product::query()->where(['id' => $id])->first();
        $categories = Category::query()->where(['is_active' => '1'])->get();

        return view('admin.product.edit', [
            'seo' => $seo,
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function edit_process(AddProductRequest $request, $locale, $id)
    {
        // edit product
        $product = Product::query()->where(['id' => $id])->first();

        $product->sku = $request->sku;
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->category_id = $request->category_id;
        $product->description = !empty($request->description) ? $request->description : null;
        $product->full_description = !empty($request->full_description) ? $request->full_description : null;
        $product->price = !empty($request->price) ? $request->price : 0.00;
        $product->old_price = !empty($request->old_price) ? $request->old_price : 0.00;
        $product->quantity = !empty($request->quantity) ? $request->quantity : 0;
        $product->note = !empty($request->note) ? $request->note : null;
        $product->is_active = !empty($request->is_active) ? '1' : '0';
        $product->save();

        // guarda img
        if (!empty($request->img)) {
            $arr_imgs = [];
            $i = 1;
            foreach($request->file('img') as $k => $img) {
                $extension = $img->extension();
                $new_name = 'product'.$i.'.' . $extension;
                $path = $img->storeAs('products/' . $product->id, $new_name);

                $arr_imgs[] .= $new_name;
                $i++;
            }
            $product->img = implode('|', $arr_imgs);
            $product->save();
        }

        return redirect( route('adm_product_show', [app()->getLocale(), 'id' => $request->id]) )
            ->with('flash_message', 'Product was edit suceessfully!')
            ->with('flash_type', 'success');
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

    //
    public function delete(Request $request, $local, $id)
    {
        $product = Product::query()->where(['id' => $id])->first();
        $product->delete();

        return redirect( route('adm_product', app()->getLocale()) )
            ->with('flash_message', 'Product ID=' . $product->id . ' was delete suceessfully!')
            ->with('flash_type', 'success');
    }
}
