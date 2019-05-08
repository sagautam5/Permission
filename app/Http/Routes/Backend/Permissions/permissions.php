<?php
$router->group(['namespace'=>'Permissions'],function($router) {

    $router->get('/permissions', 'PermissionController@index')->middleware('hasPermission:permissions,list')->name('permissions.index');

    $router->get('/permission/create', 'PermissionController@create')->middleware('hasPermission:permissions,create')->name('permissions.create');

    $router->post('/permission/store', 'PermissionController@store')->middleware('hasPermission:permissions,store')->name('permissions.store');

    $router->get('/permission/edit/{id}', 'PermissionController@edit')->middleware('hasPermission:permissions,edit')->name('permissions.edit');

    $router->patch('/permission/update/{id}', 'PermissionController@update')->middleware('hasPermission:permissions,update')->name('permissions.update');

    $router->get('/permission/delete/{id}', 'PermissionController@delete')->middleware('hasPermission:permissions,delete')->name('permissions.delete');
});