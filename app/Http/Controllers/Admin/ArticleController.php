<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Seo;
use App\Facades\Word;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddCategoryRequest;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Traits\MyTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    use MyTraits;

    protected $article_rep;

    public function __construct(ArticleRepository $article_rep)
    {
        $this->article_rep = $article_rep;
    }

    //
    public function index()
    {
        $seo = Seo::metaTags('adm_article');

        //$articles = Article::query()->paginate(20);
        $articles = $this->article_rep->paginate(20);

        return view('admin.article.index', [
            'seo' => $seo,
            'articles' => $articles,
        ]);
    }

    //
    public function add()
    {
        $seo = Seo::metaTags('adm_article_add');

        //$articles = Article::all();
        $articles = $this->article_rep->getAll();

        return view('admin.article.add', [
            'seo' => $seo,
            'articles' => $articles,
        ]);
    }

    //
    public function add_process(ArticleRequest $request)
    {
        $article = $this->article_rep->create($request);

        if (!empty($request->img)) {
            $this->article_rep->updateImg($article->id, $request);
        }

        return redirect( route('adm_articles', app()->getLocale()) )
            ->with('flash_message', trans('admin.Article_was_add_suceessfully!'))
            ->with('flash_type', 'success');
    }

    //
    public function edit(Request $request, $locale, $id)
    {
        $seo = Seo::metaTags('adm_article_edit');

        // edit article
        //$article = Article::query()->where(['id' => $id])->first();
        // otros categories
        //$articles = Article::query()->where(['is_active'=>'1'])->get();

        // edit article
        $article = $this->article_rep->getByID($id);
        // otros categories
        $articles = $this->article_rep->getAllActive();

        return view('admin.article.edit', [
            'seo' => $seo,
            'article' => $article,
            'articles' => $articles,
        ]);
    }

    //
    public function edit_process(ArticleRequest $request, $locale, $id)
    {
        // edit article
        //$article = Article::query()->where(['id' => $id])->first();

        // edit article
        //$article = $this->article_rep->getByID($id);

        $article = $this->article_rep->updateByID($id, $request);

        /*$article->title = $request->title;
        $article->slug = Word::translite($request->slug);
        $article->locale = $request->get('locale');
        $article->description = $request->description;
        $article->full_description = $request->full_description;
        $article->author = $request->author;
        $article->count_view = $request->count_view;
        $article->is_active = !empty($request->is_active) ? '1' : '0';
        $article->save();*/

        // guarda img
        if (!empty($request->img)) {

            $article = $this->article_rep->updateImg($id, $request);

            /*$extension = $request->file('img')->extension();
            $new_name = 'article.'.$extension;

            // resize image
            $img = $request->file('img');
            $resized_img = Image::make($img);
            $resized_img->fit(600)->save($img);
            $path = $img->storeAs('articles/' . $article->id . '/600', $new_name);

            $resized_img->fit(336)->save($img);
            $path = $img->storeAs('articles/' . $article->id . '/336', $new_name);

            $article->img = $new_name;
            $article->save();*/
        }

        return redirect( route('adm_articles', [app()->getLocale(), 'id' => $id]) )
            ->with('flash_message', trans('admin.Article_was_edit_suceessfully!'))
            ->with('flash_type', 'success');
    }

    //
    public function show(Request $request, $local, $id)
    {
        $seo = Seo::metaTags('adm_article_add');

        //$article = Article::query()->where(['id' => $id])->first();
        $article = $this->article_rep->getByID($id);

        return view('admin.article.show', [
            'seo' => $seo,
            'article' => $article,
        ]);
    }

    //
    public function delete(Request $request, $local, $id)
    {
        $this->article_rep->delete($id);

        //$article = Article::query()->where(['id' => $id])->first();
        //$article->delete();

        return redirect( route('adm_articles', app()->getLocale()) )
            ->with('flash_message', trans('admin.Article ID=:ID was delete suceessfully', ['ID' => $id]))
            ->with('flash_type', 'success');
    }
}
