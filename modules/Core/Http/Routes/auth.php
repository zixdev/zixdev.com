<?php


Route::group(['namespace' => '\Auth'], function ($router) {

    $router->group(['middleware' => ['guest:api']], function($router) {

        $router->post('login', 'LoginController@login');
        $router->post('register', 'RegisterController@register');
        $router->post('forgot-password', 'ForgotPasswordController@reset');

    });



    $router->group(['middleware' => ['auth:api']], function($router) {

        $router->get('user', 'UserController@user');
        $router->post('user', 'UserController@updateUser');

        $router->get('user/info', 'UserController@info');
        $router->post('user/info', 'UserController@updateInfo');

    });


});
