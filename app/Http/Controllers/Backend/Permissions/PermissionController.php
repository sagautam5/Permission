<?php

namespace App\Http\Controllers\Backend\Permissions;

use App\Permission\Services\Permissions\PermissionService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class PermissionController
 * @package App\Http\Controllers\Backend\Permissions
 */
class PermissionController extends Controller
{
    /**
     * @var PermissionService
     */
    private $permission;

    /**
     * PermissionController constructor.
     * @param PermissionService $permission
     */
    public function __construct(PermissionService $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        return view('backend.permissions.index');
    }
}
