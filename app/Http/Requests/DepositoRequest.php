<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidateDeposito;

class DepositoRequest extends FormRequest
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
            'agencia' => 'required',
            'conta' => 'required',
            'valor' => ['required', new ValidateDeposito()]
        ];
    }

    public function messages()
    {
        return [
            'agencia.required' => 'Número da Agência obrigatória',
            'conta.required' => 'Número da conta obrigatório',
            'valor.required' => 'Valor para depósito obrigatório'
        ];
    }
}
