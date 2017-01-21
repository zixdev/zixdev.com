<?php

Route::group(['namespace' => '\Pages'], function ($router) {
    $router->get('pages/{slug}', 'PageController@show');

});