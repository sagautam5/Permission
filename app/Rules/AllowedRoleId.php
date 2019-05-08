<?php

namespace App\Rules;

use App\Permission\Services\Users\UserService;
use Illuminate\Contracts\Validation\Rule;

class AllowedRoleId implements Rule
{
    /**
     * @var UserService
     */
    private $user;

    /**
     * Create a new rule instance.
     *
     * @param UserService $user
     * @return void
     */
    public function __construct(UserService $user)
    {
        $this->user = $user;
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
        if(in_array($value, $this->user->getAllowedRoleIds()))
            return true;
        else
            return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You are not allowed to set that role.';
    }
}
