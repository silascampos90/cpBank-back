<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;
use Hash;
use Auth;

class ValidateSenha implements Rule
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
        $senha = User::findOrFail(
                    Auth::guard()->user()->id
                )->password;

        if (!Hash::check(request()->password, $senha)) {
            $this->message = 'Senha Incorreta';
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
