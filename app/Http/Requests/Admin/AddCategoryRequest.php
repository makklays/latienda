<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
{
    /**
     * Остановить валидацию после первой неуспешной проверки.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

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
            'title' => 'required|min:3|max:255',
            //'category_id' => 'required|integer',
        ];
    }
    
    /**
     * Message by language
     *
     * @return array
     */
    public function messages()
    {
        $lang = app()->getLocale();
        
        if ($lang == 'ru') {
            return [
                'title.required' => 'Поле Название обязательно для заполнения',
                'title.min' => 'Минимум 3 символа',
            ];
        } elseif ($lang == 'es') {
            return [
                'title.required' => 'El campo Título es obligatorio',
                'title.min' => 'Un mínimo de 3 caracteres',
            ];
        } else {
            return [
                'title.required' => 'Title is required',
                'title.min' => 'Minimum 3 characters',
            ];
        }
    }
}

