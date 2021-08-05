<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Models\Dictionaries\OrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $seo = Seo::metaTags('adm_order');

        $orders = Order::query()->OrderByDesc('created_at')->paginate(20);

        //dd($orders->order_status->name);

        return view('admin.order.index', [
            'seo' => $seo,
            'orders' => $orders,
        ]);
    }

    //
    public function show(Request $request, $locale, $id)
    {
        $seo = Seo::metaTags('adm_order_show');

        $order = Order::query()->where(['id' => $id])->first();
        $orders_statuses = OrderStatus::all();

        return view('admin.order.show', [
            'seo' => $seo,
            'order' => $order,
            'orders_statuses' => $orders_statuses,
        ]);
    }

    //
    public function edit(Request $request, $locale, $id)
    {
        $seo = Seo::metaTags('adm_order_show');

        $order = Order::query()->where(['id' => $id])->first();
        $orders_statuses = OrderStatus::all();

        return view('admin.order.edit', [
            'seo' => $seo,
            'order' => $order,
            'orders_statuses' => $orders_statuses,
        ]);
    }

    //
    public function edit_process(Request $request, $locale, $id)
    {
        $order = Order::query()->where(['id' => $id])->first();
        $order->d_order_status_id = !empty($request->d_order_status_id) ? $request->d_order_status_id : 1;
        $order->note = !empty($request->note) ? $request->note : null;
        $order->save();

        return redirect( route('adm_order_show', [app()->getLocale(), 'id' => $id]) )
            ->with('flash_message', trans('admin.Order_was_edit_suceessfully!'))
            ->with('flash_type', 'success');
    }
}
