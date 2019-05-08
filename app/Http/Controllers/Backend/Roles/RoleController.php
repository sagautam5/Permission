<?php

namespace App\Http\Controllers\Backend\Roles;

use App\Http\Requests\Roles\RoleRequest;
use App\Permission\Services\Roles\RoleService;
use App\Http\Controllers\Controller;

/**
 * Class RoleController
 * @package App\Http\Controllers\Backend\Roles
 */
class RoleController extends Controller
{
    /**
     * @var RoleService
     */
    private $role;

    /**
     * RoleController constructor.
     * @param RoleService $role
     */
    public function __construct(RoleService $role)
    {
        $this->role = $role;
    }

    /**
     * List Roles
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = $this->role->getRoles();
        return view('backend.roles.index',compact('roles'));
    }

    /**
     * Show form to create new role
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.roles.create');
    }

    /**
     * Store Recently Created Role
     *
     * @param RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(RoleRequest $request)
    {
        $result = $this->role->store($request);
        if($result['status']){
            return redirect()->route('roles.index')->with('success',$result['message']);;
        }
        return redirect()->route('roles.create')->with('error',$result['message']);
    }

    /**
     * Show form to edit role with given id
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $role = $this->role->find($id);
        return view('backend.roles.edit',compact('role'));
    }

    /**
     * Update the role with given id
     *
     * @param $id
     * @param RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update($id,RoleRequest $request)
    {
        $result = $this->role->update($id,$request);
        if($result['status']){
            return redirect()->route('roles.index')->with('success',$result['message']);;
        }
        return redirect()->route('roles.edit',$id)->with('error',$result['message']);
    }

    /**
     * Delete the role with given id
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete($id)
    {
        $result = $this->role->delete($id);

        if($result['status']){
            return redirect()->route('roles.index')
                ->with('success',$result['message']);
        }
        return redirect()->route('roles.index')
            ->with('error',$result['message'])
            ->withInput();
    }
}
