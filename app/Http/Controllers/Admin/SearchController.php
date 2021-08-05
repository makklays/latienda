<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Dictionaries\OrderStatus;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // All reports
    public function index(Request $request)
    {
        $seo = Seo::metaTags('adm_search');

        $search = $request->search;
        $products = Product::query()->where('title', 'LIKE', '%'.$search.'%')->paginate(20);
        $categories = Category::query()->where('title', 'LIKE', '%'.$search.'%')->paginate(20);
        $customers = User::query()
            ->where('firstname', 'LIKE', '%'.$search.'%')
            ->orWhere('lastname', 'LIKE', '%'.$search.'%')
            ->paginate(20);

        return view('admin.search.index', [
            'seo' => $seo,
            'products' => $products,
            'categories' => $categories,
            'customers' => $customers,
        ]);
    }
}
