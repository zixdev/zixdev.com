<?php
//, 'middleware' => ['auth:api', 'role:admin']
Route::group(['namespace' => '\Pages'], function ($router) {
    $router->resource('pages', 'PageController');
});