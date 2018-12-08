<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' => 'required|max:50|unique:products,name,'.$request->get('id'),  
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome não pode ser vazio',
            'name.unique' => 'O nome inserido já existe',
        ];
    }
}
