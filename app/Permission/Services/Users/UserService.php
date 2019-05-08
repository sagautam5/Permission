<?php
/**
 * Created by PhpStorm.
 * User: sagar
 * Date: 3/9/19
 * Time: 1:55 PM
 */

namespace App\Permission\Services\Users;

use App\Permission\Repositories\Roles\RoleRepository;
use App\Permission\Repositories\Users\UserRepository;
use Illuminate\Database\DatabaseManager;
use Psr\Log\LoggerInterface;

/**
 * Class UserService
 * @package App\Permission\Services\Users
 */
class UserService
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * @var RoleRepository
     */
    private $role;

    /**
     * @var LoggerInterface
     */
    private $log;

    /**
     * @var DatabaseManager
     */
    private $db;

    /**
     * UserService constructor.
     * @param UserRepository $user
     * @param RoleRepository $role
     * @param LoggerInterface $log
     * @param DatabaseManager $db
     */
    public function __construct(UserRepository $user, RoleRepository $role, LoggerInterface $log, DatabaseManager $db)
    {
        $this->user = $user;
        $this->role = $role;
        $this->log = $log;
        $this->db = $db;
    }

    /**
     * Get All Roles
     *
     * @return mixed
     */
    public function getAllRoles()
    {
        return $this->role->getAllRoles();
    }

    /**
     * Get All Users
     *
     * @return mixed
     */
    public function getAllUsers()
    {
        return $this->user->getAllUsers();
    }

    /**
     * Get all the users
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->user->all();
    }

    /**
     * Store user information
     *
     * @param $request
     * @return array
     * @throws \Exception
     */
    public function store($request)
    {
        $this->db->beginTransaction();
        try {

            /**
             * Prepare data for storing user details
             */
            $input = $request->only([
                'name',
                'email',
                'role_id'
            ]);

            /**
             * Check if request have password field and encrypt the password
             */
            if($request->password){
                $input['password'] = bcrypt($request->password);
            }
            $input['profile'] = 'default-profile.png';
            $input['status'] = 1;
            /**
             * Store user details
             */
            $user = $this->user->store($input);

            $result = [
                'status' => true,
                'message' => 'User added successfully',
                'data' => $user
            ];

            $this->db->commit();

        } catch (\Exception $e) {
            $this->log->error((string) $e);
            $result = [
                'status' => false,
                'message' => 'Operation failed due to '.$e->getMessage()
            ];

            $this->db->rollback();
        }
        
        return $result;
    }

    /**
     * Find the user with given id
     *
     * @param $id
     * @return Object
     */
    public function find($id)
    {
        return $this->user->find($id);
    }

    /**
     * Update user information
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

            /**
             * Prepare data for user Update
             */
            $input = $request->only([
                'name',
                'email',
                'role_id'
            ]);

            /**
             * Update User Details
             */
            $this->user->update($id, $input);

            $result = [
                'status' => true,
                'message' => 'User updated successfully'
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
     * To show only limited users
     * @param $paginate
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function paginate($paginate)
    {
        return $this->user->paginate($paginate);
    }

    /**
     * Get all the users except roles
     *
     * @param $roles
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function users($roles)
    {
        return $this->user->users($roles);
    }

    /**
     * Remove the User
     *
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function delete($id)
    {
        $this->db->beginTransaction();

        try{
            /**
             * Delete User with given id
             */
            $this->user->delete($id);
            $result = ['status' =>  true,'message' => 'User deleted Successfully'];

            $this->db->commit();

        }catch(\Exception $e){

            $this->log->error((string) $e);
            $result = ['status' =>  false,'message' => 'Failed to delete User due to '.$e->getMessage()];

            $this->db->rollBack();
        }

        return $result;
    }

}