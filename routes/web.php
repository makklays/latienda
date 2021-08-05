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
    Route::get('/dashboard/profile', ['as' => 'da_profile', 'uses' => 'App\Http\Controllers\Web\DashboardController@profile']);
    Route::post('/dashboard/profile_process', ['as' => 'da_profile_process', 'uses' => 'App\Http\Controllers\Web\DashboardController@profile_process']);

    // Cart
    Route::get('/cart', ['as' => 'cart', 'uses' => 'App\Http\Controllers\Web\CartController@index']);
    Route::post('/add-to-cart', ['as' => 'add_to_cart', 'uses' => 'App\Http\Controllers\Web\CartController@addToCart']);
    Route::get('/delete-from-cart', ['as' => 'delete-from-cart', 'uses' => 'App\Http\Controllers\Web\CartController@deleteFromCart']);

    // Payments
    Route::get('/checkout', ['as' => 'checkout', 'uses' => 'App\Http\Controllers\Web\PaymentController@checkout']);
    Route::post('/checkout_process', ['as' => 'checkout_process', 'uses' => 'App\Http\Controllers\Web\PaymentController@checkoutProcess']);
    Route::post('/checkout_data_process', ['as' => 'checkout_data_process', 'uses' => 'App\Http\Controllers\Web\PaymentController@checkoutDataProcess']);
    Route::get('/purchase', ['as' => 'purchase', 'uses' => 'App\Http\Controllers\Web\PaymentController@purchase']);
    Route::get('/success', ['as' => 'success', 'uses' => 'App\Http\Controllers\Web\PaymentController@success']);
    Route::get('/cancel', ['as' => 'cancel', 'uses' => 'App\Http\Controllers\Web\PaymentController@cancel']);

    // Adminka
    Route::group([
        'prefix' => '/admin',
        //'where' => ['locale' => '[a-zA-Z]{2}'],
        'middleware' => 'admin'
    ], function () {
        Route::get('/', ['as' => 'da_admin', 'uses' => 'App\Http\Controllers\Admin\AdminController@home']);

        Route::get('/categories', ['as' => 'adm_category', 'uses' => 'App\Http\Controllers\Admin\CategoryController@index']);
        Route::get('/category/add', ['as' => 'adm_category_add', 'uses' => 'App\Http\Controllers\Admin\CategoryController@add']);
        Route::post('/category/add_process', ['as' => 'adm_category_add_process', 'uses' => 'App\Http\Controllers\Admin\CategoryController@add_process']);
        Route::get('/category/show/{id}', ['as' => 'adm_category_show', 'uses' => 'App\Http\Controllers\Admin\CategoryController@show', 'where' => ['id' => '.+']]);
        Route::get('/category/edit/{id}', ['as' => 'adm_category_edit', 'uses' => 'App\Http\Controllers\Admin\CategoryController@edit', 'where' => ['id' => '.+']]);
        Route::post('/category/edit_process/{id}', ['as' => 'adm_category_edit_process', 'uses' => 'App\Http\Controllers\Admin\CategoryController@edit_process', 'where' => ['id' => '.+']]);
        Route::get('/category/delete/{id}', ['as' => 'adm_category_delete', 'uses' => 'App\Http\Controllers\Admin\CategoryController@delete', 'where' => ['id' => '.+']]);

        Route::get('/products', ['as' => 'adm_product', 'uses' => 'App\Http\Controllers\Admin\ProductController@index']);
        Route::get('/product/add', ['as' => 'adm_product_add', 'uses' => 'App\Http\Controllers\Admin\ProductController@add']);
        Route::post('/product/add_process', ['as' => 'adm_product_add_process', 'uses' => 'App\Http\Controllers\Admin\ProductController@add_process']);
        Route::get('/product/show/{id}', ['as' => 'adm_product_show', 'uses' => 'App\Http\Controllers\Admin\ProductController@show', 'where' => ['id' => '.+']]);
        Route::get('/product/edit/{id}', ['as' => 'adm_product_edit', 'uses' => 'App\Http\Controllers\Admin\ProductController@edit', 'where' => ['id' => '.+']]);
        Route::post('/product/edit_process/{id}', ['as' => 'adm_product_edit_process', 'uses' => 'App\Http\Controllers\Admin\ProductController@edit_process', 'where' => ['id' => '.+']]);
        Route::get('/product/delete/{id}', ['as' => 'adm_product_delete', 'uses' => 'App\Http\Controllers\Admin\ProductController@delete', 'where' => ['id' => '.+']]);

        Route::get('/articles', ['as' => 'adm_articles', 'uses' => 'App\Http\Controllers\Admin\ArticleController@index']);
        Route::get('/article/add', ['as' => 'adm_article_add', 'uses' => 'App\Http\Controllers\Admin\ArticleController@add']);
        Route::post('/article/add_process', ['as' => 'adm_article_add_process', 'uses' => 'App\Http\Controllers\Admin\ArticleController@add_process']);
        Route::get('/article/show/{id}', ['as' => 'adm_article_show', 'uses' => 'App\Http\Controllers\Admin\ArticleController@show', 'where' => ['id' => '.+']]);
        Route::get('/article/edit/{id}', ['as' => 'adm_article_edit', 'uses' => 'App\Http\Controllers\Admin\ArticleController@edit', 'where' => ['id' => '.+']]);
        Route::post('/article/edit_process/{id}', ['as' => 'adm_article_edit_process', 'uses' => 'App\Http\Controllers\Admin\ArticleController@edit_process', 'where' => ['id' => '.+']]);
        Route::get('/article/delete/{id}', ['as' => 'adm_article_delete', 'uses' => 'App\Http\Controllers\Admin\ArticleController@delete', 'where' => ['id' => '.+']]);

        Route::get('/orders', ['as' => 'adm_orders', 'uses' => 'App\Http\Controllers\Admin\OrderController@index']);
        Route::get('/order/show/{id}', ['as' => 'adm_order_show', 'uses' => 'App\Http\Controllers\Admin\OrderController@show', 'where' => ['id' => '.+']]);
        Route::get('/order/edit/{id}', ['as' => 'adm_order_edit', 'uses' => 'App\Http\Controllers\Admin\OrderController@edit', 'where' => ['id' => '.+']]);
        Route::post('/order/edit_process/{id}', ['as' => 'adm_order_edit_process', 'uses' => 'App\Http\Controllers\Admin\OrderController@edit_process', 'where' => ['id' => '.+']]);

        Route::get('/customers', ['as' => 'adm_customers', 'uses' => 'App\Http\Controllers\Admin\CustomerController@index']);
        Route::get('/customer/show/{id}', ['as' => 'adm_customer_show', 'uses' => 'App\Http\Controllers\Admin\CustomerController@show', 'where' => ['id' => '.+']]);

        Route::get('/report/all', ['as' => 'adm_report_all', 'uses' => 'App\Http\Controllers\Admin\ReportController@index']);
        Route::get('/report', ['as' => 'adm_report', 'uses' => 'App\Http\Controllers\Admin\ReportController@report']);
        Route::get('/report/pdf', ['as' => 'adm_report_pdf', 'uses' => 'App\Http\Controllers\Admin\ReportController@report_pdf']);

        Route::get('/search', ['as' => 'adm_search', 'uses' => 'App\Http\Controllers\Admin\SearchController@index']);
    });
});
