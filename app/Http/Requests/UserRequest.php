<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|email|max:255|unique:users,email,' . $request->get('id'),
            'password' => 'required|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome não pode ser vazio.',
            'required' => 'O :attribute não pode ser vazio.',
            'email.email' => 'O :attribute deve ser um email válido',
            'email.unique' => 'O :attribute já está sendo utilizado',
            'password.confirmed' => 'As senhas não são iguais',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres',
        ];
    }
}
