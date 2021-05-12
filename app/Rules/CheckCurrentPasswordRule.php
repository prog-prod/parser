<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CheckCurrentPasswordRule implements Rule
{
    private $user_id;

    /**
     * Create a new rule instance.
     *
     * @param  int $user_id
     * @return void
     */
    public function __construct(int $user_id)
    {
        $this->user_id = $user_id;
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
        if ($user = User::find($this->user_id)) {
            if (Hash::check($value, $user->password)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The current password was entered incorrectly.';
    }
}
