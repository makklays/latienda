<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:25',
            'email' => 'required|unique:users|max:25',
            'password' => 'required|min:8|max:25',
        ];
    }
}
