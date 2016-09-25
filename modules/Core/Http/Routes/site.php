<?php

Route::group(['namespace' => '\Site', 'middleware' => ['auth:api', 'role:admin']], function ($router) {
    $router->resource('sites', 'SiteController'); //->middleware('role:admin,view_sites');
    $router->resource('sites/{id}/versions', 'SiteVersionController');
});