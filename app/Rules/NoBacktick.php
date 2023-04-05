<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoBacktick implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !strpos($value, '`');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ne peut contenir le caractère backtick';
    }
}
