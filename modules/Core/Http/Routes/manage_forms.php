<?php

Route::group(['namespace' => '\Forms', 'middleware' => 'auth:api'], function ($router) {

    $router->get('forms', [
        'uses' => 'ManageFormController@index',
        'before' => 'can:view_forms'
    ]);

    $router->get('forms/{id}', [
        'uses' => 'ManageFormController@show',
        'before' => 'can:view_forms'
    ]);

    $router->post('forms', [
        'uses' => 'ManageFormController@store',
        'before' => 'can:create_forms'
    ]);

    $router->put('forms/{id}', [
        'uses' => 'ManageFormController@update',
        'before' => 'can:update_forms'
    ]);

    $router->delete('forms/{id}', [
        'uses' => 'ManageFormController@destroy',
        'before' => 'can:delete_forms'
    ]);

    $router->get('forms/{slug}/fields', [
        'uses' => 'ManageFormFieldController@index',
        'before' => 'can:view_forms'
    ]);

    $router->post('forms/{slug}/fields', [
        'uses' => 'ManageFormFieldController@store',
        'before' => 'can:create_forms'
    ]);

    $router->put('forms/{slug}/fields/{id}', [
        'uses' => 'ManageFormFieldController@update',
        'before' => 'can:update_forms'
    ]);

    $router->get('forms/{slug}/responses', [
        'uses' => 'ManageFormResponsesController@index',
        'before' => 'can:view_form_response'
    ]);

    $router->get('forms/{slug}/responses/{id}', [
        'uses' => 'ManageFormResponsesController@show',
        'before' => 'can:view_form_response'
    ]);

    $router->delete('forms/{slug}/responses/{id}', [
        'uses' => 'ManageFormResponsesController@destroy',
        'before' => 'can:delete_form_response'
    ]);
});
