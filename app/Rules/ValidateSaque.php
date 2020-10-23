<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Services\TransacaoService;

class ValidateSaque implements Rule
{
    protected $message;
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
       
        if (request()->valor >= 0 && request()->valor > (new TransacaoService)->saldo()) {            
            $this->message = 'Saldo Insuficiente';
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
        return $this->message;
    }
}
