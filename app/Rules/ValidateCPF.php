<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Http\Utilits\Utilits;

class ValidateCPF implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cpf = request()->cpf;
        
        if (strlen($cpf) !== 11) {
            $this->message = 'O número informado não é um CPF válido.';
            return false;
        }

        if (strlen($cpf) === 11 && !Utilits::cpfValido($cpf)) {
            $this->message = 'O número do cpf é inválido.';
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
