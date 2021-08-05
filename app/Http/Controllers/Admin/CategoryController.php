<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Seo;
use App\Facades\Word;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $seo = Seo::metaTags('adm_category');

        $categories = Category::query()->paginate(20);

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
            'slug' => Word::translite($request->title),
            'parent_id' => $request->category_id,
            'description' => $request->description,
            'is_active' => !empty($request->is_active) ? 1 : 0,
        ]);

        if (!empty($request->img)) {

            //$name = $request->file('img')->getClientOriginalName();
            $extension = $request->file('img')->extension();
            $new_name = 'category.'.$extension;

            // resize image
            $img = $request->file('img');
            $resized_img = Image::make($img);
            $resized_img->fit(200)->save($img);
            $path = $img->storeAs('categories/' . $category->id . '/200', $new_name);

            $resized_img->fit(100)->save($img);
            $path = $img->storeAs('categories/' . $category->id . '/100', $new_name);

            $category->img = $new_name;
            $category->save();
        }

        return redirect( route('adm_category', app()->getLocale()) )
            ->with('flash_message', trans('admin.Category_was_add_suceessfully!'))
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
        $category->slug = Word::translite($request->slug);
        $category->parent_id = $request->category_id;
        $category->description = $request->description;
        $category->is_active = !empty($request->is_active) ? '1' : '0';
        $category->save();

        // guarda img
        if (!empty($request->img)) {
            $extension = $request->file('img')->extension();
            $new_name = 'category.'.$extension;

            // resize image
            $img = $request->file('img');
            $resized_img = Image::make($img);
            $resized_img->fit(200)->save($img);
            $path = $img->storeAs('categories/' . $category->id . '/200', $new_name);

            $resized_img->fit(100)->save($img);
            $path = $img->storeAs('categories/' . $category->id . '/100', $new_name);

            $category->img = $new_name;
            $category->save();
        }

        return redirect( route('adm_category', [app()->getLocale(), 'id' => $request->id]) )
            ->with('flash_message', trans('admin.Category_was_edit_suceessfully!'))
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
            ->with('flash_message', trans('admin.Category ID=:ID was delete suceessfully!', ['ID' => $category->id]))
            ->with('flash_type', 'success');
    }
}
