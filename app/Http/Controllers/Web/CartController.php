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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $seo = Seo::metaTags('cart');

        $order = Order::query()->where(['d_order_status_id' => 1])->orderByDesc('id')->first();
        $order_items = OrderItem::query()->where(['order_id' => $order->id])->get();

        //dd($order);
        //$user = Auth::user();

        return view('cart.index', [
            'seo' => $seo,
            'order_items' => $order_items,
            'order' => $order,
        ]);
    }

    public function addToCart(AddToCartRequest $request)
    {
        //dd($request->all());

        $quantity = $request->get('quantity');
        $sku = $request->get('sku');
        $product = Product::query()->where(['sku' => $sku])->first();

        //dd($product->price);
        //$user_id = Auth::user()->id;

        // Begin transaction
        DB::beginTransaction();

        try {

            // get Order
            $order = Order::query()->where(['d_order_status_id' => 1])->orderByDesc('id')->first();

            if (!empty($order)) {
                // get sum price_total
                $price_total = OrderItem::query()
                    ->where(['order_id' => $order->id])
                    ->sum(\DB::raw('price * quantity'));

                //dd($price_total);

                $count_products = OrderItem::query()
                    ->where(['order_id' => $order->id])
                    ->count('price');

                //dd($count_products);

                // update - total_price
                $order->total_price = ( $price_total + ( $product->price * $quantity ) );
                $order->count_products = ( $count_products + 1 ); // count order_items
                $order->save();

                //dd($order);

            } else {

                // create order - get OrderId
                $order = Order::create([
                    'user_id' => !empty($user_id) ? $user_id : null,
                    'd_order_status_id' => 1,
                    'total_price' => ( $product->price * $quantity ),
                    'count_products' => 1,
                    'd_delivery_id' => 1,
                    'd_payment_id' => 1
                ]);
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
