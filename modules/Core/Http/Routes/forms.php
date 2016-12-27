<?php
//, 'middleware' => ['auth:api', 'role:admin']
Route::group(['namespace' => '\Forms'], function ($router) {
    $router->resource('forms', 'AdminFormController');
    $router->resource('forms/{slug}/fields', 'AdminFormFieldController');
    $router->resource('forms/{slug}/responses', 'AdminFormResponsesController');
    $router->post('form', 'WebsiteFromResponsesController@submit');
});