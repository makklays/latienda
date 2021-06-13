<?php

namespace App\Http\Controllers\Web;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        if (empty(Auth::user()->email)) {
            return redirect( route('login', app()->getLocale()) );
        }

        // get cookie - number order - hash
        $hash_value = $request->cookie('number_order');

        // get Order and add user_id to Order
        $order = Order::query()->where(['hash_order' => $hash_value])->firstOrFail();
        $order->user_id = Auth::user()->id;
        $order->save();

        $seo = Seo::metaTags('checkout');

        return view('payments.checkout', [
            'seo' => $seo,
            'order' => $order,
            'order_items' => $order_items,
        ]);
    }

    public function checkoutProcess(Request $request, Response $response)
    {
        if (empty(Auth::user()->email)) {
            return redirect( route('login', app()->getLocale()) );
        }

        // get cookie - number order - hash
        $hash_value = $request->cookie('number_order');

        // get Order and add user_id to Order
        $order = Order::query()->where(['hash_order' => $hash_value])->firstOrFail();
        $order->user_id = Auth::user()->id;
        $order->save();

        // get OrderItems
        $order_items = OrderItem::query()->where(['order_id' => $order->id])->get();

        $arr_products = [];
        foreach($order_items as $k => $item) {

            $img = $item->product->img;
            $arr_imgs = explode('|', $img);

            $arr_products[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $item->price * 100,
                    'product_data' => [
                        'name' => $item->product->title,
                        'images' => !empty($arr_imgs[0]) ? [asset('products/'.$item->product_id.'/'.$arr_imgs[0])] : ["https://google.com/en"],
                    ],
                ],
                'quantity' => $item->quantity,
            ];
        }

        \Stripe\Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');

        header('Content-Type: application/json');

        //
        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $arr_products,
            'mode' => 'payment',
            'success_url' => route('success', ['locale' => app()->getLocale(), 'order_id' => $order->id]),
            'cancel_url' => route('cancel', ['locale' => app()->getLocale(), 'order_id' => $order->id]),
        ]);

        echo json_encode(['id' => $checkout_session->id]);
    }

    /*public function payInvoice()
    {
        \Stripe\Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');

        // create customer
        $customer = \Stripe\Customer::create([
            'name' => 'jenny rosen',
            'email' => 'jenny.rosen@example.com',
            'description' => 'My First Test Customer (created for API docs)'
        ]);

        // create invoice-item
        \Stripe\InvoiceItem::create([
            'customer' => 'cus_4fdAW5ftNQow1a',
            'price' => 'price_CBb6IXqvTLXp3f',
        ]);

        // create invoice
        \Stripe\Invoice::create([
            'customer' => 'cus_4fdAW5ftNQow1a',
            'auto_advance' => true, // auto-finalize this draft after ~1 hour
        ]);

        // finilize
        \Stripe\InvoiceItem::create([
            'customer' => 'cus_4fdAW5ftNQow1a',
            'price' => 'price_CBb6IXqvTLXp3f',
        ]);

        \Stripe\Invoice::create([
            'customer' => 'cus_4fdAW5ftNQow1a',
            'auto_advance' => true, // auto-finalize this draft after ~1 hour
        ]);
    }*/

    public function success(Request $request)
    {
        $seo = Seo::metaTags('p-success');

        $order_id = $request->order_id;
        if (!empty($order_id)) {
            $order = Order::query()->where(['id' => $order_id])->firstOrFail();
            $order->d_payment_id = 2; // paid
            $order->save();
        }

        // cero para cesta
        Cookie::queue('count_order_items', 0, 60 * 24 * 30 );
        Cookie::queue('number_order', '', 60 * 24 * 30 );

        return view('payments.success', [
            'seo' => $seo,
            'order' => $order,
        ]);
    }

    public function cancel(Request $request)
    {
        $seo = Seo::metaTags('p-cancel');

        $order_id = $request->order_id;

        if (!empty($order_id)) {
            $order = Order::query()->where(['id' => $order_id])->firstOrFail();
            $order->d_payment_id = 3; // canceled
            $order->save();
        }

        return view('payments.cancel', [
            'seo' => $seo,
            'order' => $order,
        ]);
    }
}
