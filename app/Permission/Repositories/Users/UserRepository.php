<?php
/**
 * Created by PhpStorm.
 * User: sagar
 * Date: 3/9/19
 * Time: 1:57 PM
 */

namespace App\Permission\Repositories\Users;

use App\Permission\Repositories\Repository;

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
}