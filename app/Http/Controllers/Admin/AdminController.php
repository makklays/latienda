<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {
        $seo = Seo::metaTags('home_admin');
        $user = Auth::user();

        $categories_count = Category::query()->where(['is_active' => '1'])->count();
        $products_count = Product::query()->where(['is_active' => '1'])->count();
        $orders_count_new = Order::query()->where(['d_order_status_id' => '1'])->count();
        $orders_count_ = Order::query()->where(['d_order_status_id' => '2'])->count();
        $customers_count = User::query()->count();

        return view('admin.home', [
            'user' => $user,
            'seo' => $seo,
            'categories_count' => $categories_count,
            'products_count' => $products_count,
            'orders_count_new' => $orders_count_new,
            'orders_count_' => $orders_count_,
            'customers_count' => $customers_count,
        ]);
    }
}
