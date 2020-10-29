<?php

namespace App\Http\Requests;

use App\Rules\ValidateSaque;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidateSenha;
use App\Rules\ValidateConta;
use App\Rules\ValidateAgencia;

class TransferenciaRequest extends FormRequest
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
            "agencia" => ['required', new ValidateAgencia()],
            "conta" => ['required', new ValidateConta()],
            "valor" => ['required', new ValidateSaque()],
            "senha" => ['required', new ValidateSenha()],
        ];
    }
}
