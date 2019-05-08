<?php
/**
 * Created by PhpStorm.
 * User: sagar
 * Date: 3/9/19
 * Time: 1:55 PM
 */

namespace App\Permission\Services\Users;

use App\Permission\Repositories\Users\UserRepository;

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
     * UserService constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
}