<?php

namespace App\Http\Controllers\Web;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\AddToCartRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function index(Request $request)
    {
        $seo = Seo::metaTags('cart');

        // order - cookie
        $hash_value = $request->cookie('number_order');

        //dd($hash_value);

        $order = Order::query()->where(['hash_order' => $hash_value])->whereIn('d_payment_id', [1, 3])->first();
        if (!empty($order)) {
            $order_items = OrderItem::query()->where(['order_id' => $order->id])->get();
        } else {
            $order_items = [];

            // cero para cesta
            Cookie::queue('count_order_items', 0, 60 * 24 * 30 );
        }

        return view('cart.index', [
            'seo' => $seo,
            'order_items' => $order_items,
            'order' => $order,
        ]);
    }

    //
    public function addToCart(AddToCartRequest $request)
    {
        // get cookie - number order - hash
        if (empty($request->cookie('number_order'))) {
            $minutes = 60 * 24 * 30; // 1 month
            $hash_value = Hash::make('MyOrder');
            Cookie::queue('number_order', $hash_value, $minutes);
        } else {
            $hash_value = $request->cookie('number_order');
        }

        $quantity = $request->get('quantity');
        $sku = $request->get('sku');
        $product = Product::query()->where(['sku' => $sku])->first();

        // Begin transaction
        DB::beginTransaction();

        try {

            // get Order
            $order = Order::query()
                ->where(['hash_order' => $hash_value])
                ->orderByDesc('id')
                ->first();

            if (!empty($order)) {
                // get sum price_total
                $price_total = OrderItem::query()
                    ->where(['order_id' => $order->id])
                    ->sum(\DB::raw('price * quantity'));

                $count_products = OrderItem::query()
                    ->where(['order_id' => $order->id])
                    ->count('price');

                // update - total_price
                $order->total_price = ( $price_total + ( $product->price * $quantity ) );
                $order->count_products = ( $count_products + 1 ); // count order_items
                $order->save();

                // cookie - count order items in cart - 1 month
                $count = $count_products + 1;
                Cookie::queue('count_order_items', $count, 60 * 24 * 30 );

            } else {

                // create order - get OrderId
                $order = Order::create([
                    'hash_order' => $hash_value,
                    'user_id' => !empty($user_id) ? $user_id : null,
                    'd_order_status_id' => 1,
                    'total_price' => ( $product->price * $quantity ),
                    'count_products' => 1,
                    'd_delivery_id' => 1,
                    'd_payment_id' => 1
                ]);

                // cookie - count order items in cart - 1 month
                Cookie::queue('count_order_items', '1', 60 * 24 * 30 );
            }

            // create order_item with OrderId
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'title' => $product->title,
                'slug' => $product->slug,
                'quantity' => $quantity,
                'price' => $product->price,
            ]);

        } catch(\Exception $e) {
            DB::rollBack();

            // Back to form with errors
            return Redirect::to( route('product', ['locale' => app()->getLocale(), 'slug' => $product->slug]) )
                ->with([
                    'flash_type' => 'danger',
                    'flash_message' => $e->getMessage().' Line:'. $e->getLine()
                ]);
        }

        // End transaction
        DB::commit();

        return redirect( route('cart', app()->getLocale()), 302 )->with([
            'flash_type' => 'success',
            'flash_message' => 'Successfull! You add in cart your choice',
        ]);
    }

    //
    public function deleteFromCart(Request $request)
    {
        //
        $order_item_id = $request->get('order_item_id');

        // Begin transaction
        DB::beginTransaction();

        try {
            // get - order_id
            $orderItem = OrderItem::query()->where(['id' => $order_item_id])->first();
            OrderItem::query()->where(['id' => $order_item_id])->delete();

            // get Order
            $order = Order::query()->where(['id' => $orderItem->order_id])->first();

            // get sum price_total
            $price_total = OrderItem::query()
                ->where(['order_id' => $order->id])
                ->sum(\DB::raw('price * quantity'));

            $count_products = OrderItem::query()
                ->where(['order_id' => $order->id])
                ->count('price');

            // update - total_price
            $order->total_price = $price_total;
            $order->count_products = $count_products;
            $order->save();

            // cookie - count order items in cart - 1 month
            Cookie::queue('count_order_items', $count_products, 60 * 24 * 30 );

        } catch(\Exception $e) {
            DB::rollBack();

            // Back to form with errors
            return Redirect::to( route('cart', ['locale' => app()->getLocale()]) )
                ->with([
                    'flash_type' => 'danger',
                    'flash_message' => $e->getMessage().' Line:'. $e->getLine()
                ]);
        }

        // End transaction
        DB::commit();

        return redirect(route('cart', ['locale' => app()->getLocale()]))
            ->with([
                'flash_type' => 'success',
                'flash_message' => 'Successfull! You delete from cart your product',
            ]);
    }
}
