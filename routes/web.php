<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//

Route::get('test', function () {
    $controllers = [];

    foreach (Route::getRoutes()->getRoutes() as $route) {
        $action = $route->getAction();

        if (array_key_exists('controller', $action)) {
            // You can also use explode('@', $action['controller']); here
            // to separate the class name from the method
            $controllers[] = $action;
        }
    }
    return dd($controllers);
});

