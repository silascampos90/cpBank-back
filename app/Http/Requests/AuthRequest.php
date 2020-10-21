<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class AuthRequest extends FormRequest
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
            'cpf' => ['required'],
            'password'  => 'required|min:5|max:8'
        ];
    }

    public function messages()
    {
        return [
            'cpf.required' => 'O CPF é Obrigatório',
            'password.required'=> 'A Senha é Obrigatória',
            'password.min' => 'A Senha deve conter Mínimo 5 e Máximo 8',
            'password.max' => 'A Senha deve conter Mínimo 5 e Máximo 8'
        ];
    }
}