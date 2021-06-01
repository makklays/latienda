<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home
Route::get('', ['as' => '/', 'uses' => 'App\Http\Controllers\Web\PagesController@home']);

// Latienda24h Snack bar
Route::get('/snack-bar', ['as' => 'snack-bar', 'uses' => 'App\Http\Controllers\Web\PagesController@snack-bar']);

// sitemap
Route::get('sitemap.xml', ['as' => 'sitemap', 'uses' => 'App\Http\Controllers\Web\PagesController@sitemap']);

// bot
Route::match(['get', 'post'], 'bota', ['as' => 'bota', 'uses' => 'App\Http\Controllers\Web\BotController@index']);

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'
], function () {

    // Home
    Route::get('', ['as' => '/', 'uses' => 'App\Http\Controllers\Web\PagesController@home']);

    // Pages
    Route::get('/about-us', ['as' => 'about', 'uses' => 'App\Http\Controllers\Web\PagesController@about']);
    Route::get('/delivery', ['as' => 'delivery', 'uses' => 'App\Http\Controllers\Web\PagesController@delivery']);
    Route::get('/contacts', ['as' => 'contacts', 'uses' => 'App\Http\Controllers\Web\PagesController@contacts']);

    // Categories
    Route::get('/categories', ['as' => 'categories', 'uses' => 'App\Http\Controllers\Web\CategoryController@index']);
    Route::get('/c/{path}', ['as' => 'category', 'uses' => 'App\Http\Controllers\Web\CategoryController@show', 'where' => ['path' => '.+']]);
    //Route::get('/c/{slug}', ['as' => 'category', 'uses' => 'App\Http\Controllers\Web\CategoryController@show']);

    // Blog
    Route::get('/flore-blog', ['as' => 'blog', 'uses' => 'App\Http\Controllers\Web\BlogController@index']);
    Route::get('/flore-blog/{slug}', ['as' => 'blog_show', 'uses' => 'App\Http\Controllers\Web\BlogController@show']);

    // Products
    Route::get('/products', ['as' => 'products', 'uses' => 'App\Http\Controllers\Web\ProductController@index']);
    Route::get('/p/{slug}', ['as' => 'product', 'uses' => 'App\Http\Controllers\Web\ProductController@show']);

    // Auth
    Route::get('/login', ['as' => 'login', 'uses' => 'App\Http\Controllers\Web\AuthController@login']);
    Route::post('/login_process', ['as' => 'login_process', 'uses' => 'App\Http\Controllers\Web\AuthController@loginProcess']);

    Route::get('/register', ['as' => 'register', 'uses' => 'App\Http\Controllers\Web\AuthController@register']);
    Route::post('/register_process', ['as' => 'register_process', 'uses' => 'App\Http\Controllers\Web\AuthController@registerProcess']);

    Route::get('/verify', ['as' => 'verify', 'uses' => 'App\Http\Controllers\Web\AuthController@verify']);
    Route::get('/logout', ['as' => 'logout', 'uses' => 'App\Http\Controllers\Web\AuthController@logout']);

    // Purchase
    Route::get('/order', ['as' => 'order', 'uses' => 'App\Http\Controllers\Web\OrderController@order']);
    Route::post('/order_process', ['as' => 'order_process', 'uses' => 'App\Http\Controllers\Web\OrderController@orderProcess']);
    Route::post('/add_order_item', ['as' => 'add_order_item', 'uses' => 'App\Http\Controllers\Web\OrderController@addOrderItemProcess']);

    // Dashboard
    Route::get('/dashboard', ['as' => 'da_home', 'uses' => 'App\Http\Controllers\Web\DashboardController@home']);
    Route::get('/dashboard/status-orders', ['as' => 'da_status', 'uses' => 'App\Http\Controllers\Web\DashboardController@statusesOrders']);
    Route::get('/dashboard/history', ['as' => 'da_history', 'uses' => 'App\Http\Controllers\Web\DashboardController@history']);

    // Cart
    Route::get('/cart', ['as' => 'cart', 'uses' => 'App\Http\Controllers\Web\CartController@index']);
    Route::post('/add-to-cart', ['as' => 'add_to_cart', 'uses' => 'App\Http\Controllers\Web\CartController@addToCart']);
    Route::get('/delete-from-cart', ['as' => 'delete-from-cart', 'uses' => 'App\Http\Controllers\Web\CartController@deleteFromCart']);

    // Payments
    Route::get('/purchase', ['as' => 'purchase', 'uses' => 'App\Http\Controllers\Web\PaymentController@purchase']);
    Route::get('/p-success', ['as' => 'success', 'uses' => 'App\Http\Controllers\Web\PaymentController@success']);
    Route::get('/p-cancel', ['as' => 'cancel', 'uses' => 'App\Http\Controllers\Web\PaymentController@cancel']);
    Route::get('/p-checkout', ['as' => 'checkout', 'uses' => 'App\Http\Controllers\Web\PaymentController@checkout']);
});
