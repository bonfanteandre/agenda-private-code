<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetAccountPassword extends FormRequest
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
            'password' => 'required|confirmed|min:8'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute deve possuir no mínimo :min caracteres',
            'confirmed' => 'O campo :attribute deve ser confirmado'
        ];
    }
}
