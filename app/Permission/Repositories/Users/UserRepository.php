<?php
/**
 * Created by PhpStorm.
 * User: sagar
 * Date: 3/9/19
 * Time: 1:57 PM
 */

namespace App\Permission\Repositories\Users;

use App\Permission\Repositories\Repository;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserRepository
 * @package App\Permission\Repositories\Users
 */
class UserRepository extends Repository
{
    /**
     * Get model name with namespace
     *
     * @return String
     */
    function getModel()
    {
        return 'App\User';
    }

    /**
     * Get Users except given roles
     *
     * @param $roles
     * @return mixed
     */
    public function users($roles)
    {
        return $this->model->whereNotIn('id', $roles)->get();
    }

    /**
     * Get All Users
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllUsers()
    {
        return $this->model->whereHas('role', function ($query){
            $query->where('level', '<', Auth::user()->role->level);
        })->get();
    }
}