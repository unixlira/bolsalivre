<?php

namespace App\Http\Requests; 

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'phone' => 'required' ,
            'phone_hours' => 'required' ,
            'wpp' => 'required' ,
            'wpp_hours' => 'required' ,
            'chat' => 'required' ,
            'chat_hours' => 'required' ,
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O :attribute é obrigatório',
        ];
    }
}
