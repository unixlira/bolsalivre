<?php

namespace App\Http\Requests;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'name' => 'required|max:250|unique:cities,name,'.$request->get('id'),
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.max' => 'A nome da cidade pode ter no máximo 250 caracteres',
            'unique' => 'A Cidade inserida já existe',
        ];
    }
}
