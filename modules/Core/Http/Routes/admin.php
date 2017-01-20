<?php

Route::group(['namespace' => '\Admin'], function ($router) {

    $router->resource('roles', 'RoleController');
    $router->get('roles/all/permissions', 'RoleController@permissions');
    $router->post('roles/{id}/permissions', 'RoleController@updatePermissions');



});
