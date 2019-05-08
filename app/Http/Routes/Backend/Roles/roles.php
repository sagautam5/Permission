<?php

$router->group(['namespace'=>'Roles'], function($router) {
    $router->get('/roles', 'RoleController@index')->middleware('hasPermission:roles,list')->name('roles.index');

    $router->get('/role/create', 'RoleController@create')->middleware('hasPermission:roles,create')->name('roles.create');

    $router->post('/role/store', 'RoleController@store')->middleware('hasPermission:roles,store')->name('roles.store');

    $router->get('/role/edit/{id}', 'RoleController@edit')->middleware('hasPermission:roles,edit')->name('roles.edit');

    $router->patch('/role/update/{id}', 'RoleController@update')->middleware('hasPermission:roles,update')->name('roles.update');

    $router->get('/role/delete/{id}', 'RoleController@delete')->middleware('hasPermission:roles,delete')->name('roles.delete');
});