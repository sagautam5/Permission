<?php

namespace App\Http\Requests\Users;

use App\Permission\Services\Users\UserService;
use App\Rules\AllowedRoleId;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserRequest
 *
 * @package App\Http\Requests\Users
 */
class UserRequest extends FormRequest
{
    /**
     * @var UserService
     */
    private $user;

    /**
     * UserRequest constructor.
     * @param UserService $user
     */
    public function __construct(UserService $user)
    {
        $this->user = $user;
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
        /**
         * Get currently requested method
         */
        $method = $this->method();

        switch ($method) {
            case 'POST':
                return [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
                    'role_id' => ['required', 'integer', new AllowedRoleId($this->user)]
                ];

            case 'PATCH':
                return [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users,email,'.$this->id,
                    'role_id' => ['required', 'integer', new AllowedRoleId($this->user)]
                ];
        }
    }
}
