<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Models\Api\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Facades\Seo;

class PagesController extends Controller
{
    // Page - Home
    public function home(Request $request)
    {
        $seo = Seo::metaTags('home');

        return view('pages.home', [
            'seo' => $seo,
        ]);
    }

    // Page - About
    public function about(Request $request)
    {
        $seo = Seo::metaTags('about');

        return view('pages.about', [
            'seo' => $seo,
        ]);
    }

    // Page - Delivery
    public function delivery(Request $request)
    {
        $seo = Seo::metaTags('delivery');

        return view('pages.delivery', [
            'seo' => $seo,
        ]);
    }

    // Page - Contacts
    public function contacts(Request $request)
    {
        $seo = Seo::metaTags('contacts');

        return view('pages.contacts', [
            'seo' => $seo,
        ]);
    }

    // Page - sitemap
    public function sitemap()
    {
        $categories = Category::query()->where(['is_active' => 1])->get();
        //$products = Product::query()->where(['is_active' => 1])->get();

        return response()->view('pages.sitemap', [
            'categories' => $categories,
            //'products' => $products,
        ])->header('Content-Type', 'text/xml');
    }
}
