<?php
/**
 * Created by PhpStorm.
 * User: sagar
 * Date: 3/9/19
 * Time: 1:45 PM
 */

$router->group(['namespace' => 'Backend'],function($router){
    $router->get('backend/dashboard', 'HomeController@dashboard')->name('dashboard');
    require app_path('Http/Routes/Backend/Users/users.php');
    require app_path('Http/Routes/Backend/Roles/roles.php');
    require app_path('Http/Routes/Backend/Permissions/permissions.php');
});