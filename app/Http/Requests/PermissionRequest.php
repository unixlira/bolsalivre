<?php

namespace App\Http\Requests;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;


class PermissionRequest extends FormRequest
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
            'name' => 'required|max:50|unique:permissions,name,'.$request->get('id') ,
            'label' => 'max:200',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O :attribute é obrigatório',
            'unique' => 'A permissão inserida já existe',
        ];
    }
}