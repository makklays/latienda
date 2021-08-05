<?php

namespace App\Http\Controllers\Web;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Models\Api\Category;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    // Page - Blog
    public function index(Request $request)
    {
        $seo = Seo::metaTags('blogs');

        $articles = Article::query()->where(['is_active' => '1', 'locale' => app()->getLocale()])->paginate(3);

        return view('blog.index', [
            'seo' => $seo,
            'articles' => $articles,
        ]);
    }

    // Page - Blog - Full text
    public function show(Request $request, $locale, $slug)
    {
        $article = Article::query()->where(['slug' => $slug, 'is_active' => '1', 'locale' => app()->getLocale()])->firstOrFail();
        $article->count_view += 1;
        $article->save();

        $seo = Seo::metaTags('one_blog', $article->title);

        return view('blog.show', [
            'seo' => $seo,
            'article' => $article,
        ]);
    }
}
