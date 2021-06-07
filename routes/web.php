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
    Route::post('/purchase_process', ['as' => 'purchase_process', 'uses' => 'App\Http\Controllers\Web\PaymentController@purchaseProcess']);
    Route::get('/p-success', ['as' => 'success', 'uses' => 'App\Http\Controllers\Web\PaymentController@success']);
    Route::get('/p-cancel', ['as' => 'cancel', 'uses' => 'App\Http\Controllers\Web\PaymentController@cancel']);
    Route::get('/p-checkout', ['as' => 'checkout', 'uses' => 'App\Http\Controllers\Web\PaymentController@checkout']);

    // Adminka
    Route::get('/admin', ['as' => 'da_admin', 'uses' => 'App\Http\Controllers\Admin\AdminController@home']);

    Route::get('/admin/categories', ['as' => 'adm_category', 'uses' => 'App\Http\Controllers\Admin\CategoryController@index']);
    Route::get('/admin/category/add', ['as' => 'adm_category_add', 'uses' => 'App\Http\Controllers\Admin\CategoryController@add']);
    Route::post('/admin/category/add_process', ['as' => 'adm_category_add_process', 'uses' => 'App\Http\Controllers\Admin\CategoryController@add_process']);
    Route::get('/admin/category/show/{id}', ['as' => 'adm_category_show', 'uses' => 'App\Http\Controllers\Admin\CategoryController@show', 'where' => ['id' => '.+']]);
    Route::get('/admin/category/edit/{id}', ['as' => 'adm_category_edit', 'uses' => 'App\Http\Controllers\Admin\CategoryController@edit', 'where' => ['id' => '.+']]);
    Route::post('/admin/category/edit_process/{id}', ['as' => 'adm_category_edit_process', 'uses' => 'App\Http\Controllers\Admin\CategoryController@edit_process', 'where' => ['id' => '.+']]);
    Route::get('/admin/category/delete/{id}', ['as' => 'adm_category_delete', 'uses' => 'App\Http\Controllers\Admin\CategoryController@delete', 'where' => ['id' => '.+']]);

    Route::get('/admin/products', ['as' => 'adm_product', 'uses' => 'App\Http\Controllers\Admin\ProductController@index']);
    Route::get('/admin/product/add', ['as' => 'adm_product_add', 'uses' => 'App\Http\Controllers\Admin\ProductController@add']);
    Route::post('/admin/product/add_process', ['as' => 'adm_product_add_process', 'uses' => 'App\Http\Controllers\Admin\ProductController@add_process']);
    Route::get('/admin/product/show/{id}', ['as' => 'adm_product_show', 'uses' => 'App\Http\Controllers\Admin\ProductController@show', 'where' => ['id' => '.+']]);
    Route::get('/admin/product/edit/{id}', ['as' => 'adm_product_edit', 'uses' => 'App\Http\Controllers\Admin\ProductController@edit', 'where' => ['id' => '.+']]);
    Route::post('/admin/product/edit_process/{id}', ['as' => 'adm_product_edit_process', 'uses' => 'App\Http\Controllers\Admin\ProductController@edit_process', 'where' => ['id' => '.+']]);
    Route::get('/admin/product/delete/{id}', ['as' => 'adm_product_delete', 'uses' => 'App\Http\Controllers\Admin\ProductController@delete', 'where' => ['id' => '.+']]);

    Route::get('/admin/orders', ['as' => 'adm_orders', 'uses' => 'App\Http\Controllers\Admin\OrderController@index']);
    Route::get('/admin/order/show/{id}', ['as' => 'adm_order_show', 'uses' => 'App\Http\Controllers\Admin\OrderController@show', 'where' => ['id' => '.+']]);
    Route::get('/admin/order/edit/{id}', ['as' => 'adm_order_edit', 'uses' => 'App\Http\Controllers\Admin\OrderController@edit', 'where' => ['id' => '.+']]);
    Route::post('/admin/order/edit_process/{id}', ['as' => 'adm_order_edit_process', 'uses' => 'App\Http\Controllers\Admin\OrderController@edit_process', 'where' => ['id' => '.+']]);

    Route::get('/admin/customer/show/{id}', ['as' => 'adm_customer_show', 'uses' => 'App\Http\Controllers\Admin\CustomerController@show', 'where' => ['id' => '.+']]);
});
