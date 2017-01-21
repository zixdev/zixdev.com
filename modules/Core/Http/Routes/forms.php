<?php

Route::group(['namespace' => '\Forms'], function ($router) {
    $router->post('form', 'WebsiteFromResponsesController@submit');
});
