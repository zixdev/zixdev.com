<?php

Route::group(['middleware' => 'api'], function ($router) {


    $router->get('blogs/categories', [
            'uses' => 'ManageCategoryController@index',
            'before' => 'can:view_pages'
    ]);

    $router->get('blogs/categories/{id}', [
            'uses' => 'ManageCategoryController@show',
            'before' => 'can:view_pages'
    ]);

    $router->post('blogs/categories', [
            'uses' => 'ManageCategoryController@store',
            'before' => 'can:create_pages'
    ]);

    $router->put('blogs/categories/{id}', [
            'uses' => 'ManageCategoryController@update',
            'before' => 'can:update_pages'
    ]);

    $router->delete('blogs/categories/{id}', [
            'uses' => 'ManageCategoryController@destroy',
            'before' => 'can:delete_pages'
    ]);
});
