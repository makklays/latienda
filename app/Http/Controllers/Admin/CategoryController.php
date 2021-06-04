<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $seo = Seo::metaTags('adm_category');

        $categories = Category::query()->get();

        return view('admin.category.index', [
            'seo' => $seo,
            'categories' => $categories,
        ]);
    }

    public function add(Request $request)
    {
        $seo = Seo::metaTags('adm_category_add');

        if ($request->getMethod() == 'POST') {
            //
            //dd($request->all());

            $category = new Category();
            $category->title = $request->title;
            $category->slug = $request->title;
            $category->parent_id = $request->parent_id;
            $category->description = $request->description;
            $category->is_active = !empty($request->is_active) ? 1 : 0;
            $category->save();
        }

        $categories = Category::query()->get();

        return view('admin.category.add', [
            'seo' => $seo,
            'categories' => $categories,
        ]);
    }

    public function edit(Request $request, $locale, $id)
    {
        $seo = Seo::metaTags('adm_category_add');

        $category = Category::query()->where(['id' => $id])->first();

        if ($request->getMethod() == 'POST') {
            //
            $category->title = $request->title;
            $category->parent_id = $request->parent_id;
            $category->description = $request->description;
            $category->is_active = $request->is_active;
            $category->updated_at = $request->updated_at;
            $category->save();

            // ->with()
        }

        $categories = Category::query()->where(['is_active'=>'1'])->get();

        return view('admin.category.edit', [
            'seo' => $seo,
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    //
    public function show(Request $request, $local, $id)
    {
        $seo = Seo::metaTags('adm_category_add');

        if ($request->getMethod() == 'POST') {
            //

        }

        $category = Category::query()->where(['id' => $id])->first();

       // dd($category);

        return view('admin.category.show', [
            'seo' => $seo,
            'category' => $category,
        ]);
    }
}
