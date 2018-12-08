<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitutionRequest extends FormRequest
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
            'image' => 'image|dimensions:min_width=1,min_height=1,max_width=10000,max_height=10000',
            'thumbnail' => 'image|dimensions:min_width=1,min_height=1,max_width=10000,max_height=10000',
        ];
    }

    public function messages()
    {
        return [
            'image' => 'O tipo de arquivo deve ser uma imagem.',
            'dimensions' => 'A imagem deve deve possuir no mínimo 1x1px e no máximo 10000x10000px',
        ];
    }
}
