<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $order_id = $request->get('order_id');

        $order = Order::query()->where(['' => ''])->first();

        return view('order.order', [
            'user' => $user,
            'order' => $order,
        ]);
    }

    //
    public function orderProcess()
    {
        $order_id = $request->get('order_id');

        return view('order.order', [
            'user' => $user,
            'order' => $order,
        ]);
    }

    public function addOrderItemProcess(Request $request)
    {
        $order_item = OrederItem::create([
            '' => '',
            '' => '',
        ]);

        return response()->json($order_item, 200);
    }
}
