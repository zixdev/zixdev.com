<?php

Route::group(['namespace' => '\Site', 'middleware' => []], function ($router) { //'auth:api', 'role:admin'
    $router->resource('sites', 'SiteController'); //->middleware('role:admin,view_sites');
    $router->resource('sites/{id}/ui', 'SiteUiController');
});