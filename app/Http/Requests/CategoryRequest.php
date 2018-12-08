<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|max:50',
            'internal_category' => 'required|max:50|unique:categories,internal_category,'.$request->get('id') ,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O segmento é obrigatória',
            'name.max' => 'O nome do segmento pode ter no máximo 50 caracteres',
            'internal_category.required' => 'O nome interno é obrigatória',
            'unique' => 'O nome interno inserido já existe',
        ];
    }
}
