<?php

namespace App\Http\Controllers\Web;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Models\Api\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    // Page - Blog
    public function index(Request $request)
    {
        //dd(Auth::user());

        $seo = Seo::metaTags('blogs');

        return view('blog.index', [
            'seo' => $seo,
        ]);
    }

    // Page - Blog - Full text
    public function show(Request $request)
    {
        $seo = Seo::metaTags('one_blog');

        return view('blog.show', [
            'seo' => $seo,
        ]);
    }
}
