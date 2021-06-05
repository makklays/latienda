<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddCategoryRequest;
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

    //
    public function add()
    {
        $seo = Seo::metaTags('adm_category_add');

        $categories = Category::all();

        return view('admin.category.add', [
            'seo' => $seo,
            'categories' => $categories,
        ]);
    }

    //
    public function add_process(AddCategoryRequest $request)
    {
        $category = Category::create([
            'title' => $request->title,
            'slug' => $request->title,
            'parent_id' => $request->category_id,
            'description' => $request->description,
            'is_active' => !empty($request->is_active) ? 1 : 0,
        ]);

        if (!empty($request->img)) {

            $name = $request->file('img')->getClientOriginalName();
            $extension = $request->file('img')->extension();

            $path = $request->file('img')->storeAs(
                'categories', $category->id
            );

            dd( $path );
        }

        return redirect( route('adm_category', app()->getLocale()) )
            ->with('flash_message', 'Category was add suceessfully!')
            ->with('flash_type', 'success');
    }

    //
    public function edit(Request $request, $locale, $id)
    {
        $seo = Seo::metaTags('adm_category_edit');

        // edit category
        $category = Category::query()->where(['id' => $id])->first();
        // otros categories
        $categories = Category::query()->where(['is_active'=>'1'])->get();

        return view('admin.category.edit', [
            'seo' => $seo,
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    //
    public function edit_process(AddCategoryRequest $request, $locale, $id)
    {
        // edit category
        $category = Category::query()->where(['id' => $id])->first();

        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->parent_id = $request->category_id;
        $category->description = $request->description;
        $category->is_active = !empty($request->is_active) ? 1 : 0;
        $category->save();

        return redirect( route('adm_category', [app()->getLocale(), 'id' => $request->id]) )
            ->with('flash_message', 'Category was edit suceessfully!')
            ->with('flash_type', 'success');
    }

    //
    public function show(Request $request, $local, $id)
    {
        $seo = Seo::metaTags('adm_category_add');

        $category = Category::query()->where(['id' => $id])->first();

        return view('admin.category.show', [
            'seo' => $seo,
            'category' => $category,
        ]);
    }

    //
    public function delete(Request $request, $local, $id)
    {
        $category = Category::query()->where(['id' => $id])->first();
        $category->delete();

        return redirect( route('adm_category', app()->getLocale()) )
            ->with('flash_message', 'Category ID='.$category->id.' was delete suceessfully!')
            ->with('flash_type', 'success');
    }
}
