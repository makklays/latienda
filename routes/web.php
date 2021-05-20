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

// sitemap
Route::get('sitemap.xml', ['as' => 'sitemap', 'uses' => 'App\Http\Controllers\Web\PagesController@sitemap']);

// bot
Route::match(['get', 'post'], 'bota', ['as' => 'bota', 'uses' => 'App\Http\Controllers\Web\BotController@index']);

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'
], function () {

    Route::get('', ['as' => '/', 'uses' => 'App\Http\Controllers\Web\PagesController@home']);
    Route::get('/about-us', ['as' => 'about', 'uses' => 'App\Http\Controllers\Web\PagesController@about']);
    Route::get('/delivery', ['as' => 'delivery', 'uses' => 'App\Http\Controllers\Web\PagesController@delivery']);
    Route::get('/contacts', ['as' => 'contacts', 'uses' => 'App\Http\Controllers\Web\PagesController@contacts']);

    Route::get('/categories', ['as' => 'categories', 'uses' => 'App\Http\Controllers\Web\CategoryController@index']);
    Route::get('/c/{path}', ['as' => 'category', 'uses' => 'App\Http\Controllers\Web\CategoryController@show', 'where' => ['path' => '.+']]);
    //Route::get('/c/{slug}', ['as' => 'category', 'uses' => 'App\Http\Controllers\Web\CategoryController@show']);

    Route::get('/blog', ['as' => 'blog', 'uses' => 'App\Http\Controllers\Web\BlogController@index']);
    Route::get('/blog/{slug}', ['as' => 'blog_show', 'uses' => 'App\Http\Controllers\Web\BlogController@show']);

    Route::get('/products', ['as' => 'products', 'uses' => 'App\Http\Controllers\Web\ProductController@index']);
    Route::get('/p/{slug}', ['as' => 'product', 'uses' => 'App\Http\Controllers\Web\ProductController@show']);
});
