<?php

$router->group(['namespace'=>'Users'],function($router){
    $router->get('/users', 'UserController@index')->middleware('hasPermission:users,list')->name('users.index');

    $router->get('/user/create', 'UserController@create')->middleware('hasPermission:users,create')->name('users.create');

    $router->post('/user/store', 'UserController@store')->middleware('hasPermission:users,store')->name('users.store');

    $router->get('/user/edit/{id}', 'UserController@edit')->middleware('hasPermission:users,edit')->name('users.edit');

    $router->patch('/user/update/{id}', 'UserController@update')->middleware('hasPermission:users,update')->name('users.update');

    $router->get('/user/delete/{id}', 'UserController@delete')->middleware('hasPermission:users,delete')->middleware('checkUserBeforeDelete')->name('users.delete');
});