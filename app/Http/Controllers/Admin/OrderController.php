<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $seo = Seo::metaTags('qweqwe');

        $orders = Order::query()->OrderByDesc('created_at')->get();

        return view('admin.order.index', [
            'seo' => $seo,
            'orders' => $orders,
        ]);
    }
}
