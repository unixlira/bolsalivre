<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class TypeOfTrainingRequest extends FormRequest
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
            'name' => 'required|max:50|unique:type_of_trainings,name,'.$request->get('id') ,
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O :attribute é obrigatório',
            'unique' => 'A modalidade inserida já existe',
        ];
    }
}
