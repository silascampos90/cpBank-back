<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Conta;

class ValidateConta implements Rule
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
        $conta = Conta::where('conta', request()->conta)->first();

        if ($conta == null) {            
            $this->message = 'Conta não Encontada';
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
