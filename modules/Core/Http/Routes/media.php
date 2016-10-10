<?php

Route::group(['namespace' => '\Assets'], function ($router) {

    $router->post('media', 'MediaController@store');


});