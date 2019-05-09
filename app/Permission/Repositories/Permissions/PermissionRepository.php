<?php
/**
 * Created by PhpStorm.
 * User: sagar
 * Date: 3/9/19
 * Time: 1:58 PM
 */

namespace App\Permission\Repositories\Permissions;

use App\Permission\Repositories\Repository;
use Illuminate\Support\Facades\Auth;

/**
 * Class PermissionRepository
 * @package App\Permission\Repositories\Permissions
 */
class PermissionRepository extends Repository
{
    /**
     * Get model name with namespace
     *
     * @return String
     */
    function getModel()
    {
        return 'App\Permission\Models\Permissions\Permission';
    }

    /**
     * Get Current User Permissions
     *
     * @return mixed
     */
    public function currentUserPermissions()
    {
        return $this->model->where('role_id',Auth::user()->role_id)->get();
    }
}