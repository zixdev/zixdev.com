<?php

Route::group(['namespace' => '\User', 'middleware' => ['auth:api']], function ($router) {

    $router->get('users', [
        'uses' => 'ManageUserController@index',
        'before' => 'can:view_users'
    ]);

    $router->get('users/{id}', [
        'uses' => 'ManageUserController@show',
        'before' => 'can:view_users'
    ]);

    $router->post('users', [
        'uses' => 'ManageUserController@store',
        'before' => 'can:create_users'
    ]);

    $router->put('users/{id}', [
        'uses' => 'ManageUserController@update',
        'before' => 'can:update_users'
    ]);

    $router->delete('users/{id}', [
        'uses' => 'ManageUserController@destroy',
        'before' => 'can:delete_users'
    ]);

});