<?php

namespace App\Http\Controllers\Web;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\CheckoutDataRequest;
use App\Models\Dictionaries\Delivery;
use App\Models\Dictionaries\Provincia;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        if (empty(Auth::user()->email)) {
            return redirect( route('login', app()->getLocale()) );
        }

        $seo = Seo::metaTags('checkout');

        // get cookie - number order - hash
        $hash_value = $request->cookie('number_order');

        // get Order and add user_id to Order
        $order = Order::query()->where(['hash_order' => $hash_value])->firstOrFail();
        $order->user_id = Auth::user()->id;
        $order->save();

        //dd($order);

        // Заказ оформлен
        $can_pay = false;
        if ($order->d_order_status_id == 2) {
            $can_pay = true;
        }

        $order_items = OrderItem::query()->where(['order_id' => $order->id])->get();

        $order_by_asc = 'name_' . app()->getLocale();
        $provincias = Provincia::query()->orderBy("$order_by_asc", 'ASC')->get();

        $user = Auth::user();

        $type_of_delivery = Delivery::all();

        return view('payments.checkout', [
            'seo' => $seo,
            'order' => $order,
            'order_items' => $order_items,
            'provincias' => $provincias,
            'user' => $user,
            'type_of_delivery' => $type_of_delivery,
            'can_pay' => $can_pay,
        ]);
    }

    public function checkoutDataProcess(CheckoutDataRequest $request, Response $response)
    {
        if (empty(Auth::user()->email)) {
            return redirect(route('login', app()->getLocale()));
        }

        // get cookie - number order - hash
        $hash_value = $request->cookie('number_order');

        $user = User::query()->where(['id' => Auth::user()->id])->firstOrFail();
        $user->firstname = $request->firstname1;
        $user->lastname = $request->lastname1;
        $user->phone = $request->phone1;
        $user->email = $request->email1;
        $user->save();

        // get Order and add user_id to Order
        $order = Order::query()->where(['hash_order' => $hash_value])->firstOrFail();
        $order->user_id = Auth::user()->id;
        // save datas
        $order->d_delivery_id = $request->d_delivery_id;
        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->city = $request->city;
        $order->address = $request->address;
        $order->provincia = $request->provincia;
        $order->zip = $request->zip;
        $order->period = $request->period;
        $order->date = $request->date;
        $order->dedication = $request->dedication;
        $order->save();

        //dd($request);

        return redirect( route('purchase', app()->getLocale()) )
            ->with([
                'flash_type' => 'success',
                'flash_message' => trans('main.Confirm_datos_successfuly'),
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
                        'images' => !empty($arr_imgs[0]) ? [asset('products/'.$item->product_id.'/100/'.$arr_imgs[0])] : ["https://google.com/en"],
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
        $seo = Seo::metaTags('success');

        if (!empty($request->order_id)) {
            $order = Order::query()->where(['id' => $request->order_id])->firstOrFail();
            $order->d_payment_id = 2; // paid
            $order->save();
        } else {
            // to log
            $ip = Seo::getRealIP();
            $usario = !empty(Auth::user()->id) ? Auth::user()->id : 0;
            Log::channel('daily')->info('No tengo order_id! (Success order) File:'.__FILE__.' usario_id:'.$usario.' IP:'.$ip);

            // empty order )
            $order = [];
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
        $seo = Seo::metaTags('cancel');

        if (!empty($request->order_id)) {
            $order = Order::query()->where(['id' => $request->order_id])->firstOrFail();
            $order->d_payment_id = 3; // canceled
            $order->save();
        } else {
            // to log
            $usario = !empty(Auth::user()->id) ? Auth::user()->id : 0;
            $ip = Seo::getRealIP();
            Log::channel('daily')->info('No tiene order_id! (Cancel order) File: '.__FILE__.' para usario:' . $usario . ' IP:' . $ip);

            // to redis
            //$redis = Redis::connection();
            //$redis->command('set', ['name' => 'MyName']);

            //Redis::set('nn', 'MyNNNAME');
            //$nn = Redis::get('foo');
            //dd( $nn );
            //$values = Redis::lrange('names', 5, 10);

            // empty order )
            $order = [];

            //dd('not order_id');
        }

        return view('payments.cancel', [
            'seo' => $seo,
            'order' => $order,
        ]);
    }

    public function purchase(Request $request)
    {
        if (empty(Auth::user()->email)) {
            return redirect( route('login', app()->getLocale()) );
        }

        $seo = Seo::metaTags('purchase');

        // get cookie - number order - hash
        $hash_value = $request->cookie('number_order');

        // get Order and add user_id to Order
        $order = Order::query()->where(['hash_order' => $hash_value])->firstOrFail();

        //dd($order);

        // Заказ оформлен
        $can_pay = false;
        if ($order->d_order_status_id == 2) {
            $can_pay = true;
        }

        $order_items = OrderItem::query()->where(['order_id' => $order->id])->get();
        if ($order_items->count() <= 0) {
            return redirect( route('cart', app()->getLocale()) );
        }
        //$order_by_asc = 'name_' . app()->getLocale();
        //$provincias = Provincia::query()->orderBy("$order_by_asc", 'ASC')->get();

        $user = Auth::user();

        //$type_of_delivery = Delivery::all();

        return view('payments.purchase', [
            'seo' => $seo,
            'order' => $order,
            'order_items' => $order_items,
            //'provincias' => $provincias,
            'user' => $user,
            //'type_of_delivery' => $type_of_delivery,
            'can_pay' => $can_pay,
        ]);
    }
}
