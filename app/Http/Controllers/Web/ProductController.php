<?php

namespace App\Http\Controllers\Web;

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
        $product = Product::query()->where(['is_active' => 1, 'parent_id' => 0])->get();

        return view('product', [
            'products' => $product,
        ]);
    }

    // Page - One product
    public function show(Request $request, $id)
    {
        $product = Product::query()->where(['is_active' => 1, 'id' => $id])->get();

        return view('product', [
            'product' => $product,
        ]);
    }
}
