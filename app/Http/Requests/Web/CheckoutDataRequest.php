<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutDataRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'firstname1' => 'required|max:255',
            'lastname1' => 'required|max:255',
            'phone1' => 'required|max:18',
            'email1' => 'required|email',

            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'city' => 'required|max:255',
            'address' => 'required|max:500',
            'provincia' => 'required',
            'zip' => 'required|integer',
            'period' => 'required',
            'date' => 'required',
            'dedication' => 'required|string|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'lastname1' => 'Lastname',
            'firstname1' => 'Firstname',
            'phone1' => 'Phone',
            'email1' => 'E-mail'
        ];
    }

    /*public function messages()
    {
        return [
            'lastname1.required' => 'Поле Фамилия is required',
            'firstname1.required' => 'A message is required',
        ];
    }*/
}
