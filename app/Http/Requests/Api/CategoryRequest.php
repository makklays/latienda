<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class CategoryRequest extends FormRequest
{
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
     * Mi validaсión de errores
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|unique:categories|max:255'
        ];

        switch ($this->getMethod())
        {
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                    'parent_id' => 'required|integer',
                    'title' => [
                        'required',
                        Rule::unique('categories')->ignore($this->title, 'title')
                        // debe ser el unico excepto sí mismo
                        // должен быть уникальным, за исключением себя же
                    ]
                ] + $rules;
            // case 'PATCH':
            case 'DELETE':
                return [
                    'id' => 'required|integer|exists:categories,id'
                ];
            /*default:
                return [];*/
        }
    }

    // Mis mensajes para los errores
    /*public function messages() : array
    {
        return [
            'title.required' => 'A title is required',
            'id.exists'  => 'This ID of Category doesn\'t exists',
            'title.unique'  => 'This title is already taken'
        ];
    }*/

    // redefinir la función "all"
    /*public function all($keys = null) : array
    {
        // return $this->all();
        $data = parent::all($keys);

        // si nececita redefinir la función - es el ejemplo

        // switch ($this->getMethod())
        // {
        // case 'PUT':
        // case 'PATCH':
        // case 'DELETE':
        //    $data['date'] = $this->route('day');
        // }
        return $data;
    }*/

    /*public function response(array $errors)
    {
        // Optionally, send a custom response on authorize failure
        // (default is to just redirect to initial page with errors)
        //
        // Can return a response, a view, a redirect, or whatever els
        return response()->json(['Result'=>'ERROR','Message'=>implode('<br/>',array_flatten($errors))]); // i wanted the Message to be a string
    }*/
}
