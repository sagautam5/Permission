<?php
/**
 * Created by PhpStorm.
 * User: sagar
 * Date: 3/9/19
 * Time: 1:55 PM
 */

namespace App\Permission\Services\Permissions;

use App\Permission\Repositories\Permissions\PermissionRepository;

/**
 * Class PermissionService
 * @package App\Permission\Services\Permissions
 */
class PermissionService
{
    /**
     * @var PermissionRepository
     */
    protected $permission;

    /**
     * PermissionService constructor.
     * @param PermissionRepository $permission
     */
    public function __construct(PermissionRepository $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Find permission with given id
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->permission->find($id);
    }

    /**
     * Get current user permissions
     *
     * @return mixed
     */
    public function currentUserPermissions()
    {
        return $this->permission->currentUserPermissions();
    }
}