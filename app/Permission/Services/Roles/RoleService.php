<?php
/**
 * Created by PhpStorm.
 * User: sagar
 * Date: 3/9/19
 * Time: 1:55 PM
 */

namespace App\Permission\Services\Roles;

use App\Permission\Repositories\Roles\RoleRepository;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\Auth;
use Psr\Log\LoggerInterface;

/**
 * Class RoleService
 * @package App\Permission\Services\Roles
 */
class RoleService
{
    /**
     * @var RoleRepository
     */
    protected $role;

    /**
     * @var LoggerInterface
     */
    private $log;

    /**
     * @var DatabaseManager
     */
    private $db;

    /**
     * RoleService constructor.
     *
     * @param RoleRepository $role
     * @param DatabaseManager $db
     * @param LoggerInterface $log
     */
    public function __construct(RoleRepository $role, DatabaseManager $db, LoggerInterface $log)
    {
        $this->role = $role;
        $this->log = $log;
        $this->db = $db;
    }

    /**
     * Find Role for given id
     *
     * @param $id
     * @return Object
     */
    public function find($id)
    {
        return $this->role->find($id);
    }

    /**
     * Get Available User Roles except super admin
     *
     * @return mixed
     */
    public function getAllRoles()
    {
        return $this->role->getAllRoles();
    }

    /**
     * Get Allowed User Role Levels
     *
     * @return array
     */
    public function getAllowedLevels()
    {
        $levels = array();
        $userRoleLevel = Auth::user()->role->level;

        for($i=1; $i<10; $i++)
        {
            if($i<$userRoleLevel)
                $levels[] = $i;
        }

        return $levels;
    }

    /**
     * Validate Role for POST request
     *
     * @param $displayName
     * @return mixed
     */
    public function validatePost($displayName)
    {
        return $this->role->validatePost($displayName);
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
        return $this->role->validatePatch($displayName, $roleId);
    }

    /**
     * Store recently created role
     *
     * @param $request
     * @return array
     * @throws \Exception
     */
    public function store($request)
    {
        $this->db->beginTransaction();
        try {

            $input = $request->only([
                'display_name',
                'level'
            ]);

            $input['slug'] = nameToSlug($request->display_name);

            $role = $this->role->store($input);

            $result = [
                'status' => true,
                'message' => 'Role added successfully',
                'data' => $role,
            ];

            $this->db->commit();

        } catch (\Exception $e) {
            $this->log->error((string) $e);
            $result = [
                'status' => false,
                'message' => 'Operation failed'
            ];

            $this->db->rollback();
        }

        return $result;
    }

    /**
     * Update role with given id
     *
     * @param $id
     * @param $request
     * @return array
     * @throws \Exception
     */
    public function update($id, $request)
    {
        $this->db->beginTransaction();
        try {
            $input = $request->only([
               'display_name',
                'level'
            ]);

            $input['slug'] = nameToSlug($request->display_name);

            $this->role->update($id,$input);

            $result = [
                'status' => true,
                'message' => 'Role updated successfully'
            ];
            $this->db->commit();
        } catch (\Exception $e) {
            $this->log->error((string) $e);

            $result = [
                'status' => false,
                'message' => 'Operation failed'
            ];

            $this->db->rollBack();
        }

        return $result;
    }

    /**
     * Delete Role with given id
     *
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function delete($id)
    {
        $this->db->beginTransaction();
        try{

            $this->user->delete($id);

            $result = ['status' =>  true,'message' => 'Role deleted Successfully'];

            $this->db->commit();

        }catch(\Exception $e){
            $result =  ['status' =>  false,'message' => 'Failed to delete Role due to '.$e->getMessage()];

            $this->log->error((string) $e);
            $this->db->rollBack();
        }

        return $result;
    }
}