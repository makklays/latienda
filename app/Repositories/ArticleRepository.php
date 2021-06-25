<?php
/**
 * Author: Alexander Kuziv
 * E-mail: alexander@makklays.com
 */

namespace App\Repositories;

use App\Facades\Word;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Config;

class ArticleRepository extends Repository implements ArticleRepositoryInterface
{
    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    // $id - article id
    public function create(Request $request)
    {
        $params = [
            'user_id' => !empty(Auth::user()->id) ? Auth::user()->id : 0,
            'title' => $request->title,
            'slug' => Word::translite($request->title),
            'locale' => $request->get('locale'),
            'author' => $request->author,
            'description' => $request->description,
            'full_description' => $request->full_description,
            'is_active' => !empty($request->is_active) ? '1' : '0',
        ];

        return $this->model->create($params);
    }

    // $id - article id
    public function updateImg($id, Request $request)
    {
        $article = $this->model->where(['id' => $id])->firstOrFail();

        $extension = $request->file('img')->extension();
        $new_name = 'article.'.$extension;

        // resize image
        $img = $request->file('img');
        $resized_img = Image::make($img);
        $resized_img->fit(600)->save($img);
        $path = $img->storeAs('articles/' . $article->id . '/600', $new_name);

        $resized_img->fit(336)->save($img);
        $path = $img->storeAs('articles/' . $article->id . '/336', $new_name);

        $article->img = $new_name;
        $article->save();

        return $article;
    }

    // $id - article id
    public function getAll($columns = ['*'])
    {
        return $this->model->query()->select($columns)->get();
    }

    // $id - article id
    public function getAllActive($columns = ['*'])
    {
        return $this->model->query()->select($columns)->where(['is_active' => '1'])->get();
    }

    // $id - article id
    public function updateByID($id, Request $request)
    {
        $article = $this->model->where(['id' => $id])->firstOrFail();

        $article->title = $request->title;
        $article->slug = Word::translite($request->slug);
        $article->locale = $request->get('locale');
        $article->description = $request->description;
        $article->full_description = $request->full_description;
        $article->author = $request->author;
        $article->count_view = $request->count_view;
        $article->is_active = !empty($request->is_active) ? '1' : '0';
        $article->save();

        return $article;
    }

    // $id - article id
    public function delete($id)
    {
        return $this->model->where(['id' => $id])->delete();
    }

    /*public function getBySlug($slug)
    {
        return $this->model->where(['slug' => $slug])->firstOrFail();
    }*/

    // $id - article id
    public function getByID($id, $columns = ['*'])
    {
        return $this->model->query()->select($columns)->where(['id' => $id])->firstOrFail();
    }

    /*public function getByLocale($locale)
    {
        return $this->model->where(['locale' => $locale])->firstOrFail();
    }

    public function getByUserID($id)
    {
        return $this->model->where(['id' => $id])->firstOrFail();
    }*/

    //
    public function paginate($perPage = 15, $columns = ['*'])
    {
        //$perPage = $perPage ?: Config::get('my::pagination.length');
        return $this->model->where(['is_active' => '1'])->paginate($perPage, $columns);
    }

    // $id - article_id
    public function getUserFullnameByID($id)
    {
        $user = $this->model->where(['id' => $id])->user;
        $arr_tmp[] = !empty($user->firstname) ? $user->firstname : '';
        $arr_tmp[] .= !empty($user->lastname) ? $user->lastname : '';

        $fullname = '';
        if (!empty($arr_tmp)) {
            $fullname = implode(' ', $arr_tmp);
        }

        return $fullname;
    }
}
