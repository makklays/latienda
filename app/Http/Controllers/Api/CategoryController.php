<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Models\Api\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // GET /categories
    public function index() : JsonResponse
    {
        $categories = Category::all();

        return response()->json([
            'success' => true,
            'data' => $categories->toArray()
        ]);
    }

    // POST /categories
    public function store(Request $request) : JsonResponse
    {
        // Validación datos
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:categories|max:255'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => 'Bad Request',
                'errors' => $validator->errors()
            ]);
        }

        $category = new Category();
        $category->title = $request->title;
        $category->description = $request->description;
        if (!empty($request->is_active)) {
            $category->is_active = $request->is_active;
        }
        if (!empty($request->parent_id)) {
            $category->parent_id = $request->parent_id;
        }
        if (!empty($request->img)) {
            // add file
        }

        if ($category->save()) {
            return response()->json([
                'success' => true,
                'data' => $category->toArray()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category not added'
            ], 500);
        }
    }

    // GET /categories/{id}
    public function show($id) : JsonResponse
    {
        $category = Category::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $category->toArray()
        ]);
    }

    // PUT/PATCH /categories/{category}
    public function update(Request $request, $id) : JsonResponse
    {
        // Validación datos
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:categories|max:255'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failure',
                'message' => 'Bad Request',
                'errors' => $validator->errors()
            ]);
        }

        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 400);
        }

        //$category->fill($request->except(['parent_id']));
        $category->fill($request->all());
        $category->save();

        return response()->json([
            'success' => true,
            'data' => $category->toArray()
        ]);
    }

    // DELETE /categories/{category}
    public function destroy($id) : JsonResponse
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 400);
        }

        if ($category->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category can not be deleted'
            ], 500);
        }
    }
}
