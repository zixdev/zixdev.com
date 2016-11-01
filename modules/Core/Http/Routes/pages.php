<?php

Route::group(['namespace' => '\Pages', 'middleware' => ['auth:api', 'role:admin']], function ($router) { //'auth:api', 'role:admin'
    $router->resource('pages', 'PageController'); //->middleware('role:admin,view_sites');

});