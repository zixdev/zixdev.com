<?php
//, 'middleware' => ['auth:api', 'role:admin']
Route::group(['namespace' => '\Forms'], function ($router) {
    $router->resource('forms', 'AdminFormController');
    $router->resource('forms/{slug}/fields', 'AdminFormFieldController');
});