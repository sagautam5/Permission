<?php

namespace App\Http\Controllers\Backend\Users;

use App\Http\Requests\Users\UserRequest;
use App\Permission\Services\Roles\RoleService;
use App\Permission\Services\Users\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class UserController
 * @package App\Http\Controllers\Backend\Users
 */
class UserController extends Controller
{
    /**
     * @var RoleService
     */
    private $role;

    /**
     * @var UserService
     */
    private $user;

    public function __construct(UserService $user, RoleService $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function create()
    {
        $roles = $this->role->getRoles();
        return view('backend.user.create',compact('roles'));
    }

    public function store(UserRequest $request)
    {

    }

    public function edit($id)
    {

    }

    public function update($id, UserRequest $request)
    {

    }

    public function delete($id)
    {

    }
}
