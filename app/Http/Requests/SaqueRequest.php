<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidateSaque;
use App\Rules\ValidateSenha;

class SaqueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'valor'     => ['required', new ValidateSaque()],
            'password'  => ['required', new ValidateSenha()]
        ];
    }

    public function messages()
    {
        return [
            'valor.required' => 'O valor é obrigatório',
            'password.required' => 'A senha é obrigatória'
        ];
    }
}
