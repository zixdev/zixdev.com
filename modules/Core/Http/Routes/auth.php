<?php


Route::group(['namespace' => '\Auth'], function ($router) {
    $router->get('logout', 'LoginController@logout');
    $router->post('user/account/activate', 'RegisterController@activateAccount');

    $router->group(['middleware' => ['guest:api']], function($router) {

        $router->post('login', 'LoginController@login');
        $router->post('register', 'RegisterController@register');
        $router->post('forgot-password', 'ForgotPasswordController@reset');
        $router->post('reset-password', 'ResetPasswordController@reset');

    });


    $router->group(['middleware' => ['auth:api']], function($router) {
        $router->resource('users', 'UserController');

        $router->get('user', 'UserController@user');
        $router->post('user', 'UserController@updateUser');
        $router->post('user/change-password', 'UserController@updatePassword');
        $router->post('user/upload-avatar', 'UserController@updateAvatar');
        $router->post('user/select-avatar', 'UserController@selectAvatar');
        $router->get('user/images', 'UserController@images');

        $router->get('user/info', 'UserController@info')->middleware('role:admin');;
        $router->post('user/info', 'UserController@updateInfo');

    });

});

Route::group(['namespace' => '\Auth', 'middleware' => ['web']], function ($router) {
    /*
     * Social Login Routes
     */
    $router->get('auth/social/login-with/{type}', 'SocialController@redirectToProvider');
    $router->get('auth/social/callback/{type}', 'SocialController@handleProviderCallback');


});