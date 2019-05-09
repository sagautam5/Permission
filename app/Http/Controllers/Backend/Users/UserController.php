<?php

namespace App\Http\Controllers\Backend\Users;

use App\Http\Requests\Users\UserRequest;
use App\Permission\Services\Users\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers\Backend\Users
 */
class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $user;

    /**
     * UserController constructor.
     * @param UserService $user
     */
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    /**
     * Get All Users that user can view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->user->getAllUsers();

        return view('backend.users.index', compact('users'));
    }

    /**
     * Show Form to add new user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $roles = $this->user->getAllRoles();
        return view('backend.users.create',compact('roles'));
    }

    /**
     * Store recently created user
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(UserRequest $request)
    {
        /**
         * Store User details
         */
        $result = $this->user->store($request);

        if($result['status']){
            return redirect()->route('users.index')->with('success', $result['message']);
        }

        return redirect()->route('users.create')->with('error', $result['message'])->withInput();
    }

    /**
     * Edit the user
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        /**
         * Get all roles
         */
        $roles = $this->user->getAllRoles();

        /**
         * Get All Users
         */
        $user = $this->user->find($id);

        /**
         * Not found error
         */
        if(!$user){
            abort(404, 'User Not Found');
        }
        return view('backend.users.edit', compact('user', 'roles'));
    }

    /**
     * Update user information
     *
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update($id, UserRequest $request)
    {
        /**
         * Find User
         */
        $user = $this->user->find($id);

        /**
         * Not found error
         */
        if(!$user){
            abort(404, 'User Not Found');
        }

        /**
         * Update the user
         */
        $result = $this->user->update($id,$request);

        if($result['status']){

            return redirect()->route('users.index')->with('success',$result['message']);
        }

        return redirect()->route('users.edit',$id)->with('error',$result['message'])->withInput();
    }

    /**
     * Remove the User
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete($id, Request $request)
    {
        dd($request->all());
        /**
         * Delete User
         */
        $result = $this->user->delete($id);

        if($result['status']){
            return redirect()->route('users.index')
                ->with('success',$result['message']);
        }

        return redirect()->route('users.index')
            ->with('error',$result['message']);
    }
}
