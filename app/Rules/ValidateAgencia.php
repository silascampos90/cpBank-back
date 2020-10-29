<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Agencia;

class ValidateAgencia implements Rule
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
        $agencia = Agencia::where('codigo', request()->conta)->first();

        if ($agencia == null) {            
            $this->message = 'Agnência não Encontrada';
            return false;
        }
        
        return true;
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
