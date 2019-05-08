<?php
/**
 * Created by PhpStorm.
 * User: sagar
 * Date: 3/9/19
 * Time: 1:57 PM
 */

namespace App\Permission\Repositories\Roles;

use App\Permission\Repositories\Repository;
use Illuminate\Support\Facades\Auth;

/**
 * Class RoleRepository
 * @package App\Permission\Repositories\Roles
 */
class RoleRepository extends Repository
{
    /**
     * Get model name with namespace
     *
     * @return String
     */
    function getModel()
    {
        return 'App\Permission\Models\Roles\Role';
    }

    /**
     * Get Roles allowed for the user
     *
     * @return mixed
     */
    public function getAllRoles()
    {
         return $this->model->where('level', '<', Auth::user()->role->level)->get();
    }

    /**
     * Get roles ids allowed for the user
     *
     * @return mixed
     */
    public function getAllowedRoleIds()
    {
        return $this->model->where('level', '<', Auth::user()->role->level)->pluck('id')->toArray();
    }

    /**
     * Validate Role for POST request
     *
     * @param $displayName
     * @return mixed
     */
    public function validatePost($displayName)
    {
        $slug = nameToSlug($displayName);

        $record = $this->model->where('slug', $slug)->first();

        return $record ? false:true;
    }

    /**
     * Validate Role for PATCH request
     *
     * @param $displayName
     * @param $roleId
     * @return mixed
     */
    public function validatePatch($displayName, $roleId)
    {
        $slug = nameToSlug($displayName);

        $record = $this->model->where('slug', $slug)->where('id', '!=', $roleId)->first();

        return $record ? false:true;
    }
}