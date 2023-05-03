<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'img[]' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'sku' => 'required|min:3|max:255',
            'category_id' => 'required|integer',
            'title' => 'required|min:3',
            'price' => 'required',
        ];
    }
    
    /**
     * Message by language 
     */
    public function messages() : array
    {
        $lang = app()->getLocale();
        
        if ($lang == 'ru') {
            return [
                'sku.required' => 'Поле SKU обязательно для заполнения',
                'title.required' => 'Поле Название обязательно для заполнения',
            ];
        } elseif ($lang == 'es') {
            return [
                'sku.required' => 'El campo SKU es obligatorio',
                'title.required' => 'El campo Título es obligatorio',
            ];
        } else {
            return [
                'sku.required' => 'SKU is required',
                'title.required' => 'Title is required',
            ];
        }
    }
}
