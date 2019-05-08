<?php

namespace App\Http\Requests\Roles;

use App\Permission\Services\Roles\RoleService;
use App\Rules\UniqueRole;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    private $role;

    public function __construct(RoleService $role)
    {
        $this->role = $role;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = $this->method();

        switch ($method){
            case 'POST':
                return [
                    'display_name' => [new UniqueRole($method, $this->role)]
                ];
            case 'PATCH':
                return [
                    'display_name' => [new UniqueRole($method, $this->role, $this->id)]
                ];
        }
    }
}
