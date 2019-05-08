<?php

namespace App\Rules;

use App\Permission\Services\Roles\RoleService;
use Illuminate\Contracts\Validation\Rule;

class AllowedRoleLevel implements Rule
{
    /**
     * @var RoleService
     */
    private $role;
    /**
     * Create a new rule instance.
     *
     * @param RoleService $role
     * @return void
     */
    public function __construct(RoleService $role)
    {
        $this->role = $role;
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
        if(in_array($value, $this->role->getAllowedLevels()))
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
