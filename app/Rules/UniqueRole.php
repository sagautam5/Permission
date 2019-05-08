<?php

namespace App\Rules;

use App\Permission\Services\Roles\RoleService;
use Illuminate\Contracts\Validation\Rule;

class UniqueRole implements Rule
{
    /**
     * @var
     */
    private $method;

    /**
     * @var
     */
    private $role;

    /**
     * @var null
     */
    private $id;

    /**
     * UniqueRole constructor.
     * @param $method
     * @param RoleService $role
     */
    public function __construct($method, RoleService $role, $id=null)
    {
        $this->method = $method;
        $this->role = $role;
        $this->id = $id;
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
        switch ($this->method){
            case 'POST':
                return $this->role->validatePost($value);
            case 'PATCH';
                return $this->role->validatePatch($value, $this->id);
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Role already exists';
    }
}
