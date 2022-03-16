<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFlores extends FormRequest
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
            'nome_flor' => ['required', 'min:3', 'max:160'],
            'especie_flor' => ['required', 'min:3', 'max:160'],
            'descricao' => ['required', 'min:3', 'max:255']
        ];
    }
}
