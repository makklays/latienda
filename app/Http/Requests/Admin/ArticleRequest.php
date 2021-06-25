<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'locale' => 'required',
            'title' => 'required|min:3',
            //'slug' => 'required|min:2|max:255',
            'description' => 'required',
        ];
    }
}
